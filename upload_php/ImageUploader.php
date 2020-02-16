<?php

namespace MyApp;

class ImageUploader{

    private $_imageFileName;
    private $_imageType;

    public function upload(){
        try{
            // error check
            // Fileのサイズチェック、セキュリティ処理
            $this->_validateUpload();

            // typecheck
            // Fileの種類チェック
            $ext = $this->_validateImageType(); /*extension=拡張子を返す*/

            // save
            // imagesフォルダに保存
            $savePath = $this->_save($ext); /*保存したFileのsavePathを返す*/


            // create thubnail
            $this->_createThumbnail($savePath);


        }catch(\Exception $e){
            echo $e->getMessage();
            exit;
        }
        // redirect
        header('Location: http://' . $_SERVER['HTTP_HOST']);
        exit;
    }

    private function _createThumbnail($savePath){
        $imageSize = getimagesize($savePath);
        // [0] => width(px), [1] => height
        // 1.getimagesize:ソース画像のサイズ取得
        $width = $imamgeSize[0];
        $height = $imageSize[1];

        if($width > THUMBNAIL_WIDTH){
            $this->_createThumbnailMain($savePath, $width, $height);
        }
    }

        private function _createThumbnailMain($savePath, $width, $height){
            switch($this->imageType){
                // imagecreatefrom：ソース画像をコピー、新しい画像作成の準備
                //                :srcimageに指定したファイル画像を表すIDを返す
                case IMAGETYPE_GIF:
                    $srcImage = imagecreatefromgif($savePath);
                break;
                case IMAGETYPE_JPEG:
                    $srcImage = imagecreatefromjpeg($savePath);
                break;
                case IMAGETYPE_PNG:
                    $srcImage = imagecreatefrompng($savePath);
                break;
            }
            $thumbHeight = round($height * THUMBNAIL_WIDTH / $width);
            // round:小数点四捨五入
            $thumbImage = imagecreatetruecolor(THUMBNAIL_WIDTH, $thumbHeight);
            // imagecreatetruecolor(横長, 縦長):サイズ指定して元画像をリサイズ、新しい画像の原型を作成
            imagecopyresampled($thumbImage, $srcImage, 0, 0, 0, 0, THUMBNAIL_WIDTH,
            $thumbHeight, $width, $height);
            // 2.imagecopyresampled：画像のコピー、伸縮
            // (ソース画像, サムネイルID, ソース画像始点x, y, サムネイル始点x, y,ソース画像横長,縦長)

            switch($this->imageType){
            // 3.imagejpeg：出力
                case IMAGETYPE_GIF:
                    $srcImage = imagegif($thumbImage,THUMBNAIL_DIR . '/' . $this->_imageFileName);
                break;
                case IMAGETYPE_JPEG:
                    $srcImage = imagegjpeg($thumbImage,THUMBNAIL_DIR . '/' . $this->_imageFileName);
                break;
                case IMAGETYPE_PNG:
                    $srcImage = imagepng($thumbImage,THUMBNAIL_DIR . '/' . $this->_imageFileName);
                break;
            }

        }


    private function _save($ext){
        $this->_imageFileName = sprintf(
            '%s_%s'.'%s',
            time(),
            sha1(uniqid(mt_rand(), true)),
            $ext
        );
            //sha1:SHA-1方式で、16進数・40文字のハッシュ値を生成する
            // よくわからないが重複しないランダムな文字列を生成しファイル名に使う
            // $format = "%s 君は %s を %d 個食べました。\n";
            //  echo sprintf($format, "太郎", "りんご", 7); formatの%部分に文字や数値を代入
            //imagefileName=時刻.ランダム文字列.拡張子となる
            // 例）1581712214_0b8058d804818a0ad2b6d81eff0391da11473686jpg
            //      (時刻)          (ランダム)                      （拡張子）
        $savePath = IMAGES_DIR . '/' . $this->_imageFileName;
        $res = move_uploaded_file($_FILES['image']['tmp_name'], $savePath);
        // move_uploaded_file():アップロードされたファイルを移動.失敗=false
        if($res === false){
            throw new \Exception('Could not uplad!');
        }
        return $savePath;
        // savePath=フォルダパス/ファイル名

    }

    public function getImages(){
        $images = [];
        $files = [];
        $imageDir = opendir(IMAGES_DIR);
        while(false ==='.');
    }


    private function _validateImageType(){
        $this->imageType = exif_imagetype($_FILES['image']['tmp_name']);
        // exif_image:ファイルの種類を判定->返り値:ファイル種類。その他はfalse
        switch($this->imageType){
            case IMAGETYPE_GIF:
                return 'gif';
            case IMAGETYPE_JPEG:
                return 'jpg';
            case IMAGETYPE_PNG:
                return 'png';
            default:
                throw new \Exception('PNG/JPEG/GIF only');
        }
    }


    private function _validateUpload(){
        // var_dump($_FILES);
        // exit;

        if(!isset($_FILES['image']) || !isset($_FILES['image']['error'])){
            // $_FILESの連想配列 Formのinputで設定  Array:inputで指定したname:image(
            //     [name] => memo.txt :ファイル名
            //     [type] => text/plain ：ファイルタイプ
            //     [tmp_name] => /var/tmp/php7UNOJY ：サーバの一時保管時のファイル名
            //     [error] => 0 ：エラーコード
            //     [size] => 45 ：バイト
            //     )
            throw new \Exception('Upload Erorr!');
        }

        switch($_FILES['image']['error']){
            case UPLOAD_ERR_OK:
                return true;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new \Exception('File too large!');
            default:
                throw new \Exception('Err: ' . $_FILES['image']['error']);
        }

    }

}