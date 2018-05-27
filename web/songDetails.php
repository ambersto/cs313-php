<!DOCTYPE html>
<html>
<head>
	<title>Song Details</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<h1>Song Details</h1>
<a href="musicLibrary.php"><div id="button">Home</div></a>
<a href="viewSongs.php"><div id="button">View Songs</div></a>
<a href="viewPerformances.php"><div id="button">View Performances</div></a>
<a href="searchMusic.php"><div id="button">Search Music</div></a>
<div id="button" class="last">Add Songs</div>
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

$id = $_GET['id'];
$query = ("SELECT s.title, c.firstName, c.lastName, t.name, s.isSoprano, s.isAlto, s.isTenor, s.isBass FROM song s INNER JOIN composer c ON s.composerID=c.id INNER JOIN type t ON s.typeID=t.id WHERE s.id=$id");

foreach ($db->query($query) as $row) {
	echo '<h2>' . $row['title'] . '</h2>
	<h3>By ' . $row['firstname'] . ' ' . $row['lastname'] . '</h3>
	<ul style="margin-left:250px; list-style-type:none;"><li>Type: ' . $row['name'] . '</li><li>Voice part(s): ';
	if($row['issoprano']) {
		echo 'S';
	}
	if($row['isalto']) {
		echo 'A';
	}
	if($row['istenor']) {
		echo 'T';
	}
	if($row['isbass']) {
		echo 'B';
	}
	echo '</li></ul>';
}

?>

</body>
</html>