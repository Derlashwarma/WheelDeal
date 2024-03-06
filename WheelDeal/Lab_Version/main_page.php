<?php
    include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/main_page.css">
    <title>WHEEL DEAL</title>
</head>
<body>
    <div class="main-page-container container">
        <div class="news-feed-container row">
            <div class="upload-container mb-3 shadow bg-body  p-3 rounded-4">
                <div class="upload-form-container">
                    <div class="row p-2">
                        <label for="message">Upload</label>
                        <form action="scripts/upload.php" method="post">
                            <div class="row message-div">
                                <div class="col-3">
                                    <input class="form-control form-control-lg image-input" id="formFileLg" type="file" name="image">
                                </div>
                                <div class="col">
                                    <textarea placeholder="Car Information" name="message" id="message" class="form-control rounded-3" cols="30" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="button-div mt-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-div mb-3 shadow bg-body  p-3 rounded-4">
                <div class="row name-div">
                    username
                </div>
                <div class="row information-div">
                    This is where the information of the car is found
                </div>
                <div class="row image-div">
                    The photo is found here adn
                </div>
            </div>
            <?php
            include 'scripts/display.php'
            ?>
        </div>
    </div>
</body>
</html>