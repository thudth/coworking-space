<?php
class conferenceroomtypesController
{
	public static function instance(){
		return new conferenceroomtypesController();
	}
	public function invoke(){
		$action= "";
		if(isset($_GET['action']))
			$action= htmlentities($_GET['action']);
		switch ($action)
		{
			case "":
			{
				$arr=conferenceroomtypesLogic::instance()->getAll();
				conferenceroomtypeView::showList($arr);
				break;
			}
			case "add":
			{
				if (isset($_POST['save']))
				{
					$conferenceroomtypesDto = new conferenceroomtypesDto();
					$conferenceroomtypesDto->setcode(htmlentities($_POST['conferenceroomcode']));
					$conferenceroomtypesDto->setname(htmlentities($_POST['conferenceroomtype']));
					$conferenceroomtypesDto->setpricePerHour(htmlentities($_POST['pph']));
					$conferenceroomtypesDto->setnote(htmlentities($_POST['note']));
					conferenceroomtypesLogic::instance()->insert($conferenceroomtypesDto);
					common::redirectPage('ConferenceRoomType.php');
				}
				else 
					$newcode=conferenceroomtypesDao::instance()->getNewestCode();
					conferenceroomtypeView::showInsert($newcode);
				break;
			}
			case "edit":
			{
				if (isset($_POST['save']))
				{
					$conferenceroomtypesDto = new conferenceroomtypesDto();
					$conferenceroomtypesDto->setcode(htmlentities($_POST['conferenceroomcode']));
					$conferenceroomtypesDto->setname(htmlentities($_POST['conferenceroomtype']));
					$conferenceroomtypesDto->setpricePerHour(htmlentities($_POST['pph']));
					$conferenceroomtypesDto->setnote(htmlentities($_POST['note']));
					conferenceroomtypesLogic::instance()->update($conferenceroomtypesDto);
					common::redirectPage('ConferenceRoomType.php');
				}
				else 
				{
					$id=htmlentities($_GET['id']);
					$conferenceroomtypesDto = conferenceroomtypesLogic::instance()->getOne($id);
					conferenceroomtypeView::showEdit($conferenceroomtypesDto);
				}
				break;
			}
			case "delete":
			{
				$id=htmlentities($_GET['id']);
				$conferenceroomtypesDto= conferenceroomtypesLogic::instance()->delete($id);
				common::redirectPage('conferenceroomtype.php');
				break;
			}
		}
	}
}
?>