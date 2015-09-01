<?php
include "connect.php";

if(isset($_POST['fb_id']) && isset($_POST['insta_id'])){
	$fb_id = $_POST['fb_id'];
	$insta_id = intval($_POST['insta_id']);

	$query = 'SELECT insta_vote from users WHERE fb_id = ?';
	$stmt = $db->prepare($query);
	$stmt->bind_param('s', $fb_id);
	$stmt->execute();
	$stmt -> bind_result($result);
	$stmt -> fetch();
	$stmt -> close();
	if(!$result){
		$stmt2 = $db->prepare("UPDATE users SET insta_vote = ? WHERE fb_id = ?");
		$stmt2->bind_param('ss', $insta_id, $fb_id);
		$stmt2->execute(); 
		$stmt2->close();
		echo 'lägg till i user-tabellen';

		$stmt2 = $db->prepare("UPDATE imgs SET votes = votes+1 WHERE id = ?");
		$stmt2->bind_param('i', $insta_id);
		$stmt2->execute(); 
		$stmt2->close();
		echo 'lägg till i insta-tabellen';
	}else {
		echo $result;
	}

	





	


}


?>