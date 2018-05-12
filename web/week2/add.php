<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
</head>
<body>

<?php
	echo "<h1>Hello " . $_POST["username"] . "</h1>";
?>

<?php 
echo "<h2>Your choice is: " . $_POST["name"] . "</h2>";
//header("Location: {$_SERVER['HTTP_REFERER']}");
?>

</body>
</html>

