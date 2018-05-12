<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
</head>
<body>

<?php
	echo "<h1>Your ordered:</h1>";
	foreach ($_POST["item"] as $selected) {
		echo "<h1>* " . $selected . "</h1>";
	}
//header("Location: {$_SERVER['HTTP_REFERER']}");
?>

</body>
</html>

