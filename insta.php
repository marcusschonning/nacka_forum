<?php 

include 'connect.php';


$limit = 50;
$cid = '548b3af99cbc4d73b19781dcdcdb8d0c';
$hash = 'nackaforummatochvin';
$url = 'https://api.instagram.com/v1/tags/'.$hash.'/media/recent?client_id='.$cid.'&count='.$limit;
$ret=json_decode(file_get_contents($url));
$user_id=$ret->data[0]->id;


echo $ret->pagination->next_url;

echo '<pre>', print_r($ret->pagination->next_url), '</pre>';

$imgs = array();

foreach ($ret->data as $photo) {

	$imgs[] = array('link'=>$photo->images->low_resolution->url, 'username'=>$photo->user->username);	

}

while ($ret->pagination->next_url) {

	$ret = json_decode(file_get_contents($ret->pagination->next_url));
	foreach ($ret->data as $photo) {

		$imgs[] = array('link'=>$photo->images->low_resolution->url, 'username'=>$photo->user->username);	

	}
}

$query = 'SELECT link from imgs';
$result = $db->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		
		//$row['link'];
		for ($i=0; $i < count($imgs); $i++) { 
			if($row['link'] === $imgs[$i]['link']){

				echo '<pre>', print_r($db_imgs), '</pre>';
				echo '<pre>', print_r($imgs), '</pre>';
				$counter++;
			}
		}
		if($counter !== count($imgs)){
			//töm databasen och släng in allt igen...
			echo 'Töm databasen och lägg in tobbes fina bild.';
		}
	}

	
		

}else{
	foreach ($imgs as $key => $value) {
		$value['username'];
		$stmt = $db->prepare('INSERT INTO imgs (link, username) VALUES (?, ?)');
		$stmt->bind_param('ss', $value['link'], $value['username']);
		$stmt->execute();
		$stmt->close();
	}
}

//echo '<pre>', print_r($imgs), '</pre>';

?>

