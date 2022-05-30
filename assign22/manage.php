<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset = "utf-8" />
		<meta name = "description" content = "Retrieving Data" />
		<meta name = "keywords" content = "PHP, MySql" />
		<title>User Attempt Search</title>
		<link href="manage.css" rel="stylesheet">
	</head>
	
	<body>
		<header>
			<h1 id="searchu" >Search User Database</h1>
			<h1 id="editu" >Edit User Database</h1>
		</header>
		<form method = "get" action = "manage/manage2.php" id="search">
			
			<fieldset >
			<legend>Enter desired filters or press search to show full table:</legend>
			<p><label for = "date">Date: </label>
				<input type = "text" name = "date" id = "date" />
			</p>
			
			<p><label for = "firstname">First Name:</label>
				<input type = "text" name = "firstname" id = "firstname" />
			</p>
			
			<p><label for = "lastname">Last Name:</label>
				<input type = "text" name = "lastname" id = "lastname" />
			</p>
			
			<p><label for = "uid">Student ID:</label>
				<input type = "text" name = "uid" id = "uid" />
			</p>
			
			<p><label for = "score">Score:</label>
				<input type = "text" name = "score" id = "score" />
			</p>
				<p> 
					
					<label for="100">100 on first attempt </label> 
                        <input type="radio" id="100" name="protocol" value="100"/>
                    <label for="50"> Less than 50 on second attempt </label> 
                        <input type="radio" id="50" name="protocol" value="50"/>
					<label for="unselect">Unselected</label> 
                        <input type="radio" id="unselect" name="protocol" value="unselect" checked />
                </p>
				
				
				
			
			
			<p><input type="submit" value="Search" /></p>	
			</fieldset>
			</form>
		
		
		
		
		<form method = "get" action = "manage/edit.php" id="edit" >
			
			<fieldset >
			<legend>Edit with the fields below or delete attempts</legend>
			<p><label for = "uid">Student ID:</label>
				<input type = "text" name = "uid" id = "uid" />
			</p>
			
			<p><label for = "attempt">Attempt: </label>
				<input type = "text" name = "attempt" id = "attempt" />
			</p>
			
			<p><label for = "score">Change score to:</label>
				<input type = "text" name = "score" id = "score" />
			</p>
				<p> 
					<label for="edite">Edit Entry </label> 
                        <input type="radio" id="edite" name="protocol2" value="edite"/>
                    <label for="deletee"> Delete All Entries </label> 
                        <input type="radio" id="deletee" name="protocol2" value="deletee"/>
                </p>
				
			<p><input type="submit" value="Confirm" /></p>	
			</fieldset>
			</form>
			
			
		<br>	
		<a href="manage/logout.php" id="logoutbtn"><input type="Submit" value="Logout"></a> &nbsp;
		
		
	</body>
</html>