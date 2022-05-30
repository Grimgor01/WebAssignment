<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Streaming Media Quiz page" />
        <meta name="keywords" content="HTML, From, Tags" />
        <meta name="author" content="Ryan Correia, Elishua Ma, Liam Crook, Senil Hansitha Ravindranath Gunawardena, Alexander Forster" />
		<meta name="viewport" content="width-device-width, initial-scale=1.0"/>
        <title>Streaming Media - Quiz</title>
		<link href="styles/navbar.css" rel="stylesheet">
		<link href="styles/styles.css" rel="stylesheet">
		<link href="styles/responsive.css" rel="stylesheet">
    </head>
	
	
	
	
	
    <body>
	    <?php
  require 'header.inc';
     ?>
		
		
		
 <nav id="navbar">
			<ul>
				<li><a href="index.php">Index</a></li>
				<li><a>Topic<span>&dtrif;</span></a>
				<ul id = "topics">
					<li><a href="topic.php">Topic 1</a></li>
					<li><a href="topic2.php">Topic 2</a></li>
				</ul>
				</li>
				<li><a class="active">Quiz<span>&dtrif;</span></a>
				<ul id = "quizs">
					<li><a class="active" href="quiz.php">Quiz</a></li>
					<li><a href="manage/login.html">Attempts</a></li>
				</ul>	
				</li>
				<li><a href="enhancements.html">Enhancements</a></li>
			</ul>
		</nav>
	
		
		
        <form id="appForm" method="post" action="markquiz.php">
            <!--Note we have to use a special escape character to print an apostrophe on the Web page -->
            
            <fieldset>
                <legend>User Details</legend>
                <p><label for="firstName">First Name</label> 
                        <input type="text" name= "firstName" id="firstName" maxlength="30" size="30" required="required" pattern="[a-zA-Z- ]+" />
                </p>
                <p><label for="lastName">Last Name</label> 
                    <input type="text" name= "lastName" id="lastName"  maxlength="30" size="30" required="required" pattern="[a-zA-Z- ]+" />
                </p>
                <p><label for="studentNumber">Student Number</label> 
                    <input type="text" name= "studentNumber" id="studentNumber" maxlength="10" size="30" required="required" pattern="\d{7,10}" />
                </p>
            </fieldset>
            <br>

            <fieldset>
                <legend>Which of these platforms are the streaming media?</legend>
                <p><label for="Netflix">Netflix</label> 
                    <input type="checkbox" id="Netflix" name="category[]" value="Netflix"/>
                    <label for="Gmail">Gmail</label> 
                    <input type="checkbox" id="Gmail" name="category[]" value="Gmail"/>
                    <label for="YouTube">YouTube</label> 
                    <input type="checkbox" id="YouTube" name="category[]" value="YouTube"/>
                    <label for="Torrent">Torrent</label> 
                    <input type="checkbox" id="Torrent" name="category[]" value="Torrent"/>
                    <label for="Spotify">Spotify</label> 
                    <input type="checkbox" id="Spotify" name="category[]" value="Spotify"/>
                    <label for="MetaMask">MetaMask</label> 
                    <input type="checkbox" id="MetaMask" name="category[]" value="MetaMask"/>
                </p>
            </fieldset>
            <br>

            <fieldset>
                <legend>What is the main difference between streaming and live streaming?</legend>
                <p><textarea id="textAnswer" name="textAnswer" rows="4" cols="50" placeholder="Write your answer here..."></textarea>
                </p>
            </fieldset>
            <br>

            <fieldset>
                <legend>What is the most used in streaming media protocol?</legend>
                <p> 
                    <label for="TCP">TCP</label> 
                        <input type="radio" id="TCP" name="protocol" value="TCP" required/>
                    <label for="IPv6">IPv6</label> 
                        <input type="radio" id="IPv6" name="protocol" value="IPv6"/>
                    <label for="ICMP">ICMP</label> 
                        <input type="radio" id="ICMP" name="protocol" value="ICMP"/>
                    <label for="UDP">UDP</label> 
                        <input type="radio" id="UDP" name="protocol" value="UDP"/>
                    <label for="ARP">ARP</label> 
                        <input type="radio" id="ARP" name="protocol" value="ARP"/>
                </p>
            </fieldset> 
            <br>

            <fieldset>
                <p><label for="appName">The most popular subscription streaming services in the world is </label> 
                    <select name="appName" id="appName">
                        <option value="">Please Select</option>			
                        <option value="Spotify">Spotify</option>
                        <option value="AmazonPrimeVideo">Amazon Prime Video</option>
                        <option value="Hulu">Hulu</option>
                        <option value="YouTube">YouTube</option>
                        <option value="Tencent Video">Tencent Video</option>
                        <option value="Netflix">Netflix</option>
                        <option value="Twitch">Twitch</option>
                        <option value="BBC iPlayer">BBC iPlayer</option>
                        <option value="HBO Max">HBO Max</option>
                    </select>
                </p>
            </fieldset>
            <br>

            <fieldset>
                <legend>Select the theme color of the Twitch</legend>
                <p>
                    <label for="favcolor"></label>
                    <input type="color" id="favcolor" name="favcolor" value="#ffffff">
                </p>
            </fieldset>
            <br>
            
            <input type= "submit" value="Submit"/>
            <input type= "reset" value="Reset Form"/>
        </form>

<?php
  require 'footer.inc'
   ?>
    </body>
</html>
