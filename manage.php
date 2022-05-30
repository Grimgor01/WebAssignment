<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Managing the queries on the table." />
        <meta name="keywords" content="PHP, MySql" />
        <meta name="author" content="Senil Hansitha Ravndranath Gunawardena" />
        <title> Manager </title>
    </head>
    <body>
        <h1> Manager </h1>
        
        <nav id="navbar">
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
		</nav>
        
        <?php 
        require 'header.inc';
        ?>
       
        <?php 

            $err_msg = "";         

            if (isset($_POST["firstName"])) {
                if ($_POST["firstName"]=="") {
                    $err_msg .= "<p>You must enter your first name.</p>";
                }
                else if (preg_match("/^[a-zA-Z]*$", $_POST["firstName"])) {
                    $err_msg .= "<p>Only alpha letters allowed in your first name.</p>";
                } 
                else {
                    $firstName = $_POST["firstName"];
                } 
            }
            else {
                header("location:quiz.php");
                exit();
            }       

            if (isset($_POST["lastName"])) {
                if ($_POST["lastName"]=="") {
                    $err_msg .= "<p>You must enter your last name.</p>";
                }
                else if (preg_match("/^[a-zA-Z]*$", $_POST["lastName"])) {
                    $err_msg .= "<p>Only alpha letters allowed in your last name.</p>";
                } 
                else {
                    $lastName = $_POST["lastName"];
                } 
            }
            else {
                header("location:quiz.php");
                exit();
            }

            if (isset($_POST["studentNumber"])) {
                if ($_POST["studentNumber"]=="") {
                    $err_msg .= "<p>You must enter your Student ID.</p>";
                }
                else if (preg_match("/^[0-9]*$", $_POST["studentNumber"])) {
                    $err_msg .= "<p>Only numbers allowed in your student ID.</p>";
                } 
                else {
                    $studentNumber = $_POST["studentNumber"];
                } 
            }
            else {
                header("location:quiz.php");
                exit();
            }



            require_once("settings.php"); // connection info

            $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
            );

            // Chech if the connection is successful

            if (!$conn) {
                // Display an error message
                echo "<p>Database connection failure</p>"; // Not in production script
            } else {
                // Upon successful connection

                $sql_table = "attempts";

                // Set up the SQL command to query or add data into the table
                $query = "CREATE TABLE IF NOT EXISTS attempts (
                        attempt_id INT AUTO_INCREMENT PRIMARY KEY,
                        firstName VARCHAR(30),
                        lastName VARCHAR(30)
                        studentID INT(7,10)
                        )";

                // ececute the query and store result into the result pointer
                $result = mysqli_query($conn, $query);

                // checks if the ececution was succesful
                if (!result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                } else {
                    echo "<p>Table successfully created.</p>"
                    $record = mysqli_fetch_assoc($result);

                    if (!$record) {
                        echo "<p>No record found.</p>"
                    }
                    else {
                        echo "<table border=\"1\">\n";
                        echo "<tr><th>Attempt ID</th><th>First Name</th><th>Last Name</th><th>Student ID</th></tr>";

                        // retrieve current record pointed by the result pointer

                        while ($record) {
                            echo "<tr><td>{$record['attempt_id']}</td>";
                            echo "<td>{$record["firstName"]}</td>";
                            echo "<td>{$record["lastName"]}</td>";
                            echo "<td>{$record["studentNumber"]}</td></tr>";
                            $record = mysqli_fetch_assoc($result);
                        }
                        echo "</table>\n ";
                        mysql_free_result($result);
                    }
                    
                }
                mysqli_close($conn); 
            }
        ?>

        <h2>Lab10 Add Car Form</h2>
        <form id="appForm" method="post" action="manage.php">
            <fieldset>
                <legend><h2><strong>Search by student first name</strong></h2></legend>
                <p><label for="firstName">First Name</label> 
                        <input type="text" name= "firstName" id="firstName" maxlength="30" size="30" required="required" pattern="[a-zA-Z ]+" />
                </p>
                <input type= "submit" value="Search" />
            </fieldset>

            <fieldset>
                <legend><h2><strong>Search by student last name</strong></h2></legend>
                <p><label for="lastName">Last Name</label> 
                    <input type="text" name= "lastName" id="lastName"  maxlength="30" size="30" required="required" pattern="[a-zA-Z ]+" />
                </p>
                <input type= "submit" value="Search" />
            </fieldset>

            <fieldset>
                <legend><h2><strong>Search by student Number</strong></h2></legend>
                <p><label for="studentNumber">Student Number</label> 
                    <input type="text" name= "studentNumber" id="studentNumber" maxlength="10" size="30" required="required" pattern="\d{7,10}" />
                </p>
                <input type= "submit" value="Search" />
            </fieldset>

        </form>
        <?php 
        require 'footer.inc';
        ?>
    </body>
</html>
