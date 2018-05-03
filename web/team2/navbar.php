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

		if(strpos($url, 'home') !== false)
		{
			$active = "home";
		}
		if(strpos($url, 'about-us') !== false)
		{
			$active = "about-us";
		}
		if(strpos($url, 'login') !== false)
		{
			$active = "login";
		}	
	?>

	<ul>
	  	<li class="<?php if ($selected == "home") echo 'active'; ?>"><a href=home.php>Home</a></li>
  		<li class="<?php if ($selected == "about-us") echo 'active'; ?>"><a href=about-us.php>About Us</a></li>
  		<li class="<?php if ($selected == "login") echo 'active'; ?>"><a href=login.php>Login</a></li>
	</ul>
</body>
