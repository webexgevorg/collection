<?php
session_start();
include "config/con1.php";
if(!empty($_POST['checklist_type']) && !empty($_POST['checklist_id'])){
    $checklist_type=$_POST['checklist_type'];
    $checklist_id=$_POST['checklist_id'];
    $event=$_POST['event'];
    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
        if(!empty($_SESSION['user'])){
            $user_id=$_SESSION['user'];
        }
    }
    if(isset($user_id)){
        $sql_fvorite="SELECT id FROM favorite_checklists WHERE user_id=$user_id and checklist_id=$checklist_id and checklist_type='$checklist_type'";
        $favorite_query=mysqli_query($con, $sql_fvorite);
        $num_row_favorite=mysqli_num_rows($favorite_query);
        if($num_row_favorite>0){
            if(!empty($event)){
                // --------- from click -----------
                echo 'click-favorite';
            }
            else{
                // ---------- from window load -----------
                echo 'lode-favorite';
            }
            
        }
        else{
            if(!empty($event)){
                // --------- from click -----------
                $insert="INSERT INTO favorite_checklists (user_id, checklist_id, checklist_type) VALUES ($user_id, $checklist_id, '$checklist_type')";
                if(mysqli_query($con, $insert)){
                    echo 'insert-favorite';
                }
            }
            else{
                // ---------- from window load -----------
                echo 'lode-dontfavorite';
            }
        }
        
    }
    else{
        if(!empty($event)){
            // --------- from click -----------
            echo 'click-dontlogin';
        }
        else{
            // ---------- from window load -----------
            echo 0;
        }
        
    }
}
else{
    echo 0;
}

?>