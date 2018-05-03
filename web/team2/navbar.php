<head>
	<style type="text/css">
		li {
		    float: left;
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
		$active = 'none';

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
	  	<li class="<?php if ($active == "home") echo 'active'; else echo 'inactive';?>"><a href=home.php>Home</a></li>
  		<li class="<?php if ($active == "about-us") echo 'active';  else echo 'inactive';?>"><a href=about-us.php>About Us</a></li>
  		<li class="<?php if ($active == "login") echo 'active';  else echo 'inactive';?>"><a href=login.php>Login</a></li>
	</ul>
</body>
