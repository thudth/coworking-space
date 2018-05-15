<?php 
	class teamroombookingdetailDao extends baseDao
	{
		public static function instance()
		{
			return new teamroombookingdetailDao();
		}
		public function __construct()
		{
			//goi khoi tao cua baseDao(lop cha)
			baseDao::__construct();
		}
		//Tr? v? t?t c? b?n ghi
		public function getAll()
		{
			$arr = array();
			$query = "select * from teamroombookingdetail";
			$result = $this->executeSelect($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$teamroombookingdetailDto=$this->getDtoFromRow($row);
				$arr[] = $teamroombookingdetailDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Tr? v? 1 b?n ghi
		public function getOne($id)
		{
			$arr = array();
			$query = "select * from teamroombookingdetail where code='$id'";
			$result = $this->executeSelect($query);
			while($row = mysqli_fetch_array($result))
			{							
				$teamroombookingdetailDto=$this->getDtoFromRow($row);
				$arr[] = $teamroombookingdetailDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Thêm b?n ghi
		public function insert($teamroombookingdetailDto)
		{
			$query = "INSERT INTO teamroombookingdetail(code, roomType, startingDate, lengthoftime, payingAmount) VALUES
						('".$teamroombookingdetailDto->getcode()."','".$teamroombookingdetailDto->getroomType()."',
						'".$teamroombookingdetailDto->getstartingDate()."','".$teamroombookingdetailDto->getlengthoftime()."',".$teamroombookingdetailDto->getpayingAmount().")";
			$this->executeNonQuery($query);	
		}
		//S?a b?n ghi
		public function update($teamroombookingdetailDto)
		{			
			$query = "UPDATE teamroombookingdetail SET
						roomType='".$teamroombookingdetailDto->getroomType()."'
						, startingDate='".$teamroombookingdetailDto->getstartingDate()."'
						, lengthoftime='".$teamroombookingdetailDto->getlengthoftime()."'
						, payingAmount=".$teamroombookingdetailDto->getpayingAmount().",
					WHERE code='".$teamroombookingdetailDto->getcode();
			$this->executeNonQuery($query);	
		}
		//Xóa b?n ghi
		public function delete($id)
		{
			$query = "delete from teamroombookingdetail where code = '$id'";
			$this->executeNonQuery($query);	
		}
		//
		private function getDtoFromRow($row)
		{
			$teamroombookingdetailDto = new teamroombookingdetailDto();
			$teamroombookingdetailDto->setcode($row["code"]);
			$teamroombookingdetailDto->setroomType($row["roomType"]);
			$teamroombookingdetailDto->setstartingDate($row["startingDate"]);
			$teamroombookingdetailDto->setlengthoftime($row["lengthoftime"]);
			//$teamroombookingdetailDto->setpayingAmount($row["payingAmount"]);
			return $teamroombookingdetailDto;
		}
		
	}
?>