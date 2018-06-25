<?php 
class scheduleController
{
	public static function instance()
	{
		return new scheduleController();
	}
	public function invoke()
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$action="seat";
		if(isset($_GET['action']))
			$action= $_GET['action'];
		switch($action)
		{
			case "seat":
			{
				$date= date('Y/m/d');
				if(isset($_POST['date']))
					$date= $_POST['date'];
				$seatUse=scheduleDao::instance()->seatUse($date);
				$seatEmpty=scheduleDao::instance()->seatEmpty($date);
				$seatNotYetAllocate=scheduleDao::instance()->seatNotYetAllocate($date);
				scheduleView::seatSchedule($seatUse,$seatEmpty,$seatNotYetAllocate);
				break;
			}
			case "teamroom":
			{
				$date= date('Y/m/d');
				if(isset($_POST['date']))
					$date= $_POST['date'];
				$teamroomUse=scheduleDao::instance()->teamroomUse($date);
				$teamroomEmpty=scheduleDao::instance()->teamroomEmpty($date);
				$TeamRoomNotYetAllocate=scheduleDao::instance()->TeamRoomNotYetAllocate($date);
				scheduleView::teamroomSchedule($teamroomUse,$teamroomEmpty, $TeamRoomNotYetAllocate);
				break;
			}
			case "confroom":
			{
				$hour=date('H');
				$date= date('Y/m/d');
				if(isset($_POST['date'])&& $_POST['date']!='')
					$date= $_POST['date'];
				if(isset($_POST['hour'])&& $_POST['hour']!='chọn')
					$hour= $_POST['hour'];
				$confroomUse=scheduleDao::instance()->ConfRoomUse($date,$hour);
				$confroomEmpty=scheduleDao::instance()->ConfroomEmpty($date,$hour);
                $ConfRoomNotYetAllocate=scheduleDao::instance()->ConfRoomNotYetAllocate($date,$hour);
				scheduleView::confroomSchedule($confroomUse,$confroomEmpty, $ConfRoomNotYetAllocate);
				break;
			}
		}
	}
}
?>