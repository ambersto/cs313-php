<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<a  href="home.php"><img id="home" src="home.png"></a>
	<h1>Amber Stoddard</h1>
	<p id="breadCrumb"><a href="home.php">Home</a> >></p>
  	<a  href="home.php"><div id="button">Home</div></a>
  	<a href="projects.html"><div id="button">Projects</div></a>
  	<div id="button">Fun</div>
  	<a href="https://www.linkedin.com/in/amber-stoddard-6635b7b7/"><div id="button">About Me</div></a>
  	<div id="button">Contact Me</div>
  	<div id="quote">"The greatest of all faults is to be conscious of none." -Thomas Carlisle</div>
  	<img id="aboutMe" src="aboutMe.png">
  	<p class="body">This is my homepage for the semester. Links to my other pages can be found to the left. Thanks for visiting!</p>
    <p><?php
      echo "Today is " . date("Y/m/d") . "<br>";
    ?></p>
    <p class="footer">© Copyright 2018 by Amber Stoddard</p>
</body>