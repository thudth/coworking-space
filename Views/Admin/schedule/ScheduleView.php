<?php
class scheduleView
{
	public function seatSchedule($seatUse,$seatEmpty,$seatNotYetAllocate)
	{
		include('seatSchedule.php');
	}
	public function teamroomSchedule($teamroomUse,$teamroomEmpty,$TeamRoomNotYetAllocate)
	{
		include('teamroomSchedule.php');
	}
	public function confRoomSchedule($confRoomUse,$confRoomEmpty,$ConfRoomNotYetAllocate)
	{
		include('confRoomSchedule.php');
	}
}
?>