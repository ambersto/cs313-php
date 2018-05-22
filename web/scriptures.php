<!DOCTYPE html>
<html>
<head>
	<title>Scripture Resources</title>
</head>
<body>
<h1>Scripture Resources</h1>

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

foreach ($db->query('SELECT book FROM scriptures') as $row) {
	echo 'Book: ' . $row['book'];
}

?>

</body>
</html>