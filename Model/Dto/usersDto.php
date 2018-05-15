<?php 
	class usersDto
	{
	//fields
		private  $username;
		private  $pass;
		private  $roles;
		private  $firstName;
		private  $lastName;
		private  $gender;
		private  $dateOfBirth;
		private  $phone;
		private  $email;
	//constructor
		public function __construct()
		{			
		}
	//setter,getter//username
		public function setusername($username)
		{
			$this->username = $username;
		}
		public function getusername()
		{
			return $this->username;
		}
	//Password
		public function setpass($pass)
		{
			$this->pass = $pass;
		}
		public function getpass()
		{
			return $this->pass;
		}
	//roles
		public function setroles($roles)
		{
			$this->roles = $roles;
		}
		public function getroles()
		{
			return $this->roles;
		}
	//first name
		public function setfirstName($firstName)
		{
			$this->firstName = $firstName;
		}
		public function getfirstName()
		{
			return $this->firstName;
		}
	//Last Name
		public function setlastName($lastName)
		{
			$this->lastName = $lastName;
		}
		public function getlastName()
		{
			return $this->lastName;
		}
	//Gender
		public function setgender($gender)
		{
			$this->gender = $gender;
		}
		public function getgender()
		{
			return $this->gender;
		}
	//Date Of Birth
		public function setdateOfBirth($dateOfBirth)
		{
			$this->dateOfBirth = $dateOfBirth;
		}
		public function getdateOfBirth()
		{
			return $this->dateOfBirth;
		}
	//Phone
		public function setphone($phone)
		{
			$this->phone = $phone;
		}
		public function getphone()
		{
			return $this->phone;
		}
	//Email
		public function setemail($email)
		{
			$this->email = $email;
		}
		public function getemail()
		{
			return $this->email;
		}
	}
?>