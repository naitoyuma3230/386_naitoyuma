<?php

namespace MyApp;

class BINGO{

  public function create(){
          $nums = [];
        // range(1,20);rangeは範囲内の数値を区切って配列として代入できる
        // shuffle($int);
        //$ex = array_slice($int,0,3); 任意の範囲を選択して代入
        for ($i = 0; $i<5; $i++ ){
                $col = range($i * 15 + 1, $i * 15 +15);
                shuffle($col);
                $nums[$i] = array_slice($col, 0, 5);
              }
        // $nums[$i] $i * 15 + 1 ~ $i * 15 +15   i=0〜5

        }
        $nums[2][2]= "free";
        return $nums;
  }
}
