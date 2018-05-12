<head>
	<title>Phil's Corner Market</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>Phil's Corner Market</h1>
<div>
<h2>Select items to purchase below:</h2>

<h3>Apple</h3>
<img src="apple.jpg">
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Apple">
	<button type="submit">Add to Cart</button>
</form>

<h3>Banana</h3>
<img src="banana.png">
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Banana">
	<button type="submit">Add to Cart</button>
</form>

<h3>Mango</h3>
<img src="mango.jpg">
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Mango">
	<button type="submit">Add to Cart</button>
</form>

<h3>Orange</h3>
<img src="orange.jpg">
<form method="post" action="add.php">
	<input type="hidden" name="item" value="Orange">
	<button type="submit">Add to Cart</button>
</form>

<br>
<form action="cart.php">
	<button type="submit">View Cart</button>
</form>
</div>
</body>