<?php

class HomeController
{
	public function logActivity($text,$usr)
	{
		include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
	 
	  	$sql2 ="INSERT INTO `tbl_activities` (`text`,`activityTime`,`triggeredBy`)
		     VALUES
             (".
			 "'".$text."',".
			 "'".date("d/m/y h:m:s")."',".
			 "'".$usr."'".
			 ")"; 
			 
	      if($dbh->exec($sql2) == 1)
		  {
		  return 1;
		  } 
		  else
		  return 0;
	
	}
     public function addTeam ($fields)
	 {
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
	  
		 $sql = "INSERT INTO `tbl_teams` (`name`,`description`,`type`,`date_added`,`created_by`)
		     VALUES
             (".
			 "'".$fields[0]."',".
			 "'".$fields[1]."',".
			 "'".$fields[2]."',".
			 "'".date("d/m/y h:m:s")."',".
			 "'".$fields[3]."'".
			 ")";
		// query to log activity
		$sql2 ="INSERT INTO `tbl_activities` (`text`,`activityTime`,`triggeredBy`)
		     VALUES
             (".
			 "'"."Team ".$fields[0]. " created ',".
			 "'".date("d/m/y h:m:s")."',".
			 "'".$fields[3]."'".
			 ")";
		 //execute the query
	 if($dbh->exec($sql) && $dbh->exec($sql2) )
	 {
		$msg = 1;
	 }
	 else
	 {
		$msg=0;
	 }
     return $msg;
	 
	 }
	 
	  public function addBoard ($fields)
	 {
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
	  
		 $sql = "INSERT INTO `tbl_board` (`name`,`addedAt`)
		     VALUES
             (".
			 "'".$fields[0]."',".
			 "'".date("d/m/y h:m:s")."'".
			 ")";
		// query to log activity
		$sql2 ="INSERT INTO `tbl_activities` (`text`,`activityTime`,`triggeredBy`)
		     VALUES
             (".
			 "'"."Board ".$fields[0]. " created ',".
			 "'".date("d/m/y h:m:s")."',".
			 "'".$fields[2]."'".
			 ")";
		 //execute the query
	 if($dbh->exec($sql) && $dbh->exec($sql2) )
	 {
		$msg = 1;
	 }
	 else
	 {
		$msg=0;
	 }
     return $msg;
	 
	 }
	 
	 public function getAllTeams()
	 {
	  	  
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php"); 
     //prepare stmt

	 $sql = 'SELECT sn,name FROM tbl_teams';
	 $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	 $sth->execute();
	 $rslt = $sth->fetchAll();
	 $count = $sth->rowCount();

					if($count >0 )
					{
					return $rslt;
					}
					else
					{
					return $rslt;
					}
	 }
	 
	 public function getAllBoards()
	 {
	  	  
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php"); 
     //prepare stmt

	 $sql = 'SELECT * FROM tbl_board';
	 $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	 $sth->execute();
	 $rslt = $sth->fetchAll();
	 $count = $sth->rowCount();

					if($count >0 )
					{
					return $rslt;
					}
					else
					{
					return $rslt;
					}
	 }
	 
	 public function getAllActivities()
	 {
	  	  
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php"); 
     //prepare stmt

	 $sql = 'SELECT * FROM tbl_activities ORDER BY sn DESC';
	 $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	 $sth->execute();
	 $rslt = $sth->fetchAll();
	 $count = $sth->rowCount();

					if($count >0 )
					{
					return $rslt;
					}
					else
					{
					return $rslt;
					}
	 }
	 public function getAllMembers()
	 {
	  	  
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php"); 
     //prepare stmt

	 $sql = 'SELECT count(*) FROM tbl_users';
	 $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	 $sth->execute();
	 $rslt = $sth->fetchAll();
	 return $rslt;
					
	 }
	 
	 public function getTeamCount()
	 {
	  	  
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php"); 
     //prepare stmt

	 $sql = 'SELECT count(*) FROM tbl_teams';
	 $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	 $sth->execute();
	 $rslt = $sth->fetchAll();
	 return $rslt;
					
	 }
	 
	 public function addList ($fields)
	 {
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
	  
		 $sql = "INSERT INTO `tbl_list` (`title`,`board_id`,`team`,`scope`,`addedAt`)
		     VALUES
             (".
			 "'".$fields[0]."',".
			 "'".$fields[1]."',".
			 "'".$fields[2]."',".
			 "'".$fields[3]."',".
			 "'".date("d/m/y h:m:s")."'".
			 ")";
		// query to log activity
		
		$sql2 ="INSERT INTO `tbl_activities` (`text`,`activityTime`,`triggeredBy`)
		     VALUES
             (".
			 "'"."List ".$fields[0]. " created ',".
			 "'".date("d/m/y h:m:s")."',".
			 "'".$fields[4]."'".
			 ")";
		 //execute the query
	 if($dbh->exec($sql) && $dbh->exec($sql2) )
	 {
		$msg = 1;
	 }
	 else
	 {
		$msg=0;
	 }
     return $msg;
	 
	 }
	 
	 public function getAllLists()
	 {
	  	  
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php"); 
     //prepare stmt

	 $sql = 'SELECT * FROM tbl_list';
	 $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	 $sth->execute();
	 $rslt = $sth->fetchAll();
	 $count = $sth->rowCount();

					if($count >0 )
					{
					return $rslt;
					}
					else
					{
					return $rslt;
					}
					
	 }
	 	
}
?>