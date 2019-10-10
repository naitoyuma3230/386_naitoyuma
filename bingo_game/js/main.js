'use strict';

{
    const btn = document.getElementById('btn'); //ボタン要素の読み込み
    const results = document.getElementById('results');
    const div = document.createElement('div');

    let maxInt = 3; //ビンゴ番号の最大値を定義
    let array =[]; //全でのビンゴ番号を入れる空の配列を定義
    let btnId = 0; //0：ルーレットスタート中　1：ストップ中
    let dispInt = 0;//ボタンを押した時に表示する要素の配列番号
    let resultsInt = [];//既に出た数字を入れる空の配列を定義

    //ランダムな整数の配列を作成する関数
    window.randamInt = function randamInt(value){
        array = [];
        maxInt =  eval(value);　//ビンゴ番号の最大値にhtmlで入力された数値を代入
        console.log(maxInt)　
        for(let i = 1; i < maxInt+1; i++){
          array.push(i);
        }
        console.log(array);
        //配列のランダム化　フィッシャー・イェーツのシャッフル
        for(let i = array.length -1 ; i>0; i--){
          let rnd = Math.floor(Math.random()*i) //配列の要素の数以下のランダムな数値
          let j = array[rnd]; //array[rnd]を保持しておく
          array[rnd] = array[i];
          array[i] = j;　//保持しておいたarray[rnd]を代入
        }
        console.log(array);
        dispInt =0;
        resultsInt = [];
        results.textContent ="";

    }

    //結果を表示させる関数
    function stop(){
      btn.textContent = array[dispInt]; //ボタンを押した回数に対応した配列番号の要素を表記
      resultsInt.unshift(array[dispInt]); //その数値を既に出た数値の配列に代入

      div.classList.add(`resultBall${dispInt}`); //divにresultBall+番号のクラスネームをつける
      document.getElementById('results').appendChild(div);　//
      document.getElementsByClassName(`resultBall${dispInt}`).textContent = 0;　//ボタンを押すごとに増えるその配列を表記

      dispInt +=1;　//ボタンを押した回数を記録
    }

    //ボタンを押した時に結果を表示
    btn.addEventListener('click',()=>{　
      stop();
    });

    //pressed属性付加時の表記をCSSで設定してボタンん動きをそれっぽくする
    //クリックのボタン押し込み時にpressed属性を付加
    btn.addEventListener('mousedown',()=>{
      btn.classList.add('pressed');
    });
    //クリックを離した時に、pressed属性をなくす
    btn.addEventListener('mouseup',()=>{
      btn.classList.remove('pressed');
    });

}
