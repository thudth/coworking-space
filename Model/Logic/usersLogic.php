<?php 	
	class usersLogic
	{	
		public static function instance()
		{
			return new usersLogic();
		}
		public function getAll()
		{			
			return usersDao::instance()->getAll();
		}
		public function delete($id)
		{
			usersDao::instance()->delete($id);	
		}
//Admin
		//add admin
		public function addAdmin($usersDto){
			usersDao::instance()->addAdmin($usersDto);
		}
		//Delete admin roles
		public function deleteAdminRole($username){
			usersDao::instance()->deleteAdminRole($username);
		}
//Guest
		//Login
		public function login($usersDto){
			usersDao::instance()->login($usersDto);
		}
		//Register
		public function register($usersDto)
		{
			usersDao::instance()->register($usersDto);	
		}
		//forgotpass
		public function forgotpass($usersDto)
		{
			usersDao::instance()->forgotpass($usersDto);	
		}
		//Recover Pass
		public function RecoverPass($newpass)
		{
			usersDao::instance()->RecoverPass($newpass);
		}
//Member
		//GetOne (tra ve thong tin cua khach)
		public function getOne($id)
		{
			return usersDao::instance()->getOne($id);
		}
		//Change Information
		public function update($usersDto)
		{
			usersDao::instance()->update($usersDto);
		}
		//Change pass
		public function changePass($oldpass,$newpass)
		{
			usersDao::instance()->changePass($oldpass,$newpass);
		}
	}
?>