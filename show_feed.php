<?php
if(true){
	include 'connect.php';

	$query = 'SELECT * FROM imgs';
	$result = $db->query($query);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			
		echo 'LINK: '.$row['link'];
		echo ' USERNAME: '.$row['username'];
		echo ' VOTES: '.$row['votes'];
		echo '<br>';
			
		}
	}
}

?>