<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" action="addScripture.php">
<h3>Book: 
<input type="text" name="book"></h3>
<h3>Chapter: 
<input type="text" name="chapter"></h3>
<h3>Verse: 
<input type="text" name="verse"></h3>
<h3>Content: 
<textarea name="songType"></textarea></h3>
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

$query = "SELECT * FROM topics";

foreach ($db->query($query) as $row) {
	$name = $row['book'];
	$id = $row['id'];
	echo '<h3><input type="checkbox" name="'.$name.'" value="'.$id.'">'.$name.'</h3><br/>';
}
?>
<button type="submit">Add Scripture</button>
</form>

</body>
</html>