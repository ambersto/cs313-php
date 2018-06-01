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

// Update song title
$newTitle = $_POST['songTitle'];
if(isset($newTitle) && $newTitle!=$songTitle) {
    $titleStmt = $db->prepare('UPDATE song SET title=:title WHERE id=:id');
    $titleStmt->bindValue(':title', $newTitle, PDO::PARAM_INT);
    $titleStmt->bindValue(':id', $id, PDO::PARAM_INT);
    $titleStmt->execute();
}


header("Location: songDetails.php?id=$id"); 
exit;

?>