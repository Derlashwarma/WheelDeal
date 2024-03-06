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
                    <div class="row">
                        <form action="scripts/upload.php" method="post">
                                <div class="row message-div m-2">
                                    <div class="row">
                                        <input type="file" class="from-control-file mt-2" name="image" id="image">
                                    </div>
                                    <fieldset>
                                        <label for="message">Car Information</label>
                                        <textarea name="message" id="message" class="rounded-3" cols="30" rows="1"></textarea>
                                    </fieldset>
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
                $query = "
                SELECT u.user_id, 
                u.username, p.image, p.information 
                FROM users AS u
                LEFT JOIN post AS p
                ON u.user_id=p.user_id
                ORDER BY u.user_id;
                ";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                    echo'
                    <div class="card-div mb-3 shadow bg-body  p-3 rounded-4">
                        <div class="row name-div">
                            '.$row["username"].'
                        </div>
                        <div class="row information-div">
                            '. $row["information"].'
                        </div>
                        <div class="row image-div">
                            <img src="' . $row['image'] . '" alt="Car Image">
                        </div>
                    </div>
                ';
                }
            ?>
        </div>
    </div>
</body>
</html>