<?php

function h($s){
  return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
  // エスケープ処理を簡略化 例）echo h(<p>ENT_QUOTES：'',""をHTMLエンティティ化</p>)
}
