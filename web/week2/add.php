<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
</head>
<body>

<?php
	echo "<h1>Hello " . $_POST["username"] . "</h1>";
	echo "<h1>Your choice is: " . $_POST["item"] . "</h1>";
	//foreach ($_POST["berry"]) {
		echo "<h1>Your berry is: " . $_POST["berry"] . "</h1>";
	//}
//header("Location: {$_SERVER['HTTP_REFERER']}");
?>

</body>
</html>

