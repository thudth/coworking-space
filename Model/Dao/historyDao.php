<?php
class historyDao extends baseDao
{
	public static function instance()
	{
		return new historyDao();
	}
	public function __construct()
	{
		baseDao::__construct();
	}
//Order Detaill____________________________________________________________________________________________________________________________________________
	public function getOrderHistory()
	{
		$arr= array();
		$query="SELECT orders.*, orderstate.status FROM orders JOIN orderstate on orders.orderState= orderstate.code  
				WHERE username='".$_SESSION['user']."' order by orders.orderDate desc";
		$result=$this->executeSelect($query);
		while($row=mysqli_fetch_array($result))
		{
			$historyRecord= new ordersDto();
			$historyRecord->setcode($row['code']);
			$historyRecord->setorderDate($row['orderDate']);
			$historyRecord->setorderState($row['orderState']);
			$historyRecord->setorderStateName($row['status']);
			$arr[]= $historyRecord;
		}
		$this->DisConnectDB();
		return $arr;
	}
	public function getOrderPayingAmount($ordercode)
	{
		$query="SELECT sum(payingAmount) 
				FROM 
				(
				SELECT conferenceroombookingdetail.payingAmount FROM conferenceroombookingdetail  WHERE ordercode= '$ordercode'
				UNION SELECT teamroombookingdetail.payingAmount FROM teamroombookingdetail WHERE ordercode= '$ordercode'
				UNION SELECT seatbookingdetail.payingAmount FROM seatbookingdetail WHERE ordercode= '$ordercode'
				) A";
		$result=$this->executeSelect($query);
		if($row=mysqli_fetch_array($result))
		{
			return $row['sum(payingAmount)'];
		}
		$this->DisConnectDB();
	}
	//Seat Order Detail----------------------------------------------------------------------
	public function seatOrderDetail($ordercode)
	{
		$arr= array();
		$query="SELECT seatbookingdetail.*, seats.seatNumber as Seats 
					FROM seatbookingdetail LEFT JOIN seats ON seatbookingdetail.seatNumber= seats.code 
					WHERE ordercode='$ordercode'";
		$result=$this->executeSelect($query);
		while($row=mysqli_fetch_array($result))
		{
			$seatOrder= new seatbookingdetailDto();
			$seatOrder->setcode($row['code']);
			$seatOrder->setstartingDate($row['startingDate']);
			$seatOrder->setfinishingDate($row['finishingDate']);
			$seatOrder->setseatNumber($row['seatNumber']);
			$seatOrder->setseatNumberName($row['Seats']);
			$seatOrder->setpayingAmount($row['payingAmount']);
			$arr[]= $seatOrder;
		}
		$this->DisConnectDB();
		return $arr;
	}
	//Team Room Order Detail----------------------------------------------------------------------
	public function TeamRoomOrderDetail($ordercode)
	{
		$arr= array();
		$query="SELECT teamroombookingdetail.*, teamroomtypes.name as Type FROM teamroombookingdetail 
					LEFT JOIN teamroomtypes ON teamroombookingdetail.roomType= teamroomtypes.code 
					WHERE ordercode='$ordercode'";
		$result=$this->executeSelect($query);
		while($row=mysqli_fetch_array($result))
		{
			$seatOrder= new teamroombookingdetailDto();
			$seatOrder->setcode($row['code']);
			$seatOrder->setstartingDate($row['startingDate']);
			$seatOrder->setfinishingDate($row['finishingDate']);
			$seatOrder->setroomType($row['roomType']);
			$seatOrder->setroomTypeName($row['Type']);
			$seatOrder->setroomNumber($row['roomNumber']);
			$seatOrder->setpayingAmount($row['payingAmount']);
			$arr[]= $seatOrder;
		}
		$this->DisConnectDB();
		return $arr;
	}
	//Conference Room Order Detail----------------------------------------------------------------------
	public function ConfRoomOrderDetail($ordercode)
	{
		$arr= array();
		$query="SELECT conferenceroombookingdetail.*, conferenceroomtypes.name as Type FROM conferenceroombookingdetail 
						LEFT JOIN conferenceroomtypes ON conferenceroomtypes.code=conferenceroombookingdetail.roomType 
						WHERE ordercode='$ordercode'";
		$result=$this->executeSelect($query);
		while($row=mysqli_fetch_array($result))
		{
			$seatOrder= new conferenceroombookingdetailDto();
			$seatOrder->setcode($row['code']);
			$seatOrder->setdate($row['date']);
			$seatOrder->setstartingTime($row['startingTime']);
			$seatOrder->setfinishingTime($row['finishingTime']);
			$seatOrder->setroomType($row['roomType']);
			$seatOrder->setroomTypeName($row['Type']);
			$seatOrder->setroomNumber($row['roomNumber']);
			$seatOrder->setpayingAmount($row['payingAmount']);
			$arr[]= $seatOrder;
		}
		$this->DisConnectDB();
		return $arr;
	}
//order Cancel____________________________________________________________________________________________________________________________________________
	public function orderCancel($ordercode)
	{
		$query= "update orders set orderState=4 where code='$ordercode'";
		$this->executeNonQuery($query);
	}
}
?>