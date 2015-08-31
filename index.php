
<?php include "header.php"; ?>
	<div class="intro">
		<h2>Ladda upp din bästa matbild</h2>
		<h3>Vinn en matkasse med varor utvalda av kocken Tommy Myllymäki</h3>
		<p>Följ instruktionerna nedan för att delta i tävlingen. 
		Här i appen presenteras alla tävlingsbidrag som laddats upp via Instagram, 
		och här kan du också rösta på dina favoritbilder. Varje vecka utser en jury, 
		som består av bland annat Tommy Myllymäki, 4 vinnare. 
		Dessa vinner en varsin lyxig matkasse med produkter utvalda av koken Tommy 
		Myllemäki till ett värde av 1200 kr. Du kan delta med bild och rösta fram tom den 3 november 2013.
		Läs mer om regler och priserna <a href="rules.php">här</a>. Lycka till!</p>

		<ul class="steps clearfix">
			<li><span class="number">1</span><span class="description"><h6>Fota din maträtt</h6><p>Ta ett foto med din mobil på en maträtt du köpt i någon av Nacka Forums caféer eller restauranger eller som du tillagat hemma tex. till middag</p></span></li>
			<li><span class="number">2</span><span class="description"><h6>Ladda upp fotot på instagram</h6><p>Följ @nackaforum på Instagram och se till att ditt konto är publikt</p></span></li>
			<li><span class="number">3</span><span class="description"><h6>Tagga</h6><p>Tagga bilden med:<br>#nackaforummatochvin</p></span></li>
			<li><span class="number">4</span><span class="description"><h6>Rösta</h6><p>På ditt eller andras bidrag via Nacka Forums Facebooksida</p></span></li>
		</ul>

	</div>
		
	<div class="latest">
		<h4>Senaste bidragen</h4>
		<a href="#">Se alla bidrag</a>
		<div class="latest-images"></div>
	</div>
	<?php 
	session_start();

	if (isset($_SESSION['graphobject'])) {
		echo "Inloggad! :D";

		echo "<pre>" , print_r($_SESSION['graphobject']) , "</pre>";
	}else{
		echo "<p>Inte inloggad</p>";
	}
	?>
<?php include "footer.php"; ?>
