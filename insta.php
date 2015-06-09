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
$img_link = array();

foreach ($ret->data as $photo) {

	$imgs[] = array('link'=>$photo->images->low_resolution->url, 'username'=>$photo->user->username);
	$img_link[] = $photo->images->low_resolution->url;

}

while ($ret->pagination->next_url) {

	$ret = json_decode(file_get_contents($ret->pagination->next_url));
	foreach ($ret->data as $photo) {

		$imgs[] = array('link'=>$photo->images->low_resolution->url, 'username'=>$photo->user->username);
		$img_link[] = $photo->images->low_resolution->url;

	}
}
$db_imgs = array();
$query = 'SELECT link, username from imgs';
$result = $db->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		
		$db_imgs[] = $row['link'];
	}

}

$img_diff = array_diff($img_link, $db_imgs);//ska in i databasen!
$db_diff = array_diff($db_imgs, $img_link);//ska ut ur databasen!

//Ta bort från databasen
for ($i=0; $i < count($db_diff); $i++) { 
	$stmt2 = $db->prepare("DELETE FROM imgs WHERE link = ?");
	$stmt2->bind_param('s', $db_diff[$i]);
	$stmt2->execute(); 
	$stmt2->close();
}
	
//Lägger till det som inte finns i databasen
for($i = 0; $i < count($imgs); $i++){
	for ($j=0; $j < count($img_diff); $j++) { 
		if($imgs[$i]['link'] === $img_diff[$j]){
			$stmt = $db->prepare('INSERT INTO imgs (link, username) VALUES (?, ?)');
			$stmt->bind_param('ss', $imgs[$i]['link'], $imgs[$i]['username']);
			$stmt->execute();
			$stmt->close();
		}
	}
}




