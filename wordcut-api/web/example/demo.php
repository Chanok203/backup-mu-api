<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<form method="POST">
<textarea name="txt" rows="20" cols="30">
</textarea>
<input type="submit" value="segment">
</form>
<?php
require_once "../src/WordBreaker.php";
use PhlongTaIam\WordBreaker as WordBreaker;
   //$serverName = "localhost";
	$userName = "root";
	$userPassword = "root";
	$dbName = "poem_research";


	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($objCon, "utf8");
	
if (isset($_POST["txt"])) {
    echo "Text:".$_POST["txt"];
    $wordBreaker = new WordBreaker("../data/tdict-std.txt");
?>
<ul>
<?php
    $j = 0;
    foreach($wordBreaker->breakIntoWords($_POST["txt"]) as $w) {
        
        	
        	print "<li>$w</li>\n";
        	$w = trim($w);
        	if(strlen($w))
        	{
        	$j++;
        	
        	$strSQL1 = "select * from poem_word_tbl where word like '".$w."'";
        	print $i."...".$strSQL1."<br>";	
			$objQuery1 = mysqli_query($objCon,$strSQL1);
			
			$objResult = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC);
			$word_ID = $objResult["word_ID"];  print $word_ID ."<br>";
		 	$word = $objResult["word"]; print $word."<br>";
		 	$wordcount = $objResult["wordcount"]; print $wordcount."<br>";
		 	if($wordcount >= 1)
		 	{
		 	  			$wordcount++;
		 	  			$strSQL2 = "UPDATE poem_word_tbl SET wordcount= '".$wordcount."' WHERE word like '".$w."'";
						$objQuery = mysqli_query($objCon,$strSQL2);
        	} else
        	{
        	$wordcount = 1;
			$strSQL2 = "INSERT INTO poem_word_tbl (word,wordcount) VALUES ('".$w."','".$wordcount."')";
			$objQuery = mysqli_query($objCon,$strSQL2);
			}
			print $i."...".$strSQL2."<br>";		
			}
        
    }
}
?>
</ul>
</body>
</html>
