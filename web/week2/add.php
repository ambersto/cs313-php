<?php

session_start();

$fruit = $_POST["item"];
//echo "<h1>Your choice is: " . $fruit . "</h1>";

if(isset($_SESSION[$fruit]))
	$_SESSION[$fruit] += 1;
else
	$_SESSION[$fruit] = 1;

//echo "Number of " . $fruit . "s: " . $_SESSION[$fruit];

header("Location: {$_SERVER['HTTP_REFERER']}");

?>