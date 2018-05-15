<?php 
	class seatsView
	{
		public static function showList($arr)
		{			
			include("seats_managing.php");
		}
		public static function showEdit($seatsDto)
		{
			include("seats_edit.php");
		}
		public static function showInsert($newcode)
		{
			include("seats_add.php");
		}
		public static function showChangePrice($oldPrice)
		{
			include("seat_price_change.php");
		}
	}
?>