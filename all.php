<?php include "header.php";
session_start();
if (!isset($_SESSION['graphobject'])) {
	header('Location: fblogin.php');
}
?>

<nav class="main-navigation">
	<ul>
		<li><a href="index.php">TÄVLA</a></li>
		<li><a href="all.php" class="active">ALLA BIDRAG</a></li>
		<li><a href="toplist.php">TOPPLISTA</a></li>
		<li><a href="winners.php">VINNARE</a></li>
		<li><a href="rules.php">REGLER &#38; PRISER</a></li>
	</ul>
</nav>
<div class="sub-info all">
	<h2>Alla bidrag</h2>
	<p>Här ser du alla bidrag i tävlingen. Var med och tävla du också och ta chansen att vinna en lyxig matkasse värd 1200 kr utvald av kocken Tommy Myllymäki</p>
	<button><a href="index.php"></a></button>
</div>

</div>
<?php include "footer.php"; ?>