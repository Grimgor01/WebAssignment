<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Managing the queries on the table." />
        <meta name="keywords" content="PHP, MySql" />
        <meta name="author" content="Senil Hansitha Ravindranath Gunawardena" />
        <title> Manage Student </title>
    </head>
    <body>
        <h1> Manage Student </h1>

        <h2> Search by student details </h2>
            <form id="appForm" method="post" action="search_by_student.php">
                <fieldset>
                    <legend><h2><strong>Search by student </strong></h2></legend>
                    <p><label for="firstName">First Name</label> 
                            <input type="text" name= "firstName" id="firstName" maxlength="30" size="30"/>
                    </p>
                    <p><label for="lastName">Last Name</label> 
                        <input type="text" name= "lastName" id="lastName"  maxlength="30" size="30"/>
                    </p>
                    <p><label for="studentNumber">Student Number</label> 
                        <input type="text" name= "studentNumber" id="studentNumber" maxlength="10" size="30" />
                    </p>
                    <input type= "submit" value="Search" />
                </fieldset>
            </form>
        <?php 
            echo "<a href=\"display_all_attempts.php\">Display All Attempts by Students</a>";
            echo "<p></p>";
            echo "<a href=\"display_1st_100.php\">List all students who got 100% on their first attempt</a>";
            echo "<p></p>";
            echo "<a href=\"display_2nd_less_50.php\">List all students got less than 50% on their second attempt</a>";
            echo "<p></p>";
            echo "<a href=\"display_at_least_pass.php\">Display students who at least pass the quiz</a>";
            echo "<p></p>";









/*
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
            }  */
        ?>

        
    </body>
</html>