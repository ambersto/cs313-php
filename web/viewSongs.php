<!DOCTYPE html>
<html>
<head>
	<title>Songs</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<h1>Song List</h1>
<a href="musicLibrary.php"><div id="button">Home</div></a>
<a href="viewSongs.php"><div id="button">View Songs</div></a>
<a href="viewPerformances.php"><div id="button">View Performances</div></a>
<a href="searchMusic.php"><div id="button">Search Music</div></a>
<a href="enterSong.php"><div id="button" class="last">Add Songs</div></a>
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

$stmt = $db->prepare('SELECT s.id, s.title, c.firstName, c.lastName FROM song s INNER JOIN composer c ON s.composerID = c.id WHERE id=:id AND title=:title AND firstName=:firstname AND lastName=:lastname');
$stmt->execute(array(':name' => $name, ':id' => $id));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<ul style="position: relative; margin-left:250px; list-style-type:none;">';

foreach ($rows as $row) {
	echo '<a href="songDetails.php?id=' . $row['id'] . '">';
	echo '<li><span style="font-weight: bold;">';
	echo $row['title'] . '</span></a><span style="font-style: italic;"> by ' . $row['firstname'] . ' ';
	echo $row['lastname'] . '</span></li>';
}

echo '</ul>';

/*$query = "SELECT s.id, s.title, c.firstName, c.lastName FROM song s INNER JOIN composer c ON s.composerID = c.id";
echo '<ul style="position: relative; margin-left:250px; list-style-type:none;">';

foreach ($db->query($query) as $row) {
	echo '<a href="songDetails.php?id=' . $row['id'] . '">';
	echo '<li><span style="font-weight: bold;">';
	echo $row['title'] . '</span></a><span style="font-style: italic;"> by ' . $row['firstname'] . ' ';
	echo $row['lastname'] . '</span></li>';
}

echo '</ul>';*/

?>

</body>
</html>