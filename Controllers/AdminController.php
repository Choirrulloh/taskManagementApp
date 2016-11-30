<?php

class AdminController
{
	
// method to get login credentials
public function getloginCredentials($email,$password)
  {
	  
	  // only users who have verified their mails can log in
	  include("../connection/connect.php");
     //prepare stmt

	 $sql = 'SELECT * FROM tbl_admin WHERE email = :email AND password =:password';
		  		 	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));

		   			$sth->execute(array(':email' => $email, ':password' => md5($password)));
		   			$rslt = $sth->fetchAll();
		 		  	$count = $sth->rowCount();

					if($count >0 )
					{
					return $rslt;
					}
					else
					{
						//emptyy result set
					$rslt['email'] ="";
					$rslt['password'] ="";
	                return $rslt;
					}


  }

  // method to get all registered users count
  public function getRegisteredUsersCount($status)
  {

   include("../connection/connect.php");
     //prepare stmt
     $sql = 'SELECT COUNT(*) FROM tbl_employee WHERE user_status = :status';
		  		 	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
					$sth->execute(array(':status' => $status));
		   			$rslt = $sth->fetchAll();
		 		  	$count = $sth->rowCount();

					return $rslt;
	 }



// method to get registered users count in past week
  public function getRegisteredUsersCountinPastWeek()

  {

   include("../connection/connect.php");
     //prepare stmt
     $sql = "SELECT  DATE_FORMAT(create_date, '%m/%d/%Y')
FROM tbl_employee
WHERE create_date BETWEEN CURDATE() - INTERVAL 7 DAY AND SYSDATE()";

		  		 	$sth = $dbh->exec($sql);

					return $sth;
	 }


// method to get registered users
 public function getRegisteredUsers()
  {
     include("../connection/connect.php");
     //prepare stmt
	 $sql = "SELECT firstname,lastname FROM tbl_employee";
   try {
       $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
       $stmt->execute();
       $ans = array();
	   $i=0;
	   while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT))
	   {
         $data = $row[0] . "\t" . $row[1] . "\n";
         $ans[$i] = $data;
		 $i++;
	   }

   $stmt = null;
 }
 catch (PDOException $e) {
   print $e->getMessage();
 }
return $ans;
}

// method to get all groups
 public function getAllGroups()
  {
     include("../connection/connect.php");
     //prepare stmt
	 $sql = "SELECT groupname FROM tbl_group";
   try {
       $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
       $stmt->execute();
       $ans = array();
	   $i=0;
	   while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT))
	   {
         $data = $row[0] . "\t" .  "\n";
         $ans[$i] = $data;
		 $i++;
	   }

   $stmt = null;
 }
 catch (PDOException $e) {
   print $e->getMessage();
 }
return $ans;
}

// method to add users to group
function addUsersToGroup($usr,$group)
{
    include($_SERVER['DOCUMENT_ROOT']."/employee/connection/connect.php");

   // build the query
   $query = "INSERT INTO `tbl_user_group` (`groupname`,`usr`,`date_added`)
		     VALUES
             (".
			 "'".$group."',".
			 "'".$usr."',".
			 "'".date("d/m/y")."'".
			 ")";
   	echo $query;
	 //execute the query
	 if($dbh->exec($query))
	 {
		 $msg = "<div class='alert alert-success'>".$user. " added to group ".$group."</div>";
	 }
	 else
	 {
		$msg="<div class='alert alert-danger'>Some error occured</div>";
	  }

return $msg;
}

// method to create group
function createGroup($group)
{
    include($_SERVER['DOCUMENT_ROOT']."/employee/connection/connect.php");


   $query = "INSERT INTO `tbl_group` (`groupname`,`date_created`)
		     VALUES
             (".
			 "'".$group."',".
			 "'".date("d/m/y")."'".
			 ")";
   	//echo $query;
	 if($dbh->exec($query))
	 {
		 $msg = "<div class='alert alert-success'>".$group." group created </div>";
	 }
	 else
	 {
		$msg="<div class='alert alert-danger'>Some error occured</div>";
	  }

return $msg;
}

//method to know if user exists in group
public function userExistsinGroup($userr,$group)
{
   include("../connection/connect.php");
     //prepare stmt
	 $sql = "SELECT usr FROM tbl_user_group WHERE groupname ='".$group."'";
   try {
       $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
	   if($row['usr'] ==$userr)
	   {
	   return true;
	   }
	   else
	   return false;

   $stmt = null;
 }
 catch (PDOException $e) {
   print $e->getMessage();
 }

}


}

?>