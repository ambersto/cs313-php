<!DOCTYPE html>
<html>
<head>
	<title>Edit Song</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<h1>Edit Song</h1>
<a href="musicLibrary.php"><div id="button">Home</div></a>
<a href="viewSongs.php"><div id="button">View Songs</div></a>
<a href="viewPerformances.php"><div id="button">View Performances</div></a>
<a href="searchMusic.php"><div id="button">Search Music</div></a>
<a href="enterSong.php"><div id="button" class="last">Add Songs</div></a>
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

$id = $_POST['id'];
$editing = $_POST['editing'];

echo '<h2>';
switch ($editing) {
    case "title":
        echo "Editing song title.</h2>";
        break;
    case "composer":
        echo "Editing composer's name.</h2>";
        break;
    case "type":
        echo "Editing song type.</h2>";
        break;
    case "parts":
        echo "Editing voice parts.</h2>";
        break;
    default:
        echo "No part was selected to edit.</h2>";
}
?>

</body>
</html>