<?php 
	class teamroomtypesDao extends baseDao
	{
		public static function instance()
		{
			return new teamroomtypesDao();
		}
		public function __construct()
		{
			//goi khoi tao cua baseDao(lop cha)
			baseDao::__construct();
		}
		
		//Trả về tất cả bản ghi
		public function getAll()
		{
			$arr = array();
			$query = "select * from teamroomtypes";
			$result = $this->executeSelect($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$teamroomtypesDto=$this->getDtoFromRow($row);
				$arr[] = $teamroomtypesDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		
		//Trả về 1 bản ghi___________________________________________________________________________________________________________________
		public function getOne($id)
		{
			$query = "select * from teamroomtypes where code='$id'";
			$result = $this->executeSelect($query);
			$teamroomtypesDto = new teamroomtypesDto();
			if($row = mysqli_fetch_array($result))
			{			
				$teamroomtypesDto=$this->getDtoFromRow($row);		
			}
			$this->DisConnectDB();
			return $teamroomtypesDto;
		}
		
		//Thêm bản ghi___________________________________________________________________________________________________________________
		public function getNewestCode()//Get new code
		{
			$query= "SELECT substring(code,3) as LastestCode FROM teamroomtypes";
			$result=$this->executeSelect($query);
			$max=0;
			while($row= mysqli_fetch_array($result)){
				if($row['LastestCode']>$max)
					$max= $row['LastestCode'];
			}
			$this->DisConnectDB();
			$newcode= $max+1;
			return 'RT'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
		}
		public function insert($teamroomtypesDto)
		{
			$query = "insert into teamroomtypes (code,name,pricePerMonth,note) 
				values ('".$this->getNewestCode()."','".$teamroomtypesDto->getname()."'
				,".$teamroomtypesDto->getpricePerMonth().",'".$teamroomtypesDto->getnote()."')";
			$this->executeNonQuery($query);	
		}
		
		//Sửa bản ghi___________________________________________________________________________________________________________________
		public function update($teamroomtypesDto)
		{			
			$query = "update teamroomtypes set name ='".$teamroomtypesDto->getname()."',
							pricePerMonth=".$teamroomtypesDto->getpricePerMonth().",
							note='".$teamroomtypesDto->getnote()."' 
						where code ='".$teamroomtypesDto->getcode()."'";
			$this->executeNonQuery($query);	
		}
		
		//Xóa bản ghi___________________________________________________________________________________________________________________
		public function delete($id)
		{
			$query = "delete from teamroomtypes where code = '$id'";
			$this->executeNonQuery($query);	
		}
		
		//
		private function getDtoFromRow($row)
		{
			$teamroomtypesDto = new teamroomtypesDto();
			$teamroomtypesDto->setcode($row["code"]);
			$teamroomtypesDto->setname($row["name"]);
			$teamroomtypesDto->setpricePerMonth($row["pricePerMonth"]);
			$teamroomtypesDto->setnote($row["note"]);
			return $teamroomtypesDto;
		}
		
	}
?>