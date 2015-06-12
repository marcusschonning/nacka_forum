<!DOCTYPE html>
<html lang="sv-SE">
<head>
	<meta charset="UTF-8">
	<title>Nacka Forum</title>
</head>
<body>
<h1>Pung</h1>

<?php 
session_start();

if (isset($_SESSION['graphobject'])) {
	echo "Inloggad! :D";

	echo "<pre>" , print_r($_SESSION['graphobject']) , "</pre>";
}else{
	echo "Inte inloggad";
}
?>
</body>
</html>