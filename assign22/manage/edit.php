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
		} 
		else{
			//upon successfull connection 
			$sql_table = "quizAnswers";
			
			//assigning variable values
			$uid = htmlspecialchars( trim($_GET["uid"])); 
			$attempt = htmlspecialchars(trim($_GET["attempt"]));
			$score = htmlspecialchars( trim($_GET["score"]));
			$protocol = ($_GET["protocol2"]);
			
		
			$query = "DELETE FROM quizAnswers WHERE uid = '$uid'";
			$query2 = "UPDATE quizAnswers SET score = '$score' WHERE attempts = '$attempt' and uid = '$uid'";
		
			
		if($protocol == 'deletee') {
			$result = mysqli_query($conn, $query);
			if(!$result) {
				echo "<p>Please ensure that a UID has been input</p>";
			}
			else {
				echo "<p>User Attempts deleted succesfully.</p>";
				echo "<a href=\"../manage.php\"><input type=\"Submit\" value=\"Back\"></a>";
			}
		}
		elseif ($protocol == 'edite') {
			$result2 = mysqli_query($conn, $query2);
			if(!$result2) {
				echo "<p>Please ensure that a UID and Attempts has been input as well as the score you want to change to.</p>";
			}
			else {
				echo "<p>Score changed succesfully.</p>";
				echo "<a href=\"../manage.php\"><input type=\"Submit\" value=\"Back\"></a>";
			}
		}
		else {
			echo"<p> Please select if you want to delete or edit </p>";
		}
	mysqli_close($conn);
		}
?>		