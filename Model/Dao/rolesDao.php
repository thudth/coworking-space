<?php
class rolesDao extends baseDao
{
	public static function instance () {
		return new rolesDao();
	}
	//construct
	public function __construct(){
		baseDao::__construct();
	}
	//getDtoFromRow
	private function getDtoFromRow($row)
	{
		$a= new rolesDto();
		$a->setcode($row['code']);
		$a->setrole($row['roles']);
		return $a;
	}
	//GetAll
	public function getAll()
	{
		$arr= array();
		$query='select * from roles';
		$result= $this->executeSelect($query);
		while ($row=mysqli_fetch_array($result)){
			$arr[]=$this->getDtoFromRow($row);
		}
		$this->DisConnectDB();
		return $arr;
	}
	//GetOne
	public function getOne($id)
	{
		$query="select * from roles where code= $id";
		$result= $this->executeSelect($query);
		if($row=mysqli_fetch_array($result))
			$a=$this->getDtoFromRow($row);
		$this->DisConnectDB();
		return $a;
	}
	//Insert
	public function getNewestCode()//Get new code
	{
		$query= "SELECT MAX(code) FROM roles";
		$result=$this->executeSelect($query);
		$row= mysqli_fetch_array($result);
		return $row['MAX(code)']+1;//Lấy về mã dưới dạng sô của bản ghi cuối trong DB
		$this->DisConnectDB();
	}
	public function insert($rolesDto)
	{
		$query= "insert into roles(code,roles) value (".$this->getNewestCode().",'".$rolesDto->getrole()."')";
		$this->executeNonQuery($query);
	}
	//Update
	public function update($rolesDto)
	{
		$query= "update roles set roles='".$rolesDto->getrole()."' 
			where code= ".$rolesDto->getcode();
		
		$this->executeNonQuery($query);
	}
	//Delete
	public function delete($id)
	{
		$query= "delete from roles where code=$id";
		$this->executeNonQuery($query);
	}
}
?>