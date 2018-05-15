<?php
class usermanagingController
{
	public static function instance(){
		return new usermanagingController();
	}
	public function invoke()
	{
		$action="";
		if(isset($_GET['action']))
			$action=htmlentities($_GET['action']);
		switch($action)
		{
			case "":
			{
				$arr= usersLogic::instance()->getAll();				
				$tongtrang=usersDao::instance()->GetCountRecord();
				usermanagingview::getAll($arr,$tongtrang);
				break;
			}
			case "add":
			{
				if(isset($_POST['save']))
				{
					echo 'thu';
					$a= new usersDto();
					$a->setfirstName(htmlentities($_POST['fname']));
					$a->setlastName(htmlentities($_POST['lname']));
					$a->setusername(htmlentities($_POST['uname']));
					$a->setpass(htmlentities($_POST['pass']));
					$a->setgender(htmlentities($_POST['gender']));
					$a->setdateOfBirth(htmlentities($_POST['dob']));
					$a->setphone(htmlentities($_POST['phone']));
					$a->setemail(htmlentities($_POST['email']));
					usersLogic::instance()->addAdmin($a);
					common::redirectPage('UserManaging.php');
				}
				else usermanagingview::add();
				break;
			}
			case "delete":
			{
				$username=htmlentities($_GET['user']);
				usersLogic::instance()->deleteAdminRole($username);
				common::redirectPage('UserManaging.php');
				break;
			}
		}
	}
}
?>