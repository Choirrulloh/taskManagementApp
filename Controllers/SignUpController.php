<?php
 //include db file
  include("class.phpmailer.php");

class SignUpController
{
	// method to sign up a user
 public function signUp($values,$hash)
 {
	 // db connection file
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");

   // build insert query
   $query = "INSERT INTO `tbl_users` (`fullname`,`email`,`password`,
                                         `date_registered`,`login_status`,`last_login`,
										 `user_status`,`user_ip_address`,`hash`)
		     VALUES
             (".
			 "'".$values[0]."',".
			 "'".$values[1]."',".
			 "'".$values[2]."',".
			 "'".$values[3]."',".
			 "'".$values[4]."',".
			 "'".$values[5]."',".
			 "'".$values[6]."',".
			 "'".$values[7]."',".
			 "'".str_replace(")","_",$hash)."'".
			 ")";
   //	echo $query;
    //exit;
    // execute query
	 if($dbh->exec($query))
	 {
		 $msg = "<div class='alert-success'>Your account has been created, <br /> please verify it by clicking the activation link that has been sent to your email.</div>";
	 }
	 else
	 {
		$msg="<div class='alert-danger'>Some error occured... try again</div>";
	  }

      return $msg;

 }
 // method to send mail to administrator
 function sendMailtoAdministrator($name,$adminemail)
 {
	 // i am making use of php mailer

 $mail =  new PHPMailer();
 // make sure protocol is smtp
 $mail->isSMTP();
 // show all error messages
 $mail->SMTPDebug =1;
 // authenticate smtp
 $mail->SMTPAuth=true;
 // secure smtp via secure socket layer
 $mail->SMTPSecure ='ssl';
 // set the host address
 $mail->Host ='smtp.gmail.com';
 // set the port number
 $mail->Port =465;
 // make sure email to be sent is in the right format
 $mail->isHTML(true);
 // set username
 $mail->Username="laoluoyebamiji@gmail.com";
 // set password
 $mail->Password="Kylexy1@";
 // set from address
 $mail->setFrom("laoluoyebamiji@gmail.com");
// set subject
 $mail->Subject="Account creation alert from ".$name;
 // set mail body
 $mail->Body=$name." is about to create an account";
 // set delivery addresss
 $mail->addAddress($adminemail);

 // return a boolean variable
 if($mail->send())
 {
   return true;
 }
 else
 return false;

}

// method to send confirmation email to user
 function sendConfirmationMail($name,$password,$email,$hash)
 {
     $server = $_SERVER['HTTP_HOST'];
	 // to address
	 $to      = $email; // Send email to our user

     $message = '

<br><b>Thanks for signing up!</b><br>
Your account has been created,<br> You can login with the following credentials after you have activated your account by clicking on the url below.
<br>
------------------------ <br>
Username: '.$name.'<br>
Password: '.$password.'<br>
------------------------  <br>

Please click this link to activate your account:<br>
http://'.$server.'/pma/verify?email='.$email.'&hash='.$hash.'

'; // Our message above including the link

$mail2 =  new PHPMailer();
$mail2->isSMTP();
 $mail2->SMTPDebug =1;
 $mail2->SMTPAuth=true;
 $mail2->SMTPSecure ='ssl';
 $mail2->Host ='smtp.gmail.com';
 $mail2->Port =465;
 $mail2->isHTML(true);
 $mail2->Username="laoluoyebamiji@gmail.com";
 $mail2->Password="Kylexy1@";
 $mail2->setFrom("laoluoyebamiji@gmail.com");
 $mail2->Subject="Signup Verification for ".$name ." from PMA";
 $mail2->Body=$message;
 $mail2->addAddress($email);

 if($mail2->send())
 {
  $ret =true;
 }
 else
 $ret =  false;

 return $ret;
}

// method to send forgot password mail to user
 function sendForgotMail()
 {
     $server = $_SERVER['HTTP_HOST'];
	 // to address
	 $to      = $email; // Send email to our user

     $message = '

<br><b>You requested for a password reset!</b><br>

Please follow this link to reset your password:<br>
http://'.$server.'/pma/resetPassword?a=You can now reset your password';
// Our message above including the link

$mail2 =  new PHPMailer();
$mail2->isSMTP();
 $mail2->SMTPDebug =1;
 $mail2->SMTPAuth=true;
 $mail2->SMTPSecure ='ssl';
 $mail2->Host ='smtp.gmail.com';
 $mail2->Port =465;
 $mail2->isHTML(true);
 $mail2->Username="laoluoyebamiji@gmail.com";
 $mail2->Password="Kylexy1@";
 $mail2->setFrom("laoluoyebamiji@gmail.com");
 $mail2->Subject="Reset Password for ".$name ." from PMA";
 $mail2->Body=$message;
 $mail2->addAddress($email);

 if($mail2->send())
 {
  $ret =true;
 }
 else
 $ret =  false;

 return $ret;
}

}




?>