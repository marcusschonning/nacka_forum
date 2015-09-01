<?php
include "connect.php";
include "header.php";

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
<div class="all">
	<div class="sub-intro">
		<h1>Alla bidrag</h1>
		<p>Här ser du alla bidrag i tävlingen. Var med och tävla du också och ta chansen att vinna en lyxig matkasse värd 1200 kr utvald av kocken Tommy Myllymäki</p>
		<a href="index.php">Tävla här</a>
	</div>

	<div class="latest">

		<div class="latest-images">
		<?php 
			echo '<input type="hidden" value="'.$_SESSION['graphobject']['id'].'">';

			$query = 'SELECT * from imgs ORDER BY id DESC LIMIT 9';
			$result = $db->query($query);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					?>
					<div class="image">
						<p><?php echo $row['username']; ?></p>
						<img src="<?php echo $row['link']; ?>" alt="insta">
						<div class="vote-meta" data-id="<?php echo $row['id']; ?>">
							<span class="votes"><i class="fa fa-heart"></i> <?php echo $row['votes']; ?></span><span class="share"><i class="fa fa-share-alt"></i></span><button data-id="<?php echo $row['id']; ?>">Rösta</button>
						</div>
					</div>
					<?php
				}

			}
			?>
			<div class="image"></div>
			<?php 
		?>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>