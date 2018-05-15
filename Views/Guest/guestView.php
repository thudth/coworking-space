<?php
class guestView
{
	public static function login()
	{
		include('login.php');
	}
	public static function register()
	{
		include('register.php');
	}
	public static function forgotpass()
	{
		include('forgotpass.php');
	}
	public static function recoverpass()
	{
		include('recoverPass.php');
	}
}
?>