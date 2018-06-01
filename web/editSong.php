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

// Retrieve song info from database
$stmt = $db->prepare('SELECT s.title, c.firstName, c.lastName, t.name, s.isSoprano, s.isAlto, s.isTenor, s.isBass FROM song s INNER JOIN composer c ON s.composerID=c.id INNER JOIN type t ON s.typeID=t.id WHERE s.id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
	$songTitle = $row['title'];
	$composerFirstName = $row['firstname'];
	$composerLastName = $row['lastname'];
	$songType = $row['name'];
	$isSoprano = $row['issoprano'];
	$isAlto = $row['isalto'];
	$isTenor = $row['istenor'];
	$isBass = $row['isbass'];
}

// Display appropriate forms depending on what the user wants to edit
echo '<form method="post" action="updateDB.php">';
switch ($editing) {
    case "title":
        echo "<h2>Editing song title.</h2><br>";
        echo '<h3>Title of song: 
        	<input type="text" name="songTitle" value="'. $songTitle .'"></h3>';
        break;
    case "composer":
        echo "<h2>Editing composer's name.</h2><br>";
        echo '<h3>Composer\'s first name: 
        	<input type="text" name="composerFirstName" value="'. $composerFirstName .'"></h3>';
        echo '<h3>Composer\'s last name: 
        	<input type="text" name="composerLastName" value="'. $composerLastName .'"></h3>';
        break;
    case "type":
        echo "<h2>Editing song type.</h2><br>";
        echo '<h3>Type of song:<br>
			<input type="radio" name="songType" value="Choral"> Choral<br>
			<input type="radio" name="songType" value="Solo"> Solo<br>
			<input type="radio" name="songType" value="Duet"> Duet<br>
			<input type="radio" name="songType" value="Group"> Group</h3>';
        break;
    case "parts":
        echo "<h2>Editing voice parts.</h2><br>";
        echo '<h3>Voice parts:<br>
			<input type="checkbox" name="isSoprano"> Soprano<br>
			<input type="checkbox" name="isAlto"> Alto<br>
			<input type="checkbox" name="isTenor"> Tenor<br>
			<input type="checkbox" name="isBass"> Bass</h3>';
        break;
    default:
        echo "<h2>No part was selected to edit.</h2>";
}

echo '<br><h3><button type="submit" name="editing" value="'. $editing .'">Submit</button></h3>
	</form>';
?>

</body>
</html>