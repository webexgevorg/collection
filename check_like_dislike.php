<?php
    include "config/con1.php";
    // session_start();
    $user_id=$_SESSION['user'];
     $sql = "SELECT *FROM publications WHERE status = 1";
     $rezult = mysqli_query($con,$sql);
     $post = mysqli_fetch_all($rezult);
    // echo $_SESSION['user'];
    
    if( isset($_POST['action'])){
        // echo ($_POST['action']);
        // if(isset($_SESSION['user'])){
           
            // function getRating($id){
             
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
            //    $rating= array("likes"=>10,"dislike"=>1);
               
            //    var_dump($rating);
            echo json_encode($rating);
            // }
            
          
            $action=$_POST['action'];
            $post_id=$_POST['post_id'];
         
            switch($action){
                case 'like':
                  echo  $sql="INSERT INTO rating_info(post_id,user_id, rating_action) VALUE('$post_id','$user_id','$action') ON DUPLICATE KEY UPDATE rating_action='like'";
                    break;
                case 'dislike':
                   $sql="INSERT INTO rating_info(post_id,user_id, rating_action) VALUE('$post_id','$user_id','$action') ON DUPLICATE KEY UPDATE rating_action='dislike'";
                    break;
                
                case 'unlike':
                echo  $sql="DELETE FROM rating_info WHERE user_id='$user_id' and  post_id='$post_id'";
                    break;
                case 'undislike':
                     $sql="DELETE FROM rating_info WHERE user_id='$user_id' and  post_id='$post_id'";
                        break;
                default:
                break;
            }
                mysqli_query($con,$sql);
               
                // echo getRating($post_id);
                // exit(0);

                // Get total number of likes for a particular post
                function getLikes($id)
                {
                global $con;
                $sql = "SELECT COUNT(*) FROM rating_info 
                        WHERE post_id = $id AND rating_action='like'";
                $rs = mysqli_query($con, $sql);
                $result = mysqli_fetch_array($rs);
                return $result[0];
                }

            //     // Get total number of dislikes for a particular post
                function getDislikes($id)
                {
                global $con;
                $sql = "SELECT COUNT(*) FROM rating_info 
                        WHERE post_id = $id AND rating_action='dislike'";
                $rs = mysqli_query($con, $sql);
                $result = mysqli_fetch_array($rs);
                return $result[0];
                }


                
               
            

        // }
        // else{
        //     echo "<script>location.href='./login-register.php'; </script>";
        // }
        
      
        

        // echo $post_id.$action;
    }
   
    
?>