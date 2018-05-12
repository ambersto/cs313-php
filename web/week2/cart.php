<?php

session_start();

echo "This is how many apples I have: " . $_SESSION["Apple"];

foreach ($_SESSION as $fruit => $quantity) {
	echo "You ordered "  . $quantity . " " . $fruit . "(s).";
}
?>
