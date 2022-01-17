<?php
include "config/con1.php";
include "classes/pagination.php";
include "classes/search_table.php";
 
 
 if(isset($_POST['obj'])){
    $limit=$_POST['limit'];
    $coll_id=$_POST['coll_id'];
    $checklist_name=$_POST['checklist_name'];
    $page=1;
    $start=0;
    $count=0;
    $conditions=$_POST['obj'];
    Search::$tblName=$checklist_name;
    Search::$collId=$coll_id;

    if(isset($_POST['page'])){
        $page = $_POST['page'];
        if($_POST['page']>1){
            $start = (($_POST['page']-1)*$limit);
            
        }else{
            $start=0;
       
        }
    }

    if(isset($_POST['search_all']) && !empty($_POST['search_all'])){

        $search_value=$_POST['search_all'];
        $AllSearch=Search::AllSearch($search_value, $conditions);
        $AllSearch_limit=$AllSearch.' LIMIT '.$start.','.$limit.'';
        $query=mysqli_query($con, $AllSearch);
        $query_limit=mysqli_query($con, $AllSearch_limit);
    }
    else{
       
        $MultipleSearch=Search::MultipleSearch($conditions);
        $MultipleSearch_limit=$MultipleSearch.' LIMIT '.$start.','.$limit.'';
        $query=mysqli_query($con, $MultipleSearch);
        $query_limit=mysqli_query($con, $MultipleSearch_limit);
    }
    
    
    $pagination= new Pagination();
    $pagination->page=$page;
    $pagination->limit=$limit;
    $pagination->count_rows=mysqli_num_rows($query);

$arr=[];
$p='';
$a= "<tr id='num-rows' type='hidden' data-rows='".mysqli_num_rows($query)."'></tr>";
                                                while($tox=mysqli_fetch_assoc($query_limit)){
                                                    $start++;

                                          $p.="
                                                <tr>
                                                  <td>".$start."<input class='row-id' type='hidden' value='".$tox['id']."'/></td>
                                                  <td><input type='checkbox' class='check-card'></td>
                                                  <td class='card_number'>".$tox['card_number']."</td>
                                                  <td class='card_name'>".$tox['card_name']."</td>
                                                  <td class='team'>".$tox['team']."</td>
                                                  <td class='parallel'>".$tox['parallel']."</td>
                                                  <td class='print_run'>".$tox['print_run']."</td>
                                                </tr>";
                                        }
                                        $arr['tbody']=$a.$p;
                                        $arr['pagination']=$pagination->pages();
echo json_encode($arr) ;                 

 }

?>