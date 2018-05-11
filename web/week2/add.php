<?php 
echo "<script type='text/javascript'>alert('Item added!');</script>";
header("Location: {$_SERVER['HTTP_REFERER']}");
?>