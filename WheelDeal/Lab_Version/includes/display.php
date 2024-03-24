<?php
    $query = "SELECT 
            acc.acctid, acc.username, acc.is_admin, 
            a.author_id, a.acctid,
            p.post_id, p.author_id, p.post_image, p.post_information,
            p.is_auction, p.post_likes, p.is_active
        FROM tbluseraccount AS acc
        RIGHT JOIN author AS a
        ON acc.acctid = a.acctid
        RIGHT JOIN post AS p
        ON a.author_id = p.author_id
        WHERE p.is_active = 1
        ORDER BY p.post_id;
    ";
        $username = $_GET["username"];
        $acctid = $_GET["acctid"];

        try{
            $result = mysqli_query($conn,$query);
        }
        catch(Exception $e){
            echo'<div style="width: 100%; text-align: center; color:red;">cannot load, an error has occured</div>';
        }
        if(mysqli_num_rows($result) == 0){
            echo'<div id="error" style="width: 100%; text-align: center; color:red;">There are no uploads </div>';
        }

        while($row = mysqli_fetch_assoc($result)){
            echo'<div class="card-div mb-3 shadow bg-body p-3 rounded-4">';
            if($isAdmin || $acctid == $row['author_id']){
                echo '
                <div class="delete-btn-container">
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>';
            }
            echo'    <div class="row name-div p-3">
                    '.$row["username"].'
                </div>
                <div class="row information-div p-3">
                    '. $row["post_information"].'
                </div>
                <div class="row image-div">
                    <img src="'.($row['post_image']).'" alt="Car Image">
                </div>';
            include 'likes.php';
            echo'</div>
        ';
        }
?>