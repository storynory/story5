<?php 
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('content-type: application/json; charset=utf-8');
$what = $_GET["what"];
$from = $_GET["from"];
$to = $_GET["to"];
function curl($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
};
function tranny($what, $from, $to)
{
	$url = 'http://translate.google.com/translate_a/t?client=p&q='.urlencode($what).'&hl='.$to.'&sl='.$from.'&tl='.$to.'&ie=UTF-8&oe=UTF-8&multires=0!';
	$ret = curl($url);
	return stripslashes(trim($ret));
};
$string = tranny($what, $from, $to); 
echo $string;
?>