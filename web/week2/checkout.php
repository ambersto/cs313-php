<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<body>
<h1>Checkout</h1>
<h2>Please enter your shipping address.</h2>
<form method="post" action="confirmation.php">
<h3>Name: </h3>
<input type="text" name="username">
<h3>Street Address: </h3>
<input type="text" name="street">
<h3>City: </h3>
<input type="text" name="city">
<h3>State: </h3>
<input type="text" name="state">
<h3>Zip Code: </h3>
<input type="text" name="zip">
<br><br>
<button type="submit">Continue with Checkout</button><br>
</form>
<form action="cart.php"><button type="submit">Back to Cart</button></form>
</body>
</html>