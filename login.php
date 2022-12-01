<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	$con = new mysqli('localhost','root','','testdata');
	if ($con->connect_error) {
		die("failed to connect : ".$con->connect_error);
			
		}else {
			$stmt = $con->prepare("SELECT * FROM `registration` where email= ?");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt_result=$stmt->get_result();
			if ($stmt_result->num_rows > 0) {
				$data = $stmt_result->fetch_assoc();
				if ($data['password']===$password) {
					echo "<h2>Login Successfully</h2>";
					header('Location: home.html');
					
				}else {
					echo "<h2> invald Email or Password </h2>";
					
				}
				
			} else {
				echo "<h2> invald Email or Password </h2>";
				
			}
		}
?>