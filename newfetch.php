<?php
include "config/con1.php";
$limit=10;
$page=1;
if($_POST['page']>1){
    $start = (($_POST['page']-1)*$limit);
    $page = $_POST['page'];
}else{
    $start=0;

}
$query="SELECT*FROM base_checklist where  realese_id='$_POST[session]' ";
if($_POST['cardnumber']!=''){
    $query.='AND card_number LIKE "'.str_replace(' ','%',$_POST['cardnumber']).'%"';
}
if($_POST['cardname']!=''){
    $query.=' AND card_name LIKE "'.str_replace(' ','%',$_POST['cardname']).'%"';
}
if($_POST['team']!=''){
    $query.=' AND team LIKE "'.str_replace(' ','%',$_POST['team']).'%"';
}
if($_POST['parallel']!=''){
    $query.='AND parallel LIKE "'.str_replace(' ','%',$_POST['parallel']).'%"';
}
if( $_POST['printrun']!=''){
    $query.='AND print_run LIKE "'.str_replace(' ','%',$_POST['printrun']).'%"';
}

$query.=' ORDER BY id ASC ';

$filter_query = $query.' LIMIT '.$start.','.$limit.'';
$query1=mysqli_query($con,$query);



$num = mysqli_num_rows($query1);

$total_data=$num;



$query=mysqli_query($con,$filter_query);
$output='';
    while($result=mysqli_fetch_assoc($query)) {

        $output.= '
                    <tr>
                        <td class="text-center">'.$result["id"].'</td>
                        <td class="text-center">'.$result["card_number"].'</td>
                        <td class="text-center">'.$result["card_name"].'</td>
                        <td class="text-center">'.$result["team"].'</td>
                        <td class="text-center">'.$result["parallel"].'</td>
                        <td class="text-center">'.$result["print_run"].'</td>
                    </tr>
                    ';
    }



    $pp='';

//for($i=0;$i<$num;$i++){
//   $pp.='<a href="javascript:void(0)?page='.$i.'">'.$i.'</a>';
//}

echo $output."*".$pp;

?>
