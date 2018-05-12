<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
</head>
<body>
<h1>Confirmation</h1>
<h2>Your purchase has been completed!</h2>

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

</body>
</html>