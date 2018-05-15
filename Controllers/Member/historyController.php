<?php
class historyController
{
	public static function instance()
	{
		return new historyController();
	}
	public function invoke()
	{
		if(isset($_SESSION['user'])&&isset($_SESSION['pass'])){
			if($_SESSION['role']==1)
				common::redirectPage('../Admin/HomeAdmin.php');}
		else common::redirectPage('../Guest/HomeGuest.php');
		
		$action="";
		if(isset($_GET['action']))
			$action= $_GET['action'];
		switch($action)
		{
			case "":
			{
				$orderDto=historyDao::instance()->getOrderHistory();
				historyView::history($orderDto);
				break;
			}
			case "detail":
			{
				$ordercode=$_GET['id'];
				$seatOrder= historyDao::instance()->seatOrderDetail($ordercode);
				$teamroomOrder= historyDao::instance()->TeamRoomOrderDetail($ordercode);
				$confroomOrder= historyDao::instance()->ConfRoomOrderDetail($ordercode);
				historyView::detailhistory($seatOrder,$teamroomOrder,$confroomOrder);
				break;
			}
			case "cancel":
			{
				$ordercode=$_GET['id'];
				$orderCancel= historyDao::instance()->orderCancel($ordercode);
				common::redirectPage('History.php#content');
				break;
			}
		}
	}
}
?>