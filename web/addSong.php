<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<h1>Confirmation</h1>
<a href="musicLibrary.php"><div id="button">Home</div></a>
<a href="viewSongs.php"><div id="button">View Songs</div></a>
<a href="viewPerformances.php"><div id="button">View Performances</div></a>
<a href="searchMusic.php"><div id="button">Search Music</div></a>
<a href="enterSong.php"><div id="button" class="last">Add Songs</div></a>

<h2>This page is a work in progress. The functionality to add your song has not yet been implemented. Below is the information you entered.</h2>
<br><br>

<?php
// Connect with database
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
$songTitle = test_input($_POST["songTitle"]);
$composerFirstName = test_input($_POST["composerFirstName"]);
$composerLastName = test_input($_POST["composerLastName"]);
$songType = $_POST["songType"];
$isSoprano;
$isAlto;
$isTenor;
$isBass;
$composerID;

// Display song information
echo "<h3>$songTitle<br>
	By $composerFirstName $composerLastName<br>
	Type: $songType<br>
	Voice part(s): ";

if (isset($_POST['isSoprano'])) {
	$isSoprano = true;
	echo "S";
}
else {
	$isSoprano = false;
}
if (isset($_POST['isAlto'])) {
	$isAlto = true;
	echo "A";
}
else {
	$isAlto = false;
}
if (isset($_POST['isTenor'])) {
	$isTenor = true;
	echo "T";
}
else {
	$isTenor = false;
}
if (isset($_POST['isBass'])) {
	$isBass = true;
	echo "B";
}
else {
	$isBass = false;
}

echo "</h3>";

// Filter input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


var_dump($_POST);

// Insert info into database
$composerQuery = "SELECT * FROM composer";

foreach ($db->query($composerQuery) as $row) {
	if($row['firstname']==$composerFirstName && $row['lastname']==$composerLastName) {
		$composerID = $row['id'];
	}
}

if(!isset($composerID)) {
	$stmt = $db->prepare('INSERT INTO composer (firstName,lastName) VALUES (:firstName, :lastName)');
	$stmt->bindValue(':firstName', $composerFirstName, PDO::PARAM_STR);
	$stmt->bindValue(':lastName', $composerLastName, PDO::PARAM_STR);
	$stmt->execute();
	$composerID = $db->lastInsertId('composer_id_seq');
}

$stmt = $db->prepare('INSERT INTO song (title, composerID, typeID, isSoprano, isAlto, isTenor, isBass) VALUES (:title, :composerID, (SELECT id FROM type WHERE name=:type), :isSoprano, :isAlto, :isTenor, :isBass)');
$stmt->bindValue(':title', $songTitle, PDO::PARAM_STR);
$stmt->bindValue(':composerID', $composerID, PDO::PARAM_INT);
$stmt->bindValue(':type', $songType, PDO::PARAM_STR);
$stmt->bindValue(':isSoprano', $isSoprano, PDO::PARAM_BOOL);
$stmt->bindValue(':isAlto', $isAlto, PDO::PARAM_BOOL);
$stmt->bindValue(':isTenor', $isTenor, PDO::PARAM_BOOL);
$stmt->bindValue(':isBass', $isBass, PDO::PARAM_BOOL);
$stmt->execute();

?>

</body>
</html>