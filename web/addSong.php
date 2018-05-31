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

$songTitle = test_input($_POST["songTitle"]);
$composerFirstName = test_input($_POST["composerFirstName"]);
$composerLastName = test_input($_POST["composerLastName"]);
$songType = $_POST["songType"];
$isSoprano;
$isAlto;
$isTenor;
$isBass;

echo "<h3>$songTitle<br>
	By $composerFirstName $composerLastName<br>
	Type: $songType<br>
	Voice part(s): ";

if (isset($_POST['isSoprano'])) {
	$isSoprano = true;
	echo "S";
}
if (isset($_POST['isAlto'])) {
	$isAlto = true;
	echo "A";
}
if (isset($_POST['isTenor'])) {
	$isTenor = true;
	echo "T";
}
if (isset($_POST['isBass'])) {
	$isBass = true;
	echo "B";
}

echo "</h3>";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>