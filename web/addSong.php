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

<?php

echo "<h3>" . test_input($_POST["songTitle"]) . 
"<br>" . test_input($_POST["composerFirstName"]) . " " . test_input($_POST["composerLastName"]) . 
"<br>Type: " . test_input($_POST["songType"]) . 
"<br>Voice part(s): " . test_input($_POST["voiceParts"]) . "</h3>";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>