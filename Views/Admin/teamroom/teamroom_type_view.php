<?php 
	class teamroom_typeView
	{
		public static function showList($arr)
		{			
			include("teamroom_type.php");
		}
		public static function showEdit($teamroomtypesDto)
		{
			include("teamroom_type_edit.php");
		}
		public static function showInsert($newcode)
		{
			include("teamroom_type_add.php");
		}
	}
?>