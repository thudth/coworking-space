<?php
class orderstatusView{
	public static function showList($arr){
		include ("orderstatus_managing.php");
	}
	public static function showEdit($orderstatusDto){
		include ("orderstatus_edit.php");
	}
	public static function showInsert(){
		include ("orderstatus_add.php");
	}
}
?>