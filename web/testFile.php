<!DOCTYPE html>
<head>
	<title>Test PHP</title>
</head>
<body>
<p>This is a PHP page</p>

<?php
for ($i=0; $i <= 10; $i++) { 
	echo "<div id=\"div$i\"
	This is div number $i
	</div>";
}
?>
</body>