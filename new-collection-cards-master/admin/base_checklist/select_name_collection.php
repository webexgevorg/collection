<?php

$sql_n_c="SELECT id, name_of_collection FROM collections";
$result_n_c=mysqli_query($con, $sql_n_c);
while($row=mysqli_fetch_assoc($result_n_c)){
	if(isset($_POST['nnn']) && $row['id']==$_POST['nnn']){
	    echo "ok";
$_SESSION['realese_id']=$_POST['nnn'];
echo $_SESSION['realese_id'];
	echo "<option value='".$row['id']."' name='aa' selected>".$row['name_of_collection']."</option>";

	}
	else{
	if(isset($_SESSION['realese_id']) && $row['id']==$_SESSION['realese_id']){

	echo "<option value='".$row['id']."' name='aa' selected>".$row['name_of_collection']."</option>";
	}
	
	else{

	echo "<option value='".$row['id']."' name='aa'>".$row['name_of_collection']."</option>";
    }
}

}

?>