<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Submitted!</h1>

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

/*$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];
$topicID = $_POST['id'];*/

$book = 'Test';
$chapter = 1;
$verse = 11;
$content = 'Here is test content';

$stmt = $pdo->prepare('INSERT INTO scriptures (book,chapter,verse,content) VALUES (:book,:chapter,:verse,:content)');
$stmt->bindValue(':book', $book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();

$scriptureID = $pdo->lastInsertId('scripture_id_seq');

foreach ($_POST['topics'] as $topicID) {
	$stmt = $pdo->prepare('INSERT INTO scriptureTopics (scriptureID, topicID) VALUES (:topicID, :scriptureID)');
	$stmt->bindValue(':topicID', $topicID, PDO::PARAM_INT);
	$stmt->bindValue(':scriptureID', $scriptureID, PDO::PARAM_INT);
	$stmt->execute();	
}

?>
</body>
</html>