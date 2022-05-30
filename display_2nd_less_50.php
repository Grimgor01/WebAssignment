<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Managing the queries on the table." />
        <meta name="keywords" content="PHP, MySql" />
        <meta name="author" content="Senil Hansitha Ravindranath Gunawardena" />
        <title>Students who got less than 50% in the second attempt</title>
    </head>
    <body>
        <h1>Students who got less than 50% in the second attempt</h1>
        <?php 

            require_once("settings.php"); 

            $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
            );

            $query = "SELECT * FROM quizAnswers WHERE attempts = 2 AND score < 50 ";


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
                        echo "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Date & Time</th></tr>";

                        while ($record) {
                            echo "<tr><td>{$record["uid"]}</td>";
                            echo "<td>{$record["firstname"]}</td>";
                            echo "<td>{$record["lastname"]}</td>";                            
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


        ?>
    </body>
</html>