<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );

require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/Entities/SignedRequest.php' );

require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookSignedRequestFromInputHelper.php' ); 
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookOtherException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );

// canvas och tab apps
require_once( 'Facebook/FacebookCanvasLoginHelper.php' );
require_once( 'Facebook/FacebookPageTabHelper.php' );

require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphSessionInfo.php' );

use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;

use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSignedRequestFromInputHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;





//canvas och tab apps
use Facebook\FacebookCanvasLoginHelper;
use Facebook\FacebookPageTabHelper;

FacebookSession::setDefaultApplication(
'911655132241780',
'9a0ad84276d3067de96b99c1d7c94149');
$pageHelper = new FacebookRedirectLoginHelper(
'http://localhost/nacka_insta/nacka_forum/fblogin.php' );

$session = $pageHelper->getSessionFromRedirect();

if(isset($session)){

	include 'connect.php';

	//Graph api call för att få user data
	$request = new FacebookRequest($session,'GET','/me');
	$response = $request->execute();

	//Hantera svaret
	$graphObject = $response->getGraphObject()->asArray();
	$_SESSION['graphobject'] = $graphObject;

	//Skriv ut användarobjektet
	// echo '<pre>' . print_r($graphObject,1) . '</pre>';


	$current_user = $graphObject['id'];
	

	//Databasförfrågningar

	$query = "SELECT * FROM users WHERE fb_id = '$current_user'";

	$result = $db->query($query);

	if (!$result) {
		die($db->error);
	}

	echo "num_rows = ".$result->num_rows."<br />";

	if ($result->num_rows > 0) {
		echo "do nuthin";
	} else {
		echo "insert that mutherfucker";
		$stmt = $db->prepare("INSERT INTO users(fb_id) VALUES (?)");
		$stmt->bind_param('s', $current_user);
		$stmt->execute(); 
		$stmt->close();
	}

	


	header('Location: http://localhost/nacka_insta/nacka_forum/index.php');



} else {

	//Login url [installera app]
	$helper = new FacebookRedirectLoginHelper(
		'http://localhost/nacka_insta/nacka_forum/fblogin.php');
	echo '<a href="'. $helper->getLoginUrl(array('email','user_friends')) . '" target="_top">Login</a>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="fb-root"></div>
</body>
</html>