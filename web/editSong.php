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
// Connect to database
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Initialize variables
$id = $_POST['id'];
$editing = $_POST['editing'];
$songTitle;
$composerFirstName;
$composerLastName;
$songType;
$isSoprano;
$isAlto;
$isTenor;
$isBass;
$composerID;

$stmt = $db->prepare('SELECT s.title, c.firstName, c.lastName, t.name, s.isSoprano, s.isAlto, s.isTenor, s.isBass FROM song s INNER JOIN composer c ON s.composerID=c.id INNER JOIN type t ON s.typeID=t.id WHERE s.id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
	$songTitle = $row['title'];
	$composerFirstName = $row['firstName'];
	$composerLastName = $row['lastName'];
	$songType = $row['name'];
	$isSoprano = $row['isSoprano'];
	$isAlto = $row['isAlto'];
	$isTenor = $row['isTenor'];
	$isBass = $row['isBass'];
}

echo '<form method="post" action="songDetails.php?id='. $id .'">';
switch ($editing) {
    case "title":
        echo "<h2>Editing song title.</h2><br>";
        echo '<h3>Title of song: 
        	<input type="text" name="songTitle" value="'. $songTitle .'"></h3>';
        break;
    case "composer":
        echo "<h2>Editing composer's name.</h2>";
        echo '<h3>Composer\'s first name: 
        	<input type="text" name="composerFirstName" value="'. $composerFirstName .'"></h3>';        
        echo '<h3>Composer\'s last name: 
        	<input type="text" name="composerLastName" value="'. $composerLastName .'"></h3>';
        break;
    case "type":
        echo "<h2>Editing song type.</h2>";
        break;
    case "parts":
        echo "<h2>Editing voice parts.</h2>";
        break;
    default:
        echo "<h2>No part was selected to edit.</h2>";
}

echo '<h3><button type="submit">Submit</button></h3>
	</form>';
?>

</body>
</html>