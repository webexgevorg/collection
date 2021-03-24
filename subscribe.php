<?php
require "config/con1.php";
$message_res="";
if(!empty($_POST['email'])){
    $email=$_POST['email'];
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $message_res = "Invalid email format";
    }
    else{
    $email=mysqli_real_escape_string($con, $_POST['email']);
    
    $sql="SELECT email FROM subscribe_news_home WHERE email='$email'";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        
        $message_res="Email already exists in the database";
    }
    else{

            $token = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!$/()*";
			$token = str_shuffle($token);
			$token = substr($token,0,10);
			$sql_insert="INSERT INTO subscribe_news_home (email, is_email_confirmed, token) VALUES ('$email', 0, '$token')";
		
			if(mysqli_query($con, $sql_insert)){
			    
			   require_once 'swiftMailer/vendor/autoload.php';
				
				// Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
             ->setUsername('collection.cards2020@gmail.com')
             ->setPassword('zljyeigggmhvzhgr');
             // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            
            // Create a message
            $message = (new Swift_Message('Subscribe to update'))
            ->setFrom(['collection.cards2020@gmail.com' => 'Followmycollection'])
            ->setTo([$_POST['email'] => 'A name'])
            ->setBody("<p>Thank you that you subscribe FollowMyCollection!</p>
                       <p>Please following link to confirmed your email:<br>
                       http://followmycollection.com/test/collection-cards/confirmed_email_subscribe.php?email=$email&token=$token</p>
                       <p>Thanks<br>
                       <p>The FollowMyCollection Team</p>", 'text/html');
                
            // Send the message
             $result = $mailer->send($message);
             $message_res="<p>You seccessfully subscribe</p>
			                  <p>Check your email for a link to confirmed your email.</p>";
			    
            
			}
    }
    }
  
}
else{
    $message_res="Fill in email field";
}
 echo $message_res;
?>