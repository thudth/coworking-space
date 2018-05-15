<?php
class seatsDao extends baseDao
{
	//Instance
	public static function instance()
	{
		return new seatsDao;
	}
	//Constructor
	public function __construct()
	{
		baseDao::__construct();
	}
	
	//
	private function getDtoFromRow($row)
	{
		$seatsDto= new seatsDto();
		$seatsDto->setcode($row['code']);
		$seatsDto->setseatnumber($row['seatNumber']);
		$seatsDto->setpriceperday($row['pricePerDay']);
		$seatsDto->setnote($row['note']);
		return $seatsDto;
	}
	//
	//Tra ve tat ca ban ghi________________________________________________________________________________________________________--
	public function getAll()
	{
		$arr= array();
		$query = "select * from seats";
		$result = $this->executeSelect($query);
		while ($row=mysqli_fetch_array($result))
		{
			$a=$this->getDtoFromRow($row);
			$arr[]=$a;
		}
		$this->DisConnectDB();
		return $arr;
	}
	//Tra ve 1 ban ghi________________________________________________________________________________________________________
	public function getOne($id)
	{
		$query = "select * from seats where code = '$id'";
		$result = $this->executeSelect($query);
		if($row = mysqli_fetch_array($result))
			$a= $this->getDtoFromRow($row);
		$this->DisConnectDB();
		return $a;
	}
	//insert________________________________________________________________________________________________________________
	public function getNewestCode()//Get new code
	{
		$query= "SELECT substring(code,2) as LastestCode FROM seats";
		$result=$this->executeSelect($query);
		$max=0;
		while($row= mysqli_fetch_array($result)){
			if($row['LastestCode']>$max)
				$max= $row['LastestCode'];
		}
		$this->DisConnectDB();
		$newcode= $max+1;
		return 'S'.$newcode;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
	}
	public function insert ($seatsDto)//Insert
	{		
		$query="insert into seats(code, seatnumber, pricePerDay, note)
			values ('".$this->getNewestCode()."', '".$seatsDto->getseatnumber()."', ".$this->getOldPrice().", '".$seatsDto->getnote()."')";
		$this->executeNonQuery($query);
	}
	//update__________________________________________________________________________________________________________________
	public function update ($seatsDto)
	{
		$query= "update seats set 
					seatnumber='".$seatsDto->getseatnumber()."'
					, note= '".$seatsDto->getnote()."'
				where code= '".$seatsDto->getcode()."'";
				echo $query;
		$this->executeNonQuery($query);
	}
	//delete__________________________________________________________________________________________________________________
	public function delete($id)
	{
		$query="delete from seats where code= '$id'";
		echo $query;
		$this->executeNonQuery($query);
	}
	//update Seat Price__________________________________________________________________________________________________________________
	public function getOldPrice()
	{
		$query = "select DISTINCT(pricePerDay) as oldPrice from seats";
		$result=$this->executeSelect($query);
		$row= mysqli_fetch_array($result);
		return $row['oldPrice'];
		$this->DisConnectDB();
	}
	public function ChangePrice ($newPrice)
	{
		$query= "UPDATE seats SET pricePerDay= $newPrice ";
		$this->executeNonQuery($query);
	}
}
?>