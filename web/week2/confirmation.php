<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
</head>
<body>
<h1>Confirmation</h1>
<h2>Your purchase has been made!</h2>

<p>Shipping address:<br>	
<?php
echo $_POST["username"] . "<br>" . $_POST["street"] . "<br>";
echo $_POST["city"] . ", " . $_POST["state"] . " " . $_POST["zip"];
?>
</p>

</body>
</html>