<html>
<head>
<script src="final.js"></script>
</head>
<body>
<div id="TimesOfIndia">
<?php
$curl = curl_init('https://timesofindia.indiatimes.com/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$page = curl_exec($curl);
if(curl_errno($curl)) // check for execution errors
{
        echo 'Scraper error: ' . curl_error($curl);
        exit;
}
curl_close($curl);
$regex = '/<ul data-vr-zone="top_stories" class="list8">(.*?)<\/ul>/s';
if ( preg_match($regex, $page, $list) )
{
	unset($list[0]);
	$list1 = array_values($list);
	//print_r($list1);
	$pema = explode("<li>",$list1[0]);
	$neha= array_shift($pema);
	//print_r($pema);
}
else
{
    print "Not found";
}
$change='href="/';
$add = 'href="https://timesofindia.indiatimes.com/';
$new_link = str_replace($change, $add, $pema);
print_r($new_link);

echo("<br><br>");
//print_r($new_link[0]);
foreach ($new_link as $value) {
   // echo "$value <br>";
   preg_match('~href=".*?"~ims', $value, $result);
   foreach ($result as $value1) {
	   $neha1[] = $value1;
   }
   echo("<pre>");
   
   
}
$neha1 = str_replace('href="', '', $neha1);
$neha1 = str_replace('"', '', $neha1);
print_r($neha1);
//preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $new_link[1], $jyoti);
//print_r($jyoti);
?>
<?php
for($i = 0; $i < count($neha1); ++$i) {
$curlz = curl_init($neha1[$i]);
curl_setopt($curlz, CURLOPT_RETURNTRANSFER, TRUE);
$pagez = curl_exec($curlz);
if(curl_errno($curlz)) // check for execution errors
{
        echo 'Scraper error: ' . curl_error($curlz);
        exit;
}
curl_close($curlz);
$regexz = '/<div class="Normal">(.*?)<\/div>/s';
if ( preg_match($regexz, $pagez, $listz) )
{
	//$nehasmall = substr($listz[0], 0, 350);
	//$listz[0] = array();
	//print_r($listz."<br /><br /><br /><br /><br /><br /><br />");
	foreach ($listz as $valuezzz1) {
		$arrat[] = $valuezzz1;
		}
		
	//echo "$nehasmall <br>";
	
}
else
{
    print "Not found";
}

}
$assatic = array_unique($arrat);
print_r($assatic);
?>


</div>
</body>
<script>
//$(".list8").contents().unwrap();
//$("li").contents().unwrap();
</script>
<!--
<script>
var frame = document.getElementById("nano");
 frame.parentNode.removeChild(frame);
</script>
-->
</html>
