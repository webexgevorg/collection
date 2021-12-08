<?php
  
    include "config/con1.php";
    // if($_SESSION['user']){
     
    // }else{
    
    // }
    $user_id=$_SESSION['user'];
  

    if(isset($_POST['post_id'])){

        $post_id=$_POST['post_id'];
        $action=$_POST['action'];
      
       switch($action){
            case 'like':
            
              echo  $sql="INSERT INTO rating_info(post_id,user_id, rating_action,status) VALUE('$post_id','$user_id','$action',1) ON DUPLICATE KEY UPDATE rating_action='like'";
              $_SESSION['public_id']=$user_id;
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
      var_dump($query= mysqli_query($con,$sql));
      $row=mysqli_fetch_assoc($query);
      echo getRating($post_id);
      exit(0);
      
     

    }

    function getRating($id)
    {
      global $conn;
      $rating = array();
      $likes_query = "SELECT COUNT(*) FROM rating_info WHERE post_id = $id AND rating_action='like'";
      $dislikes_query = "SELECT COUNT(*) FROM rating_info 
                WHERE post_id = $id AND rating_action='dislike'";
      $likes_rs = mysqli_query($conn, $likes_query);
      $dislikes_rs = mysqli_query($conn, $dislikes_query);
      $likes = mysqli_fetch_array($likes_rs);
      $dislikes = mysqli_fetch_array($dislikes_rs);
      $rating = [
        'likes' => $likes[0],
        'dislikes' => $dislikes[0]
      ];
      return json_encode($rating);
    }




function getLikes($id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE post_id = $id AND rating_action='like'";
  $rs = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

function getDislikes($id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE post_id = $id AND rating_action='dislike'";
  $rs = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}




  function userLiked($post_id)
    {
      global $con;
      global $user_id;
      $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
            AND post_id=$post_id AND rating_action='like'";
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        return true;
      }else{
        return false;
      }
    }
  function userDisliked($post_id)
    {
      global $con;
      global $user_id;
      $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
            AND post_id=$post_id AND rating_action='like'";
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        return true;
      }else{
        return false;
      }
    }







    $sql_last_publications="SELECT*FROM publications where status=1 order by id desc limit 5";
    $query_publish=mysqli_query($con, $sql_last_publications);
    $posts = mysqli_fetch_all( $query_publish, MYSQLI_ASSOC);

?>