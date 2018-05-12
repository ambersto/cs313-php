<?php
echo "<h1>Your choice is: " . $_POST["item"] . "</h1>";
//header("Location: {$_SERVER['HTTP_REFERER']}");

session_start();

$fruit = $_POST["item"];
echo "<h1>It really is: " . $fruit . "</h1>";

if(isset($_SESSION[$fruit]))
	$_SESSION[$fruit] += 1;
else
	$_SESSION[$fruit] = 0;

echo "Number of " . $fruit . "s: " . $_SESSION[$fruit];
/*echo('<span style="color: blue;">You have visited this page '.$_SESSION["timesVisited"].' times.</span>');*/
?>