<head>
	<meta charset="UTF-8">
</head>	



<?php 
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

$out = json_decode(curl($url), 1);
$ret = "";
foreach($out['sentences'] as $sentence) {
$ret .= $sentence['trans'].' ' ;

}
return stripslashes(trim($ret));
};



$string = tranny($what, $from, $to); ?>

{
    "word":  "<?php echo $string  ?>"

}
