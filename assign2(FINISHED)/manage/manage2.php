<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<meta name = "description" content = "Creating Web Applications Lab 10" />
		<meta name = "keywords" content = "PHP, MySql" />
		<title>User Information</title>
	</head>
	
	<body>
<?php
		require_once("../settings.php"); //connection info
		
		$conn = @mysqli_connect($host,
			$user,
			$pwd,
			$sql_db
		);
		
		//checks if connection is successful
		if(!$conn){
			//displays error msg
			echo "<p>Database connection failure </p>";
		} else{
			//upon successfull connection 
			$sql_table = "quizAnswers";
			
			//assigning variable values
			$date = htmlspecialchars(trim($_GET["date"])); 
			$firstname = htmlspecialchars(trim($_GET["firstname"])); 
			$lastname = htmlspecialchars(trim($_GET["lastname"])); 
			$uid = htmlspecialchars( trim($_GET["uid"])); 
			$score = htmlspecialchars( trim($_GET["score"]));
			$protocol = ($_GET["protocol"]);
			//check values
			if ($date == "" && $firstname == "" && $lastname == "" && $uid == "" && $score == "" && $protocol == ""){
				//set up the SQL command to query or add data into the table 
				$query = "SELECT * FROM quizAnswers";
			
				//execute the query and store result into the result pointer 
				$result = mysqli_query($conn, $query);
				
				//checks if execution was successfull
			if(!$result){
				echo "<p>Something is wrong with ", $query, "</p>";
			}elseif(mysqli_num_rows($result) == 0){
				echo "<p>No records found.</p>";
			}else{
				//display retrieved records
				echo "<table border=\"1\">\n";
				echo "<tr>\n "
					."<th scope=\"col\">ID</th>\n "
					."<th scope=\"col\">Date</th>\n "
					."<th scope=\"col\">First Name</th>\n "
					."<th scope=\"col\">Last Name</th>\n "
					."<th scope=\"col\">Student ID</th>\n "
					."<th scope=\"col\">Attempts</th>\n "
					."<th scope=\"col\">Score</th>\n "

					."</tr>\n ";
					
					//retrieve current record pointed by the result pointer 
					while ($row = mysqli_fetch_assoc($result)){
						echo "<tr>\n";
						echo "<td>", $row["id"], "</td>\n";
						echo "<td>", $row["date"], "</td>\n";
						echo "<td>", $row["firstname"], "</td>\n";
						echo "<td>", $row["lastname"], "</td>\n";
						echo "<td>", $row["uid"], "</td>\n";
						echo "<td>", $row["attempts"], "</td>\n";
						echo "<td>", $row["score"], "</td>\n";
						echo "</tr>\n";
					}
				echo "</table>\n";
				
				echo "<a href=\"manage.php\"><input type=\"Submit\" value=\"Back\"></a>";
				//frees up the memory, after using the result pointer
				mysqli_free_result($result);
			}
			}
			
			else {
			//set up the SQL command to query or add data into the table 
			$query = "SELECT * FROM quizAnswers WHERE date like '$date' or firstname like '$firstname' or lastname like '$lastname' or uid like '$uid' or score like '$score'";
			$query50 = "SELECT * FROM quizAnswers WHERE date like '$date' or firstname like '$firstname' or lastname like '$lastname' or uid like '$uid' or score like '$score' or score < 50 and attempts = 2";
			$query100 = "SELECT * FROM quizAnswers WHERE date like '$date' or firstname like '$firstname' or lastname like '$lastname' or uid like '$uid' or score like '$score' or score = 100 and attempts = 1";
			
			//execute the query and store result into the result pointer 
			$result = mysqli_query($conn, $query);
			$result50 = mysqli_query($conn, $query50);
			$result100 = mysqli_query($conn, $query100);
			
			
			
			if($protocol == '50') {
				//checks if execution was successfull
			if(!$result50){
				echo "<p>Something is wrong with ", $query50, "</p>";
			}elseif(mysqli_num_rows($result50) == 0){
				echo "<p>No records found.</p>";
			}else{
				//display retrieved records
				echo "<table border=\"1\">\n";
				echo "<tr>\n "
					."<th scope=\"col\">ID</th>\n "
					."<th scope=\"col\">Date</th>\n "
					."<th scope=\"col\">First Name</th>\n "
					."<th scope=\"col\">Last Name</th>\n "
					."<th scope=\"col\">Student ID</th>\n "
					."<th scope=\"col\">Attempts</th>\n "
					."<th scope=\"col\">Score</th>\n "

					."</tr>\n ";
					
					//retrieve current record pointed by the result pointer 
					while ($row = mysqli_fetch_assoc($result50)){
						echo "<tr>\n";
						echo "<td>", $row["id"], "</td>\n";
						echo "<td>", $row["date"], "</td>\n";
						echo "<td>", $row["firstname"], "</td>\n";
						echo "<td>", $row["lastname"], "</td>\n";
						echo "<td>", $row["uid"], "</td>\n";
						echo "<td>", $row["attempts"], "</td>\n";
						echo "<td>", $row["score"], "</td>\n";
						echo "</tr>\n";
					}
				echo "</table>\n";
				
				echo "<a href=\"manage.php\"><input type=\"Submit\" value=\"Back\"></a>";
				//frees up the memory, after using the result pointer
				mysqli_free_result($result50);
			}
			}	
			
			elseif($protocol == '100') {
				//checks if execution was successfull
			if(!$result50){
				echo "<p>Something is wrong with ", $query100, "</p>";
			}elseif(mysqli_num_rows($result100) == 0){
				echo "<p>No records found.</p>";
			}else{
				//display retrieved records
				echo "<table border=\"1\">\n";
				echo "<tr>\n "
					."<th scope=\"col\">ID</th>\n "
					."<th scope=\"col\">Date</th>\n "
					."<th scope=\"col\">First Name</th>\n "
					."<th scope=\"col\">Last Name</th>\n "
					."<th scope=\"col\">Student ID</th>\n "
					."<th scope=\"col\">Attempts</th>\n "
					."<th scope=\"col\">Score</th>\n "

					."</tr>\n ";
					
					//retrieve current record pointed by the result pointer 
					while ($row = mysqli_fetch_assoc($result100)){
						echo "<tr>\n";
						echo "<td>", $row["id"], "</td>\n";
						echo "<td>", $row["date"], "</td>\n";
						echo "<td>", $row["firstname"], "</td>\n";
						echo "<td>", $row["lastname"], "</td>\n";
						echo "<td>", $row["uid"], "</td>\n";
						echo "<td>", $row["attempts"], "</td>\n";
						echo "<td>", $row["score"], "</td>\n";
						echo "</tr>\n";
					}
				echo "</table>\n";
				
				echo "<a href=\"manage.php\"><input type=\"Submit\" value=\"Back\"></a>";
				//frees up the memory, after using the result pointer
				mysqli_free_result($result100);
			}
			}
			
			//checks if execution was successfull
			else{
			if(!$result){
				echo "<p>Something is wrong with ", $query, "</p>";
			}elseif(mysqli_num_rows($result) == 0){
				echo "<p>No records found.</p>";
			}else{
				//display retrieved records
				echo "<table border=\"1\">\n";
				echo "<tr>\n "
					."<th scope=\"col\">ID</th>\n "
					."<th scope=\"col\">Date</th>\n "
					."<th scope=\"col\">First Name</th>\n "
					."<th scope=\"col\">Last Name</th>\n "
					."<th scope=\"col\">Student ID</th>\n "
					."<th scope=\"col\">Attempts</th>\n "
					."<th scope=\"col\">Score</th>\n "

					."</tr>\n ";
					
					//retrieve current record pointed by the result pointer 
					while ($row = mysqli_fetch_assoc($result)){
						echo "<tr>\n";
						echo "<td>", $row["id"], "</td>\n";
						echo "<td>", $row["date"], "</td>\n";
						echo "<td>", $row["firstname"], "</td>\n";
						echo "<td>", $row["lastname"], "</td>\n";
						echo "<td>", $row["uid"], "</td>\n";
						echo "<td>", $row["attempts"], "</td>\n";
						echo "<td>", $row["score"], "</td>\n";
						echo "</tr>\n";
					}
				echo "</table>\n";
				
				echo "<a href=\"manage.php\"><input type=\"Submit\" value=\"Back\"></a>";
				//frees up the memory, after using the result pointer
				mysqli_free_result($result);
				}
				}
			
			}
		mysqli_close($conn);
		}
		
?>	
	</body>
</html>