<?php
class orderView
{
	public static function ListOrder($arrOrder,$tongtrang,$arrOrderState)
	{
		include("reservation_managing.php");
	}
	
	public static function OrderDetail($arrSeatOrder,$arrTeamRoomOrder,$arrConferenceOrder)
	{
		include("reservation_details.php");
	}
	
	public static function OrderAllocate($arrSeatOrder,$arSeatFit, $arrTeamRoomOrder,$arTeamRoomFit, $arrConferenceOrder,$arConferenceRoomFit)
	{
		include("allocate.php");
	}/*
	public static function SeatFit($arSeatFit)
	{
		include("allocate.php");
	}*/
}
?>