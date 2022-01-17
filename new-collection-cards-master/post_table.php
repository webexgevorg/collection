<?php
session_start();
include "config/con1.php";
include "classes/table.php";
if(isset($_POST['page'])){
    $content='';
    $product=$_SESSION['product'];
    $sport_type=$_SESSION['sport_type'];
    $year_prod=$_SESSION['year_prod'];
    $year=explode('-', $year_prod);
        $before_year=$year[0];
        $after_year=$year[1];

    $conditions=array('sport_type' => $sport_type);
    $tables=new Tables();
    $tables->tblName='collections';
    $tables->limit=5;
    $table=$tables->TableSportYear($con, $before_year, $after_year, $conditions);
    $count = $tables->start;
        if($table){
            while($row=mysqli_fetch_assoc($table)){
                $count++;
                $content.="<tr data-collId='".$row['id']."' class='tr_checklist'>
                    <td>".$count."</td>
                    <td>".$row['name_of_collection']."</td>
                    <td>".$row['year_of_releases']."</td>
                </tr>";
            }
            echo $content;
        }
}

?>