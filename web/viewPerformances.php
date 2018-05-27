<!DOCTYPE html>
<html>
<head>
	<title>View Performances</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<h1>Performance List</h1>
<a href="musicLibrary.php"><div id="button">Home</div></a>
<a href="viewSongs.php"><div id="button">View Songs</div></a>
<a href="viewPerformances.php"><div id="button">View Performances</div></a>
<div id="button">Search Music</div>
<div id="button" class="last">Add Songs</div>
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

$query = "SELECT p.semester, p.year, s.id, s.title, c.firstName, c.lastName FROM performance p INNER JOIN performanceList pl ON p.id = pl.performanceID INNER JOIN song s ON pl.songID = s.id INNER JOIN composer c ON s.composerID = c.id";
echo '<ul style="position: relative; margin-left:250px; list-style-type:none;">';

foreach ($db->query($query) as $row) {
	echo '<li>' . $row['semester'] . ' ' . $row['year'] . ' Performance:</li>'
	echo '<a href="songDetails.php?id=' . $row['id'] . '">';
	echo '<li><span style="font-weight: bold;">';
	echo $row['title'] . '</span></a><span style="font-style: italic;"> by ' . $row['firstname'] . ' ';
	echo $row['lastname'] . '</span></li>';
}

echo '</ul>';

?>

</body>
</html>