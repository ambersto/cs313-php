<?php

session_start();

foreach ($_SESSION as $fruit => $quantity) {
	echo "You ordered "  . $quantity . " " . $fruit . "(s).<br>";
}
?>
