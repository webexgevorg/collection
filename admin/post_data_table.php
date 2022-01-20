<?php
session_start();
include "../config/con1.php";
include "../classes/search_table.php";
include "../classes/pagination.php";

if(isset($_POST['limit']) && isset($_POST['tblName'])){
    $content='';
    $page=1;
    $start=0;
    $limit=$_POST['limit'];
    $tblName=$_POST['tblName'];
    $likes=[];
    $search_value='';
    $actions='';
    
    if(isset($_POST['page'])){
        $page = $_POST['page'];
        $search_value=$_POST['search_all'];
        if($_POST['page']>1){
            $start = (($_POST['page']-1)*$limit);
        }else{
            $start=0;
        }
    }
    if(isset($_POST['obj'])){
        $likes=$_POST['obj'];
        $search_value=$_POST['search_all'];
    }
    if(isset($_SESSION['status'])){
        $status=$_SESSION['status'];
        if($status==0){
            $icon='<i class="bi bi-file-earmark-plus" title="Published"></i>';
            $btn_status='btn-success';
            $change_status=1;
        }
        else{
            $icon='<i class="bi bi-file-earmark-minus" title="Unpublished"></i>';
            $btn_status='btn-danger';
            $change_status=0;
        }
    }
    else{
        $status=0;
        $icon='<i class="bi bi-file-earmark-minus"></i>';
        $btn_status='btn-danger';
        $change_status=1;
    }
    Search::$tblName=$tblName;
    if($tblName=='messages_for_change_profile_name'){
        $conditions=array('status'=>0);
    }
    else{
        $conditions=array('status'=>$status);
    }
    $table=Search::DataTableWithSearch($search_value, $conditions, $likes);
    $sql=$table.' LIMIT '.$start.','.$limit.'';
    $query=mysqli_query($con, $sql);
    $query_pagination=mysqli_query($con, $table);

    $pagination= new Pagination();
    $pagination->page=$page;
    $pagination->limit=$limit;
    $pagination->count_rows=mysqli_num_rows($query_pagination);

    $arr=[];
        $count = $start;
        if($table){
            while($row=mysqli_fetch_assoc($query)){
                $count++;
                $content.="<tr name='' data-id='".$row['id']."'><td class=''>".$count."</td>";
                foreach ($likes as $key => $value) {
                    $content.="<td class=''>". $row[$key]."</td>";
                }
                if($tblName=='news'){
                    $action="<td class='text-right d-flex flex-column' data-id='".$row['id']."'>
                                <a href='../news/add_news.php?id=".$row['id']."' class='btn btn-link btn-warning edit' name=''><i class='fa fa-edit'></i></a>
                                <a href='#' class='btn btn-link change-status ".$btn_status."' name='".$change_status."'>".$icon."</a>
                                <a href='#' class='btn btn-link btn-danger remove' data_name=''><i class='fa fa-times'></i></a>
                            </td> </tr>";
                }
                else if($tblName=='publications'){
                    $action="<td class='text-right d-flex flex-column' data-id='".$row['id']."'>
                                <a href='../publications/add_publications.php?id=".$row['id']."' class='btn btn-link btn-warning edit' name=''><i class='fa fa-edit'></i></a>
                                <a href='#' class='btn btn-link change-status ".$btn_status."' name='".$change_status."'>".$icon."</a>
                                <a href='#' class='btn btn-link btn-danger remove' data_name=''><i class='fa fa-times'></i></a>
                            </td> </tr>";
                }
                else if($tblName=='messages_for_change_profile_name'){
                    $action="<td class='text-right'>
                                    <div class='chnge-name text-warning' ><i class='fa fa-edit '></i></div>
                            </td></tr>";
                }
                else if($tblName=='contact_message'){
                    $action="<td class='text-right d-flex flex-column' data-id='".$row['id']."'>
                                <a href='#' id=".$row['id']." class='btn btn-link change-status ".$btn_status."'  name='".$change_status."'>".$icon."</a>
                                <a href='#' class='btn btn-link btn-danger remove' data_name=''><i class='fa fa-times'></i></a>
                            </td></tr>";
                }
                else{}
                $content.=$action;
            }
        }
        $arr['tbody']=$content;
        $arr['pagination']=$pagination->pages();

        echo json_encode($arr);               
} 

?>