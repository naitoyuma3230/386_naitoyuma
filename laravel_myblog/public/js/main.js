(function(){
    'use strict';

    var cmds = document.getElementsByClassName('del');
    // 全ての'del'クラスを読み込み cmdsに配列として返す
    var i;

    for(i = 0; i < cmds.length; i++){
        // 配列の全ての要素にクリックモーションを設定するため、for文で回す
        cmds[i].addEventListener('click', function(e){
            e.preventDefault(); /*デフォルト動作の妨害(aタグのリンク)*/
            if (confirm('are you sure?')){
                document.getElementById('form_' + this.dataset.id).submit();
            }
        });
    }
    // aタグリンクで直接削除処理を行わず、windowで確認してから作成したform要素のTDを読み取り、submitを行う
    // →aタグリンクは使用せず、実際リンクとIDの送信処理を行うのは下に作ったForm
})();
