<?php
session_start();
include '../connect.php';


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['regis_firstname']) && isset($_POST["regis_lastname"]) &&
       isset($_POST["regis_email"]) && isset($_POST["regis_username"]) &&
       isset($_POST["regis_pass"]) ) {
        //For tbluserprofile
        $firstname = $_POST['regis_firstname'];
        $lastname = $_POST["regis_lastname"];
        $gender = $_POST["regis_gender"];

        //For tbl tbluseraccount
        $email = $_POST["regis_email"];
        $username = $_POST["regis_username"];
        $password = $_POST["regis_pass"];
        $is_admin = $_POST["is_admin"];

        $check_email = "SELECT * FROM tbluseraccount WHERE username=?";
        $stmt_check_email = $conn->prepare($check_email);
        $stmt_check_email->bind_param("s",$username);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if($result_check_email->num_rows >= 1){
            $_SESSION["error"] = "User Email Already Used";
            $stmt_check_email->close();
            header("Location: ../index.php");
            exit();
        }
        else{
            //insert user profile
            $insert_query_profile = "INSERT INTO tbluserprofile (firstname, lastname, gender) VALUES (?, ?, ?)";
            $stmt_insert_query_profile = $conn->prepare($insert_query_profile);
            $stmt_insert_query_profile->bind_param("sss", $firstname, $lastname, $gender);
            
            //insert account profile
            if(!$is_admin){
                $is_admin = 0;
            }
            $insert_query_account = "INSERT INTO tbluseraccount (emailadd, username, password, is_admin, is_user) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert_query_account = $conn->prepare($insert_query_account);
            $is_user = 1; // Assuming $is_user is always 1, as per your original code
            $stmt_insert_query_account->bind_param("sssii", $email, $username, $password, $is_admin, $is_user);

            //execute both
            if($stmt_insert_query_profile->execute() && $stmt_insert_query_account->execute()){
                $_SESSION["success"] = "Registration Successful, you may now Log in your account";
                echo("REGISTRATION SUCCESS... REDIRECTING TO LOGIN PAGE"); 
                header("Location: ../index.php");
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
