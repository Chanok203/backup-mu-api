<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<form method="POST">
<input type='text' name ='poem_id'><br>
<textarea name="txt" rows="25" cols="50">
</textarea>
<input type="submit" value="POS Word">
</form>
<?php
require_once "src/WordBreaker.php";
use PhlongTaIam\WordBreaker as WordBreaker;



if (isset($_POST["txt"])) {
//print "กลอน = ".$_POST["txt"]."<br>"; 
$poem = nl2br($_POST["txt"]); 
$poem_id = $_POST["poem_id"];

$poem_wak = explode("<br />", $poem);
print_r($poem_wak);
$num_of_wak = sizeof($poem_wak);
print $num_of_wak."<br>";

for($wakC = 0; $wakC <$num_of_wak; $wakC++)
{
$sq = 0;
//$wordBreaker = new WordBreaker("data/tdict-std.txt");
   $wordBreaker = new WordBreaker("data/dict.txt");
  foreach($wordBreaker->breakIntoWords(trim($poem_wak[$wakC])) as $w) {
        	print "<li>$w</li>\n";
        	   	     	   	
   }

}
}
?>
<ul>
</ul>
</body>
</html>
