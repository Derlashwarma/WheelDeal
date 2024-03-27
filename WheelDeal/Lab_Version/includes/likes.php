<?php
    require '../connect.php';
    $post_id = $_GET['post_id'];
    $acctid = $_GET['acctid'];

    $check_like_exist_query = "SELECT l.isliked, l.acctid, l.post_id, p.author_id, p.post_id 
                                FROM likes AS l
                                INNER JOIN post AS p
                                ON l.post_id = p.post_id
                                WHERE l.post_id = ? 
                                AND l.acctid = ?
                                AND l.isliked = 1";
    $check_like_query = $conn->prepare($check_like_exist_query);
    $check_like_query->bind_param('ii',$post_id,$acctid);
    if($check_like_query->execute()){
        
    }
    $check_like_query->store_result();
    if($check_like_query->num_rows() > 0){
        //run delete query
        echo'Delete Query';
        $remove_like_query = "UPDATE likes SET isliked = 0 WHERE post_id = ? AND acctid = ?";
        $remove_query = $conn->prepare($remove_like_query);
        $remove_query->bind_param('ii',$post_id,$acctid);
        $remove_query->execute();
        $decrement_query = "UPDATE post 
                                SET post_likes = post_likes - 1
                                WHERE post_id = ?";
            $run_decrement = $conn->prepare($decrement_query);
            $run_decrement->bind_param('i',$post_id);
            if($run_decrement->execute()){
                header("Location: ../main_page.php?username=$username&acctid=$acctid");
            }
    }
    else{
        $insert_likes_query = "INSERT INTO likes(post_id,acctid,isliked)
                                VALUES (?,?,?)";
        $insert_like = $conn->prepare($insert_likes_query);
        $isliked = 1;
        $insert_like->bind_param('iii',$post_id,$acctid,$isliked);
        if($insert_like->execute()){
            $increment_query = "UPDATE post 
                                SET post_likes = post_likes + 1
                                WHERE post_id = ?";
            $run_increment = $conn->prepare($increment_query);
            $run_increment->bind_param('i',$post_id);
            if($run_increment->execute()){
                header("Location: ../main_page.php?username=$username&acctid=$acctid");
            }
        }
        echo'Add Query';
    }
?>
