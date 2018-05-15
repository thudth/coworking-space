<?php 
	class common
	{
		public static function redirectPage($page)
		{
			header("Location:".$page);
		}
	}
?>