<?php
	include 'config.php';
	if(isset($_POST["signin"])){
		$first_n = $_POST["fname"];
		$last_n = $_POST["lname"];
		$eaddress = $_POST["eaddr"];
		$password = $_POST["pw"];
		$dob = $_POST["dob"];
		$loc = $_POST["location"];
		$gender = $_POST["gender"];

		try{
			mysqli_query($conn,"INSERT INTO student_users (email_address,password)
			VALUES ('$eaddress','$password')");
		} catch(Exception $e){
			echo "student_users error";
		}
		$result = $conn->prepare("SELECT id FROM student_users WHERE email_address = '$eaddress'");
		$result->execute();
		$x = $result->get_result();
		$y = $x->fetch_all();
		$uid = $y[0][0];
		try{
			mysqli_query($conn,"INSERT INTO student_details (user_id,firstname,lastname,dateofbirth,gender,location)
			VALUES ('$uid','$first_n','$last_n','$dob','$gender','$loc')");
		} catch(Exception $e){
			echo "student_details error";
		}
		header("Location: ../sign-in.php");
	}
?>