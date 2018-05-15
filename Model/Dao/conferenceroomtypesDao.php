<?php 
	class conferenceroomtypesDao extends baseDao
	{
		public static function instance()
		{
			return new conferenceroomtypesDao();
		}
		public function __construct()
		{
			//goi khoi tao cua baseDao(lop cha)
			baseDao::__construct();
		}
		//Trả về tất cả bản ghi_________________________________________________________________________________________________________
		public function getAll()
		{
			$arr = array();
			$query = "select * from conferenceroomtypes";
			$result = $this->executeSelect($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$conferenceroomtypesDto=$this->getDtoFromRow($row);
				$arr[] = $conferenceroomtypesDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Trả về 1 bản ghi______________________________________________________________________________________________________________
		public function getOne($id)
		{
			$query = "select * from conferenceroomtypes where code='$id'";
			$result = $this->executeSelect($query);
			$conferenceroomtypesDto = new conferenceroomtypesDto();
			if($row = mysqli_fetch_array($result))
			{
				$conferenceroomtypesDto=$this->getDtoFromRow($row);				
			}
			$this->DisConnectDB();
			return $conferenceroomtypesDto;
		}
		//Thêm bản ghi______________________________________________________________________________________________________________
		public function getNewestCode()//Get new code
		{
			$query= "SELECT substring(code,3) as LastestCode FROM conferenceroomtypes";
			$result=$this->executeSelect($query);
			$max=0;
			while($row= mysqli_fetch_array($result)){
				if($row['LastestCode']>$max)
					$max= $row['LastestCode'];
			}
			$this->DisConnectDB();
			$newcode= $max+1;
			return 'CT'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
		}
		public function insert($conferenceroomtypesDto)
		{
			$query = "insert into conferenceroomtypes (code,name,pricePerHour,note) 
				values ('".$conferenceroomtypesDto->getcode()."','".$conferenceroomtypesDto->getname()."'
				,".$conferenceroomtypesDto->getpricePerHour().",'".$conferenceroomtypesDto->getnote()."')";
			$this->executeNonQuery($query);	
		}
		//Sửa bản ghi________________________________________________________________________________________________________________________________________
		public function update($conferenceroomtypesDto)
		{			
			$query = "update conferenceroomtypes set name ='".$conferenceroomtypesDto->getname()."',
										pricePerHour=".$conferenceroomtypesDto->getpricePerHour().",
										note='".$conferenceroomtypesDto->getnote()."'
									where code ='".$conferenceroomtypesDto->getcode()."'";
			$this->executeNonQuery($query);	
		}
		//Xóa bản ghi________________________________________________________________________________________________________________________________________
		public function delete($id)
		{
			$query = "delete from conferenceroomtypes where code = '$id'";
			$this->executeNonQuery($query);	
		}
		//
		private function getDtoFromRow($row)
		{
			$conferenceroomtypesDto = new conferenceroomtypesDto();
			$conferenceroomtypesDto->setcode($row["code"]);
			$conferenceroomtypesDto->setname($row["name"]);
			$conferenceroomtypesDto->setpricePerHour($row["pricePerHour"]);
			$conferenceroomtypesDto->setnote($row["note"]);
			return $conferenceroomtypesDto;
		}
		
	}
?>