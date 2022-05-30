<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="A particular student's details." />
        <meta name="keywords" content="PHP, MySql" />
        <meta name="author" content="Senil Hansitha Ravndranath Gunawardena" />
        <title> Manage Student </title>
    </head>
    <body>
        <h1> Student's Attempts </h1>

        <?php

        $err_msg = "";  
        
        if (empty($_POST["firstName"]) and empty($_POST["lastName"]) and empty($_POST["studentNumber"])) {
            $err_msg .= "<p>Please enter at least student's ID or first name or last name to query from database.</p>"
            header("location:manage.php");
            exit();
        }

        function sanitise_input($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }
        $firstName = sanitise_input($_POST["firstName"]);
        $lastName = sanitise_input($_POST["lastName"]);
        $studentNumber = sanitise_input($_POST["studentNumber"]);

        if (isset($_POST["firstName"])) {
            if (preg_match("/^[a-zA-Z]*$", $_POST["firstName"])) {
                $err_msg .= "<p>Only alpha letters allowed in your first name.</p>";
            } 
            else {
                $firstName = $_POST["firstName"];
            } 
        }

        if (isset($_POST["lastName"])) {
            if (preg_match("/^[a-zA-Z]*$", $_POST["lastName"])) {
                $err_msg .= "<p>Only alpha letters allowed in your last name.</p>";
            } 
            else {
                $lastName = $_POST["lastName"];
            } 
        }

        if (isset($_POST["studentNumber"])) {
            if (preg_match("/^[0-9]*$", $_POST["studentNumber"])) {
                $err_msg .= "<p>Only numbers allowed in your student ID.</p>";
            } 
            else {
                $studentNumber = $_POST["studentNumber"];
            } 
        }

        if ( $err_msg != "") {
            echo "<p>$err_msg</p>";
        }
        else {

            require_once("settings.php"); 

            $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
            );

            $query = "SELECT * FROM quizAnswers WHERE firstname LIKE '%$firstName%' AND lastname LIKE '%$lastName%' AND uid LIKE '%$studentNumber'";

            if ($conn) {
                echo "<p>Database connection successful!</p>"; 
                $result = @mysqli_query($conn, $query);

                if ($result) {
                    echo "<p>SELECT successful.</p>";
                    $record = @mysqli_fetch_assoc($result);
                    if (!$record) {
                        echo "<p>Something is wrong with ", $query, "</p>";
                    }
                    else {
                        echo "<table border=\"1\">\n";
                        echo "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Attempts</th><th>Score</th><th>Date & Time</th></tr>";

                        while ($record) {
                            echo "<tr><td>{$record["uid"]}</td>";
                            echo "<td>{$record["firstname"]}</td>";
                            echo "<td>{$record["lastname"]}</td>";
                            echo "<td>{$record["attempts"]}</td>";
                            echo "<td>{$record["score"]}</td>";                            
                            echo "<td>{$record["date"]}</td></tr>";
                            $record = mysqli_fetch_assoc($result); 
                       }

                        echo "</table>\n ";

                        // Frees up the memory, after using the result pointer
                        @mysql_free_result($result);

                        // If successful query opration close the database connection
                        @mysql_close($conn);
                    }
                }
                else {
                    echo "<p>Unable to find the table</p>";
                }
            } 
            else {
                echo "<p>Unable to to connect to the database.</p>";
            }
        }
        ?>
    </body>
</html>