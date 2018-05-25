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
$query = ("SELECT * FROM song WHERE id=$id");

foreach ($db->query($query) as $row) {
	echo 'Title is: ' . $row['title'] . '<br/>';
}

$querytwo = ("SELECT s.title, c.firstName, c.lastName, t.name, s.isSoprano, s.isAlto, s.isTenor, s.isBass FROM song s WHERE id=$id INNER JOIN composer c ON s.composerID=c.id INNER JOIN type t ON s.typeID=t.id");

foreach ($db->query($querytwo) as $row) {
	echo 'Title Two is: ' . $row['title'] . '<br/>';
}

?>

</body>
</html>