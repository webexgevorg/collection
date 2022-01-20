<?php
include "../../config/con1.php";
if(!empty($_POST['name']) && !empty($_POST['user_id'])){
    $name=$_POST['name'];
    $user_id=$_POST['user_id'];
    $row_id=$_POST['row_id'];
    
    $update_user="UPDATE users SET name='$name' WHERE id=$user_id";
    $update_user_query=mysqli_query($con, $update_user);

    $update_change_profile_name="UPDATE messages_for_change_profile_name SET status=1 WHERE id=$row_id";
    $update_change_profile_name_query=mysqli_query($con, $update_change_profile_name);

    if($update_user_query && $update_change_profile_name_query){
        $sql="SELECT email FROM users WHERE id=$user_id";
        $query=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($query);
        $email=$row['email'];

        require_once '../../swiftMailer/vendor/autoload.php';
				
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('collection.cards2020@gmail.com')
        ->setPassword('zljyeigggmhvzhgr');
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        
        // Create a message
        $message = (new Swift_Message('Profile name changed'))
        ->setFrom(['collection.cards2020@gmail.com' => 'Followmycollection'])
        ->setTo([$email => 'A name'])
        ->setBody("<p>HELLO</p>
                <p>The administration of the Followmycollection, at your request, changed the nickname to $name</p>
                <p>Thanks,<br>
                <p>The FollowMyCollection Team</p>", 'text/html');
            
        // Send the message
        $result = $mailer->send($message);
        echo "<div class='text-success'>A message has been sent to the user by email about the nickname changes</div>";
    }
    else{
        echo "<div class='text-danger'>Something went wrong please try again later</div>";
    }
}
?>