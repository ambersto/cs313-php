<!DOCTYPE html>
<html>
<head>
	<title>Song Details</title>
</head>
<body>
<h1>Song Details</h1>
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
	<ul><li>' . $row['name'] . '</li><li>';
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