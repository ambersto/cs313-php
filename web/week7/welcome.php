<?php
session_start();

if(isset($_SESSION['user'])) {
	echo "<h1>Welcome" . $_SESSION['user'] . "</h1>";
}
else {
	header("Location: signIn.php");
	exit;
}

?>