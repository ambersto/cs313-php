<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
</head>
<body>

<?php
	echo "<h1>Hello " . $_POST["username"] . "</h1>";
	echo "<h1>Your choice is: " . $_POST["item"] . "</h1>";
	foreach ($_POST["berry"] as $selected) {
		echo "<h1>* " . $selected . "</h1>";
	}
//header("Location: {$_SERVER['HTTP_REFERER']}");
?>

</body>
</html>

