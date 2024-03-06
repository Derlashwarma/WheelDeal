<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required.";
        header("Location: ../index.html");
        exit();
    }

    if (!$conn) {
        $_SESSION['error'] = "Connection failed.";
        header("Location: ../index.html");
        exit();
    }

    $check_username = "SELECT * FROM users WHERE username=?";
    $stmt_check_username = $conn->prepare($check_username);
    $stmt_check_username->bind_param("s", $username);
    $stmt_check_username->execute();
    $res = $stmt_check_username->get_result();

    if ($res->num_rows == 0) {
        $_SESSION["error"] = "No user found.";
        header("Location: ../index.html");
        exit();
    } else {
        $user = $res->fetch_assoc();
        $stored_pass = $user['password'];

        if ($password == $stored_pass) {
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $user["user_id"];
            header("Location: main_page.php");
            exit();
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header("Location: ../index.html");
            exit();
        }
    }
}
?>