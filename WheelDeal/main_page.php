<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelDeal</title>
</head>
<body>
    <div class="main-container">
        <div class="display-name">
            <p class="name-container"></p>
            <p><br><br><br><br><br><br><br><br><br><br></p>
            <p class="id-display"></p>
        </div>
    </div>
    <?php 
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['user_id'])){
        $username = $_SESSION['username'];
        $id = $_SESSION['user_id'];
        
        echo "<script>document.querySelector('.id-display').textContent= '$id';</script>";
        echo "<script>document.querySelector('.name-container').textContent= '$username';</script>";
    } else {
        echo "Session variables not set.";
    }
    ?>
</body>
</html>
