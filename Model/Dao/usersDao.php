
<?php 
	class usersDao extends baseDao
	{
		public static function instance()
		{
			return new usersDao();
		}
		public function __construct()
		{
			//goi khoi tao cua baseDao(lop cha)
			baseDao::__construct();
		}
//Admin----------------------------------------------------------------------------------------------------------------------------------------
		//Trả về tất cả bản ghi------------------------------------------------------------------------------------------------------
		public function Query()
		{
			return $query = "SELECT users.username, users.firstName, users.lastName 
						,case users.gender WHEN 1 THEN 'Male' ELSE 'Female' END AS Gen 
						,users.dateOfBirth, users.phone, users.email, roles.roles 
					FROM users JOIN roles ON users.roles= roles.code order by users.roles";
		}
		public function getAll()
		{
			$arr = array();
			$query=$this->Query();
			$result = $this->executeSelectPart($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$usersDto=$this->getDtoFromRow($row);
				$arr[] = $usersDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		public function GetCountRecord()
		{
			$query=$this->Query();
			return $this->CountRecordExecuteSelect($query);
		}
		//Thêm Admin------------------------------------------------------------------------------------------------------
		public function addAdmin($usersDto)
		{
			$query = "INSERT INTO users(username, pass, roles, firstName, lastName, gender, dateOfBirth, phone, email) VALUES
						('".$usersDto->getusername()."','".$usersDto->getpass()."',1,
						'".$usersDto->getfirstName()."','".$usersDto->getlastName()."',".$usersDto->getgender().",
						'".$usersDto->getdateOfBirth()."','".$usersDto->getphone()."','".$usersDto->getemail()."')";
			$this->executeNonQuery($query);	
		}
		//Xóa admin (xóa quyền admin; k xóa tài khoản)--------------------------------------------------------------------
		public function deleteAdminRole($user){
			$query= "update users set roles=3 where username='$user'";
			$this->executeNonQuery($query);
		}
//Guest----------------------------------------------------------------------------------------------------------------------------------------
	//Login------------------------------------------------------------------------------------------------------
		public function login($usersDto)
		{
			//Kiểm tra user và pass
			$query= "select * from users where username='".$usersDto->getusername()."' and pass = '".$usersDto->getpass()."'";
			$result=$this->executeSelect($query);
			$row=mysqli_fetch_array($result);
			$sobanghi =mysqli_num_rows($result);
				if($sobanghi>0)
				{
					//Tao session----------------------------------
					$_SESSION['user']=$usersDto->getusername();
					$_SESSION['pass']=$usersDto->getpass();
					$_SESSION['role']=$usersDto->getroles($usersDto->setroles($row["roles"]));

					//Chuyen den trang----------------------------------
					if($_SESSION['role']==1)
						common::redirectPage('../Admin/HomeAdmin.php');
					else if($_SESSION['role']==2)
						common::redirectPage('../Member/HomeMember.php');
					else common::redirectPage('?eraccount');
				}
				else common::redirectPage('?action=login&errlogin');	
		}
	//Register------------------------------------------------------------------------------------------------------
		public function register($usersDto)
		{
			$common= "loginOrRegis.php?action=register";
			if($this->getUserNameUsedREGIS($usersDto->getusername())>=1)
				$common.="&userUsed";
			if($this->getMailUsedREGIS($usersDto->getemail())>=1)
				$common.="&mailUsed";
			if($this->getPhoneUsedREGIS($usersDto->getphone())>=1)
				$common.="&phoneUsed";
			
			if($this->getUserNameUsedREGIS($usersDto->getusername())>=1 || $this->getMailUsedREGIS($usersDto->getemail())>=1 
				|| $this->getPhoneUsedREGIS($usersDto->getphone())>=1)
				common::redirectPage($common);
				
			else
			{
			//Dang ki----------------------------------
			$query = "INSERT INTO users(username, pass, roles, firstName, lastName, gender, dateOfBirth, phone, email) VALUES
						('".$usersDto->getusername()."','".$usersDto->getpass()."',2,
						'".$usersDto->getfirstName()."','".$usersDto->getlastName()."',".$usersDto->getgender().",
						'".$usersDto->getdateOfBirth()."','".$usersDto->getphone()."','".$usersDto->getemail()."')";
			$this->executeNonQuery($query);
			//Tao session----------------------------------
				$_SESSION['user']=$usersDto->getusername();
				$_SESSION['pass']=$usersDto->getpass();
				$_SESSION['role']=2;
				//Chuyen den trang----------------------------------
				common::redirectPage('../Member/HomeMember.php');
			}
		}
		
	//forgotpass------------------------------------------------------------------------------------------------------
		public function forgotpass($usersDto)
		{
			//Xác thực thông tin cá nhân (username, date of birth, phone, email )----------------------------------
			$query= "select * from users 
					WHERE email = '".$usersDto->getemail()."'";
			$result=$this->executeSelect($query);
			$row=mysqli_fetch_array($result);
			$sobanghi =mysqli_num_rows($result);
				if($sobanghi>0)
				{
					$_SESSION['user']=$usersDto->getusername($usersDto->setusername($row["username"]));
					$_SESSION['role']=$usersDto->getroles($usersDto->setroles($row["roles"]));

					include("../../CssJavaScriptJquery/PHPMailer/class.smtp.php");
					require_once("../../CssJavaScriptJquery/PHPMailer/class.phpmailer.php");
					$mail = new PHPMailer();
					$mail->IsSMTP();	// telling the class to use SMTP
					$mail->SMTPDebug = 0;
					// 0 = no output, 1 = errors and messages, 2 = messages only.
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = "tls";
					$mail->Host = "smtp.gmail.com"; 
					$mail->Port = 587;	// set the SMTP port for the  GMAIL
					$mail->Username = "huyenthudangthanh@gmail.com";	// Gmail your username
					$mail->Password = "";	// Gmail your password
					$mail->CharSet = 'windows-1250';
					$mail->SetFrom ('thudang84488@gmail.com', 'Coworking Space');
					$mail->AddAddress ($usersDto->getemail(), $usersDto->getusername($usersDto->setusername($row["username"])));
//					$mail->AddCC ( 'hanhkd@bkacad.com', 'Example.com Sales  Dep.');
//					$mail->AddBCC ( 'hanhkd@bkacad.com', 'Example.com Sales  Dep.');
					$mail->Subject = "Recover Password in Coworking Space";
					//$mail->ContentType = 'text/plain';
					//$mail->IsHTML(false);
					$mail->IsHTML(true);
					$mail->Body = "<a href='http://localhost:8080/project2/Manage/Guest/loginOrRegis.php?action=recoverpass'>Click here</a> to recover password";
//					$mail->AddAttachment("abc.xls");

					// you may also use this format $mail->AddAddress ($recipient);  
					if(!$mail->Send())
					{
					echo $error_message = "Mailer Error: " . $mail->ErrorInfo;
					} else
					{
					echo( "<h3>An email has been sent to your email account for password recovery.</h3>");
					}

				}
				else common::redirectPage('?action=forgotpass&errecover');
			if($row['roles']==3) common::redirectPage('?eraccount');
		}
	//Recover Pass------------------------------------------------------------------------------------------------------
		public function RecoverPass($newpass)
		{
			$query = "UPDATE users SET pass='$newpass'
					WHERE username='".$_SESSION['user']."'";
			$this->executeNonQuery($query);
			$_SESSION['pass']= $newpass;
				if($_SESSION['role']==1)
					common::redirectPage('../Admin/HomeAdmin.php');
				else
					common::redirectPage('../Member/HomeMember.php');
		}
		
//Member----------------------------------------------------------------------------------------------------------------------------------------
	//Change Information------------------------------------------------------------------------------------------------------
		//Lấy ra thông tin cá nhân----------------------------------
		public function getOne($id)
		{
			$query = "select *,case users.gender WHEN 1 THEN 'Male' ELSE 'Female' END AS Gen 
			 from users where username='$id'";
			$result = $this->executeSelect($query);
			$usersDto = new usersDto();
			if($row = mysqli_fetch_array($result))
			{			
				$usersDto=$this->getDtoFromRow($row);				
			}
			$this->DisConnectDB();
			return $usersDto;
		}
		
		//Change Infor (Thay đổi thông tin)----------------------------------
		public function update($usersDto)
		{
			$common= "Personal.php?action=editInfor";
			if($this->getMailUsedChangeInfor($usersDto->getemail())>=1)
				$common.="&mailUsed";
			if($this->getPhoneUsedChangeInfor($usersDto->getphone())>=1)
				$common.="&phoneUsed";
			
			if($this->getMailUsedChangeInfor($usersDto->getemail())>=1 || $this->getPhoneUsedChangeInfor($usersDto->getphone())>=1)
				common::redirectPage($common);
			else
			{	
			$query = "UPDATE users SET
						firstName='".$usersDto->getfirstName()."', lastName='".$usersDto->getlastName()."'
						,gender=".$usersDto->getgender().", dateOfBirth='".$usersDto->getdateOfBirth()."'
						,phone='".$usersDto->getphone()."', email='".$usersDto->getemail()."'
					WHERE username='".$usersDto->getusername()."'";
			$this->executeNonQuery($query);
			common::redirectPage('../Admin/HomeAdmin.php');
			}
		}
		
	//Change Pass------------------------------------------------------------------------------------------------------
		public function changePass($oldpass,$newpass)
		{
			//Xac nhận mật khẩu cũ----------------------------------
			$sql= "select * from users where username='". htmlentities($_SESSION['user']) ."'";
			$result = $this->executeSelect($sql);
			$row=  mysqli_fetch_array($result);
			if($row['pass']==$oldpass)
			{
				//Cập nhật mật khẩu mới----------------------------------
				$query= "UPDATE users SET
							pass='".$newpass."'
						WHERE username='".htmlentities($_SESSION['user'])."'";
				$this->executeNonQuery($query);
				common::redirectPage('../Admin/Seats.php');
			}
			else common::redirectPage('?action=editPass&eroldpass');
		}
		
//Chung----------------------------------------------------------------------------------------------------------------------------------------
		private function getDtoFromRow($row)
		{
			$usersDto = new usersDto();
			$usersDto->setusername($row["username"]);
			$usersDto->setroles($row["roles"]);
			$usersDto->setfirstName($row["firstName"]);
			$usersDto->setlastName($row["lastName"]);
			$usersDto->setgender($row["Gen"]);
			$usersDto->setdateOfBirth($row["dateOfBirth"]);
			$usersDto->setphone($row["phone"]);
			$usersDto->setemail($row["email"]);
			return $usersDto;
		}
		
		public function getName($user)//Hiển thị tên thay vì username(sau khi login)
		{
			$query = "SELECT concat(firstName, ' ',lastName) as Name from users  WHERE username='$user'";
			$result = $this->executeSelect($query);
			$row= mysqli_fetch_array($result);
			return $row['Name'];
			$this->DisConnectDB();
		}
		//Validate(Không được phép trùng với cái đã có)
		public function getUserNameUsedREGIS($user)//Username
		{
			$query="SELECT username FROM users WHERE username='$user'";
			$result=$this->executeSelect($query);
			return $sobanghi =mysqli_num_rows($result);
			$this->DisConnectDB();
		}
		public function getPhoneUsedREGIS($phone)
		{
			$query="SELECT phone FROM users WHERE phone='$phone'";
			$result=$this->executeSelect($query);
			return $sobanghi =mysqli_num_rows($result);
			$this->DisConnectDB();
		}
		public function getMailUsedREGIS($email)
		{
			$query="SELECT email FROM users WHERE email='$email'";
			$result=$this->executeSelect($query);
			return $sobanghi =mysqli_num_rows($result);
			$this->DisConnectDB();
		}
		//Validate(Không được phép trùng với cái đã có)
		public function getPhoneUsedChangeInfor($phone)
		{
			$query="SELECT phone FROM users WHERE phone NOT in (SELECT phone FROM users WHERE username='".$_SESSION['user']."') AND  phone='$phone'";
			$result=$this->executeSelect($query);
			return $sobanghi =mysqli_num_rows($result);
			$this->DisConnectDB();
		}
		public function getMailUsedChangeInfor ($email)
		{
			$query="SELECT email FROM users WHERE email NOT in (SELECT email FROM users WHERE username='".$_SESSION['user']."') AND  email='$email'";
			$result=$this->executeSelect($query);
			return $sobanghi =mysqli_num_rows($result);
			$this->DisConnectDB();
		}
	}
?>
