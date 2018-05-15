<?php 
	class teamroomView
	{
		public static function showList($arr)
		{			
			include("teamroom_list.php");
		}
		public static function showEdit($teamroomsDto,$arrteamroomtype)
		{
			include("teamroom_list_edit.php");
		}
		public static function showInsert($arrteamroomtype,$newCode)
		{
			include("teamroom_list_add.php");
		}
	}
?>