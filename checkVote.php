<?php
	include "connect.php";

	if(isset($_POST['fb_id'])){

		$fb_id = $_POST['fb_id'];

		$query = 'SELECT insta_vote from users WHERE fb_id = ?';
		$stmt = $db->prepare($query);
		$stmt->bind_param('s', $fb_id);
		$stmt->execute();
		$stmt -> bind_result($result);
		$stmt -> fetch();
		if(!$result){
			echo 'false';
		}else {
			echo $result;
		}

		$stmt -> close();
	}
	
?>