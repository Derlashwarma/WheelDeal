<?php
                $query = "
                SELECT p.post_id, u.user_id, 
                u.username, p.image, p.information 
                FROM users AS u
                RIGHT JOIN post AS p
                ON u.user_id=p.user_id
                ORDER BY p.post_id DESC;
                ";
                try{
                    $result = mysqli_query($conn,$query);
                }
                catch(Exception $e){
                    echo'<div style="width: 100%; text-align: center; color:red;">cannot load, an error has occured</div>';
                    return;
                }
                if(mysqli_num_rows($result) == 0){
                    echo'<div style="width: 100%; text-align: center; color:red;">There is nothing to load</div>';
                }
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
                            <img src="data:image/jpeg;based64'.base64_encode($row['image']).'" alt="Car Image">
                        </div>
                    </div>
                ';
                }
            ?>