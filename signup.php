<?php
// include the signupcontroller file
include("Controllers/SignUpController.php");
// create an instance of the SignUpController Class
$signup = new SignUpController();
// include the utility file
include("Controllers/Utility.php");
$util = new Utility();
// check button click
if(isset($_POST['sub']))
{
	// get entered values
	$firstname =  $_POST['firstname'];
	$lastname =  $_POST['lastname'];
	$email =  $_POST['email'];
	$password =  $_POST['password'];
	$passwordmd =  md5($password);
	$dateregistered =  date("d/m/y");
	$loginstatus =  0;
	$lastlogin =  date("d/m/y h:m:s");
	$userstatus =  0;
	$userip = $_SERVER['HTTP_HOST'];
	$bio =  $_POST['bio'];
	$img =  $_FILES['images']['name'];
	$hash = md5( rand(0,1000) );
	// upload
	include("upload.php");
	$values = array($firstname,$lastname,$email,$passwordmd,$dateregistered,$loginstatus,$lastlogin,$userstatus,$userip,$bio,$img);
	
// addd to db
if($util->userExists($email) == true)
{
   $msg = "<div class='alert alert-danger' >.User with $email exists</div>";
}
$add = $signup->signUp($values,$hash);
     //send to admin
	 $adminemail = "laoluoyebamiji@gmail.com";
     $first = $signup->sendMailtoAdministrator($firstname." ".$lastname,$adminemail);
	 //send confirmatn mail
	 $second = $signup->sendConfirmationMail($firstname." ".$lastname,$password,$email,$hash);
    header("Location:signup?a=Check your mail to verify");	
}
?>

<!DOCTYPE html>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>Signup - Employee Manager</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/signin.js"></script>


</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="dashboard">
				Employee Manager				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="">						
						<a href="index" class="">
							Already have an account? Login now
						</a>
						
					</li>
					
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container register">
	
	<div class="content clearfix">
		
		<form action="" method="post" enctype="multipart/form-data" id="frm">
		
			<h2>New Employee Registration</h2>			
			<?php  if( isset($_GET['a'])) 
			echo "<div class='alert alert-info'>". $_GET['a']."</div>";
			if(isset($msg)){echo $msg;}
			?>
            
			<div class="login-fields">
				
				<p>Fill in the following details</p>
				
				<div class="field">
					<label for="firstname">First Name:</label>
					<input type="text" id="firstname" name="firstname"  placeholder="First Name" class="login" required  
                    value="<?php if(isset($_POST['sub'])) echo $_POST['firstname'];?>"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="lastname">Last Name:</label>	
					<input type="text" id="lastname" name="lastname"  placeholder="Last Name" class="login" required
                    value="<?php if(isset($_POST['sub'])) echo $_POST['lastname'];?>"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="email">Email:</label>
					<input type="text" id="email" name="email"  placeholder="Email" class="login" required
                    value="<?php if(isset($_POST['sub'])) echo $_POST['email'];?>"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password"  placeholder="Password" class="login" required
                    value="<?php if(isset($_POST['sub'])) echo $_POST['password'];?>"/>
				</div> <!-- /field -->
				
                <div class="field">
					<label for="email">Bio:</label>
					<textarea rows="5" id="bio" style="width:310px;" name="bio"  placeholder="Bio" class="login" required
                    ><?php if(isset($_POST['sub'])) echo $_POST['bio'];?></textarea>
				</div> <!-- /field -->
                
                
				 <div class="field">   
					<label>Photo:
                	</label>
                    <!-- MAX_FILE_SIZE must precede the file input field -->
   <input type="hidden" name="MAX_FILE_SIZE" value="6400000000" />

                    <input type="file" id="images" name="images"   value="<?php if(isset($_POST['sub'])) echo $_FILES['images']['name'];?>"/>
                   <div id="uploads">
                   <?php if(isset($_POST['sub']))
				   {
					  
					echo "<center><img height='200' width='200' src ='uploads/$name'></center>"; 
				   }
					?>
                   </div>
				</div> <!-- /field -->
                
               
                
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				<center><input type="submit" name="sub"  value="Register" class="button btn btn-success btn-large" /></center>
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Already have an account? <a href="index">Login to your account</a>
</div> <!-- /login-extra -->


</body>

 </html>
