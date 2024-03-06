<?php
    $query = "
    SELECT
        p.post_id, p.author_id, p.post_image,p.post_information,
        a.author_id,a.user_id,u.username,u.user_id
    FROM users as u
    RIGHT JOIN author AS a
    ON u.user_id = a.user_id
    RIGHT JOIN post AS p
    ON a.author_id = p.author_id
    ORDER BY p.post_id;
        ";
        try{
            $result = mysqli_query($conn,$query);
        }
        catch(Exception $e){
            echo'<div style="width: 100%; text-align: center; color:red;">cannot load, an error has occured</div>';
            return;
        }
        if(mysqli_num_rows($result) == 0){
            echo'<div id="error" style="width: 100%; text-align: center; color:red;">There are '. $result->num_rows .' uploads </div>';
        }
        while($row = mysqli_fetch_assoc($result)){
            echo'
            <div class="card-div mb-3 shadow bg-body  p-3 rounded-4">
                <div class="row name-div">
                    '.$row["username"].'
                </div>
                <div class="row information-div">
                    '. $row["post_information"].'
                </div>
                <div class="row image-div">
                    <img src="data:image/jpeg;based64'.base64_encode($row['post_image']).'" alt="Car Image">
                </div>
            </div>
        ';
        }
?>