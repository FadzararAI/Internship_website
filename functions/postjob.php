<?php

include 'config.php';
session_start();
$user_id = intval($_SESSION["uid"]);

$result = $conn->prepare("SELECT name FROM company WHERE id = $user_id");
$result->execute();
$x = $result->get_result();
$y = $x->fetch_all();
$c_name = $y[0][0];

	if(isset($_POST["post"])){
		$title = $_POST["jobtitle"];
		$location = $_POST["location"];
		$jtype = $_POST["job-type"];
		$salary = $_POST["salary"];
		$jfield = $_POST["type"];
		$bonuses = $_POST["bonuses"];
		$reps = $_POST["responb"];
		$quals = $_POST["quals"];
		$duration = $_POST["duration"];

		$bns = "";
		$rps = "";
		$qls = "";

		foreach($bonuses as $x){
			$bns .= $x . ";";
		}
		foreach($reps as $x){
			$rps .= $x . ";";
		}
		foreach($quals as $x){
			$qls .= $x . ";";
		}
		mysqli_query($conn,"INSERT INTO job_details (company_name,company_id,title,location,job_kind,type,salary,bonuses,responsibilities,qualifications,duration)
			VALUES ('$c_name','$user_id','$title','$location','$jtype','$jfield','$salary','$bns','$rps','$qls','$duration')");

	}
?>
