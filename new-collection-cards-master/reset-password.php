<?php
require "config/con1.php";
$message_res="";
if(!empty($_POST['email'])){
    
    $email=mysqli_real_escape_string($con, $_POST['email']);
    
    $sql="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){

            $token = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!$/()*";
			$token = str_shuffle($token);
			$token = substr($token,0,10);
			$sql_update="UPDATE users SET token='$token', reset_password_date=NOW() WHERE email='$email'";
			if(mysqli_query($con, $sql_update)){
			    
			    	require_once 'swiftMailer/vendor/autoload.php';
				
				// Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
             ->setUsername('collection.cards2020@gmail.com')
             ->setPassword('zljyeigggmhvzhgr');
             // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            
            // Create a message
            $message = (new Swift_Message('Forgot your password'))
            ->setFrom(['collection.cards2020@gmail.com' => 'Followmycollection'])
            ->setTo([$_POST['email'] => 'A name'])
            ->setBody("<p>We heard that you lost your FollowMyCollection password. Sorry about that!</p>
                       <p>But don’t worry! You can use the following link to reset your password:<br>
                       http://followmycollection.com/test/collection-cards/change-password.php?email=$email&token=$token</p>
                       <p>If you don’t use this link within 3 hours, it will expire. To get a new password reset link, visit https://followmycollection.com/test/collection-cards/login-register.php</p>
                       <p>Thanks,<br>
                       <p>The FollowMyCollection Team</p>", 'text/html');
                
            // Send the message
            $result = $mailer->send($message);
            $message_res="Check your email for a link to reset your password.";
            
			}
    }
    else{
        $message_res="That address is not a verified primary email.";
    }
   

}
else{
    $message_res="Fill in email field";
}
 echo $message_res;
?>