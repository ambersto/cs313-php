<?php
session_start();
unset($_SESSION[$_POST]);
header("Location: {$_SERVER['HTTP_REFERER']}");
?>