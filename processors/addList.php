<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/pma/Controllers/HomeController.php");

$home =  new HomeController();

// call method to add
$title = $_REQUEST['title'];
$boardId = $_REQUEST['board'];
$team = $_REQUEST['team'];
$scope = $_REQUEST['scope'];
$addedAt = date("d/m/y h:m:s");

$fields = array($title,$boardId,$team,$scope,$addedAt);

$response = $home->addList($fields);
if($response == 0)
$msg = "<div class='alert alert-success'> List ".$title . " created</div>";
else
$msg = "<div class='alert alert-danger'> Error occured, try again </div>";

echo $msg;


?>