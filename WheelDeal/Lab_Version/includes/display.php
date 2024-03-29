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
        ORDER BY p.post_id DESC;
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

        ?>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo
            '
            <div class="delete-post bg-body rounded-4 mb-3 shadow p-3 " id="post-'.$row['post_id'].'">
                <div class="confirm-message">
                    Are you sure you want to remove post?
                </div>
                <div class="choice-container container d-flex justify-content-center">
                    <div class="btn-no btn btn-outline-primary m-2" id="no-'.$row['post_id'].'">
                        No
                    </div>
                    <a href="/includes/delete_post.php?post_id='.$row['post_id'].'&username='.$username.'&acctid='.$acctid.'" class="btn-yes btn btn-danger m-2">Yes</a>
                </div>
            </div>
            ';
            //scripts for like and delete
            echo
                ('
                    <script>
                    $(document).ready(function(){
                                
                        document.getElementById("no-'.$row['post_id'].'").addEventListener("click", function(){
                            document.getElementById("post-'.$row['post_id'].'").style.display="none";
                        })  
                    })
                    </script>
                ');
            echo'<div class="card-div mb-3 shadow bg-body p-3 rounded-4">';
            if($isAdmin || $acctid == $row['acctid']){
                echo '
                <div class="delete-btn-container">
                    <button type="button" id="delete-post-'.$row['post_id'].'" class="position-absolute btn-close" aria-label="Close"></button>
                </div>';
                echo
                ('
                    <script>
                    document.getElementById("delete-post-'.$row['post_id'].'").addEventListener("click", function(){
                        if(document.getElementById("post-'.$row['post_id'].'").style.display=="block"){
                            document.getElementById("post-'.$row['post_id'].'").style.display="none";
                        }
                        else{
                            document.getElementById("post-'.$row['post_id'].'").style.display="block";
                        }
                    })
                    </script>
                ');
            }
            echo'    <div class="row name-div">
                    <p class="h5">'.$row["username"].'</p>
                    </div>
                <div class="row information-div p-3">
                    '. $row["post_information"].'
                </div>
                <div class=" image-div">
                    <img src="'.($row['post_image']).'" alt="Car Image">
                </div>';
            echo '
            <div>
                <div class="like-count p-2">
                    '.$row["post_likes"].'
                    Likes
                </div>
                    <a href="/includes/likes.php?post_id='.$row['post_id'].'&username='.$username.'&acctid='.$acctid.'" class="like-btn pt-2 pb-2 rounded btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </a>
            </div>
            ';
            echo'</div>
        ';
        }
?>