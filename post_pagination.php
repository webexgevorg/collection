<?php
session_start();
 include "classes/pagination.php";
 if(isset($_POST['count_rows'])){
    $count_rows=$_POST['count_rows'];
    $pagination= new Pagination();
    $pagination->limit=$_POST['limit'];
    $pagination->count_rows=$count_rows;
    // $pagination->page=$_POST['page'];
        echo $pp= $pagination->pages();
 }




?>