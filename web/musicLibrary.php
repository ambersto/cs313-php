<!DOCTYPE html>
<html>
<head>
	<title>FTH Music Library</title>
</head>
<body>
<h1>FTH Music Library</h1>
<h2>This is the an electronic compilation of the music for From the Heart choir. Below is a list of all songs.</h2>

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

$query = "SELECT s.title, c.firstName, c.lastName FROM song s INNER JOIN composer c ON s.composerID = c.id";

foreach ($db->query($query) as $row) {
	echo '<span style="font-weight: bold;">';
	echo $row['title'] . '</span><span style="font-style: italic;"> by ' . $row['firstname'] . ' ';
	echo $row['lastname'] . '</span><br/><br/>';
}

?>

</body>
</html>