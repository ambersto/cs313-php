<head>
	<style type="text/css">
		li {
		    float: left;
		}
		a {
		    display: block;
		    padding: 8px;
		    color: white;
		    background-color: black;
		}
		.active {
			color: black;
			background: yellow;
		}
	</style>
</head>
<body>

	<?php
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	?>

	<ul>
	  	<li class="<?php if ($selected == "home") echo 'active'; ?>"><a href=\"home.php\">Home</a></li>
  		<li><a href=\"about-us.php\">About Us</a></li>
  		<li><a href=\"login.php\">Login</a></li>
	</ul>";
</body>
