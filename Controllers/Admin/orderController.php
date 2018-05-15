<?php
class orderController
{
	public static function instance()
	{
		return new orderController();
	}
	public function invoke()
	{
		$action="";
		if(isset($_GET['action']))
			$action=htmlentities($_GET['action']);
		switch($action)
		{
			case "":
				$a= ordersLogic::instance()->getAll();
				$tongtrang=ordersDao::instance()->CountRecord();
				$arrOrderState=orderstateDao::instance()->getAll();
				orderView::ListOrder($a,$tongtrang,$arrOrderState);
				break;
			
			case "detail":
				
				$ordercode= htmlentities($_GET['id']);
				$arrSeatOrder=ordersLogic::instance()-> getSeatDetail($ordercode);
				$arrTeamRoomOrder=ordersLogic::instance()-> getTeamRoomDetail($ordercode);
				$arrConferenceOrder=ordersLogic::instance()-> getConferenceRoomDetail($ordercode);
				
				orderView::OrderDetail($arrSeatOrder,$arrTeamRoomOrder, $arrConferenceOrder);
				break;
			
			
			case "upStatus":
				
				$ordercode= htmlentities($_GET['id']);
				ordersLogic::instance()->  updateStatus($ordercode);
				common::redirectPage('Order.php');
				break;
				
			case "allocate":
				$ordercode= htmlentities($_GET['id']);
				$arrSeatOrder=ordersLogic::instance()-> getSeatDetail($ordercode);
				$arrTeamRoomOrder=ordersLogic::instance()-> getTeamRoomDetail($ordercode);
				$arrConferenceOrder=ordersLogic::instance()-> getConferenceRoomDetail($ordercode);
				
				if(isset($_POST['allocate']))
				{
					foreach ($arrSeatOrder as $a)
					{
						$seatsAllocateDto= new seatbookingdetailDto();
						$seatsAllocateDto->setcode($a->getcode());
						$seatsAllocateDto->setseatNumber(htmlentities($_POST[$a->getcode()]));
						ordersLogic::instance()->allocateSeat($seatsAllocateDto);
					}
					foreach ($arrTeamRoomOrder as $a)
					{
						$TeamRoomAllocateDto= new teamroombookingdetailDto();
						$TeamRoomAllocateDto->setcode($a->getcode());
						$TeamRoomAllocateDto->setroomNumber(htmlentities($_POST[$a->getcode()]));
						echo $TeamRoomAllocateDto->getroomNumber();
						ordersLogic::instance()->allocateTeamRoom($TeamRoomAllocateDto);
					} 
					foreach ($arrConferenceOrder as $a)
					{
						$ConferenceRoomAllocateDto= new conferenceroombookingdetailDto();
						$ConferenceRoomAllocateDto->setcode($a->getcode());
						$ConferenceRoomAllocateDto->setroomNumber(htmlentities($_POST[$a->getcode()]));
						ordersLogic::instance()->allocateConferenceRoom($ConferenceRoomAllocateDto);
					}  
						ordersLogic::instance()-> updateInforAllocate($ordercode);
						common::redirectPage('Order.php');
				}
				else
				{
					//SeatFit
					$arSeatFit= array();
					for($a=0; $a<count($arrSeatOrder); $a++)
					{
						$SeatOrderInfor = new seatbookingdetailDto();
						$SeatOrderInfor->setstartingDate($arrSeatOrder[$a]->getstartingDate());
						$SeatOrderInfor->setfinishingDate($arrSeatOrder[$a]->getfinishingDate());
						$SeatFit= ordersLogic::instance()->getSeatsFit($SeatOrderInfor);
						$arSeatFit[]= $SeatFit;
					}			
					//TeamRoomFit			
					$arTeamRoomFit= array();
					for($a=0; $a<count($arrTeamRoomOrder); $a++)
					{
						$TeamRoomOrderInfor = new teamroombookingdetailDto();
						//$TeamRoomOrderInfor->setcode($arrTeamRoomOrder[$a]->getcode());
						$TeamRoomOrderInfor->setroomType($arrTeamRoomOrder[$a]->getroomType());
						$TeamRoomOrderInfor->setstartingDate($arrTeamRoomOrder[$a]->getstartingDate());
						$TeamRoomOrderInfor->setfinishingDate($arrTeamRoomOrder[$a]->getfinishingDate());
						//$TeamRoomOrderInfor->setlengthoftime($arrTeamRoomOrder[$a]->getlengthoftime());
						$TeamRoomFit= ordersLogic::instance()->getTeamroomsFit($TeamRoomOrderInfor);
						$arTeamRoomFit[]= $TeamRoomFit;
					}
					//ConferenceRoom
					$arConferenceRoomFit= array();
					for($a=0; $a<count($arrConferenceOrder); $a++)
					{
						$ConferenceRoomOrderInfor = new conferenceroombookingdetailDto();
						$ConferenceRoomOrderInfor->setroomType($arrConferenceOrder[$a]->getroomType());
						$ConferenceRoomOrderInfor->setdate($arrConferenceOrder[$a]->getdate());
						$ConferenceRoomOrderInfor->setstartingTime($arrConferenceOrder[$a]->getstartingTime());
						$ConferenceRoomOrderInfor->setfinishingTime($arrConferenceOrder[$a]->getfinishingTime());
						$ConferenceRoomFit= ordersLogic::instance()->getConferenceRoomFit($ConferenceRoomOrderInfor);
						$arConferenceRoomFit[]= $ConferenceRoomFit;
					}
					//echo count($arrSeatOrder);
					orderView::OrderAllocate($arrSeatOrder,$arSeatFit, $arrTeamRoomOrder,$arTeamRoomFit, $arrConferenceOrder,$arConferenceRoomFit);
				}
					break;
		}
	}
}
?>