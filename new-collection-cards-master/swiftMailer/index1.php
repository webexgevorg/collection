<?php
session_start();
	if(isset($_POST['submit'])){
		
require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('collection.cards2020@gmail.com')
  ->setPassword('zljyeigggmhvzhgr')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['collection.cards2020@gmail.com' => 'CollectionMyCards'])
  ->setTo([$_POST['email'] => 'A name'])
  ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);
if($result){
    echo "namak";
   
}
	}

?>