<?php
class teamroomsController
{
	public static function instance()
	{
		return new teamroomsController();
	}
	public function invoke()
	{
		$action="";
		if (isset($_GET['action']))
			$action= htmlentities($_GET['action']);
		switch($action)
		{
			case "":
			{
				$arr= teamroomsLogic::instance()->getAll();
				teamroomView::showList($arr);
				break;
			}
			case "add":
			{
				if(isset($_POST['save']))
				{
					$teamroomDto= new teamroomsDto();
					$teamroomDto->setroomNumber(htmlentities($_POST['teamroomnumber']));
					$teamroomDto->setroomType(htmlentities($_POST['teamroomtype']));
					$teamroomDto->setdescription(htmlentities($_POST['Description']));
					teamroomsLogic::instance()->insert($teamroomDto);
					common::redirectPage('TeamRooms.php');
				}
				else
				{
					$arrTeamRoomTypes= teamroomtypesLogic::instance()->getAll();
					$newCode=teamroomsDao::instance()->getNewestCode();
					teamroomView::showInsert($arrTeamRoomTypes,$newCode);
				}
				break;
			}
			case "edit":
			{
				if(isset($_POST['save']))
				{
					$teamroomDto= new teamroomsDto();
					$teamroomDto->setroomNumber(htmlentities($_POST['teamroomnumber']));
					$teamroomDto->setroomType(htmlentities($_POST['teamroomtype']));
					$teamroomDto->setdescription(htmlentities($_POST['Description']));
					teamroomsLogic::instance()->update($teamroomDto);
					common::redirectPage('TeamRooms.php');
				}
				else
				{
					$id=htmlentities($_GET['id']);
					$teamroomDto= teamroomsLogic::instance()->getOne($id);
					$arrTeamRoomTypes= teamroomtypesLogic::instance()->getAll();
					teamroomView::showEdit($teamroomDto,$arrTeamRoomTypes);
				}
				break;
			}
			case "delete":
			{
				$id=htmlentities($_GET['id']);
				teamroomsLogic::instance()->delete($id);
				common::redirectPage('TeamRooms.php');
				break;
			}
		}
	}
}
?>