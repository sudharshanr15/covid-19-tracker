<!-- // $fp = fopen("E:/state_wise_daily.csv", "r");
/ $arr = array();
/ for($num=0, $i=0; fseek($fp, $i, SEEK_END) !== -1; $i--){
/     $char = fgetc($fp);
/     if($char === "\n"){
/         $num++;
/         continue;
/     }
/     $arr[$num] = $char. ((array_key_exists($num, $arr)) ? $arr[$num] : "");
/ }
/ fclose($fp);
/ // array_pop($arr);
/ $states = array();
/ $count = count($arr) - 1;
/ $stateLine = explode(",",$arr[$count]);
/ for($i=0; $i<42; $i++){
/     $states[$stateLine[$i]] = $i;
/ }
/ $line = explode(",",$arr[5]);
/ echo $line[$states["KA"]]; -->

<?php
include_once "./layouts/render.php";

echo renderView("");