<?php 
	class conferenceroomView
	{
		public static function showList($arr)
		{			
			include("conferenceroom_managing.php");
		}
		public static function showEdit($conferenceroomDto,$arrConferenceroomtype)
		{
			include("conferenceroom_edit.php");
		}
		public static function showInsert($arrConferenceroomtype,$newCode)
		{
			include("conferenceroom_add.php");
		}
	}
?>