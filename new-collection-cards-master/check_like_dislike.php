<?php
session_start();
    include "config/con1.php";

         
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }
     
    if( isset($_POST['action'])){
            $action=$_POST['action'];
            $post_id=$_POST['post_id'];

            function getRating($id){
             
                global $con;
                $rating= array();
                $likes_query="SELECT  COUNT(*) FROM rating_info WHERE post_id ='$id' and rating_action='like'";
                $dislikes_query="SELECT  COUNT(*) FROM rating_info WHERE post_id ='$id' and rating_action='dislike'";
              
                $likes_rs=mysqli_query($con,$likes_query);
                $dislikes_rs=mysqli_query($con,$dislikes_query);

                $likes = mysqli_fetch_array($likes_rs);
            
                $dislikes= mysqli_fetch_array($dislikes_rs);
                
                $rating=[
                    'likes' => $likes[0],
                    'dislikes' => $dislikes[0]
                ];
            return json_encode($rating);
            }

            switch($action){
                case 'like':
                   $sql="INSERT INTO rating_info(post_id,user_id, rating_action) VALUE('$post_id','$user_id','$action') ON DUPLICATE KEY UPDATE rating_action='like'";
                    break;
                case 'dislike':
                   $sql="INSERT INTO rating_info(post_id,user_id, rating_action) VALUE('$post_id','$user_id','$action') ON DUPLICATE KEY UPDATE rating_action='dislike'";
                    break;
                
                case 'unlike':
                  $sql="DELETE FROM rating_info WHERE user_id='$user_id' and  post_id='$post_id'";
                    break;
                case 'undislike':
                     $sql="DELETE FROM rating_info WHERE user_id='$user_id' and  post_id='$post_id'";
                        break;
                default:
                break;
            }
                mysqli_query($con,$sql);
               
                echo getRating($post_id);
                exit(0);

    }
} 
 else{
        echo "10";
    }
    
?>