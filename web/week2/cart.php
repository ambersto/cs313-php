<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>Your Cart</h1>
<div>
<h2>Please review the items in your cart.</h2>
<?php

session_start();

foreach ($_SESSION as $fruit => $quantity) {
	echo "<h3>You ordered "  . $quantity . " " . $fruit . "(s). ";
	echo "<form method=\"post\" action=\"remove.php\"><input type=\"hidden\" name=\"item\" value=\"" . $fruit . "\"><button type=\"submit\">Remove from Cart</button></form></h3>";
}

?>

<br><br>
<form action="browse.php"><button type="submit">Continue Shopping</button></form>
<br>
<form action="checkout.php"><button type="submit">Checkout</button></form>
</div>
</body>
</html>
