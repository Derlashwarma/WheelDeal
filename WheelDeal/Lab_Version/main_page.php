<?php
    include 'connect.php';
    session_start();
    $username = $_GET["username"];
    
    $checkIfAdminQuery = "SELECT * FROM tbluseraccount WHERE username = ? AND is_admin = 1";
    $checkIfAdmin = $conn->prepare($checkIfAdminQuery);
    $checkIfAdmin->bind_param("s",$username);
    $checkIfAdmin->execute();
    $result = $checkIfAdmin->get_result()->fetch_assoc();
    $isAdmin = null;
    if($result){
        $isAdmin = $result["is_admin"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main_page.css">
    <link rel="stylesheet" href="css/like_btn.css">
    <title>WHEEL DEAL</title>
</head>
<body>
    <div class="nav shadow floating-nav rounded-4 navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container element-container">
            <div class="name-container p-2 text-center">
                <h1>
                    <?php
                        echo($username);
                    ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="main-page-container container">
        <div class="news-feed-container row">
            <div class="upload-container mb-3 shadow bg-body  p-3 rounded-4">
                <div class="upload-form-container">
                    <div class="row p-2">
                        <label for="message">Upload</label>
                        <form method="post" action="includes/upload.php?username=<?php echo htmlspecialchars(urlencode($username)); ?>&acctid=<?php echo htmlspecialchars(urlencode($acctid)); ?>" enctype="multipart/form-data">
                            <div class="row message-div">
                                <div class="col-3 form-group">
                                    <input class="form-control form-control-lg image-input" accept=".jpg, .jpeg, .png" type="file" id="image" name="image">
                                </div>
                                <div class="col">
                                    <textarea placeholder="Car Information" name="message" id="message" class="form-control rounded-3" cols="30" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="checkbox" value="true" id="flexCheckIndeterminate" name="is_auction">
                                <label class="form-check-label" for="flexCheckIndeterminate">Is Auction?</label>
                            </div>
                            <div class="button-div mt-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_GET['username']) && isset($_GET['acctid'])) {
                include 'includes/display.php';
            }
            ?>
        </div>
    </div>
</body>
</html>