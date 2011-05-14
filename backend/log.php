<?php

function connectToMysqli() {
	$host = 'localhost';
	$username = 'xxx';
	$password = 'xxx';
	$database = 'xxx';
	
	$mysqli = new mysqli($host,$username,$password,$database);
	if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		return false;
	}
	return $mysqli;
}

function quicklog_to_sql($message) {
	$logtable = 'logs';
	$username="";
	if (isset($_SESSION['username']))
		$username=$_SESSION['username'];
	
	/* skip geolocation IP request (for quick logging) */
	$country = "[ QuickLog ]";
	
	/* mysqli connect request */
	$mysqli = connectToMysqli() or
		die("Could not connect to database: ".(int)$mysqli->connect_errno." - ".$mysqli->connect_error);
	
	/* prepare the statement */
	$query = "INSERT INTO $logtable SET IP=?, XForwardedFor=?, XRequestedWith=?, Username=?, Message=?, UserAgent=?, Country=?";
	$statement = $mysqli->prepare($query) or
		die("Could not prepare statement ".$mysqli->error);	
	
	
	/* set parameters for the prepared statement */
	$ip = $_SERVER['REMOTE_ADDR'];
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$xforwardedfor = @getenv("HTTP_X_FORWARDED_FOR");
	$xrequestedwith = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : "";
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	// $country is already set above
	
	/* bind the parameters to the statement */
	$statement->bind_param("sssssss", $ip, $xforwardedfor, $xrequestedwith, $username, $message, $useragent,$country) or
		die("Could not bind parameters");
	
	/* execute query */
	$statement->execute() or
		die("Could not execute query");
	
	/* close statement and mysqli connection */
	$statement->close();
	$mysqli->close();
	
	return true;
}
function log_to_sql($message) {
	$logtable = 'logs';
	$username="";
	if (isset($_SESSION['username']))
		$username=$_SESSION['username'];
	
	/* make a geolocation IP request (for basic country lookup) */
	function_exists('curl_init') or
		die('cURL is not installed!');
	$ch = curl_init("http://www.ipaddresslocation.org/ip-address-locator.php");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "ip=".$_SERVER['REMOTE_ADDR']);
	$response=curl_exec($ch);
	curl_close($ch);
	$country="[ Could not Detect ]";
	if ($response) {
		$countrypos = strpos($response,"<i>IP Country:</i> <b>")+strlen("<i>IP Country:</i> <b>");
		$country = substr($response,$countrypos,strpos($response,"</b>",$countrypos)-$countrypos);
	}
	if ($country=="")
		$country = "[ Could not Detect ]";
	
	/* mysqli connect request */
	$mysqli = connectToMysqli() or
		die("Could not connect to database: ".(int)$mysqli->connect_errno." - ".$mysqli->connect_error);
	
	/* prepare the statement */
	$query = "INSERT INTO $logtable SET IP=?, XForwardedFor=?, XRequestedWith=?, Username=?, Message=?, UserAgent=?, Country=?";
	$statement = $mysqli->prepare($query) or
		die("Could not prepare statement ".$mysqli->error);	
	
	
	/* set parameters for the prepared statement */
	$ip = $_SERVER['REMOTE_ADDR'];
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$xforwardedfor = @getenv("HTTP_X_FORWARDED_FOR");
	$xrequestedwith = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : "";
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	// $country is already set above
	
	/* bind the parameters to the statement */
	$statement->bind_param("sssssss", $ip, $xforwardedfor, $xrequestedwith, $username, $message, $useragent,$country) or
		die("Could not bind parameters");
	
	/* execute query */
	$statement->execute() or
		die("Could not execute query");
	
	/* close statement and mysqli connection */
	$statement->close();
	$mysqli->close();
	
	return true;
}

?>