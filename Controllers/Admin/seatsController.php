<?php
class seatsController{
	public static function instance(){
		return new seatsController();
	}
	public function invoke(){
		$action="";
		if(isset($_GET['action']))
			$action = htmlentities($_GET['action']);
		switch($action){
			case "":
			{
				$arr= seatsLogic::instance()->getAll();
				seatsView::showList($arr);
				break;
			}
			case "insert":
			{
				if(isset($_POST['Save']))
				{
					$seatsDto= new seatsDto();
					//$seatsDto->setcode(htmlentities($_POST['code']));
					$seatsDto->setseatnumber(htmlentities($_POST['seatnumber']));
					$seatsDto->setpricePerDay(htmlentities($_POST['ppd']));
					$seatsDto->setnote(htmlentities($_POST['note']));
					seatsLogic::instance()->insert($seatsDto);
					common::redirectPage('Seats.php');
				}
				else
				{
					$newcode=seatsDao::instance()->getNewestCode();
					seatsView::showInsert($newcode);
				}
				break;
			}
			case "edit":
			{
				if(isset($_POST['Save']))
				{
					$seatsDto= new seatsDto();
					$seatsDto->setcode(htmlentities($_POST['code']));
					$seatsDto->setseatnumber(htmlentities($_POST['seatnumber']));
					$seatsDto->setpricePerDay(htmlentities($_POST['ppd']));
					$seatsDto->setnote(htmlentities($_POST['note']));
					seatsLogic::instance()->update($seatsDto);
					common::redirectPage('Seats.php');
				}
				else
				{
					$id=htmlentities($_GET['id']);
					$seatsDto=seatsLogic::instance()->getOne($id);
					seatsView::showEdit($seatsDto);
				}
				break;
			}
			case "changePrice":
			{
				if(isset($_POST['Save']))
				{
					seatsDao::instance()->ChangePrice($_POST['ppd']);
					common::redirectPage('Seats.php');
				}
				else
				{
					$oldPrice=seatsDao::instance()->getOldPrice();
					seatsView::showChangePrice($oldPrice);
				}
				break;
			}
			case "delete":
			{
				$id=htmlentities($_GET['id']);
				seatsLogic::instance()->delete($id);
				common::redirectPage('Seats.php');
			}
		}
	}
}
?>