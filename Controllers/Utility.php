<?php

class Utility
{

public function getUserDetails($email)
{
   include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
     //prepare stmt
     $sql = 'SELECT fullname,email,date_registered,last_login,user_status,user_ip_address FROM tbl_users WHERE email = :email';
		  		 	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
					$sth->execute(array(':email' => $email));
		   			$rslt = $sth->fetchAll();
		 		  	$count = $sth->rowCount();

					if($count >0)
					{
					return $rslt;
					}
}

public function getallDetailsofUser($email)
{
   include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
     //prepare stmt
     $sql = 'SELECT * FROM tbl_users WHERE email = :email';
		  		 	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
					$sth->execute(array(':email' => $email));
		   			$rslt = $sth->fetchAll();
		 		  	$count = $sth->rowCount();

					if($count >0)
					{
					return $rslt;
					}
}

public function updateUser($email,$fullname,$password)
{
	 include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");

	 // update
	 $query ="UPDATE tbl_users SET fullname = :fullname, password = :password WHERE email = :email";
	$count = $dbh->prepare($query,array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	$count->execute(array(':fullname' => $fullname,':password' => $password, ':email' => $email));
		 		  	$c = $count->rowCount();

					return $c;

}



//method to know if user exists
public function userExists($email)
{
include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
     //prepare stmt
     $sql = 'SELECT * FROM tbl_users WHERE email = :email';
		  		 	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
					$sth->execute(array(':email' => $email));
		   			$rslt = $sth->fetchAll();
		 		  	$count = $sth->rowCount();
                
					if($count >0)
					{
					return true;
					}
					else
					{
					return false;
					}

}

}

?>