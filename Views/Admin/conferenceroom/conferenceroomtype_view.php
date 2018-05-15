<?php 
	class conferenceroomtypeView
	{
		public static function showList($arr)
		{			
			include("conferenceroomtype_managing.php");
		}
		public static function showEdit($conferenceroomtypeDto)
		{
			include("conferenceroomtype_edit.php");
		}
		public static function showInsert($newcode)
		{
			include("conferenceroomtype_add.php");
		}
	}
?>