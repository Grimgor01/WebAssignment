<!-- Begin Processing -->
<?php
//define variables and set to empty
$err = "";
$firstName = $lastName = $studentNumber = $category = $textAnswer = $protocol = $appName = $favcolor = "";
date_default_timezone_set('Australia/Melbourne');
require_once ("settings.php");
$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
		);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(empty($_POST["firstName"])) {
			$err .= "Please enter a valid name";
		}
		else {
			
			if(!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
				$err .= "Only letters and white spaces allowed";
			} else {
                $firstName = htmlspecialchars(trim($_POST["firstName"]));
            }
		}
	
	if(empty($_POST["lastName"])) {
		$err .= "Please enter a valid name";
	}
	else {
		
		if(!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
			$err .= "Only letters and white spaces allowed";
		} else {
            $lastName = htmlspecialchars(trim($_POST["lastName"]));
        }
	}
	
	if(empty($_POST["studentNumber"])) {
        $err .= "Please enter a valid student number";
    }
    else {
        
        if(!preg_match("/^[0-9]*$/",$studentNumber)) {
            $err .= "Only numbers allowed";
        } else {
            $studentNumber = htmlspecialchars(trim($_POST["studentNumber"]));
        }
    }

    if(empty($_POST["category"])) {
        $err .= "Please enter a valid answer for 'Which of these platforms are the streaming media?' ";
    }
    else {
        $category = ($_POST["category"]);
    }

    if(empty($_POST["textAnswer"])) {
        $err .= "Please enter a valid answer for 'What is the main difference between streaming and live streaming?' ";
    }
    else {
        $textAnswer = htmlspecialchars(trim($_POST["textAnswer"]));
    }

    if(empty($_POST["protocol"])) {
        $err .= "Please enter a valid answer for 'What is the most used in streaming media protocol?' ";
    }
    else {
        $protocol = ($_POST["protocol"]);
    }

    if(empty($_POST["appName"])) {
        $err .= "Please enter a valid answer for 'The most popular subscription streaming services in the world is' ";
    }
    else {
        $appName = ($_POST["appName"]);
    }

    if(empty($_POST["favcolor"])) {
        $err .= "Please enter a valid answer for 'Select the theme color of the Twitch' ";
    }
    else {
        $favcolor = ($_POST["favcolor"]);
    }
	}
	
	if ($err != "") {
        echo "<p>$err</p>";
    } else {
        if (!$conn) {
            echo "<p>Failed to connect to the database</p>";
        } else{
		
		//checks for table existence 
		$val = 'SELECT 1 FROM quizAnswers';
		$validate = mysqli_query($conn, $val);
			if($validate != false)
			{
					echo "Table exists";
			}

		else {
			$table = "CREATE TABLE quizAnswers (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				date VARCHAR(40) NOT NULL,
				firstname VARCHAR(40) NOT NULL,
				lastname VARCHAR(40) NOT NULL,
				uid INT NOT NULL,
				attempts INT NOT NULL, 
				score INT NOT NULL)";

			echo "Table does not exist <br>";
			echo "Creating table...<br>";
			$gentable = mysqli_query($conn, $table);
			echo "Table Created";	
		}
			
            $sql_table = "quizAnswers";
		$date = date('d/m/Y, h:ia');
		
		
		$score = 0;	
		$correctTextAnswer = 'The key difference is that the media when streaming is pre-recorded whereas live streaming meaning that the media is recorded and transmitted simultaneously.';
		$correctProtocol = 'UDP';
		$correctAppName = 'Netflix';
		$correctFavColor = '#6441a5';
		
		
			foreach($category as $key)
			{
			   if(($key == 'Netflix' && 'YouTube' && 'Spotify'))
			   { 
				  $score = $score + 1;
			   }
			}
		if ($textAnswer == $correctTextAnswer) { $score = $score + 1;}
		if ($protocol == $correctProtocol) { $score = $score + 1;}
		if ($appName == $correctAppName) { $score = $score + 1;}
		if ($favcolor == $correctFavColor) { $score = $score + 1;}
		
		$score = $score / 5 * 100 ;
		
		
		
			$query = "SELECT * from $sql_table where uid = '$studentNumber'";
            $result = mysqli_query($conn, $query);
            $attempts = $result->num_rows + 1;
			
			
			if ($attempts > 2){
				echo "<p>Max amount of attempts reached dumbass.</p>";
				
				echo "<a href=\"index.php\"><input type=\"Submit\" value=\"Return to Page\"></a>";
			}
			
			else{
			if ($attempts == 2){	
			$insert = "INSERT INTO $sql_table (date, firstname, lastname, uid, attempts, score) values ('$date', '$firstName', '$lastName', '$studentNumber','$attempts', '$score')";
			mysqli_query($conn, $insert);
			
				echo "<p>Your information and score: </p>";
						echo "<p>Date: $date</p>";
                        echo "<p>First name: $firstName </p>";
                        echo "<p>Last name: $lastName </p>";
                        echo "<p>Student No.: $studentNumber </p>";
                        echo "<p> Number of attempts: $attempts </p>";
                        echo "<p>You achieved a score of $score%</p>";
						
				
				echo "<a href=\"index.php\"><input type=\"Submit\" value=\"Return to Page\"></a>";
			}
			
			else {
				$insert = "INSERT INTO $sql_table (date, firstname, lastname, uid, attempts, score) values ('$date', '$firstName', '$lastName', '$studentNumber','$attempts', '$score')";
			mysqli_query($conn, $insert);
			
				echo "<p>Your information and score: </p>";
						echo "<p>Date: $date</p>";
                        echo "<p>First name: $firstName </p>";
                        echo "<p>Last name: $lastName </p>";
                        echo "<p>Student No.: $studentNumber </p>";
                        echo "<p> Number of attempts: $attempts </p>";
                        echo "<p>You achieved a score of $score%</p>";
						
						echo "<a href=\"quiz.php\"><input type=\"Submit\" value=\"Try Again\"></a>";
			}
			}
			
             
            mysqli_close($conn);
        }
        
	}

?>