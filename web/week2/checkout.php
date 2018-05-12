<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>Checkout</h1>
<div>
<h2>Please enter your shipping address.</h2>
<form method="post" action="confirmation.php">
<h3>Name: 
<input type="text" name="username"></h3>
<h3>Street Address: 
<input type="text" name="street"></h3>
<h3>City: 
<input type="text" name="city"></h3>
<h3>State: 
<input type="text" name="state"></h3>
<h3>Zip Code: 
<input type="text" name="zip"></h3>
<br><br>
<button type="submit">Continue with Checkout</button>
</form>
<br>
<form action="cart.php"><button type="submit">Back to Cart</button></form>
</body>
</div>
</html>