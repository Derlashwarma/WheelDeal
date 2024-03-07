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
        
        $check_user = "SELECT * FROM users WHERE username=?";
        $stmt_check_user = $conn->prepare($check_user);
        $stmt_check_user->bind_param("s",$username);
        $stmt_check_user->execute();
        $result_check_user = $stmt_check_user->get_result();

        if($result_check_user->num_rows > 0){
            $_SESSION["error"] = "User Already Used";
            $stmt_check_user->close();
            header("Location: ../index.html");
            echo('alert("USER ALREADY EXIST")');
            exit();
        }
        else{
            $insert_query = "INSERT INTO users (firstname, lastname,email,username,password) 
            VALUES (?,?,?,?,?)";
            $stmt_insert_query = $conn->prepare($insert_query);
            $stmt_insert_query->bind_param("sssss",$firstname,$lastname,$email,$username,$password);

            if($stmt_insert_query->execute()){
                $_SESSION["success"] = "Registration Successful, you may now Log in your account";
                echo('<script>alert("REGISTRATION SUCCESS")</script>');
                header("Location: ../index.html");
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
