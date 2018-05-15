<?php 
	class orderstateDao extends baseDao
	{
		public static function instance()
		{
			return new orderstateDao();
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
			$query = "select * from orderstate";
			$result = $this->executeSelect($query);			
			while($row = mysqli_fetch_array($result))
			{							
				$orderstateDto=$this->getDtoFromRow($row);
				$arr[] = $orderstateDto;
			}
			$this->DisConnectDB();
			return $arr;
		}
		//Trả về 1 bản ghi
		public function getOne($id)
		{
			$query = "select * from orderstate where code=$id";
			$result = $this->executeSelect($query);
			$orderstateDto = new orderstateDto();
			if($row = mysqli_fetch_array($result))
			{			
				$orderstateDto=$this->getDtoFromRow($row);				
			}
			$this->DisConnectDB();
			return $orderstateDto;
		}
		//Thêm bản ghi
		public function getNewestCode()//Get new code
		{
			$query= "SELECT MAX(code) FROM orderstate";
			$result=$this->executeSelect($query);
			$row= mysqli_fetch_array($result);
			return $row['MAX(code)']+1;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
			$this->DisConnectDB();
		}
		public function insert($orderstateDto)
		{
			$query = "insert into orderstate (code,status)
				values ('".$this->getNewestCode()."','".$orderstateDto->getstatus()."')";
			$this->executeNonQuery($query);	
		}
		//Sửa bản ghi
		public function update($orderstateDto)
		{			
			echo $query = "update orderstate set status ='".$orderstateDto->getstatus()."'
									where code =".$orderstateDto->getcode();
			$this->executeNonQuery($query);	
		}
		//Xóa bản ghi
		public function delete($id)
		{
			$query = "delete from orderstate where code = $id";
			$this->executeNonQuery($query);	
		}
		//
		private function getDtoFromRow($row)
		{
			$orderstateDto = new orderstateDto();
			$orderstateDto->setcode($row["code"]);
			$orderstateDto->setstatus($row["status"]);
			return $orderstateDto;
		}
		
	}
?>