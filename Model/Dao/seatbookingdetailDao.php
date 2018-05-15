<?php 
	class seatbookingdetailDao extends baseDao
	{
		public static function instance()
		{
			return new seatbookingdetailDao();
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
			$query = "select * from seatbookingdetail";
			$result = $this->executeSelect($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$seatbookingdetailDto=$this->getDtoFromRow($row);
				$arr[] = $seatbookingdetailDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Trả về 1 bản ghi
		public function getOne($id)
		{
			$arr = array();
			$query = "SELECT * FROM seatbookingdetail JOIN seatallocating on seatbookingdetail.code= seatallocating.code where code='$id'";
			$result = $this->executeSelect($query);
			$seatbookingdetailDto = new seatbookingdetailDto();
			while($row = mysqli_fetch_array($result))
			{							
				$seatbookingdetailDto=$this->getDtoFromRow($row);
				$arr[] = $seatbookingdetailDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Thêm bản ghi
		public function insert($seatbookingdetailDto)
		{
			$query = "insert into seatbookingdetail (code,startingDate,finishingDate,payingAmount) 
				values ('".$seatbookingdetailDto->getcode()."','".$seatbookingdetailDto->getstartingDate()."','".$seatbookingdetailDto->getfinishingDate()."',".$seatbookingdetailDto->getpayingAmount().")";
			$this->executeNonQuery($query);	
		}
		//Sửa bản ghi
		public function update($seatbookingdetailDto)
		{			
			$query = "update seatbookingdetail set startingDate ='".$seatbookingdetailDto->getstartingDate()."',
										finishingDate='".$seatbookingdetailDto->getfinishingDate()."',
										payingAmount=".$seatbookingdetailDto->getpayingAmount()." 
									where code ='".$seatbookingdetailDto->getcode();
			$this->executeNonQuery($query);	
		}
		//Xóa bản ghi
		public function delete($id)
		{
			$query = "delete from seatbookingdetail where code = '$id'";
			$this->executeNonQuery($query);	
		}
		//
		private function getDtoFromRow($row)
		{
			$seatbookingdetailDto = new seatbookingdetailDto();
			$seatbookingdetailDto->setcode($row["code"]);
			$seatbookingdetailDto->setstartingDate($row["startingDate"]);
			$seatbookingdetailDto->setfinishingDate($row["finishingDate"]);
			$seatbookingdetailDto->setseatNumber($row["seatNumber"]);
			return $seatbookingdetailDto;
		}
		
	}
?>