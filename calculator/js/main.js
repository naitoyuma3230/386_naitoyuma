'use strict';
{

 let total = "0";     //現在の合計数を定義
 let input = "";     //入力した数値と演算子を文字列で保持
 let calculation = "+";　//入力した演算子を定義

 let inputId = 0; //前に押したボタン　0＝数値　1＝演算子 2= "="

 const totalDoc = document.getElementById('total');
 const inputDoc = document.getElementById('input');
 const calucu = document.getElementById('calucu');

window.mycalcu = function mycalcu(value){ //演算子のボタンを選択
  if(inputId ==0){
    inputId = 1;
    let lang = total + calculation + input;
    total = eval(lang);
    totalDoc.textContent = total;
    calculation = value;
    calcu.textContent = calculation;
    input="";
  }else if (inputId == 1) {
    calculation = value;
    calcu.textContent = calculation;
  }
}


window.inputNumber = function inputNumber(value){ //数値のボタンを選択
    inputId = 0;
    input +=value;
    inputDoc.textContent = input;
  }

window.inputDot = function inputDot(value){
  if(!input.includes(".")){
    input += value;
    inputDoc.textContent = input;
  }
}
}
