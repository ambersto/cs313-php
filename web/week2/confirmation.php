<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>Confirmation</h1>
<div>
<h2>Your purchase is complete!</h2>
<?php
session_start();

echo "<p>Items ordered:<br><br>";
foreach ($_SESSION as $fruit => $quantity) {
	echo "You ordered "  . $quantity . " " . $fruit . "(s).<br>";
}

echo "<p>Shipping address:<br><br>	";
echo $_POST["username"] . "<br>" . $_POST["street"] . "<br>";
echo $_POST["city"] . ", " . $_POST["state"] . " " . $_POST["zip"];
?>
</p>
<h2>Thank you for shopping with Phil's Corner Market!</h2>
</div>
</body>
</html>