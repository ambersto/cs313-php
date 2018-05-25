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

echo '<h2>ID is: ' . $_GET['id'];

$query = ("SELECT * FROM song");

foreach ($db->query($query) as $row) {
	echo 'Title is: ' . $row['title'];
}


?>

</body>
</html>