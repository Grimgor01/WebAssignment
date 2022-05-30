<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Topic page so far" />
  <meta name="keywords" content="Ryan Correia, Elishua Ma, Liam Crook, Senil Hansitha Ravindranath Gunawardena, Alexander Forster" />
  <meta name="author" content="Bitch Croc"  />
  <meta name="viewport" content="width-device-width, initial-scale=1.0"/>
  <title>Streaming Media - Topic</title>
	
 
  <link href="styles/styles.css" rel="stylesheet">
  <link href="styles/sidebar.css" rel="stylesheet">
	<link href="styles/navbar.css" rel="stylesheet">
	<link href="styles/responsive.css" rel="stylesheet">

  
</head>
  
	<body>
<?php
  require 'header.inc';
     ?>
		<!-- <header>
		<a href="https://swinburne.edu.au">
		<img src="styles/images/logo.png" alt="Swinburne Logo"/>
		</a>
		<h1>Streaming Media</h1>
		</header> -->

<?php
  require 'menu.inc';
     ?>	
		<!-- <nav id="navbar">
			<ul>
				<li><a href="index.php">Index</a></li>
				<li><a class="active">Topic<span>&dtrif;</span></a>
				<ul>
					<li><a class="active" href="topic.php">Topic 1</a></li>
					<li><a href="topic2.php">Topic 2</a></li>
				</ul>
				</li>
				<li><a href="quiz.php">Quiz</a></li>
				<li><a href="enhancements.html">Enhancements</a></li>
				<li><a href="manage.php">Manage</a></li>
			</ul>
		</nav> -->
		
		<nav id="sidebar">
			<ul>
			<li><a href="#what">What is it?</a></li>
			<li><a href="#how">How does it work?</a></li>
			<li><a href="#dlvst">Downloading vs Streaming</a></li>
			<li><a href="#stlvst">Streaming vs Live</a></li>
			<li><a href="#dev">Who Developed it?</a></li>
			</ul>
		</nav> -->
		
		<aside id="content">
		<section id="what">
			<h2>What is Streaming Media?</h2>
			<p><span class="bold">Streaming Media</span> refers to both the transmitting and receiving of audio or video data packets over a network in a continuous flow. 
				This allows for the content to be viewed as the data packets are being received without the need to be stored locally. 
				Streaming media is mainly used as entertainment by the average individual. YouTube, Spotify, Netflix etc. are all examples 
				of platforms that utilize streaming media to deliver content to their viewers / listeners. Security cameras too are a common
				use for streaming media in which various cameras that are set up stream a live feed to an end device. </p>
		</section>
		
		<section id="how">
			<h2>How does it work?</h2>
			<p>Audio and video data are broken into data packets, each of these packets containing small parts of the audio or video file. 
				These packets are prearranged and then transmitted one after the other to which a browser or client interprets them as audio or video.</p>
			<p>There are two main methods of streaming when it comes to Streaming Media, <span class="bold">Transmission Control Protocol (TCP)</span> and <span class="bold">User Datagram Protocol (UDP).</span> 
				Both TCP and UDP are used to move data packets through a network. The main difference between TCP and UDP is that TCP ensures that all packets arrive at the destination in order. 
				If any packets are missing, retransmission of these lost packets are available through TCP. UDP does none of that, allowing for it to be much faster than TCP. 
				However, data packets that are lost in UDP are not retransmitted making TCP more reliable.</p>
		</section >
		
		<section id="dlvst">
			<h2>Difference between downloading and streaming.</h2> 
			<ol type="1">
				<li>Media when streamed can be played back as packets are being transmitted. 
					Downloading media on the other hand requires that the media file be fully copied onto a device before playback can occur. </li>
				<li>A video that is streamed will load at little bits at a time whereas a video that is downloaded will be loaded all at once.</li>
				<li>When downloading a media file, a copy of the whole file is stored locally on a device. Streaming however allows for the media 
					to be played without it being copied or saved to the device.</li>
			</ol>
		</section>
		
		<section id="stlvst">
			<h2>Streaming vs Live Streaming.</h2>
			<p>Both streaming and live streaming are essentially the same in that they are able to playback media whilst data packets are being transmitted. 
				The key difference is that the media when streaming is pre-recorded whereas live streaming meaning that the media is recorded and transmitted simultaneously. </p>
		</section>
		<section id="dev">
			<h2>Who developed streaming media?</h2>
			<p>While there isn’t a concrete answer to who developed streaming media, it was largely popularized by the platform YouTube. 
				YouTube was founded in 2005 by Steve Chen, Chad Hurley and Jawed Karim and currently averages around 122 million users per day. However, there was a company that began on-demand streaming
				via the internet in 1998. People in Hong Kong were streaming videos on demand via the internet through a service known as iTV which was very similar to the Netflix of today. What made iTV flop 
				was its lack of subscribers which came with the large amount of technical issues with the service as well as a rather little selection of content. 
				Without subscribers, Hong Kong Telecom was unable to produce the funds to continue the service, driving the 1.5 billion dollar project into the dirt.</p>
			</section>
		
			<figure class="image">
				<a href="images/youtubehome.png">
                <img src="images/youtubehome.png" alt="YouTube Home Page, August 2005"/></a> <br>
                <figcaption class="type">The Homepage of YouTube in August, 2005 <br>
				Source: <a href="https://imgur.com/ACPKYH9">imgur.com</a></figcaption>
            </figure>
			
			
			
		</aside>
		<!-- <footer>
			<section class="footer-content">
				<h3>B*TCH CROC</h3>
				<p>Group Project for COS10026</p>
			<section class="email">
				<a href="mailto:103998991@student.swin.edu.au">Ryan's Contact Email</a>
    			<a href="mailto:103989568@student.swin.edu.au">Elishua's Contact Email</a>
   				<a href="mailto:103988837@student.swin.edu.au">Alexander's Contact Email</a>
    			<a href="mailto:103797693@student.swin.edu.au">Senil's Contact Email</a>
    			<a href="mailto:103983890@student.swin.edu.au">Liam's Contact Email</a>
				</section>
			</section>
			<section class="footer-bottom">
				<p>&#169; Swinburne University of Technology. Designed by <span> B*TCH CROC</span></p>
			</section>
		</footer> -->
<?php
  require 'footer.inc'
   ?>
	</body>
</html>
