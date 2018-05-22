<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
</head>
<body>
<h1>Search Results</h1>
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

foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row) {

	if($row['book'] == $_POST["bookQuery"])
	{
		echo '<span style="font-weight: bold;">';
		echo $row['book'] . ' ' . $row['chapter'] . ':';
		echo $row['verse'] . '</span>' . ' - "' . $row['content'] . '"';
		echo '<br/>';
	}
}
?>
</body>
</html>
