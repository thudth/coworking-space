<?php
class bookView
{
	public static function BangGia($SeatPrice,$arrTeamRoomPrice,$arrConfRoomPrice)
	{
		include('PriceList.php');
	}
	
	public static function SeatBook()
	{
		include('booking_form_seats.php');
	}
	
	public static function TeamRoomBook($teamroomtypes)
	{
		include('booking_form_teamroom.php');
	}
	
	public static function ConferenceRoomBook($confRoomTypes)
	{
		include('booking_form_conference.php');
	}
	
	public static function Cart($SeatDto,$arrTeamRoomDto,$arrConfRoomDto, $orderDto)
	{
		include('cart.php');
	}
}
?>