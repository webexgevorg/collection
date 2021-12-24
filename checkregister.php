<?php
include "config/con1.php";
	

if(isset($_POST['register'])){
	

	$name = $con-> real_escape_string($_POST['name']);
	$country = $con-> real_escape_string($_POST['country']);
	$country_code = $con-> real_escape_string($_POST['country_code']);
	$city = $con-> real_escape_string($_POST['city']);
	$email = $con-> real_escape_string($_POST['email']);
	$password = $con-> real_escape_string($_POST['password']);
	$cPassword =$con-> real_escape_string($_POST['confirm_password']);
    $bday = $con-> real_escape_string($_POST['bday']);
	
// echo $name.$country.$email.$password.$cPassword;
	if(empty($name) || empty($email) || empty($password) || empty($cPassword) ){
		echo 1;
	}
	elseif($password!=$cPassword){
	    echo 2;
	}elseif(strlen($password)<=6 && strlen($cPassword)<=6){
	    echo 5;
	    
	}else{
		$sql = $con->query("SELECT id FROM users WHERE email='$email'");
		if($sql->num_rows>0){
			echo 3;
		}else{
			$token = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!$/()*";
			$token = str_shuffle($token);
			$token = substr($token,0,10);
			$hashedPassword=md5($password);
			$con->query("INSERT INTO users (name,email, password,isEmailConfirmed,token,country, country_code, city, birth_day) VALUES('$name','$email', '$hashedPassword','0','$token','$country', '$country_code', '$city', $bday)");
			
				require_once 'swiftMailer/vendor/autoload.php';
				
				// Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
             ->setUsername('collection.cards2020@gmail.com')
             ->setPassword('zljyeigggmhvzhgr');
             // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            
            // Create a message
            $message = (new Swift_Message('Please Verify Your Email Address'))
            ->setFrom(['collection.cards2020@gmail.com' => 'Followmycollection'])
            ->setTo([$_POST['email'] => 'A name'])
            ->setBody("http://followmycollection.com/test/collection-cards/confirm.php?email=$email&token=$token", "text/html");
            
            // Send the message
            $result = $mailer->send($message);
              
              echo 4;
        

		}
	}
}
