<?php
class rolesController 
{
	public static function instance(){
		return new rolesController();
	}
	public function invoke()
	{
		$action="";
		if(isset($_GET['action']))
			$action= htmlentities($_GET['action']);
		switch($action)
		{
			case "":
			{
				$arr=rolesLogic::instance()->getAll();
				rolesView::showList($arr);
				break;
			}
			case "add":
			{
				if(isset($_POST['Save']))
				{
					$rolesDto= new rolesDto();
					$rolesDto->setcode(htmlentities($_POST['code']));
					$rolesDto->setrole(htmlentities($_POST['role']));
					rolesLogic::instance()->insert($rolesDto);
					common::redirectPage('Roles.php');
				}
				else
					rolesView::showAdd();
				break;
			}
			case "edit":
			{
				if(isset($_POST['Save']))
				{
					$rolesDto= new rolesDto();
					$rolesDto->setcode(htmlentities($_POST['code']));
					$rolesDto->setrole(htmlentities($_POST['role']));
					rolesLogic::instance()->update($rolesDto);
					common::redirectPage('Roles.php');
				}
				else
				{
					$id= htmlentities($_GET['id']);
					$rolesDto=rolesLogic::instance()->getOne($id);
					rolesView::showEdit($rolesDto);
				}
				break;
			}
			case "delete":
			{
				$id= htmlentities($_GET['id']);
				rolesLogic::instance()->delete($id);
				common::redirectPage('Roles.php');
				break;
			}
		}
	}
}
?>