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
<a href="searchMusic.php"><div id="button">Search Music</div></a>
<div id="button" class="last">Add Songs</div>
<h2>This is the an electronic compilation of the music for From the Heart choir. Search for specific songs below.</h2>

<form method="post" action="searchMusic.php">
<br/>
<h3>Type the name of a song: 
<input type="text" name="songSearch"><button type="submit">Go</button></h3>
</form>

<?php

if(isset($_POST['songSearch'])) {

	$dbUrl = getenv('DATABASE_URL');

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$songTitle = $_POST['songSearch'];
	$query = "SELECT s.id, s.title, c.firstName, c.lastName FROM song s INNER JOIN composer c ON s.composerID = c.id WHERE s.title = '$songTitle'";
	echo '<ul style="position: relative; margin-left:250px; list-style-type:none;">';

	foreach ($db->query($query) as $row) {
		echo '<a href="songDetails.php?id=' . $row['id'] . '">';
		echo '<li><span style="font-weight: bold;">';
		echo $row['title'] . '</span></a><span style="font-style: italic;"> by ' . $row['firstname'] . ' ';
		echo $row['lastname'] . '</span></li>';
	}

	echo '</ul>';
}

?>

</body>
</html>
