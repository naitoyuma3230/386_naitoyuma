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

            $_SESSION['success'] = 'Upload Done';
        }catch(\Exception $e){
            $_SESSION['error'] = $e->getMessage();
            // exit;
        }
        // redirect
        header('Location: http://' . $_SERVER['HTTP_HOST']);
        exit;
    }

    public function getResults(){
        $success = null;
        $error = null;
        if (isset($_SESSION['success'])){
            $success = $_SESSION['success'];    /* ='Upload Done'*/
            unset($_SESSION['success']);    /*unsetしないとredirectしてもSESSIONに保持され続ける*/
        }
        if (isset($_SESSION['error'])){
            $error = $_SESSION['error'];    /* =各種エラーメッセージを渡す*/
            unset($_SESSION['error']);
        }
        return [$success, $error];
    }

    public function getImages(){
    // THUMBNAIL_DIRをOpen->fail名取得->絶対Path取得  もしfile名が見つからなければIMAGES_DIRから絶対Path取得
        $images = [];/*フォルダ名/ファイル名の配列*/
        $files = [];/*ファイルの絶対パスの配列*/
        $imageDir = opendir(IMAGES_DIR);
        // ファイルを参照するため、ディレクトリを開いている状態にする。（Resource型データ：DirHandle=Open）
        // Open時、echo Resource id #2を返し、$imageDirに格納して保持
        while(false !== ($file = readdir($imageDir))){
            // readdir:HnadelがOpenのディレクトリ内のfileを1つずつ取得し返す。（出力する順番はバラバラ）
            // $fileには_createThumbnail()で作成したファイル名が出力される
            if($file === '.' || $file === '..'){
            // 出力したfile名の中に親ディレクトリやカレントディレクトリを示す'.'や'..'が入っても処理を継続
                continue;
            }
            // 取得したfile名:$faileを$filesに配列の形で追加
            $files[] = $file;
            if(file_exists(THUMBNAIL_DIR . '/' . $file)){
                $images[] = basename(THUMBNAIL_DIR) . '/' . $file;
                // basename (ファイル名を取得したいパス [, 除外したい接尾語])
                // 指定したパスからファイル名を取得（接尾語を指定したらそれを除く）
            }else{
                $images[] = basename(IMAGES_DIR) . '/' . $file;
            }
        }
        array_multisort($files, SORT_DESC, $images);
        // 配列のソート $filesと$imagesを降順にソート
        // ファイル名の先頭には時刻が入っているので、投稿が古い順に並ぶ
        // array_multisort(ソート対象（$array）, ソート順(SORT_DEC=降順) ,次のソート対象, 次の…
        return $images;
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
            // imagejpeg ( resource $image [, mixed $to [, int $quality ]] )
            // $image:imagecreatetruecolorが返した画像リソース（この時点ではまだ画像データでない）
            // $to:ファイル保存先のパス 未設定でimageストリームを返す（ストリーム：本流）
            // $quality:0～100までデータ量量と画質バランスの設定
                case IMAGETYPE_GIF:
                    $srcImage = imagegif($thumbImage,THUMBNAIL_DIR . '/' . $this->_imageFileName);
                break;
                case IMAGETYPE_JPEG:
                    $srcImage = imagegjpeg($thumbImage,THUMBNAIL_DIR . '/' . $this->_imageFileName);
                break;
                case IMAGETYPE_PNG:
                    $srcImage = imagepng($thumbImage,THUMBNAIL_DIR . '/' . $this->_imageFileName);
                break;
                // 出力成功で返り値：true
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