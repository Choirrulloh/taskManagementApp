<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/pma/Controllers/HomeController.php");

$home =  new HomeController();

// call method to add
$boardName = $_REQUEST['boardName'];
$addedAt = date("d/m/y h:m:s");
$createdBy = $_SESSION['userid'];

$fields = array($boardName,$addedAt,$createdBy);
$response = $home->addBoard($fields);

if($response == 1)
$msg = "<div class='alert alert-success'> Board ".$boardName . " created</div>";
else
$msg = "<div class='alert alert-danger'> Error occured, try again </div>";

echo $msg;


?>