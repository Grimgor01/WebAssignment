<!-- Begin Processing -->
<?php
//define variables and set to empty
$err = "";
$firstName = $lastName = $studentNumber = $category = $textAnswer = $protocol = $appName = $favcolor = "";
date_default_timezone_set('Australia/Melboune')
require_once ("settings.php")
$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
		);







function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(empty($_POST["firstName"])) {
			$err .= "Please enter a valid name";
		}
		else {
			
			if(!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
				$err. = "Only letters and white spaces allowed";
			} else {
                $firstName = test_input($_POST["firstName"]);
            }
		}
	
	if(empty($_POST["lastName"])) {
		$err .= "Please enter a valid name";
	}
	else {
		
		if(!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
			$err .= "Only letters and white spaces allowed";
		} else {
            $lastName = test_input($_POST["lastName"]);
        }
	}
	
	if(empty($_POST["studentNumber"])) {
        $err .= "Please enter a valid student number";
    }
    else {
        
        if(!preg_match("/^[0-9]*$/",$studentNumber)) {
            $err .= "Only numbers allowed";
        } else {
            $studentNumber = test_input($_POST["studentNumber"]);
        }
    }

    if(empty($_POST["category"])) {
        $err .= "Please enter a valid answer for 'Which of these platforms are the streaming media?' ";
    }
    else {
        $category = test_input($_POST["category"]);
    }

    if(empty($_POST["textAnswer"])) {
        $err .= "Please enter a valid answer for 'What is the main difference between streaming and live streaming?' ";
    }
    else {
        $textAnswer = test_input($_POST["textAnswer"]);
    }

    if(empty($_POST["protocol"])) {
        $err .= "Please enter a valid answer for 'What is the most used in streaming media protocol?' ";
    }
    else {
        $protocol = test_input($_POST["protocol"]);
    }

    if(empty($_POST["appName"])) {
        $err .= "Please enter a valid answer for 'The most popular subscription streaming services in the world is' ";
    }
    else {
        $appName = test_input($_POST["appName"]);
    }

    if(empty($_POST["favcolor"])) {
        $err .= "Please enter a valid answer for 'Select the theme color of the Twitch' ";
    }
    else {
        $favcolor = test_input($_POST["favcolor"]);
    }
	}
	
	if $err != "" {
        echo "<p>$err</p>";
    } else {
        if (!conn) {
            echo "<p>Failed to connect to the database</p>"
        } else{
		
		//checks for table existence 
		$val = 'SELECT 1 FROM quizAnswers';
		$validate = mysqli_query($conn, $val);
			if($validate !== false)
			{
					echo "Table exists";
			}

		else {
			$table = "CREATE TABLE quizAnswers (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				date INT NOT NULL,
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
            $query = "SELECT COUNT(*) from $sql_table where uid like '$studentNumber'";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
            } else {
                if $result >= 2 {
                    echo "<p>Maximum amount of attempts have already been used</p>";
                    
                } else {
                    $attempts = $result
                    $score = 0;
                    /* Insert code to mark the quiz and return a score */
                    $date = date('d/m/Y, h:ia');
                    $query = "INSERT INTO $sql_table (date, firstname, lastname, uid, score) values ('$date', '$firstName', '$lastName', '$studentNumber', '$score')";
                    $result = mysqli_query($conn, $query);
                    if (!$result){

                    } else {
                        echo "<p>Your information and score: </p>";
                        echo "<p>First name: $firstName </p>";
                        echo "<p>Last name: $lastName </p>";
                        echo "<p>Student No.: $studentNumber </p>";
                        echo "<p> Number of attempts: $attempts </p>";
                        echo "<p>You achieved a score of %$score</p>";
                    
                    if $attempts < 2 {
                        echo "<a href="url to page"><input type="Submit" value="Try Again"></a>";
                    }
                    }
                }
            }
            mysqli_close($conn);
        }
        
    }

?>

