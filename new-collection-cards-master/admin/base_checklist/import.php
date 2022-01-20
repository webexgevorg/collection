<?php
include '../import_excel/vendor/autoload.php';
           include "../../config/con1.php";


$connect = new PDO("mysql:host=localhost;dbname=collection", "collection", "collection@2020");
// $message='';

if($_FILES["import_excel"]["name"] != '')
{
	$realese_id=mysqli_real_escape_string($con, $_POST['opt_name']);
   
	$allowed_extension = array('xls', 'csv', 'xlsx');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name ='../import_excel/upload/'. time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
		

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$data = $spreadsheet->getActiveSheet()->toArray();
        $c=0;
       
		foreach($data as $row)
		// for($row=1; $row<count($data); $row++)
		{
           $c++ ;
            // if($data[$row][5]==''){
            // 	$data_row5="";
            // }
            // else{
            // 	$data_row5=$data[$row][5];
            // }
            if($row[6]==''){
            	$data_row6="";
            }
            else{
            	$data_row6=$row[6];
            }
            
			// $insert_data = array(
			// 	':realese_id'		    =>	$realese_id,
			// 	':card_number'		=>	$data[$row][0],
			// 	':card_name'		=>	$data[$row][1],
			// 	':team'		=>	$data[$row][2],
			// 	':set_type'		=>	$data[$row][3],
			// 	':parallel'		=>	$data[$row][4],
			// 	':print_run'		=>	$data_row5
			// );
$insert_data = array(
				':sort_id'		    =>	$c,
				':realese_id'		=>	$realese_id,
				':card_number'		=>	$row[0],
				':card_name'		=>	$row[1],
				':team'		=>	$row[2],
				':set_type'		=>	$row[3],
				':variation'		=>	$row[4],
				':parallel'		=>	$row[5],
				':print_run'		=>	$data_row6,

			);

			 $query = "
			INSERT INTO base_checklist
			(sort_id, realese_id, card_number, card_name, team, set_type, variation, parallel, color, print_run) 
			VALUES (:sort_id, :realese_id, :card_number, :card_name, :team, :set_type, :variation, :parallel, '', :print_run)";
             
             $statement = $connect->prepare($query);
			if($statement->execute($insert_data)){
				$message='<div class="alert alert-success">Successfully added</div>';
			}
			else{
				$message="error";
			}
			
		}
		// $message = '<div class="alert alert-success">Data Imported Successfully</div>';

	}
	else
	{
		$message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
	}
}
else
{
	$message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>