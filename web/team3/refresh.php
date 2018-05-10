<html>
<head>
	<title>Refresh Test</title>
	<style type="text/css">
		color: white;
		background: gray;
	</style>
</head>
<body>
<?php
session_start();

if(isset($_SESSION["timesVisited"]))
	$_SESSION["timesVisited"] += 1;
else
	$_SESSION["timesVisited"] = 0;

echo('<span style="color: blue;">You have visited this page '.$_SESSION["timesVisited"].' times.</span>');
?>
</body>
</html>

