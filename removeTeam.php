<?php
session_start();
include("connection/connect.php"); 
include("Controllers/HomeController.php"); 
$home =  new HomeController();
     //prepare stmt
$id = $_GET['id'];

//execute query
     $query = "DELETE FROM tbl_teams WHERE sn = ".$id;
	 $query2 = "SELECT name FROM tbl_teams where sn= ".$id;
     $sth = $dbh->prepare($query2, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	 $sth->execute();
	 $rslt = $sth->fetchAll();
	 $count = $sth->rowCount();
	 $ans = $dbh->exec($query);
	 
 $teamDeleted = $rslt[0]['name'];     
$ans = $home->logActivity($rslt[0]['name']. " Team deleted",$_SESSION['usrid']);

if($ans ==1)
{
header("Location:home?msg=$teamDeleted Team deleted");
}
?>