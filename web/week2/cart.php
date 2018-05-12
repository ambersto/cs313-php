<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

session_start();

foreach ($_SESSION as $fruit => $quantity) {
	echo "<h2>You ordered "  . $quantity . " " . $fruit . "(s).</h2><br>";
}

?>

<br><br>
<form action="browse.php"><button type="submit">Continue Shopping</button></form>
<form action="checkout.php"><button type="submit">Checkout</button></form>

</body>
</html>
