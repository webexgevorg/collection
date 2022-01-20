<?php
include "../config/con1.php";
if(isset($_POST['change_password'])){
   
    $sql_ch_pass="SELECT * FROM admin WHERE email='narine@webex.am'";
    $result=mysqli_query($con, $sql_ch_pass);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
            $token = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!$/()*";
			$token = str_shuffle($token);
			$token = substr($token,0,10);
			$email=$row['email'];
			
			$sql_update="UPDATE admin SET token='$token' WHERE email='$email'";
			if(mysqli_query($con, $sql_update)){
			    
			    	require_once '../swiftMailer/vendor/autoload.php';
				
				// Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
             ->setUsername('collection.cards2020@gmail.com')
             ->setPassword('zljyeigggmhvzhgr');
             // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            $hashed_email = hash('sha256', "$email");
            // Create a message
            $message = (new Swift_Message('Forgot your password'))
            ->setFrom(['collection.cards2020@gmail.com' => 'Followmycollection'])
            ->setTo([$email => 'A name'])
            ->setBody("<p>We heard that you lost your FollowMyCollection password. Sorry about that!</p>
                      <p>But don’t worry! You can use the following link to reset your password:<br>
                      http://followmycollection.com/test/collection-cards/admin/add_new_admin_pass.php?email=$hashed_email&token=$token</p>
                      <p>Thanks<br>", 'text/html');
                
            // Send the message
            $result = $mailer->send($message);
            echo "Check your email for a link to reset your password.";
            
			}
    }
}
?>