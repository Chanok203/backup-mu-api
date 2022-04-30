<?php
require_once "src/WordBreaker.php";
use PhlongTaIam\WordBreaker as WordBreaker;

if (isset($_REQUEST["string"])) {
//print "กลอน = ".$_POST["txt"]."<br>"; 
$poem = nl2br($_REQUEST["string"]); 
$wordBreaker = new WordBreaker("data/dict.txt");
  foreach($wordBreaker->breakIntoWords(trim($poem)) as $w) {
        	$result['words'][] = $w;        	   	     	   	
   }
}
header('Content-type: text/html; charset=utf-8');
$cut_result = json_encode($result);
echo $cut_result;
$de_result = json_decode($cut_result);
print_r($de_result);
?>