<!DOCTYPE html>
<html>
<head>
	<title>Song Details</title>
</head>
<body>

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

$row = $db->query("SELECT * FROM song WHERE id = ".$_GET['id']);
$composer = $db->query('SELECT firstName, lastName FROM composer WHERE id = '.$row['composerid']);
$type = $db->query('SELECT name FROM type WHERE id = '.$row['typeid']);
/*
echo '<h2>' . $row['title'] . '</h2>
<h3>' . $composer['firstname'] . ' ' . $composer['lastname'] . '</h3>
<ul>
<li>Type: ' . $type['name'] . '</li>
<li>Voice Parts: ';
if ($row[issoprano]){
	echo 'S'
}
if ($row[isalto]){
	echo 'A'
}
if ($row[istenor]){
	echo 'T'
}
if ($row[isbass]){
	echo 'B'
}
echo '</li></ul>';/*
?>

</body>
</html>