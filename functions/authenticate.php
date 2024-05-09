<?php
session_start();
include 'config.php';

if(isset($_POST["signin"])){
    $eaddress = $_POST["email"];
    $pass = $_POST["password"];
    
    // Prevent SQL injection
    $eaddress = $conn->real_escape_string($eaddress);
    $pass = $conn->real_escape_string($pass);
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM student_users WHERE email_address=? AND password=?");
    $stmt->bind_param("ss", $eaddress, $pass);
    $stmt->execute();
    $result_u = $stmt->get_result();
    
    if($result_u->num_rows > 0){ // normal users
        $row = $result_u->fetch_assoc();
        $ead = $row['email_address'];
        $idd = intval($row['id']);
        $_SESSION['username'] = $ead;
        $_SESSION['uid'] = $idd;
        $_SESSION['type'] = 'student';
        $stmt->close();
        header("Location: ../index.php");
    }
    
    // Check in company_users table
    $stmt = $conn->prepare("SELECT * FROM company_users WHERE email_address=? AND password=?");
    $stmt->bind_param("ss", $eaddress, $pass);
    $stmt->execute();
    $result_c = $stmt->get_result();
    
    if($result_c->num_rows > 0){ // company
        $row = $result_c->fetch_assoc();
        $ead = $row['email_address'];
        $idd = intval($row['id']);
        $_SESSION['company'] = $ead;
        $_SESSION['uid'] = $idd;
        $_SESSION['type'] = 'company';
        $stmt->close();
        header("Location: ../index.php");
    }
    
    // Invalid credentials
    echo "Invalid email address or password";
}

?>
