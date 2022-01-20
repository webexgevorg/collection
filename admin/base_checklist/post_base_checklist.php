<?php
session_start();
include "../../config/con1.php";
include "../../classes/search_table.php";
include "../../classes/pagination.php";

if(isset($_POST['limit']) && isset($_POST['tblName'])){
    $content='';
    $page=1;
    $start=0;
    $limit=$_POST['limit'];
    $tblName=$_POST['tblName'];
    $likes=[];
    $search_value='';
    $actions='';
    $collection_id='';
    
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
    
    Search::$tblName=$tblName;
    
    if(isset($_SESSION['realese_id'])){
        $collection_id=$_SESSION['realese_id'];
        // echo $collection_id;
    }
    else{

    }

    $conditions=array('realese_id'=>$collection_id);
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
                $sql1="SELECT MAX(id) AS 'max_id' FROM base_checklist WHERE realese_id=$collection_id ";
                                                      $res1=mysqli_query($con, $sql1);
                                                      $row1=mysqli_fetch_assoc($res1);
                                                      $max_id=$row1['max_id'];
                $count++;
                $content.="<tr name='' data-id='".$row['id']."'><td class=''>".$count."</td>";
                foreach ($likes as $key => $value) {
                    $content.="<td class=''>". $row[$key]."</td>";
                }
                    $action=" <td class='text-right'>
                    <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                    <a href='#' class='btn btn-link btn-info copy' data-id=".$max_id." name=".$row['id']."><i class='fa fa-copy'></i></a>
                    <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                </td> </tr>";
                
                $content.=$action;
            }
        }
        $arr['tbody']=$content;
        $arr['pagination']=$pagination->pages();

        echo json_encode($arr);               
} 

?>