<?php
class rolesView
{
	public static function showList($arrRole)
	{
		include ('roles_managing.php');
	}
	public static function showAdd()
	{
		include ('roles_add.php');
	}
	public static function showEdit($rolesDto)
	{
		include ('roles_edit.php');
	}
}
?>