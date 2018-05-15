<?php 
	class conferenceroomsDao extends baseDao
	{
		public static function instance()
		{
			return new conferenceroomsDao();
		}
		public function __construct()
		{
			//goi khoi tao cua baseDao(lop cha)
			baseDao::__construct();
		}
		//Trả về tất cả bản ghi_____________________________________________________________________________________________________________________
		public function getAll()
		{
			$arr = array();
			$query = "SELECT * FROM conferencerooms JOIN conferenceroomtypes ON conferencerooms.roomType=conferenceroomtypes.code";
			$result = $this->executeSelect($query);
			while($row = mysqli_fetch_array($result))
			{							
				$conferenceroomsDto=$this->getDtoFromRowGetAll($row);
				$arr[] = $conferenceroomsDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Trả về 1 bản ghi______________________________________________________________________________________________________________________________
		public function getOne($id)
		{
			$query = "select * from conferencerooms where roomNumber='$id'";
			$result = $this->executeSelect($query);
			$conferenceroomsDto = new conferenceroomsDto();
			if($row = mysqli_fetch_array($result))
			{			
				$conferenceroomsDto=$this->getDtoFromRowGetOne($row);				
			}
			$this->DisConnectDB();
			return $conferenceroomsDto;
		}
		//Thêm bản ghi______________________________________________________________________________________________________________________________
		public function getNewestCode()//Get new code
		{
			$query= "SELECT substring(roomNumber,2) as LastestCode from conferencerooms";
			$result=$this->executeSelect($query);
			$max=0;
			while($row= mysqli_fetch_array($result)){
				if($row['LastestCode']>$max)
					$max= $row['LastestCode'];
			}
			$this->DisConnectDB();
			$newcode= $max+1;
			return 'C'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
		}
		public function insert($conferenceroomsDto)
		{
			$query = "insert into conferencerooms (roomNumber,roomType,description) 
				values ('".$this->getNewestCode()."','".$conferenceroomsDto->getroomType()."','".$conferenceroomsDto->getdescription()."')";
			$this->executeNonQuery($query);	
		}
		//Sửa bản ghi______________________________________________________________________________________________________________________________
		public function update($conferenceroomsDto)
		{			
			$query = "update conferencerooms set roomType ='".$conferenceroomsDto->getroomType()."',
										description='".$conferenceroomsDto->getdescription()."'
									where roomNumber ='".$conferenceroomsDto->getroomNumber()."'";
			$this->executeNonQuery($query);	
		}
		//Xóa bản ghi_____________________________________________________________________________________________________________________________
		public function delete($id)
		{
			$query = "delete from conferencerooms where roomNumber = '$id'";
			$this->executeNonQuery($query);	
		}
		//
		private function getDtoFromRowGetOne($row)
		{
			$conferenceroomsDto = new conferenceroomsDto();
			$conferenceroomsDto->setroomNumber($row["roomNumber"]);
			$conferenceroomsDto->setroomType($row["roomType"]);
			$conferenceroomsDto->setdescription($row["description"]);
			return $conferenceroomsDto;
		}
		//
		private function getDtoFromRowGetAll($row)
		{
			$conferenceroomsDto = new conferenceroomsDto();
			$conferenceroomsDto->setroomNumber($row["roomNumber"]);
			$conferenceroomsDto->setroomType($row["roomType"]);
			$conferenceroomsDto->setdescription($row["description"]);
			
			$conferenceroomsDto->setRoomTypeName($row["name"]);
			$conferenceroomsDto->setpriceperhour($row["pricePerHour"]);
			$conferenceroomsDto->setnote($row["note"]);
			return $conferenceroomsDto;
		}
		
	}
?>