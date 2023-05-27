<?php
if(isset($_POST['post_id'])){
    if(!empty($_COOKIE["user_id"])){
        $userSQL = "SELECT * FROM users WHERE id = '".$_COOKIE["user_id"]."'";
        $userResult = mysqli_query($conn, $userSQL);
        if($userResult){
            $user = mysqli_fetch_assoc($userResult);

            $sql = "SELECT * FROM user_post_likes WHERE user_id = '".$_COOKIE["user_id"]."' AND post_id = '".$_POST['post_id']."';";

            $result = mysqli_query($conn, $sql);
            if($result->num_rows > 0){
                $sql = "DELETE FROM `user_post_likes` WHERE `user_post_likes`.`user_id` = '".$_COOKIE["user_id"]."' AND `user_post_likes`.`post_id` = '".$_POST['post_id']."';";
                $result = mysqli_query($conn, $sql);
                echo "Dislike";
            }else{
                $sql = "INSERT INTO `user_post_likes` (`id`, `user_id`, `post_id`) VALUES (NULL, '".$_COOKIE["user_id"]."', '".$_POST['post_id']."');";
                $result = mysqli_query($conn, $sql);
                echo "Like";
            }}
        
        }else {
            echo "Please Login";
        }
}

?>