<?php 
	class ordersDao extends baseDao
	{
		public static function instance()
		{
			return new ordersDao();
		}
		public function __construct()
		{
			//goi khoi tao cua baseDao(lop cha)
			baseDao::__construct();
		}
//Admin-----------------------------------------------------------------------------------------------------------------------------------------
	//Order List----------------------------------------------------------------------------------------
		public function QuerySelect()
		{
			$query = "SELECT orders.* , orderstate.status FROM orders
						JOIN orderstate ON orderstate.code = orders.orderState";
			if(isset($_GET['OrderState']) || isset($_GET['User']) || isset($_GET['Date']))
			{
				$query .=" where";
				//Tìm kiếm bằng tình trạng
				if(isset($_GET['OrderState'])) //Nếu có tìm kiếm bằng tình trạng__Không có trường hợp nối tiếp tìm kiếm vì đây là giá trị này k bị submit
					$query .=" orders.orderState=".$_GET['OrderState'];//Thì nối thêm vào query
				//Tìm kiếm bằng User
				if(isset($_GET['User']) && $_GET['User']!="")//Nếu có tìm kiếm và tìm kiếm khác null (vì khi 1 trong 3 cái được chọn thì cả 3 đều đc submit)
					if(isset($_GET['OrderState']))//Nếu có tìm kiếm trước thì nối tiếp tìm kiếm (AND)
						$query .=" and orders.username like '%".$_GET['User']."%'";//Ngược Lại:khởi tạo tìm kiếm mới (WHERE...)
					else $query .=" orders.username like '%".$_GET['User']."%'";
				//Tìm kiếm bằng ngày
				if(isset($_GET['Date']) && $_GET['Date']!="")
					if((isset($_GET['User']) && $_GET['User']!="")||(isset($_GET['OrderState']) && $_GET['OrderState']!="")) //Tương tự với Tìm kiếm bằng User
						$query .=" and orders.orderDate='".$_GET['Date']."'";
					else $query .=" orders.orderDate='".$_GET['Date']."'";
			}
			return $query.=" order by orders.orderState ASC, orders.orderDate ASC";
		}
		public function getAll()
		{
			$arr=array();
			$query=$this->QuerySelect();
			$result = $this->executeSelectPart($query);
			while($row = mysqli_fetch_array($result))
			{							
				$ordersDto=$this->getDtoFromRow($row);
				$arr[] = $ordersDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		public function CountRecord()
		{
			$query=$this->QuerySelect();
			return $this->CountRecordExecuteSelect($query);
		}
		
	//Order detail----------------------------------------------------------------------------------------
		//Seat Detail---------------------------------------------------------------
		public function getSeatDetail($ordercode)
			{
				$arr = array();
			 	$query = "SELECT seatbookingdetail.*, seats.seatNumber as seatNumberName 
								FROM seatbookingdetail LEFT JOIN seats ON seatbookingdetail.seatNumber= seats.code
								where ordercode	='$ordercode'";
				$result = $this->executeSelect($query);
				while($row = mysqli_fetch_array($result))
				{							
					$seatbookingdetailDto = new seatbookingdetailDto();
					$seatbookingdetailDto->setcode($row["code"]);
					$seatbookingdetailDto->setstartingDate($row["startingDate"]);
					$seatbookingdetailDto->setfinishingDate($row["finishingDate"]);
					$seatbookingdetailDto->setseatNumber($row["seatNumber"]);
					$seatbookingdetailDto->setseatNumberName($row["seatNumberName"]);
					$arr[] = $seatbookingdetailDto;
				}
				$this->DisConnectDB();
				return $arr;
			}
			
		//Teamroom Detail----------------------------------------------------------
		public function getTeamRoomDetail($ordercode)
			{
				$arr = array();
			 	$query = "SELECT teamroombookingdetail.*,teamroomtypes.name, teamrooms.description 
								FROM teamroombookingdetail 
									LEFT JOIN teamroomtypes ON teamroombookingdetail.roomType= teamroomtypes.code 
									LEFT JOIN teamrooms ON teamrooms.roomNumber= teamroombookingdetail.roomNumber
								where ordercode='$ordercode'";
				$result = $this->executeSelect($query);
				while($row = mysqli_fetch_array($result))
				{							
					$teamroombookingdetailDto = new teamroombookingdetailDto();
					$teamroombookingdetailDto->setcode($row["code"]);
					$teamroombookingdetailDto->setroomType($row["roomType"]);
					$teamroombookingdetailDto->setroomTypeName($row["name"]);
					$teamroombookingdetailDto->setstartingDate($row["startingDate"]);
					$teamroombookingdetailDto->setfinishingDate($row["finishingDate"]);
					$teamroombookingdetailDto->setlengthoftime($row["lengthoftime"]);
					$teamroombookingdetailDto->setroomNumber($row["roomNumber"]);
					$teamroombookingdetailDto->setroomNumberdescription($row["description"]);
					$arr[] = $teamroombookingdetailDto;
				}
				$this->DisConnectDB();
				return $arr;
			}	
			
		//Conference Room Detail----------------------------------------------------------
		public function getConferenceRoomDetail($ordercode)
			{
				$arr = array();
				$query = "SELECT conferenceroombookingdetail.* , conferenceroomtypes.name 
								FROM conferenceroombookingdetail LEFT JOIN conferenceroomtypes 
								ON conferenceroombookingdetail.roomType = conferenceroomtypes.code 
								where ordercode='$ordercode'";
				$result = $this->executeSelect($query);
				while($row = mysqli_fetch_array($result))
				{							
					$conferenceroombookingdetailDto = new conferenceroombookingdetailDto();
					$conferenceroombookingdetailDto->setcode($row["code"]);
					$conferenceroombookingdetailDto->setroomType($row["roomType"]);
					$conferenceroombookingdetailDto->setroomTypeName($row["name"]);
					$conferenceroombookingdetailDto->setdate($row["date"]);
					$conferenceroombookingdetailDto->setstartingTime($row["startingTime"]);
					$conferenceroombookingdetailDto->setfinishingTime($row["finishingTime"]);
					$conferenceroombookingdetailDto->setroomNumber($row["roomNumber"]);
					$arr[] = $conferenceroombookingdetailDto;
				}
				$this->DisConnectDB();
				return $arr;
			}
	//Update Status (tinh trang chua thanh toan -> tinh trang chua cap phat)-----------------------------------------------------------
		public function updateStatus($ordercode)
		{
			session_start();
		 	$query ="UPDATE orders SET orderState=2 WHERE code='$ordercode'";
			$this->executeNonQuery($query);
		}
	//Allocate-------------------------------------------------------------------------------------------------------------------------
		//Echo Allocate Fit(Hien thi danh sach phu hop voi don)----------------------------------------------
			//Seats-------------------------------------------
		public function getSeatsFit($seatbookingdetailDto)
			{
				$arr = array();
				$query = "select * FROM seats WHERE code not IN
					(
					SELECT DISTINCT(seatbookingdetail.seatNumber) FROM seatbookingdetail WHERE 
					(
						(startingDate>='".$seatbookingdetailDto->getstartingDate()."' AND startingDate>='".$seatbookingdetailDto->getfinishingDate()."') 
						OR (startingDate<='".$seatbookingdetailDto->getstartingDate()."' AND finishingDate >= '".$seatbookingdetailDto->getstartingDate()."')
						OR (finishingDate>='".$seatbookingdetailDto->getstartingDate()."' AND finishingDate<='".$seatbookingdetailDto->getfinishingDate()."')
						OR (startingDate<='".$seatbookingdetailDto->getfinishingDate()."' AND finishingDate>='".$seatbookingdetailDto->getfinishingDate()."')
					)
					AND seatNumber is not null)";
				$result = $this->executeSelect($query);
				while($row = mysqli_fetch_array($result))
				{							
					$seatsFit = new seatsDto();
					$seatsFit->setcode($row["code"]);
					$seatsFit->setseatnumber($row["seatNumber"]);
					$seatsFit->setnote($row["note"]);
					$arr[] = $seatsFit;
				}
				$this->DisConnectDB();
				return $arr;
			}
			//Teamroom-------------------------------------------
		public function getTeamroomsFit($teamroombookingdetailDto)
			{
				$arr = array();
				$query = "select * FROM teamrooms JOIN teamroomtypes ON teamrooms.roomType= teamroomtypes.code 
			WHERE roomNumber not IN
			(
			SELECT roomNumber FROM teamroombookingdetail WHERE 
			(
				(startingDate>='".$teamroombookingdetailDto->getstartingDate()."' AND startingDate>='".$teamroombookingdetailDto->getfinishingDate()."') 
				OR (startingDate<='".$teamroombookingdetailDto->getstartingDate()."' AND finishingDate >= '".$teamroombookingdetailDto->getstartingDate()."')
				OR (finishingDate>='".$teamroombookingdetailDto->getstartingDate()."' AND finishingDate<='".$teamroombookingdetailDto->getfinishingDate()."')
				OR (startingDate<='".$teamroombookingdetailDto->getfinishingDate()."' AND finishingDate>='".$teamroombookingdetailDto->getfinishingDate()."')
			)
			AND roomNumber is not null
			)
			AND roomType>='".$teamroombookingdetailDto->getroomType()."'";
				
				$result = $this->executeSelect($query);
				while($row = mysqli_fetch_array($result))
				{
					$TeamRoomFit = new teamroomsDto();
					$TeamRoomFit->setroomNumber($row["roomNumber"]);
					$TeamRoomFit->setroomType($row["roomType"]);
					$TeamRoomFit->setRoomTypeName($row["name"]);
					$TeamRoomFit->setdescription($row["description"]);
					$arr[] = $TeamRoomFit;
				}
				$this->DisConnectDB();
				return $arr;
			}
			
			
			//ConferenceRoomFit($ConferenceRoombookingdetailDto)
			public function getConferenceRoomFit($conferenceroombookingdetailDto)
			{
				$arr = array();
				$query = "
		select * FROM conferencerooms JOIN conferenceroomtypes ON conferencerooms.roomType = conferenceroomtypes.code
		WHERE roomNumber not IN
		(
		SELECT roomNumber FROM conferenceroombookingdetail WHERE 
		(
		(startingTime>=".$conferenceroombookingdetailDto->getstartingTime()." AND startingTime>=".$conferenceroombookingdetailDto->getfinishingTime().") 
		OR (startingTime<=".$conferenceroombookingdetailDto->getstartingTime()." AND finishingTime >= ".$conferenceroombookingdetailDto->getstartingTime().")
		OR (finishingTime>=".$conferenceroombookingdetailDto->getstartingTime()." AND finishingTime<=".$conferenceroombookingdetailDto->getfinishingTime().")
		OR (startingTime<=".$conferenceroombookingdetailDto->getfinishingTime()." AND finishingTime>=".$conferenceroombookingdetailDto->getfinishingTime().")
		)
		AND date ='".$conferenceroombookingdetailDto->getdate()."'
		AND roomNumber is not null
		)
		AND roomType>='".$conferenceroombookingdetailDto->getroomType()."'";
				
				$result = $this->executeSelect($query);
				while($row = mysqli_fetch_array($result))
				{
					$ConferenceRoomFit = new teamroomsDto();
					$ConferenceRoomFit->setroomNumber($row["roomNumber"]);
					$ConferenceRoomFit->setroomType($row["roomType"]);
					$ConferenceRoomFit->setRoomTypeName($row["name"]);
					$ConferenceRoomFit->setdescription($row["description"]);
					$arr[] = $ConferenceRoomFit;
				}
				$this->DisConnectDB();
				return $arr;
			}
		//Update Allocate (Admin chọn phòng, sau đó đc lưu vào db)----------------------------------------------
		public function allocateSeat($seatsDto)
		{			
			$query = "update seatbookingdetail set seatNumber ='".$seatsDto->getseatNumber()."'
									where code ='".$seatsDto->getcode()."'";
			$this->executeNonQuery($query);	
		}
		public function allocateTeamRoom($teamroomDto)
		{			
			$query = "update teamroombookingdetail set roomNumber ='".$teamroomDto->getroomNumber()."'
									where code ='".$teamroomDto->getcode()."'";
				$this->executeNonQuery($query);	
		}
		public function allocateConferenceRoom($conferenceRoomDto)
		{			
			$query = "update conferenceroombookingdetail set roomNumber ='".$conferenceRoomDto->getroomNumber()."'
									where code ='".$conferenceRoomDto->getcode()."'";
			$this->executeNonQuery($query);	
		}
			
		//Update tình trạng------------------------------------------------------------------------------------	
		public function updateInforAllocate($ordercode)
		{
			session_start();
		 	$query ="UPDATE orders SET orderState=3,confirmStaffMember= '".$_SESSION['user']."' WHERE code='$ordercode'";
			$this->executeNonQuery($query);
		}
		//
		private function getDtoFromRow($row)
		{
			$ordersDto = new ordersDto();
			$ordersDto->setcode($row["code"]);
			$ordersDto->setusername($row["username"]);
			$ordersDto->setorderDate($row["orderDate"]);
			$ordersDto->setconfirmStaffMember($row["confirmStaffMember"]);
			$ordersDto->setorderState($row["orderState"]);
			$ordersDto->setorderStateName($row["status"]);
			return $ordersDto;
		}
	}
?>