<!DOCTYPE html>
<html>
<head>
    <title>Testing Update</title>
</head>
<body>
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
    $titleStmt->bindValue(':title', $newTitle, PDO::PARAM_STR);
    $titleStmt->bindValue(':id', $id, PDO::PARAM_INT);
    $titleStmt->execute();
}

var_dump($_POST);
var_dump($composerFirstName);
var_dump($composerLastName);
// Update composer
$newFirstName = $_POST['composerFirstName'];
$newLastName = $_POST['composerLastName'];
if(isset($newLastName) && ($newLastName!=$composerLastName || $newFirstName!=$composerFirstName)) {

    // Check if composer is in database
    $composerQuery = "SELECT * FROM composer";
    foreach ($db->query($composerQuery) as $row) {
        if($row['firstname']==$newFirstName && $row['lastname']==$newLastName) {
            $composerID = $row['id'];
        }
    }

    // Insert composer into database if not already there
    if(!isset($composerID)) {
        $composerStmt = $db->prepare('INSERT INTO composer (firstName, lastName) VALUES (:firstName, :lastName)');
        $composerStmt->bindValue(':firstName', $newFirstName, PDO::PARAM_STR);
        $composerStmt->bindValue(':lastName', $newLastName, PDO::PARAM_STR);
        $composerStmt->execute();
        $composerID = $db->lastInsertId('composer_id_seq');
    }

    var_dump($composerID);

    $composerIDStmt = $db->prepare('UPDATE song SET composerID=:composerID WHERE id=:id');
    $composerIDStmt->bindValue(':composerID', $composerID, PDO::PARAM_INT);
    $composerIDStmt->bindValue(':id', $id, PDO::PARAM_INT);
    $composerIDStmt->execute();
}

// Update song type
$newType = $_POST['songType'];
if(isset($newType) && $newType!=$songType) {
    $typeStmt = $db->prepare('UPDATE song SET typeID=(SELECT id FROM type WHERE name=:type) WHERE id=:id');
    $typeStmt->bindValue(':type', $newType, PDO::PARAM_STR);
    $typeStmt->bindValue(':id', $id, PDO::PARAM_INT);
    $typeStmt->execute();
}

// Update voice parts
$newSoprano = $_POST['isSoprano'];
$newAlto = $_POST['isAlto'];
$newTenor = $_POST['isTenor'];
$newBass = $_POST['isBass'];
if((isset($newSoprano) || isset($newAlto) || isset($newTenor) || isset($newBass)) && 
    ($newSoprano!=$isSoprano || $newAlto!=$isAlto || $newTenor!=$isTenor || $newBass!=$isBass)) {
    if (!isset($newSoprano)) {
        $newSoprano = false;
    }
    if (!isset($newAlto)) {
        $newAlto = false;
    }
    if (!isset($newTenor)) {
        $newTenor = false;
    }
    if (!isset($newBass)) {
        $newBass = false;
    }

    $partStmt = $db->prepare('UPDATE song SET isSoprano=:isSoprano, isAlto=:isAlto, isTenor=:isTenor, isBass=:isBass WHERE id=:id');
    $partStmt->bindValue(':id', $id, PDO::PARAM_INT);
    $partStmt->bindValue(':isSoprano', $newSoprano, PDO::PARAM_BOOL);
    $partStmt->bindValue(':isAlto', $newAlto, PDO::PARAM_BOOL);
    $partStmt->bindValue(':isTenor', $newTenor, PDO::PARAM_BOOL);
    $partStmt->bindValue(':isBass', $newBass, PDO::PARAM_BOOL);
    $partStmt->execute();
}


header("Location: songDetails.php?id=$id"); 
exit;

?>
</body>
</html>