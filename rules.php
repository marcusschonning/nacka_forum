<?php include "header.php";
session_start();
if (!isset($_SESSION['graphobject'])) {
	header('Location: fblogin.php');
}
?>

<nav class="main-navigation">
	<ul>
		<li><a href="index.php">TÄVLA</a></li>
		<li><a href="all.php">ALLA BIDRAG</a></li>
		<li><a href="toplist.php">TOPPLISTA</a></li>
		<li><a href="winners.php">VINNARE</a></li>
		<li><a href="rules.php" class="active">REGLER &#38; PRISER</a></li>
	</ul>
</nav>
<div class="rules">
	<h2>Regler och priser</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi est distinctio beatae esse itaque odio, voluptate maiores quisquam iste earum delectus vero alias. Maiores distinctio, reprehenderit, dolorem laboriosam eveniet error.</p>
	<button><a href="index.php"></a></button>
</div>



</div>
<?php include "footer.php"; ?>