<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/pma/Controllers/HomeController.php");

$home =  new HomeController();

// call method to add
$teamName = $_REQUEST['teamName'];
$description = $_REQUEST['description'];
$scope = $_REQUEST['scope'];
$createdBy = $_SESSION['userid'];

$fields = array($teamName,$description,$scope,$createdBy);
$response = $home->addTeam($fields);

if($response == 1)
$msg = "<div class='alert alert-success'> Team ".$teamName . " created</div>";
else
$msg = "<div class='alert alert-danger'> Error occured, try again </div>";

echo $msg;


?>