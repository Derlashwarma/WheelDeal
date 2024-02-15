<?php
session_start();
include 'connect.php';


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['regis_firstname']) && isset($_POST["regis_lastname"]) &&
       isset($_POST["regis_email"]) && isset($_POST["regis_username"]) &&
       isset($_POST["regis_pass"])) {
        $firstname = $_POST['regis_firstname'];
        $lastname = $_POST["regis_lastname"];
        $email = $_POST["regis_email"];
        $username = $_POST["regis_username"];
        $password = $_POST["regis_pass"];

        if(!$conn){
            die("Connection Failed");
        }
        
        $check_email = "SELECT * FROM users WHERE email=?";
        $stmt_check_email = $conn->prepare($check_email);
        $stmt_check_email->bind_param("s",$email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if($result_check_email->num_rows > 0){
            $_SESSION["error"] = "User Email Already Used";
            $stmt_check_email->close();
            header("Location: index.php");
            exit();
        }
        else{
            $insert_query = "INSERT INTO users (firstname, lastname,email,username,password) 
            VALUES (?,?,?,?,?)";
            $stmt_insert_query = $conn->prepare($insert_query);
            $stmt_insert_query->bind_param("sssss",$firstname,$lastname,$email,$username,$password);

            if($stmt_insert_query->execute()){
                $_SESSION["success"] = "Registration Successful, you may now Log in your account";
                header("Location: index.php");
            }
            else{
                echo("<script>alert('REGISTRATION FAILED')</script>");
            }
        }
        
        $stmt_insert_query->close();
        $conn->close();
    }
    else{
        die("Connection Failed");
    }
}
?>
