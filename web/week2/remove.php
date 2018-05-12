<?php
session_start();
unset($_SESSION[$_POST['item']]);
header("Location: {$_SERVER['HTTP_REFERER']}");
?>