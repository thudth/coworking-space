<?php
class bookDao extends baseDao
{
	public static function instance()
	{
		return new bookDao();
	}
	public function __construct()
	{
		baseDao::__construct();
	}
	
//Bang Gia____________________________________________________________________________________________________________________________________________________
	//Gia cho ngoi--------------------------------------------------------------------
	public function SeatPrice()
	{
		$arr=array();
		$query = "select DISTINCT(pricePerDay) from seats";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$a= new seatsDto();
			$a->setpriceperday($row['pricePerDay']);
			$arr[]=$a;
		}
		$this->DisConnectDB();
		return $arr;
	}
	//Gia cua Phong lam viec cho nhom--------------------------------------------------
	public function TeamRoomTypes()
	{
		$arr=array();
		$query = "SELECT * FROM teamroomtypes";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$a= new teamroomtypesDto();
			$a->setcode($row['code']);
			$a->setname($row['name']);
			$a->setpricePerMonth($row['pricePerMonth']);
			$a->setnote($row['note']);
			$arr[]=$a;
		}
		$this->DisConnectDB();
		return $arr;
	}
	//Gia cua Phong hoi thao----------------------------------------------------------
	public function ConferenceRoomTypes()
	{
		$arr=array();
		$query = "SELECT * FROM conferenceroomtypes";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$a= new conferenceroomtypesDto();
			$a->setcode($row['code']);
			$a->setname($row['name']);
			$a->setpricePerHour($row['pricePerHour']);
			$a->setnote($row['note']);
			$arr[]=$a;
		}
		$this->DisConnectDB();
		return $arr;
	}
///Dat (Them vao gio hang)___________________________________________________________________________________________________________________________________
	//Seats--------------------------------------------------------------------
	public function getSeatPrice()
	{
		$query = "select DISTINCT(pricePerDay) from seats";
		$result=$this->executeSelect($query);
		if($row= mysqli_fetch_array($result))
		{
			return $row['pricePerDay'];
		}
		$this->DisConnectDB();
	}
	//Team rooms---------------------------------------------------------------
	public function getTeamRoomTypeName($code) // HIển thị tên thay vì mã ở trang hiển thị giỏ hàng
	{
		$select = "SELECT name FROM teamroomtypes WHERE code='$code'";
		$result=$this->executeSelect($select);
		if($row=mysqli_fetch_array($result))
			$a= $row['name'];
		$this->DisConnectDB();			
		return $a;
	}
	public function getAllTeamRoomPrice()//trả về giá của từng loại phòng (để tính và hiển thị khi khách đặt)
	{
		$arr=array();
		$query = "SELECT * FROM teamroomtypes";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$teamroomtypesDto= new teamroomtypesDto();
			$teamroomtypesDto->setcode($row['code']);
			$teamroomtypesDto->setpricePerMonth($row['pricePerMonth']);
			$arr[]=$teamroomtypesDto;
		}
		$this->DisConnectDB();
		return $arr;
	}
	//Conference Room----------------------------------------------------------
	public function getConfRoomTypeName($code)// HIển thị tên thay vì mã ở trang hiển thị giỏ hàng
	{
		$select = "SELECT name FROM conferenceroomtypes WHERE code='$code'";
		$result=$this->executeSelect($select);
		if($row=mysqli_fetch_array($result))
			$a= $row['name'];
		$this->DisConnectDB();			
		return $a;
	}
	public function getAllConfRoomPrice()//trả về giá của từng loại phòng (để tính và hiển thị khi khách đặt)
	{
		$arr=array();
		$query = "SELECT * FROM conferenceroomtypes";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$confroomtypesDto= new conferenceroomtypesDto();
			$confroomtypesDto->setcode($row['code']);
			$confroomtypesDto->setpricePerHour($row['pricePerHour']);
			$arr[]=$confroomtypesDto;
		}
		$this->DisConnectDB();
		return $arr;
	}
///Dat (Lưu vào DB____________________________________________________________________________________________________________________________________________
	//Save In Order Table----------------------------------------------------------------------------------------------------------
	public function createOrderCode()
	{
		$query= "SELECT substring(code,2) as lastestcode FROM orders";
		$result=$this->executeSelect($query);
		$max=0;
		while($row= mysqli_fetch_array($result)){
			if($row['lastestcode']>$max)
				$max= $row['lastestcode'];
		}
		$this->DisConnectDB();
		return $newcode= $max;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
		
	}
//  ---------------------------------------------
	public function insertOrder()
	{
	  	$ordercode='O'.($this->createOrderCode()+1);
		$query= "INSERT INTO orders(code, username,orderDate, orderState) 
					VALUES ('".$ordercode."', '".$_SESSION['user']."', '".date('y/m/d')."',1)";
		$result=$this->executeNonQuery($query);
	}
	
	//Save in seat booking detail---------------------------------------------------------------------------------------------------
	public function createOrderSeatCode()
	{
		$query= "SELECT substring(code,3) as lastestcode FROM seatbookingdetail";
		$result=$this->executeSelect($query);
		$max=0;
		while($row= mysqli_fetch_array($result)){
			if($row['lastestcode']>$max)
				$max= $row['lastestcode'];
		}
		$this->DisConnectDB();
		$newcode= $max+1;
		return 'SD'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB

	}
//	--------------------------------------------------------
	public function insertSeatDetail($seatBookingDto)
	{
		//Paying amount
		$queryPay= "SELECT DISTINCT(pricePerDay) FROM seats";
		$resultPay=$this->executeSelect($queryPay);
		$row= mysqli_fetch_array($resultPay);
		
		$price=$row['pricePerDay'];
		$lengthOfTime=(abs(strtotime($seatBookingDto->getfinishingDate()) - strtotime($seatBookingDto->getstartingDate()))/(60*60*24)+1) ;
		//Giảm giá ưu đãi
		if($lengthOfTime<7)
			$pay= $lengthOfTime*$price;
		else if ($lengthOfTime<30)
			$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.05;
		else if ($lengthOfTime<90)
			$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.1;
		else 
			$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.2;
			
		//Insert
	  	$ordercode='O'.$this->createOrderCode();
		$query= "INSERT INTO seatbookingdetail(code, ordercode, startingDate, finishingDate, payingAmount) 
						VALUES ('".$this->createOrderSeatCode()."','".$ordercode."','".$seatBookingDto->getstartingDate()."'
						,'".$seatBookingDto->getfinishingDate()."','".$pay."')";
		$result=$this->executeNonQuery($query);
	}
	
	//Save in Team Room Booking Detail--------------------------------------------------------------------------------------------
	public function createOrderTeamRoomCode()
	{
		$query= "SELECT substring(code,3) as lastestcode FROM teamroombookingdetail";
		$result=$this->executeSelect($query);
		$max=0;
		while($row= mysqli_fetch_array($result)){
			if($row['lastestcode']>$max)
				$max= $row['lastestcode'];
		}
		$this->DisConnectDB();
		$newcode= $max+1;
		return 'TD'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB

	}
//	--------------------------------------------------------
	public function insertTeamRoomDetail($teamRoomBookingDto)
	{		
		//Paying amount
		$queryPay= "SELECT pricePerMonth FROM teamroomtypes WHERE code= '".$teamRoomBookingDto->getroomType()."'";
		$resultPay=$this->executeSelect($queryPay);
		$row= mysqli_fetch_array($resultPay);
		
		$price=$row['pricePerMonth'];
		$lengthOfTime=$teamRoomBookingDto->getlengthoftime();
		//Giảm giá ưu đãi
		if($lengthOfTime<3)
			$pay= $lengthOfTime*$price;
		else if ($lengthOfTime<6)
			$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.1;
		else if ($lengthOfTime<12)
			$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.15;
		else 
			$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.2;
		
		
		$this->DisConnectDB();
		//Insert
	  	$ordercode='O'.$this->createOrderCode();
		$query= "INSERT INTO teamroombookingdetail(code, ordercode, roomType, lengthoftime, startingDate, finishingDate, payingAmount) 
					VALUES ('".$this->createOrderTeamRoomCode()."','".$ordercode."','".$teamRoomBookingDto->getroomType()."'
					,'".$teamRoomBookingDto->getlengthoftime()."','".$teamRoomBookingDto->getstartingDate()."'
					,'".$teamRoomBookingDto->getfinishingDate()."','".$pay."')";
		$result=$this->executeNonQuery($query);
	}
	public function getOneTeamRoomPrice($TeamRoomType)
	{		
		//Paying amount
		$queryPay= "SELECT pricePerMonth FROM teamroomtypes WHERE code= '".$TeamRoomType."'";
		$resultPay=$this->executeSelect($queryPay);
		$row= mysqli_fetch_array($resultPay);
			return $row['pricePerMonth'];
		$this->DisConnectDB();
	}
	//Create Conference Room Order Detail Code  --------------------------------------------------------------------------------
	public function createOrderConferenceRoomCode()
	{
		$query= "SELECT substring(code,3) as lastestcode FROM conferenceroombookingdetail";
		$result=$this->executeSelect($query);
		$max=0;
		while($row= mysqli_fetch_array($result)){
			if($row['lastestcode']>$max)
				$max= $row['lastestcode'];
		}
		$this->DisConnectDB();
		$newcode= $max+1;
		return 'CD'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
	}
//	--------------------------------------------------------
	public function insertConfRoomDetail($confRoomBookingDto)
	{
		//Paying amount
		$queryPay= "SELECT pricePerHour FROM conferenceroomtypes WHERE code='".$confRoomBookingDto->getroomType()."'";
		$resultPay=$this->executeSelect($queryPay);
		$row= mysqli_fetch_array($resultPay);
		$PayAmount= ($confRoomBookingDto->getfinishingTime()-$confRoomBookingDto->getstartingTime())*$row['pricePerHour'];		
		$this->DisConnectDB();
		//Insert
	  	$ordercode='O'.$this->createOrderCode();
		$query= "INSERT INTO conferenceroombookingdetail(code,ordercode,roomType,date,startingTime,finishingTime,payingAmount) 
					VALUES ('".$this->createOrderConferenceRoomCode()."','".$ordercode."'
					,'".$confRoomBookingDto->getroomType()."','".$confRoomBookingDto->getdate()."'
					,'".$confRoomBookingDto->getstartingTime()."','".$confRoomBookingDto->getfinishingTime()."', $PayAmount)";
		$result=$this->executeNonQuery($query);
	}
	public function getOneConfRoomPrice($confRoomtype)
	{
		//Paying amount
		$queryPay= "SELECT pricePerHour FROM conferenceroomtypes WHERE code='".$confRoomtype."'";
		$resultPay=$this->executeSelect($queryPay);
		$row= mysqli_fetch_array($resultPay);
			return $row['pricePerHour'];
		$this->DisConnectDB();		
	}
}
?>