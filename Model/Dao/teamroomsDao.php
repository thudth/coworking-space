<?php 
	class teamroomsDao extends baseDao
	{
		public static function instance()
		{
			return new teamroomsDao();
		}
		public function __construct()
		{
			//goi khoi tao cua baseDao(lop cha)
			baseDao::__construct();
		}
		//Trả về tất cả bản ghi______________________________________________________________________________________________________________
		public function getAll()
		{
			$arr = array();
			$query = "SELECT * FROM teamrooms JOIN teamroomtypes ON teamrooms.roomType=teamroomtypes.code";
			$result = $this->executeSelect($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$teamroomsDto=$this->getDtoFromRowGetAll($row);
				$arr[] = $teamroomsDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Trả về 1 bản ghi______________________________________________________________________________________________________________________
		public function getOne($id)
		{
			$query = "select * from teamrooms where roomNumber='$id'";
			$result = $this->executeSelect($query);
			$teamroomsDto = new teamroomsDto();
			if($row = mysqli_fetch_array($result))
			{			
				$teamroomsDto=$this->getDtoFromRowGetOne($row);				
			}
			$this->DisConnectDB();
			return $teamroomsDto;
		}
		//Thêm bản ghi____________________________________________________________________________________________________________________________
		public function getNewestCode()//Get new code
		{
			$query= "SELECT substring(roomNumber,2) as LastestCode FROM teamrooms";
			$result=$this->executeSelect($query);
			$max=0;
			while($row= mysqli_fetch_array($result)){
				if($row['LastestCode']>$max)
					$max= $row['LastestCode'];
			}
			$this->DisConnectDB();
			$newcode= $max+1;
			return 'R'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
		}
		public function insert($teamroomsDto)
		{
			$query = "insert into teamrooms (roomNumber,roomType,description) 
				values ('".$teamroomsDto->getroomNumber()."','".$teamroomsDto->getroomType()."','".$teamroomsDto->getdescription()."')";
			$this->executeNonQuery($query);	
		}
		//Sửa bản ghi____________________________________________________________________________________________________________________________
		public function update($teamroomsDto)
		{			
			$query = "update teamrooms set roomType ='".$teamroomsDto->getroomType()."',
										description='".$teamroomsDto->getdescription()."'
									where roomNumber ='".$teamroomsDto->getroomNumber()."'";
			$this->executeNonQuery($query);	
		}
		//Xóa bản ghi____________________________________________________________________________________________________________________________
		public function delete($id)
		{
			$query = "delete from teamrooms where roomNumber = '$id'";
			$this->executeNonQuery($query);	
		}
		//
		private function getDtoFromRowGetAll($row)
		{
			$teamroomsDto = new teamroomsDto();
			$teamroomsDto->setroomNumber($row["roomNumber"]);
			$teamroomsDto->setroomType($row["roomType"]);
			$teamroomsDto->setdescription($row["description"]);
			$teamroomsDto->setRoomTypeName($row["name"]);
			$teamroomsDto->setPricePerMonth($row["pricePerMonth"]);
			$teamroomsDto->setnote($row["note"]);
			return $teamroomsDto;
		}
		//
		private function getDtoFromRowGetOne($row)
		{
			$teamroomsDto = new teamroomsDto();
			$teamroomsDto->setroomNumber($row["roomNumber"]);
			$teamroomsDto->setroomType($row["roomType"]);
			$teamroomsDto->setdescription($row["description"]);
			return $teamroomsDto;
		}
	}
?>