<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Scripture List</h1>

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

$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];

$stmt = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
$stmt->bindValue(':book', $book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();

$scriptureID = $db->lastInsertId('scriptures_id_seq');
//var_dump($_POST);

foreach ($_POST['topics'] as $topicID) {
	$stmt = $db->prepare('INSERT INTO scriptureTopics (scriptureID, topicID) VALUES (:scriptureID, :topicID)');
	$stmt->bindValue(':scriptureID', $scriptureID, PDO::PARAM_INT);
	$stmt->bindValue(':topicID', $topicID, PDO::PARAM_INT);
	$stmt->execute();
}

$query = 'SELECT * FROM scriptures';

foreach ($db->query($query) as $row) {
	echo '<h2>'.$row['book'].' '.$row['chapter'].':'.$row['verse'].'</h2><h3>'.$row['content'].'</h3>';

	$newquery = 'SELECT t.name FROM topics INNER JOIN scriptureTopics st ON t.id=st.topicID INNER JOIN scriptures s ON st.scriptureID=$scriptureID';
	foreach ($db->query($newquery) as $topicRow) {
		echo '<h3>'.$topicRow['name'].'</h3>';
	}
	echo '<br/>';
}

?>
</body>
</html>