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
<input type="text" name="songTitle"></h3>
<h3>Composer's first name: 
<input type="text" name="composerFirstName"></h3>
<h3>Composer's last name: 
<input type="text" name="composerLastName"></h3>
<h3>Type of song (i.e. Choral, Solo, Duet, Group): 
<input type="text" name="songType"></h3>
<h3>Voice parts (i.e. SATB, SA, SAT, TB, etc.):
<input type="text" name="voiceParts"></h3>
<h3><button type="submit">Add Song</button></h3>
</form>
</div>

</body>
</html>