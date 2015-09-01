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
<div class="sub-intro rules">
	<h1>Regler &#38; priser</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi est distinctio beatae esse itaque odio, voluptate maiores quisquam iste earum delectus vero alias. Maiores distinctio, reprehenderit, dolorem laboriosam eveniet error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, fugiat labore temporibus voluptatem ipsam similique voluptas dolorem alias quidem corporis atque iure nesciunt eaque culpa eligendi consectetur architecto recusandae pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero asperiores quibusdam magni, praesentium et distinctio illum ex natus mollitia adipisci tempora sequi in doloremque, quis nam omnis voluptatem tenetur officiis.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi est distinctio beatae esse itaque odio, voluptate maiores quisquam iste earum delectus vero alias. Maiores distinctio, reprehenderit, dolorem laboriosam eveniet error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, fugiat labore temporibus voluptatem ipsam similique voluptas dolorem alias quidem corporis atque iure nesciunt eaque culpa eligendi consectetur architecto recusandae pariatur.</p>
</div>


<?php include "footer.php"; ?>