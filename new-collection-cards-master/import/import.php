<?php
include 'import_excel/vendor/autoload.php';
include "../config/con1.php";
//$connect = new PDO("mysql:host=localhost;dbname=collection", "collection", "collection@2020");
$connect = new PDO("mysql:host=localhost;dbname=collection", "root", "");
$message='';
$err_msg='';
/*if(isset($_POST['name-collection'])){
	$name_collection = mysqli_real_escape_string($con, $_POST['name-collection']);
	if($name_collection){
		$user_id = mysqli_real_escape_string($con, $_POST['user_id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name-collection']);
		$description	 = mysqli_real_escape_string($con, $_POST['description']);
		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = '../img/'.$name2;

		$t1 = mysqli_real_escape_string($con, $_POST['title1']);
		$t2 = mysqli_real_escape_string($con, $_POST['title2']);
		$t3 = mysqli_real_escape_string($con, $_POST['title3']);
		if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
			move_uploaded_file($tmp, $chanaparh);
			$sql = "INSERT INTO `custom_name_checklist`
			(`user_id`, `name_of_checklist`, `description`, `image`, `title1`, `title2`, `title3`) 
			VALUES 
			('$user_id','$name_collection','$description','$name2','$t1','$t2','$t3')";
			$query = mysqli_query($con, $sql);
			$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
			$resid = mysqli_query($con, $sqlid);
			$tox = mysqli_fetch_assoc($resid);
			$cid = $tox['id'];
			if($_FILES["import_excel"]["name"] != '')
{



		
		// if($size <= 200){
		

   
	$allowed_extension = array('xls', 'csv', 'xlsx', 'ods');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name ='import_excel/upload/'. time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
		

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$data = $spreadsheet->getActiveSheet()->toArray();
        $c=0;
       
		//foreach($data as $row)
		 for($row=1; $row<count($data); $row++)
		{
           $c++ ;
           	$base_checklist = array();
           	$rid = array();
           	$sport_type = array();
           	$card_number = array();
           	$card_name = array();
           	$team = array();
           	$set_type = array();
           	$parallel = array();
           	$print_run =array();
           	$description1 =array();
           	$description2 =array();
           	$description3 =array();
           	
            if($data[$row][8]==''){
            	$description1=" ";
            }
            else{
            	$description1=$data[$row][8];
            }
            if($data[$row][9]==''){
            	$description2=" ";
            }
            else{
            	$description2=$data[$row][9];
            }
            if($data[$row][10]==''){
            	$description3=" ";
            }
            else{
            	$description3=$data[$row][10];
            }
            $base_checklist_name[$row] = trim(strtolower($data[$row][0]));
				$sel_base = "SELECT * FROM `collections` WHERE TRIM(LOWER(name_of_collection))='$base_checklist_name[$row]' GROUP BY name_of_collection";
				$res_base = mysqli_query($con, $sel_base);
				while($tox=mysqli_fetch_assoc($res_base)){
					$base_checklist = $tox['name_of_collection'];
					$sport_type = $tox['sport_type'];
					$rid = $tox['id'];
				}

			$card_number1[$row] = trim(strtolower($data[$row][2]));
				$sel_card_number = "SELECT card_number FROM `base_checklist` WHERE TRIM(LOWER(card_number))='$card_number1[$row]' GROUP BY card_number";
				$res_card_number = mysqli_query($con, $sel_card_number);
				while($tox=mysqli_fetch_assoc($res_card_number)){
					$card_number = $tox['card_number'];
				}

			$card_name1[$row] = trim(strtolower($data[$row][3]));
				$sel_card_name = "SELECT card_name FROM `base_checklist` WHERE TRIM(LOWER(card_name))='$card_name1[$row]' GROUP BY card_name";
				$res_card_name = mysqli_query($con, $sel_card_name);
				while($tox=mysqli_fetch_assoc($res_card_name)){
					$card_name = $tox['card_name'];
				}


			$team1[$row] = trim(strtolower($data[$row][4]));
				$sel_team = "SELECT team FROM `base_checklist` WHERE TRIM(LOWER(team))='$team1[$row]' GROUP BY team";
				$res_team = mysqli_query($con, $sel_team);
				while($tox=mysqli_fetch_assoc($res_team)){
					$team = trim($tox['team']);
				}

			$set_type1[$row] = trim(strtolower($data[$row][5]));
				$sel_set_type = "SELECT set_type FROM `base_checklist` WHERE TRIM(LOWER(set_type))='$set_type1[$row]' GROUP BY set_type";
				$res_set_type = mysqli_query($con, $sel_set_type);
				while($tox=mysqli_fetch_assoc($res_set_type)){
					$set_type = $tox['set_type'];
				}

			$parallel1[$row] = trim(strtolower($data[$row][6]));
				$sel_parallel = "SELECT parallel FROM `base_checklist` WHERE TRIM(LOWER(parallel))='$parallel1[$row]' GROUP BY parallel";
				$res_parallel = mysqli_query($con, $sel_parallel);
				while($tox=mysqli_fetch_assoc($res_parallel)){
					$parallel = $tox['parallel'];
				}

			if($data[$row][7]==''){
            	$print_run="";
            }
            else{
            	$print_run[$row] = trim(strtolower($data[$row][7]));
				$sel_print_run = "SELECT print_run FROM `base_checklist` WHERE TRIM(LOWER(print_run))='$print_run[$row]' GROUP BY print_run";
				$res_print_run = mysqli_query($con, $sel_print_run);
				while($tox=mysqli_fetch_assoc($res_print_run)){
					$print_run = $tox['print_run'];
				}
            }
           // echo $base_checklist." ".$rid." ".$sport_type." ".$card_number." ".$card_name." ".$team." ".$set_type." ".$parallel." ".$print_run."<br>";
            @$select = "SELECT * FROM `base_checklist` WHERE TRIM(LOWER(`realese_id`))='$rid' AND TRIM(LOWER(set_type))='$set_type' AND TRIM(LOWER(card_number))='$card_number' AND TRIM(LOWER(card_name))='$card_name' AND TRIM(LOWER(`team`))='$team' AND TRIM(LOWER(parallel))='$parallel' AND TRIM(LOWER(print_run))='$print_run'";
            $result = mysqli_query($con, $select);
            if($result){
            	$roww = mysqli_num_rows($result);
            	if($roww==0){
            		$tox = $row+1;
            		$err_msg = '<div class="alert alert-warning">Error on line '.$tox.'</div>';
            	}else{
            		$tox = mysqli_fetch_assoc($result);
					$card_number0	=	$tox['card_number'];
					$card_name0		=	$tox['card_name'];
					$team0			=	$tox['team'];
					$set_type0		=	$tox['set_type'];
					$parallel0		=	$tox['parallel'];
					$print_run0		=	$tox['print_run'];
					$query = "
					INSERT INTO `custom_checklist`(`cid`, `rid`, `base_checklist_name`, `sport_type`, `card_number`, `card_name`, `team`, `set_type`, `parallel`, `print_run`, `description1`, `description2`, `description3`)
					 VALUES ('$cid','$rid','$base_checklist','$sport_type','$card_number0','$card_name0','$team0','$set_type0','$parallel0','$print_run0','$description1','$description2','$description3')";
	             
            		$statement = mysqli_query($con, $query);
					if($statement){
						$message='<div class="alert alert-success">Successfully added</div>';
					}
					else{
						$message="statement toxum";
					}
            	}
            }else{
            	$message="error toxum";
            }
            
            
    
			 
			
		}
		// $message = '<div class="alert alert-success">Data Imported Successfully</div>';

	}
	else
	{
		$message = '<div class="alert alert-danger">Only .xls .csv .ods or .xlsx file allowed</div>';
	}
}
else
{
	$message = '<div class="alert alert-danger">Please Select File</div>';
}


		}else{
			$message = '<div class="alert alert-danger">Only .png .jpg or .jpeg file allowed</div>';
		}


	}else{
		$message = '<div class="alert alert-danger">Please fill in <b>Name of collection</b> field</div>'; 
	}
}*/
$allowed_extension = array('xls', 'csv', 'xlsx', 'ods');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name ='import_excel/upload/'. time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
		

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$data = $spreadsheet->getActiveSheet()->toArray();
        $c=0;
       
		//foreach($data as $row)
		 for($row=1; $row<count($data); $row++)
		{
           $c++ ;
           	$base_checklist = array();
           	$rid = array();
           	$sport_type = array();
           	$card_number = array();
           	$card_name = array();
           	$team = array();
           	$set_type = array();
           	$parallel = array();
           	$print_run =array();
           	$description1 =array();
           	$description2 =array();
           	$description3 =array();
           	
            if($data[$row][8]==''){
            	$description1=" ";
            }
            else{
            	$description1=$data[$row][8];
            }
            if($data[$row][9]==''){
            	$description2=" ";
            }
            else{
            	$description2=$data[$row][9];
            }
            if($data[$row][10]==''){
            	$description3=" ";
            }
            else{
            	$description3=$data[$row][10];
            }
            $base_checklist_name[$row] = trim(strtolower($data[$row][0]));
				$sel_base = "SELECT * FROM `collections` WHERE TRIM(LOWER(name_of_collection))='$base_checklist_name[$row]' GROUP BY name_of_collection";
				$res_base = mysqli_query($con, $sel_base);
				while($tox=mysqli_fetch_assoc($res_base)){
					$base_checklist = $tox['name_of_collection'];
					$sport_type = $tox['sport_type'];
					$rid = $tox['id'];
				}

			$card_number1[$row] = trim(strtolower($data[$row][2]));
				$sel_card_number = "SELECT card_number FROM `base_checklist` WHERE TRIM(LOWER(card_number))='$card_number1[$row]' GROUP BY card_number";
				$res_card_number = mysqli_query($con, $sel_card_number);
				while($tox=mysqli_fetch_assoc($res_card_number)){
					$card_number = $tox['card_number'];
				}

			$card_name1[$row] = trim(strtolower($data[$row][3]));
				$sel_card_name = "SELECT card_name FROM `base_checklist` WHERE TRIM(LOWER(card_name))='$card_name1[$row]' GROUP BY card_name";
				$res_card_name = mysqli_query($con, $sel_card_name);
				while($tox=mysqli_fetch_assoc($res_card_name)){
					$card_name = $tox['card_name'];
				}


			$team1[$row] = trim(strtolower($data[$row][4]));
				$sel_team = "SELECT team FROM `base_checklist` WHERE TRIM(LOWER(team))='$team1[$row]' GROUP BY team";
				$res_team = mysqli_query($con, $sel_team);
				while($tox=mysqli_fetch_assoc($res_team)){
					$team = trim($tox['team']);
				}

			$set_type1[$row] = trim(strtolower($data[$row][5]));
				$sel_set_type = "SELECT set_type FROM `base_checklist` WHERE TRIM(LOWER(set_type))='$set_type1[$row]' GROUP BY set_type";
				$res_set_type = mysqli_query($con, $sel_set_type);
				while($tox=mysqli_fetch_assoc($res_set_type)){
					$set_type = $tox['set_type'];
				}

			$parallel1[$row] = trim(strtolower($data[$row][6]));
				$sel_parallel = "SELECT parallel FROM `base_checklist` WHERE TRIM(LOWER(parallel))='$parallel1[$row]' GROUP BY parallel";
				$res_parallel = mysqli_query($con, $sel_parallel);
				while($tox=mysqli_fetch_assoc($res_parallel)){
					$parallel = $tox['parallel'];
				}

			if($data[$row][7]==''){
            	$print_run="";
            }
            else{
            	$print_run[$row] = trim(strtolower($data[$row][7]));
				$sel_print_run = "SELECT print_run FROM `base_checklist` WHERE TRIM(LOWER(print_run))='$print_run[$row]' GROUP BY print_run";
				$res_print_run = mysqli_query($con, $sel_print_run);
				while($tox=mysqli_fetch_assoc($res_print_run)){
					$print_run = $tox['print_run'];
				}
            }
           // echo $base_checklist." ".$rid." ".$sport_type." ".$card_number." ".$card_name." ".$team." ".$set_type." ".$parallel." ".$print_run."<br>";
            @$select = "SELECT * FROM `base_checklist` WHERE TRIM(LOWER(`realese_id`))='$rid' AND TRIM(LOWER(set_type))='$set_type' AND TRIM(LOWER(card_number))='$card_number' AND TRIM(LOWER(card_name))='$card_name' AND TRIM(LOWER(`team`))='$team' AND TRIM(LOWER(parallel))='$parallel' AND TRIM(LOWER(print_run))='$print_run'";
            $result = mysqli_query($con, $select);
            if($result){
            	$roww = mysqli_num_rows($result);
            	if($roww==0){
            		$tox = $row+1;
            		$err_msg = '<div class="alert alert-warning">Error on line '.$tox.'</div>';
            	}else{
            		$tox = mysqli_fetch_assoc($result);
					$card_number0	=	$tox['card_number'];
					$card_name0		=	$tox['card_name'];
					$team0			=	$tox['team'];
					$set_type0		=	$tox['set_type'];
					$parallel0		=	$tox['parallel'];
					$print_run0		=	$tox['print_run'];
					$query = "
					INSERT INTO `custom_checklist`(`cid`, `rid`, `base_checklist_name`, `sport_type`, `card_number`, `card_name`, `team`, `set_type`, `parallel`, `print_run`, `description1`, `description2`, `description3`)
					 VALUES ('$cid','$rid','$base_checklist','$sport_type','$card_number0','$card_name0','$team0','$set_type0','$parallel0','$print_run0','$description1','$description2','$description3')";
	             
            		$statement = mysqli_query($con, $query);
					if($statement){
						$message='<div class="alert alert-success">Successfully added</div>';
					}
					else{
						$message="statement toxum";
					}
            	}
            }else{
            	$message="error toxum";
            }

echo $message;
echo $err_msg;


?>