<?php
include 'connect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    // Check if user exists in the author table
    $query = "SELECT * FROM author WHERE user_id = ?";
    $stment = $conn->prepare($query);
    $stment->bind_param("i", $user_id);
    $stment->execute();
    $result = $stment->get_result();

    if ($result->num_rows == 0) {
        $insert_query = "INSERT INTO author(user_id) VALUES(?)";
        $insert_stment = $conn->prepare($insert_query);
        $insert_stment->bind_param("i", $user_id);
        $insert_stment->execute();
        $insert_stment->close();
    
        $stment->execute();
        $result = $stment->get_result();
    }
    $row = $result->fetch_assoc();
    $author_id = $row['author_id'];

    // File Upload to Local Storage
    $post_info = $_POST['message'];
    $is_auction = isset($_POST['is_auction']) ? 1 : 0;

    if (isset($_FILES["image"]["name"])) {
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $address = "../image/" . $image_name;
        move_uploaded_file($image_tmp, $address);

        $store_query = "INSERT INTO post(author_id, post_image, post_information, is_auction)
                        VALUES(?,?,?,?)";
        $store_stment = $conn->prepare($store_query);
        $store_stment->bind_param("isss", $author_id, $address, $post_info, $is_auction);
        if ($store_stment->execute()) {
            header('Location: ../main_page.php');
        } else {
            echo("<script>alert('UPLOAD FAILED :((')</script>");
        }
    } else {
        echo("UH OH");
    }
}
?>
