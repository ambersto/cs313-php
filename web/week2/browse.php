<head>
	<title>Phil's</title>
</head>
<body>
<h1>Phil's Corner Market</h1>
<h2>Select items to purchase below:</h2>

<form method="post" action="handler.php">
	<input type="text" name="username">
	<input type="submit">
	</form>

<p>
Apples<br>
	<form method="post" action="add.php">
		<input type="hidden" name="apple">
		<input type="submit" value="Add">
	</form>
</p>
<p>
Bananas<br>
	<form method="post" action="add.php">
		<input type="hidden" name="item" value="banana">
		<input type="submit" value="Add">
	</form>
</p>

</body>