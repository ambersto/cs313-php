<!DOCTYPE html>
<html>
<head>
	<title>Performances</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<h1>Performance List</h1>
<a href="musicLibrary.php"><div id="button">Home</div></a>
<a href="viewSongs.php"><div id="button">View Songs</div></a>
<a href="viewPerformances.php"><div id="button">View Performances</div></a>
<a href="searchMusic.php"><div id="button">Search Music</div></a>
<a href="enterSong.php"><div id="button" class="last">Add Songs</div></a>
<h2>This is the an electronic compilation of the music for From the Heart choir. Below is a list of performances and the songs that were sung at each one.</h2>

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

$query = "SELECT id, year, semester FROM performance";
echo '<ul style="position: relative; margin-left:250px; list-style-type:none;">';

foreach ($db->query($query) as $row) {
	// Display semester and year of performance
	echo '<li><span style="font-weight: bold;">' . $row['semester'] . ' ' . $row['year'] . ' Performance:</li></span>';
	$performanceID = $row['id'];

	// Display list of songs sung during performance
	foreach ($db->query("SELECT s.id, s.title, c.firstName, c.lastName FROM performanceList pl INNER JOIN song s ON pl.songID = s.id INNER JOIN composer c ON s.composerID = c.id WHERE pl.performanceID = $performanceID") as $songRow) {
		echo '<a href="songDetails.php?id=' . $songRow['id'] . '">';
		echo '<li><span style="font-weight: bold;">';
		echo $songRow['title'] . '</span></a><span style="font-style: italic;"> by ' . $songRow['firstname'] . ' ';
		echo $songRow['lastname'] . '</span></li>';
	}
	echo '<br/>';
}

echo '</ul>';

?>

</body>
</html>