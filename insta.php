<?php 

include 'connect.php';


$limit = 50;
$cid = '548b3af99cbc4d73b19781dcdcdb8d0c';
$hash = 'mackan';
$url = 'https://api.instagram.com/v1/tags/'.$hash.'/media/recent?client_id='.$cid.'&count='.$limit;
$ret=json_decode(file_get_contents($url));
$user_id=$ret->data[0]->id;


echo $ret->pagination->next_url;

echo '<pre>', print_r($ret->pagination->next_url), '</pre>';

while ($ret->pagination->next_url) {
	$ret = json_decode(file_get_contents($ret->pagination->next_url));
	echo "Hejsan";
}

$photos=@json_decode(file_get_contents($url));
echo "Found: ".count($photos->data)."photos.<hr>";
?>

