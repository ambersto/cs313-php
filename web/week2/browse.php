<head>
	<title>Phil's</title>
</head>
<body>
<h1>Phil's Corner Market</h1>
<h2>Select items to purchase below:</h2>

Apples<br>
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Apple">
	<button type="submit">Add to Cart</button>
</form>

Bananas<br>
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Banana">
	<button type="submit">Add to Cart</button>
</form>

Mango<br>
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Mango">
	<button type="submit">Add to Cart</button>
</form>

Orange<br>
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Orange">
	<button type="submit">Add to Cart</button>
</form>

<br><br>
<form action="cart.php">
	<button type="submit">View Cart</button>
</form>

</body>