<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
</head>
<body>
<h1>Search Results</h1>
<?php

	foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row) {
		if($row['book'] == $_POST["bookQuery"])
		{
			echo '<span style="font-weight: bold;">';
			echo $row['book'] . ' ' . $row['chapter'] . ':';
			echo $row['verse'] . '</span>' . ' - "' . $row['content'] . '"';
			echo '<br/>';
		}
	}

?>
</body>
</html>
