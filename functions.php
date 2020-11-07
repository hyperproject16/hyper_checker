<?php
extract($_GET);

function save($fname,$card)
{
  fwrite(fopen($fname,'a'),$card.PHP_EOL);
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}