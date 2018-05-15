<?php
class scheduleView
{
	public function seatSchedule($seatUse,$seatEmpty)
	{
		include('seatSchedule.php');
	}
	public function teamroomSchedule($teamroomUse,$teamroomEmpty)
	{
		include('teamroomSchedule.php');
	}
	public function confRoomSchedule($confRoomUse,$confRoomEmpty)
	{
		include('confRoomSchedule.php');
	}
}
?>