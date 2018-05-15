<?php
class orderstateController
{
	public static function instance()
	{
		return new orderstateController();
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
				$arr= orderstateLogic::instance()->getAll();
				orderstatusView::showList($arr);
				break;
			}
			case "insert":
			{
				if(isset($_POST['save']))
				{
					$orderstateDto =new orderstateDto();
					$orderstateDto->setcode(htmlentities($_POST['code']));
					$orderstateDto->setstatus(htmlentities($_POST['status']));
					orderstateLogic::instance()->insert($orderstateDto);
					common::redirectPage('Orderstate.php');
				}
				else
				{
					orderstatusView::showInsert();
				}
				break;
			}
			case "edit":
			{
				if(isset($_POST['save']))
				{
					$orderstateDto =new orderstateDto();
					$orderstateDto->setcode(htmlentities($_POST['code']));
					$orderstateDto->setstatus(htmlentities($_POST['status']));
					orderstateLogic::instance()->update($orderstateDto);
					common::redirectPage('Orderstate.php');
				}
				else
				{
					$id=htmlentities($_GET['id']);
					$orderstateDto=orderstateLogic::instance()->getOne($id);
					orderstatusView::showEdit($orderstateDto);
				}
				break;
			}
			case "delete":
			{
				$id= htmlentities($_GET['id']);
				orderstateLogic::instance()->delete($id);
				common::redirectPage('Orderstate.php');
			}
		}
	}
}
?>