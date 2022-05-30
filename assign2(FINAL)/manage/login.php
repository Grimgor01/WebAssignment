
<?php
//start the session
session_start();


require_once "../settings.php";

$conn = @mysqli_connect($host,
			$user,
			$pwd,
			$sql_db
		);

$val = 'SELECT 1 FROM login';
		$validate = mysqli_query($conn, $val);
			if($validate != false)
			{
					$sql_table = "login";
			$credentials = "INSERT INTO $sql_table (username, password)
									VALUES('tutor', 'swinadmin')";
					mysqli_query($conn, $credentials);	
			}

		else {
			$table = "CREATE TABLE login (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				username VARCHAR(40) NOT NULL,
				password VARCHAR(40) NOT NULL)";
			 mysqli_query($conn, $table);
			 $sql_table = "login";
			$credentials = "INSERT INTO $sql_table (username, password)
									VALUES('tutor', 'swinadmin')";
					mysqli_query($conn, $credentials);
				
		}


$username = $password =  "";
$username_err = $password_error = $login_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(empty($_POST["username"])){
        $username_err .= "Please enter username.";
    } else{
        $username = ($_POST["username"]);
    }
	
	if(empty($_POST["password"])){
        $password_err .= "Please enter password.";
    } else{
        $password = ($_POST["password"]);
    }
}


$fetch = "SELECT * FROM login WHERE username = 'tutor' or password = 'swinadmin'";
$result = mysqli_query($conn, $fetch);

if(!$result){
	echo "<p>Something is wrong with ', $fetch, '</p>";
}
else {

		$verify = mysqli_fetch_assoc($result);
		
		if(($username === $verify["username"]) && ($password === $verify["password"])) 
		{
				
			echo 'login confirmed';	
			session_start();
			$_SESSION["loggedin"] = true;
			header("location: ../manage.php");
		}	
	else {
		echo $verify["username"], '<br>';
		echo $verify["password"], '<br>';
		echo $username, '<br>';
		echo $password ,'<br>';
		echo 'login failed';
		$login_err = "Invalid username or password.";
	}
}
mysqli_close($conn);
?>