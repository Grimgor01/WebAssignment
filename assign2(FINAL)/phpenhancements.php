<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="Topic page so far" />
<meta name="keywords" content="HTML5, Streaming, Media, Asignment," />
<meta name="author" content="Ryan Correia, Elishua Ma, Liam Crook, Senil Hansitha Ravindranath Gunawardena, Alexander Forster"  />
<meta name="viewport" content="width-device-width, initial-scale=1.0"/>
<title>Streaming Media - Enhancements</title>
	
<link href="styles/styles.css" rel="stylesheet">
<link href="styles/navbar.css" rel="stylesheet">
	<link href="styles/responsive.css" rel="stylesheet">
</head>

<body href="#">

		    <?php
  require 'header.inc';
     ?>
	
	 <nav id="navbar">
			<ul>
				<li><a href="index.php">Index</a></li>
				<li><a id="dropdown">Topic<span>&dtrif;</span></a>
				<ul id = "topics">
					<li><a href="topic.php">Topic 1</a></li>
					<li><a href="topic2.php">Topic 2</a></li>
				</ul>
				</li>
				<li><a>Quiz<span>&dtrif;</span></a>
				<ul id = "quizs">
					<li><a href="quiz.php">Quiz</a></li>
					<li><a  href="manage/login.html">Attempts</a></li>
				</ul>	
				</li>
				<li><a class ="active">Enhancements<span>&dtrif;</span></a>
				<ul id = "quizs2">
					<li><a   href="enhancements.html">Enhancements 1</a></li>
					<li><a class ="active" href="phpenhancements.php">Enhancements 2</a></li>
				</ul>	
				</li>
			</ul>
		</nav>
	
	<aside id="enhancement">
	<h2>Password Protection</h2>
		<p>Password protection was added to improve the security of the website. This can be seen when accessing the attempts page under quizes. 
		The username for and password are as follows: <br>Username: tutor <br>Password: swinadmin </p>
	
	
	<br><br><br><br>
	
	
	
	</aside>
	
	
	
	<?php
  require 'footer.inc'
   ?>
    </body>
</html>
