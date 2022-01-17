<?php
session_start();
if(isset($_POST['bind_card_id']) && isset($_POST['bind_coll_id'])){
    $bind_card_id=$_POST['bind_card_id'];
    $bind_coll_id=$_POST['bind_coll_id'];
    $_SESSION['card_name']=$_POST['card_name'];
    $_SESSION['bind_coll_id']=$bind_coll_id;
    $_SESSION['bind_card_id']=$bind_card_id;
    echo true;
}
else{
    echo false;
}
?>