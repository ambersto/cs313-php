<head>
	<title>Phil's</title>
</head>
<body>
<h1>Phil's Corner Market</h1>
<h2>Select items to purchase below:</h2>

<form method="post" action="add.php">
	<input type="text" name="username">
	<input type="submit">
</form>

Apples<br>
<form method="post" action="add.php">
	<input type="submit" name="item" value="apple">
</form>

Bananas<br>
<form method="post" action="add.php">
	<input type="hidden" name="item" value="banana">
	<input type="Submit">
</form>

<form method="post" action="add.php">
<p>Take your pick of berries:</p>
<input type="radio" name="berry" value="Strawberries" id = "str"><label for="str">strawberries</label>
<input type="radio" name="berry" value="Blueberries" id = "blu"><label for="blu">blueberries</label>
<input type="Submit">
</form>
</body>