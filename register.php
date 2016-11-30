<?php
// include the signupcontroller file
include("Controllers/SignUpController.php");
// create an instance of the SignUpController Class
$signup = new SignUpController();
// include the utility file
include("Controllers/Utility.php");
$util = new Utility();
// check button click
if(isset($_POST['reg']))
{
	// get entered values
	$fullname =  $_POST['fullname'];
	$email =  $_POST['email'];
	$password =  $_POST['password'];
	$passwordmd =  md5($password);
	$dateregistered =  date("d/m/y h:m:s");
	$loginstatus =  0;
	$lastlogin =  date("d/m/y h:m:s");
	$userstatus =  0;
	$userip = $_SERVER['HTTP_HOST'];
	$hash = md5( rand(0,1000) );
	$values = array($fullname,$email,$passwordmd,$dateregistered,$loginstatus,$lastlogin,$userstatus,$userip);

// addd to db
if($util->userExists($email) == true)
{
   $msg = "<div class='alert alert-danger' >.Account with '$email' already exists</div>";
}
else
    {
    $msg = $signup->signUp($values,$hash);
	 //send confirmatn mail
	 $second = $signup->sendConfirmationMail($fullname,$password,$email,$hash);
    header("Location:register?a=Account Created, Check your mail to activate your account");
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>PMA - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>TASK MANAGEMENT APP</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-3 center login-box">
            <h6 align="center">
                Please Register.
            </h6>
            <?php  if( isset($_GET['a']))
			echo "<div class='alert alert-info'>". $_GET['a']."</div>";
			if(isset($msg)){echo $msg;}
			?>

            <form class="form-horizontal" action="" method="post">
                <fieldset>
                <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" name="fullname" id="fullname" required placeholder="Full Name">
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" required id="">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                         <div align="justify" class = "input-group input-group-sm">
                         <input type="checkbox" class="form-control pull-left" name="accept" required>
                         <small></I>I accept the Terms of Service and Privacy Policy</small>
                         </div>

                    <p class="center col-md-12" align ="center">
                        <button type="submit" class="btn btn-primary" name="reg">Register</button>
                    <br>
                    Already a user ? <a href="index">Sign in</a>
                    </p>


                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
