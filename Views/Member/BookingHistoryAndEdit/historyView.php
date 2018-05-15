<?php
class historyView
{
	public function history($orderDto)
	{
		include('bookinghistory.php');
	}
	public function detailhistory($seatOrder, $teamRoomOrder, $confRoomOrder)
	{
		include('bookinghistorydetails.php');
	}
}
?>