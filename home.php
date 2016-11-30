<?php
 session_start();
 error_reporting(0);
 include("Controllers/HomeController.php");
 $home = new HomeController();
 $allTeams =$home->getAllTeams();
$allBoards = $home->getAllBoards();
 // get all activities
 $activities = $home->getAllActivities();
// get all members
$members = $home->getAllMembers();
// get all teams
$teams = $home->getTeamCount();
// get all lists
$lists = $home->getAllLists();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>PMA - HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PMA">
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
    
    <script>
	$(document).ready(function(){
     
	 
	   $("#closeBtn").on ('click', function(){ window.location.href = "home"; });
	   $("#closeBtn2").on ('click', function(){ window.location.href ="home" });
	   $("#closeBtn3").on ('click', function(){ window.location.href ="home" });
	   $("#closeBtn4").on ('click', function(){ window.location.href ="home" });
	   $("#closeList").on ('click', function(){ window.location.href ="home" });
	   
	   
	   
	      
	  $("#btnSave").on ('click',function(e){
		  e.preventDefault();			
				// ajax post
				var teamName = $('#teamName').val();
				var description = $('#description').val();
				var scope = $('#scope').val();
				var userid = <?php echo $_SESSION['userid']; ?>
				
				
			$.ajax({
        		url: 'processors/addTeam.php',
        		dataType:"text",
        		type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
        		data: {"teamName":teamName, "description":description, "scope":scope, "userid":userid},
	    	    success: function (rslts, textStatus, jQxhr)
				 {
						$("#msg").html(rslts);			 
				 },
				error: function (jqXhr,textStatus, errorThrown)
				 {
					 alert("Ooops!!! Something went wrong. Try again");
				 }
		 });

	});
	
	 $("#btnSave2").on ('click',function(e){
		  e.preventDefault();			
				// ajax post
				var boardName = $('#btitle').val();
			
			$.ajax({
        		url: 'processors/addBoard.php',
        		dataType:"text",
        		type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
        		data: {"boardName":boardName},
	    	    success: function (rslts, textStatus, jQxhr)
				 {
						$("#msg2").html(rslts);			 
				 },
				error: function (jqXhr,textStatus, errorThrown)
				 {
					 alert("Ooops!!! Something went wrong. Try again");
				 }
		 });

	});	
    	
    
	 $("#btnSave3").on ('click',function(e){
		  e.preventDefault();			
				// ajax post
				var title = $("#listTitle").val();
		        var board = $("#board1 option:selected").text();
				var team = $("#team1 option:selected").text();
		        var scope = $("#scope1").val();
			
			$.ajax({
        		url: 'processors/addList.php',
        		dataType:"text",
        		type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
        		data: {"title":title,"board":board,"team":team,"scope":scope},
	    	    success: function (rslts, textStatus, jQxhr)
				 {
						$("#msg3").html(rslts);			 
				 },
				error: function (jqXhr,textStatus, errorThrown)
				 {
					 alert("Ooops!!! Something went wrong. Try again");
				 }
		 });

	});	
    	
    
});

</script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>PMA</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo  $_SESSION['fname']?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Cards</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Change Language</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Help</a></li>
                    <li class="divider"></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Silver</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Light Blue</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Black</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Red</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> White</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> Orange</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
               <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Board <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
						if(!empty($allBoards))
						{
                        for($ctr = 0; $ctr < count($allBoards); $ctr++)
                        {
                          echo "<li>".$allBoards[$ctr][1] ." <a href='removeBoard?id=".$allBoards[$ctr][0]."'>
						  <i class='glyphicon glyphicon-trash'></i></a></li>";
						  echo "<li class='divider'></li>";
						   
                        }
						}
                        ?>
                        <li> <a href="#boardModal" data-toggle ="modal">Create New Board</a></li>
                        <li class="divider"></li>

                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> List <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        for($ctr = 0; $ctr < $listCount; $ctr++)
                        {

                        } 
                        ?>
                        <li> <a href="#listModal" data-toggle ="modal">Create New List</a></li>
                        <li class="divider"></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Teams <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" style="overflow:auto; width:300px;">
                        <?php
						if(!empty($allTeams))
						{
                        for($ctr = 0; $ctr < count($allTeams); $ctr++)
                        {
                          echo "<li>".$allTeams[$ctr][1] ." <a href='removeTeam?id=".$allTeams[$ctr][0]."'>
						  <i class='glyphicon glyphicon-trash'></i></a></li>";
						  echo "<li class='divider'></li>";
						   
                        }
						}
                        ?>
                        <li> <a href="#teamModal" data-toggle="modal">Create New Team</a></li>
                        

                    </ul>
                </li>
                <li>
                    <center>
                    <form class="navbar-search">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                    </center>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">

      
        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-12 col-sm-12">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="home">Home</a>
        </li>
        <li>
            <a href="home">Dashboard</a>
        </li>
        <li class="pull-right">
            Total Members:  <?php echo $members[0][0]; ?>
            Total Teams:  <?php echo $teams[0][0]; ?>
            
        </li>
    </ul>
</div>
<?php if (isset($_GET['msg'])) echo "<div class='alert alert-warning alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$_GET['msg']."</div>"; ?>

<?php
for($i = 0; $i < count($lists); $i++)
{
?>

<div class="row">
    <div class="box col-md-4">
        <div class="box-inner homepage-box" style="overflow:scroll;">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-th"></i> <?php echo $lists[$i][1]; ?></h2>
            <div class="box-icon">
                   <?php for($c =0; $c <count($listCards); $c++) ?>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                             
                     <a href="#" data-toggle ="modal" class="btn btn-plus btn-round btn-default" data-target="#cardModal">
                     <i
                            class="glyphicon glyphicon-plus-sign"></i></a>
                </div>
            </div>
            
            <div class="box-content">
                    <ul class="dashboard-list">
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="Usman"
                                     src="">
                            <strong>Card Name</strong> 
                            <br>
                            <strong>Due Date:</strong> 17/05/2014<br>
                            </a>
                            <strong>Label:</strong> <span class="label-success label label-default">Approved</span>
                            
                        </li>
                        
                    </ul>
                
            </div>
        </div>
    </div>
    <!--/span-->
<?php 
}
?>

    <!--/span-->
    <div class="box col-md-12" align="center">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> Activities</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content" style="overflow:scroll; height:400px;">
                <ul class="dashboard-list">
                    <?php 
					for($i=0; $i<count($activities); $i++)
					{
					   echo "<li>".$activities[$i]['text']." at ".$activities[$i]['activityTime']. " </li>";
					}
					?>
                </ul>
            </div>
        </div>
    </div>


    <!--/span-->
</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->



    </div>
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="boardModal"  role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Add New Board</h3>
                </div>
                <center><div id="msg2" class="col-sm-12"></div></center>
                <div class="modal-body">
                    Title: <input type='text' class="form-control" name='btitle' id='btitle'><br>
                    
                </div>
                <div class="modal-footer">
                   <a href="#" class="btn btn-default" id ="closeBtn3" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="btnSave2" id="btnSave2" value="Create">
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="listModal"  role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="closeList" data-dismiss="modal">×</button>
                    <h3>Add New List</h3>
                </div>
                                <center><div id="msg3" class="col-sm-12"></div></center>
               
                <div class="modal-body">
                    Title: <input type='text' class="form-control" name='listTitle' id='listTitle'><br>
                    Board: 
                    <select name='board1' class="form-control" id="board1">
                      <?php
					     
					  for($i=0; $i < count($allBoards); $i++)
					  { 
					    if($allBoards[$i][1] !="")
					    echo "<option value='$allBoards[$i][1]'>".$allBoards[$i][1]."<option>";
					  }
					  ?>
                    </select><br>
                    
                    Team: 
                    <select name='team1' class="form-control" id="team1">
                      <?php
					     
					  for($i=0; $i < count($allTeams); $i++)
					  {
						  if($allTeams[$i][1] !="")
					       echo "<option value='$allTeams[$i][1]'>".$allTeams[$i][1]."<option>";
					  }
					  ?>
                    </select><br>
                    Scope:<select name='scope1' class="form-control" id="scope1"><option value="1">Private</option><option value="2">Public</option></select><br>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" id ="closeBtn4" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="btnSave3" id="btnSave3" value="Create">
                </div>
            </div>
        </div>
    </div>
    
     
   <div class="modal fade" id="teamModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
         
         <form action="" method="post">
           
           <div class="modal-dialog">
        <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" id="closeBtn2" data-dismiss="modal">×</button>
                    <h3>Add New Team</h3>
                </div>
                
               <center><div id="msg" class="col-sm-12"></div></center>
                
                <div class="modal-body">
                    
                    Name: <input type='text' class="form-control" name='teamName' id='teamName'><br>
                    Description: <textarea name='description' class="form-control" id="description"></textarea><br>
                    Type:<select name='scope' class="form-control" id="scope">
                        <option value="1">Private</option><option value="2">Public</option></select><br>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" id ="closeBtn" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="btnSave" id="btnSave" value="Create">
                </div>
            </div>
    </form>
    </div>
    
    <div class="modal fade" id="cardModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         
         <form action="" method="post">
           
           <div class="modal-dialog">
        <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" id="closeBtn2" data-dismiss="modal">×</button>
                    <h3>Add New Card</h3>
                </div>
                
               <center><div id="msg" class="col-sm-12"></div></center>
                
                <div class="modal-body">
                    
                    Name: <input type='text' class="form-control" name='teamName' id='teamName'><br>
                    Due Date: <textarea name='description' class="form-control" id="description"></textarea><br>
                    Type:<select name='scope' class="form-control" id="scope">
                        <option value="1">Private</option><option value="2">Public</option></select><br>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" id ="closeBtn" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="btnSave" id="btnSave" value="Create">
                </div>
            </div>
    </form>
    </div>
    


    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Oyebamiji Olaoluwa</a> 2016</p>

      
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>

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
