<?php
class personalController
{
	public static function instance()
	{
		return new personalController();
	}
	public function invoke()
	{
		$action="editInfor";
		if(isset($_GET['action']))
			$action=htmlentities($_GET['action']);
		switch($action)
		{
			case "editInfor":
				
				if(isset($_POST['save']))
				{
					$infor= new usersDto();
					$infor->setusername(htmlentities($_SESSION['user']));
					$infor->setfirstName(htmlentities($_POST['fname']));
					$infor->setfirstName(htmlentities($_POST['fname']));
					$infor->setlastName(htmlentities($_POST['lname']));
					$infor->setgender(htmlentities($_POST['gender']));
					$infor->setdateOfBirth(htmlentities($_POST['dob']));
					$infor->setphone(htmlentities($_POST['phone']));
					$infor->setemail(htmlentities($_POST['email']));
					usersLogic::instance()->update($infor);
					//common::redirectPage('../Admin/HomeAdmin.php');
				}
				else
				{
					
					$username=htmlentities($_SESSION['user']);
					$arrInfor=usersLogic::instance()->getOne($username);
					personalView::changeInfor($arrInfor);
				}
				break;
				
			case "editPass":
				
				if(isset($_POST['save']))
				{
					$oldpass=md5(htmlentities($_POST['oldpass']));
					$newpass=md5(htmlentities($_POST['newpass']));
					usersLogic::instance()->changePass($oldpass,$newpass);
					//common::redirectPage('../Admin/HomeAdmin.php');
				}
				else
				{
					personalView::changePass();
				}
				break;
				break;
		}
	}
}
?>