
<?php
include "config/con1.php";
$limit=5;
$page=1;
if($_POST['page']>1){
    $start = (($_POST['page']-1)*$limit);
    $page = $_POST['page'];
}else{
    $start=0;

}
$query="SELECT*FROM base_checklist where  realese_id='$_POST[session]' ";

if($_POST['headinp']!=''){
    $query.='AND card_number LIKE "'.str_replace(' ','%',$_POST['headinp']).'%"';
    $query.=' OR card_name LIKE "'.str_replace(' ','%',$_POST['headinp']).'%"';
    $query.=' OR team LIKE "'.str_replace(' ','%',$_POST['headinp']).'%"';
    $query.=' OR parallel LIKE "'.str_replace(' ','%',$_POST['headinp']).'%"';
    $query.=' OR print_run LIKE "'.str_replace(' ','%',$_POST['headinp']).'%"';
}else {


    if ($_POST['cardnumber'] != '') {
        $query .= 'AND card_number LIKE "' . str_replace(' ', '%', $_POST['cardnumber']) . '%"';
    }
    if ($_POST['cardname'] != '') {
        $query .= ' AND card_name LIKE "' . str_replace(' ', '%', $_POST['cardname']) . '%"';
    }
    if ($_POST['team'] != '') {
        $query .= ' AND team LIKE "' . str_replace(' ', '%', $_POST['team']) . '%"';
    }
    if ($_POST['parallel'] != '') {
        $query .= 'AND parallel LIKE "' . str_replace(' ', '%', $_POST['parallel']) . '%"';
    }
    if ($_POST['printrun'] != '') {
        $query .= 'AND print_run LIKE "' . str_replace(' ', '%', $_POST['printrun']) . '%"';
    }
}
$query.=' ORDER BY id ASC ';

$filter_query = $query.' LIMIT '.$start.','.$limit.'';
$query1=mysqli_query($con,$query);



$num = mysqli_num_rows($query1);

$total_data=$num;



$query=mysqli_query($con,$filter_query);
//    $result = $statement->fetchAll();
$output= '<input type="hidden" value="'.$total_data.'">
            
           
             ';

if($total_data>0){

    while($result=mysqli_fetch_assoc($query)) {

        $output.= '
                <tr style="color: rgb(19,57,96)">
                    
                    <td class="text-center id" style="background:#6FA4AE">'.$result["id"].'</td>
                    <td class="text-center cardnumber">'.$result["card_number"].'</td>
                    <td class="text-center cardname">'.$result["card_name"].'</td>
                    <td class="text-center team">'.$result["team"].'</td>
                    <td class="text-center parallel">'.$result["parallel"].'</td>
                    <td class="text-center printrun">'.$result["print_run"].'</td>
                </tr>
                ';
    }

}else{
    $output .='
            <tr>
                <td colspan="2" align="center">No Data Found</td>
            </tr>
        ';

}
$output_footer .='

            <ul class="pagination">
    ';
$total_links=ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

if($total_links>4){
    if($page<5){
        for($count = 1;$count<=5;$count++){

            $page_array[]=$count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
    }else{
        $end_limit=$total_links-5;
        if($page>$end_limit){
            $page_array[] = 1;
            $page_array[] = '...';
            for($count = $end_limit;$count <= $total_links; $count++){
                $page_array[] = $count;
            }

        }else{
            $page_array[] = 1;
            $page_array[] = '...';
            for($count=$page-1;$count<=$page+1;$count++){
                $page_array[]=$count;
            }
            $page_array[] = '...';
            $page_array[] =$total_links;
        }
    }

}else{


    for($count=1;$count<=$total_links;$count++) {
        $page_array[] = $count;
    }
}

//
if($page_array==null){
    echo ' <tr style="color: rgb(19,57,96);font-weight:bold">
                <td colspan="6" align="center">No Data Found</td>
            </tr>';

    ?>
    <!--<script>location.reload(); </scrtipt>-->
    <?php
    die;
}

for ($count = 0; $count < count($page_array); $count++) {
    if ($page == $page_array[$count]) {
        $page_link .= '<li class="page-item active">
                    <a class="page-link" href="#">' . $page_array[$count] . '<span class="sr-only">(current)</span></a>

                </li>';
        $previous_id = $page_array[$count] - 1;
        if ($previous_id > 0) {
            $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a> </li>';

        } else {
            $previous_link = '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
        }
        $next_id = $page_array[$count] + 1;
        if ($next_id >= $total_links) {
            $next_link = '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
        } else {
            $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
        }
    } else {
        if ($page_array[$count] == '...') {
            $page_link .= '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
        } else {
            $page_link .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' .$page_array[$count]. '">' .$page_array[$count]. '</a></li>';
        }

    }
}

$output_footer.=$previous_link.$page_link.$next_link;
echo $output."!".$output_footer;
?>

