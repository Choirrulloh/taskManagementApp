<?php
// add db connection class

class LoginController
{
  public function getloginCredentials($email,$password,$status)
  {
	  // only users who have verified their mails can log in
	   include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");
     //prepare stmt
     $sql = 'SELECT sn,email,fullname, password,user_status FROM tbl_users WHERE email = :email AND password =:password AND user_status =:status';
		  		 	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
                    // test for both email and username
		   			$sth->execute(array(':email' => $email, ':password' => md5($password), ':status' => $status ));
		   			$rslt = $sth->fetchAll();
		 		  	$count = $sth->rowCount();

					if($count >0 && $rslt[0]['user_status']==1)
					{
					return $rslt;
					}
					if($count >0 && $rslt[0]['user_status']==0)
					{
					header("location:index?r=You have not verified your account\nCheck your mail");
					}
					else
					{
						//emptyy result set
					$rslt['fullname'] ="";
					$rslt['password'] ="";
	                return $rslt;
					}


  }

  public function updateLastLogin($val,$usr,$st)
  {
	  include($_SERVER['DOCUMENT_ROOT']."/pma/connection/connect.php");

    $dbh->exec("UPDATE tbl_users SET last_login = '$val', login_status ='$st' WHERE email = "."'".$usr."'");

  }

}


?>