<?php
class conferenceroomController
{
	public static function instance(){
		return new conferenceroomController();
	}
	public function invoke(){
		$action="";
		if(isset($_GET['action']))
			$action= htmlentities($_GET['action']);
		switch($action)
		{
			case "":
			{
				$arr= conferenceroomsLogic::instance()->getAll();
				conferenceroomView::showList($arr);
				break;				
			}
			case "add":
			{
				if(isset($_POST['save']))
				{
					$conferenceroomsDto= new conferenceroomsDto();
					$conferenceroomsDto->setroomNumber(htmlentities($_POST['conferenceroomnumber']));
					$conferenceroomsDto->setroomType(htmlentities($_POST['conferenceroomtype']));
					$conferenceroomsDto->setdescription(htmlentities($_POST['description']));
					conferenceroomsLogic::instance()->insert($conferenceroomsDto);
					common::redirectPage('ConferenceRoom.php');
				}
				else
				{
					$newCode= conferenceroomsDao::instance()->getNewestCode();
					$arrconference= conferenceroomtypesLogic::instance()->getAll();
					conferenceroomView::showInsert($arrconference,$newCode);
				}
				break;
			}
			case "edit":
			{
				if(isset($_POST['save']))
				{
					$conferenceroomsDto= new conferenceroomsDto();
					$conferenceroomsDto->setroomNumber(htmlentities($_POST['conferenceroomnumber']));
					$conferenceroomsDto->setroomType(htmlentities($_POST['conferenceroomtype']));
					$conferenceroomsDto->setdescription(htmlentities($_POST['description']));
					conferenceroomsLogic::instance()->update($conferenceroomsDto);
					common::redirectPage('ConferenceRoom.php');
				}
				else
				{
					$id= htmlentities($_GET['id']);
					$arrconference= conferenceroomtypesLogic::instance()->getAll();
					$conferenceRoomDto= conferenceroomsLogic::instance()->getOne($id);
					conferenceroomView::showEdit($conferenceRoomDto,$arrconference);
				}
				break;
			}
			case "delete":
			{
				$id= htmlentities($_GET['id']);
				conferenceroomsLogic::delete($id);
				common::redirectPage('ConferenceRoom.php');
				break;
			}
		}
	}
}
?>