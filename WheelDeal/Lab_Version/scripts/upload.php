<?php
    include 'connect.php';
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $user_id = $_SESSION['user_id'];
        
        //Check if user exist in author table
        try{
            $query = "SELECT * FROM author WHERE user_id = ?";
            $stment = $conn->prepare($query);
            $stment->bind_param("i",$user_id);
            $stment->execute();
        }
        catch(Exception $e){
            echo'<script>alert("GO BACK TO PREVIOUS PAGE AN ERROR HAS OCCURED")</script>';
            return;
        }
        $result = $stment->get_result();

        if($result->num_rows == 0){
            $insert_query = "INSERT INTO author(user_id) VALUES(?)";
            $insert_stment = $conn->prepare($insert_query);
            $insert_stment->bind_param("i",$user_id);
            try{
                $insert_stment->execute();
            }
            catch(Exception $e){
                echo'<script>alert("AN ERROR OCCURED IN INSERTING AUTHOR")</script>';
            }
            $insert_stment->close();
        }
        
        //File Upload to Local Storage
        $row = $result->fetch_assoc();
        $author_id = $row['author_id'];
        $post_info = $_POST['message'];
        $is_auction = isset($_POST['is_auction'])?1:0;

        if(isset($_FILES["image"])) {
            $file_name = $_FILES["image"]['name'];
            echo 'File name: ' . $file_name;
        } else {
            echo '$_FILES["image"] is not set';
        }
        $file_name = $_FILES["image"]['name'];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./image/" . $file_name;
        if(move_uploaded_file($tempname, $folder)){
            echo'success';
        }
        else{
            echo'failed';
        }
        //header('Location: ../main_page.php');
    }
?>