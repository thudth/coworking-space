<?php
class guestController
{
	public static function instance()
	{
		return new guestController();
	}
	public function invoke()
	{
	session_start();
	if(isset($_SESSION['user'])&&isset($_SESSION['pass']))
	{
		if($_SESSION['role']==1)
			common::redirectPage('../Admin/HomeAdmin.php');
		if($_SESSION['role']==2)
			common::redirectPage('../Member/HomeMember.php');
	}
		$action="login";
		if(isset($_GET['action']))
			$action=htmlentities($_GET['action']);
		switch($action)
		{
			case "login":
			case "eraccount":
				if (isset($_POST['login']))
				{
					$login= new usersDto();
					$login->setusername(htmlentities($_POST['uname']));
					$login->setpass(htmlentities($_POST['pass']));
					usersLogic::instance()->login($login);
				}
				else
				{
					guestView::login();
				}
				break;
				
			case "register":
				if(isset($_POST['regis']))
				{
					$regis= new usersDto();
					$regis->setfirstName(htmlentities($_POST['fname']));
					$regis->setlastName(htmlentities($_POST['lname']));
					$regis->setusername(htmlentities($_POST['uname']));
					$regis->setpass(htmlentities($_POST['cpass']));
					$regis->setgender(htmlentities($_POST['gender']));
					$regis->setdateOfBirth(htmlentities($_POST['dob']));
					$regis->setphone(htmlentities($_POST['phone']));
					$regis->setemail(htmlentities($_POST['email']));
					usersLogic::instance()->register($regis);
				}
				else
					guestView::register();
				break;
				
			case "forgotpass":
				if(isset($_POST['redeem']))
				{
					$redeem= new usersDto();
					$redeem->setusername(htmlentities($_POST['uname']));
					$redeem->setdateOfBirth(htmlentities($_POST['dob']));
					$redeem->setphone(htmlentities($_POST['phone']));
					$redeem->setemail(htmlentities($_POST['email']));
					usersLogic::instance()->forgotpass($redeem);
				}
				else
					guestView::forgotpass();
				break;
				
			case "recoverpass":
				if(isset($_POST['save']))
				{
					$newpass=htmlentities($_POST['cpass']);
					usersLogic::instance()->RecoverPass($newpass);
				}
				else
					guestView::recoverpass();
				break;
		}
	}
}
?>