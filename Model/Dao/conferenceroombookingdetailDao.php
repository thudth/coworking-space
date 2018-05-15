<?php 
	class conferenceroombookingdetailDao extends baseDao
	{
		public static function instance()
		{
			return new conferenceroombookingdetailDao();
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
			$query = "select * from conferenceroombookingdetail";
			$result = $this->executeSelect($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$conferenceroombookingdetailDto=$this->getDtoFromRow($row);
				$arr[] = $conferenceroombookingdetailDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Trả về 1 bản ghi
		public function getOne($id)
		{
			$arr = array();
			$query = "select * from conferenceroombookingdetail where code='$id'";
			$result = $this->executeSelect($query);
			while($row = mysqli_fetch_array($result))
			{							
				$conferenceroombookingdetailDto=$this->getDtoFromRow($row);
				$arr[] = $conferenceroombookingdetailDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Thêm bản ghi
		public function insert($conferenceroombookingdetailDto)
		{
			$query = "INSERT INTO conferenceroombookingdetail(code, roomType, date, startingTime, finishingTime, payingAmount) VALUES
						('".$conferenceroombookingdetailDto->getcode()."','".$conferenceroombookingdetailDto->getroomType()."','".$conferenceroombookingdetailDto->getdate()."',
						'".$conferenceroombookingdetailDto->getstartingTime()."','".$conferenceroombookingdetailDto->getfinishingTime()."',".$conferenceroombookingdetailDto->getpayingAmount().")";
			$this->executeNonQuery($query);	
		}
		//Sửa bản ghi
		public function update($conferenceroombookingdetailDto)
		{			
			$query = "UPDATE conferenceroombookingdetail SET
						roomType='".$conferenceroombookingdetailDto->getroomType()."'
						, date='".$conferenceroombookingdetailDto->getdate()."'
						, startingTime='".$conferenceroombookingdetailDto->getstartingTime()."'
						, finishingTime='".$conferenceroombookingdetailDto->getfinishingTime()."'
						, payingAmount=".$conferenceroombookingdetailDto->getpayingAmount().",
					WHERE code='".$conferenceroombookingdetailDto->getcode();
			$this->executeNonQuery($query);	
		}
		//Xóa bản ghi
		public function delete($id)
		{
			$query = "delete from conferenceroombookingdetail where code = '$id'";
			$this->executeNonQuery($query);	
		}
		//
		private function getDtoFromRow($row)
		{
			$conferenceroombookingdetailDto = new conferenceroombookingdetailDto();
			$conferenceroombookingdetailDto->setcode($row["code"]);
			$conferenceroombookingdetailDto->setroomType($row["roomType"]);
			$conferenceroombookingdetailDto->setdate($row["date"]);
			$conferenceroombookingdetailDto->setstartingTime($row["startingTime"]);
			$conferenceroombookingdetailDto->setfinishingTime($row["finishingTime"]);
			//$conferenceroombookingdetailDto->setpayingAmount($row["payingAmount"]);
			return $conferenceroombookingdetailDto;
		}
		
	}
?>