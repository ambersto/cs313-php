<!DOCTYPE html>
<html>
<head>
	<title>Add Song</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<h1>Add Song</h1>
<a href="musicLibrary.php"><div id="button">Home</div></a>
<a href="viewSongs.php"><div id="button">View Songs</div></a>
<a href="viewPerformances.php"><div id="button">View Performances</div></a>
<a href="searchMusic.php"><div id="button">Search Music</div></a>
<a href="enterSong.php"><div id="button" class="last">Add Songs</div></a>

<div>
<h2>Please enter the information for the song you would like to add.</h2>
<br><br>

<form method="post" action="addSong.php">

<h3>Title of song: 
<input type="text" name="songTitle"></h3><br>

<h3>Composer's first name: 
<input type="text" name="composerFirstName"></h3><br>

<h3>Composer's last name: 
<input type="text" name="composerLastName"></h3><br>

<h3>Type of song:<br>
<input type="radio" name="songType" value="Choral"> Choral<br>
<input type="radio" name="songType" value="Solo"> Solo<br>
<input type="radio" name="songType" value="Duet"> Duet<br>
<input type="radio" name="songType" value="Group"> Group</h3><br>

<h3>Voice parts:<br>
<input type="checkbox" name="isSoprano"> Soprano<br>
<input type="checkbox" name="isAlto"> Alto<br>
<input type="checkbox" name="isTenor"> Tenor<br>
<input type="checkbox" name="isBass"> Bass</h3><br>

<h3><button type="submit">Add Song</button></h3>
</form>

</div>
</body>
</html>