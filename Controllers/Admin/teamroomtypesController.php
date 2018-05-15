<?php
class teamroomtypesController
{
	public static function instance(){
		return new teamroomtypesController();
	}
	public function invoke(){
		$action= "";
		if(isset($_GET['action']))
			$action= htmlentities($_GET['action']);
		switch ($action)
		{
			case "":
			{
				$arr=teamroomtypesLogic::instance()->getAll();
				teamroom_typeView::showList($arr);
				break;
			}
			case "add":
			{
				if (isset($_POST['save']))
				{
					$teamroomtypesDto = new teamroomtypesDto();
					//$teamroomtypesDto->setcode(htmlentities($_POST['teamroomcode']));
					$teamroomtypesDto->setname(htmlentities($_POST['teamroomtype']));
					$teamroomtypesDto->setpricePerMonth(htmlentities($_POST['ppm']));
					$teamroomtypesDto->setnote(htmlentities($_POST['note']));
					teamroomtypesLogic::instance()->insert($teamroomtypesDto);
					common::redirectPage('TeamRoomTypes.php');
				}
				else 
					$newcode=teamroomtypesDao::instance()->getNewestCode();
					teamroom_typeView::showInsert($newcode);
				break;
			}
			case "edit":
			{
				if (isset($_POST['save']))
				{
					$teamroomtypesDto = new teamroomtypesDto();
					$teamroomtypesDto->setcode(htmlentities($_POST['teamroomcode']));
					$teamroomtypesDto->setname(htmlentities($_POST['teamroomtype']));
					$teamroomtypesDto->setpricePerMonth(htmlentities($_POST['ppm']));
					$teamroomtypesDto->setnote(htmlentities($_POST['note']));
					teamroomtypesLogic::instance()->update($teamroomtypesDto);
					common::redirectPage('TeamRoomTypes.php');
				}
				else 
				{
					$id=htmlentities($_GET['id']);
					$teamroomtypesDto= teamroomtypesLogic::instance()->getOne($id);
					teamroom_typeView::showEdit($teamroomtypesDto);
				}
				break;
			}
			case "delete":
			{
				$id=htmlentities($_GET['id']);
				$teamroomtypesDto= teamroomtypesLogic::instance()->delete($id);
				common::redirectPage('TeamRoomTypes.php');
				break;
			}
		}
	}
}
?>