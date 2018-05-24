<!DOCTYPE html>
<html>
<head>
	<title>FTH Music Library</title>
</head>
<body>
<h1>FTH Music Library</h1>
<h2>This is the an electronic compilation of the music for From the Heart Choir. Below is a list of all songs.</h2>

<?php
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($db->query('SELECT title, composerID, typeID, isSoprano, isAlto, isTenor, isBass FROM song') as $row) {
	
	echo 'Title: ' . $row['title'] . '<br/>';
	echo 'Composer: ' . $row['composerid'] . '<br/>';
	echo 'Type: ' . $row['typeid'] . '<br/><br/>';

	$composer;
	$type = "";
	
	foreach ($db->query('SELECT id, firstName, lastName FROM composer') as $composerRow) {
		if($composerRow['id'] == $row['composerid']) {
			//echo $composerRow['lastname'];
			$composer = $composerRow['firstname'].' '.$composerRow['lastname'];
		}
	}
	
	foreach($db->query('SELECT id, name FROM type') as $typeRow){
		if($typeRow['id'] == $row['typeid']) {
			$type = $typeRow['name'];
		}
	}

	echo '<span style="font-weight: bold;">';
	echo $row['title'] . '</span> by ' . $composer;
	echo '<br/>Type: ' . $type . '<br/><br/>';
}

?>

</body>
</html>