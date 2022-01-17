<?php
    // header('Content-Type: image/svg+xml');

	$res='';

if(!empty($_POST['data'])){
	
    $data=$_POST['data'];
    $base64_string = explode( ',', $data);
    $output_file_img='projects-json-images/51'.'.svg';
    echo $data;
    
    file_put_contents($output_file_img, $data. PHP_EOL);
     
    // $res=$output_file;
    $res='Project successfully saved';
    // echo 'data:image/svg+xml;base64,' .base64_decode( $base64_string[1]);

}
else{
	$res='Error';
}

echo $res;


?>