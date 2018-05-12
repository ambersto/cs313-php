<?php
echo "This page works I think.";

foreach ($_SESSION as $fruit => $quantity) {
	echo "You ordered "  . $quantity . " " . $fruit . "(s).";
}
?>
