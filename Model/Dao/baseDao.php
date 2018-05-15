<?php
class baseDao
{
	private $con;
	private $host;
	private $userDB;
	private $passDB;
	private $dbname;
	private $limitRecord=5;
	
	//construct
	public function __construct()
	{
		$this->host="localhost";
		$this->userDB="root";
		$this->passDB="";
		$this->dbname="booking_reserve";
	}
	//Connect db
	protected function ConnectDB()
	{
		$this->con= mysqli_connect($this->host, $this->userDB, $this->passDB, $this->dbname);
		mysqli_set_charset($this->con,'utf8');
	}
	//Disconnect
	protected function DisConnectDB()
	{
		mysqli_close($this->con);
	}
	//Insert, update, delete
	protected function executeNonQuery($query)
	{
		$this->ConnectDB();
		mysqli_query($this->con, $query);
		$this->DisConnectDB();
	}
	//Select
	protected function executeSelectPart($query)
	{
		$this->ConnectDB();
		//Lay lai so trang hien tai
			if(isset($_GET['page']))
				$trang= $_GET['page'];
			else $trang=1;
			$trangtruoc=$trang-1;
			$trangsau=$trang+1;
		//Giới hạn bản ghi
			$record=$this->limitRecord;
			$start= ($trang-1) * $record;

		 $query.=" limit $start, $record";
		return mysqli_query($this->con,$query);
	}
	protected function executeSelect($query)
	{
		$this->ConnectDB();
		return mysqli_query($this->con,$query);
	}
	protected function CountRecordExecuteSelect($query)
	{
		$this->ConnectDB();
		$result=mysqli_query($this->con, $query);
		$count= ceil(mysqli_num_rows($result)/$this->limitRecord);
		return $count;
		$this->DisConnectDB();
	}

}
?>