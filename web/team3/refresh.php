<?php

session_start();

if(isset($_SESSION["timesVisited"]))
	$_SESSION["timesVisited"] += 1;
else
	$_SESSION["timesVisited"] = 0;

echo('<span style="color: blue; background: black;">You have visited this page '.$_SESSION["timesVisited"].' times.</span>');

?>