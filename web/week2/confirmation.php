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
echo test_input($_POST["username"]) . "<br>" . test_input($_POST["street"]) . "<br>";
echo test_input($_POST["city"]) . ", " . test_input($_POST["state"]) . " " . test_input($_POST["zip"]);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</p>
<h2>Thank you for shopping with Phil's Corner Market!</h2>
</div>
</body>
</html>