<?php
class rolesDto
{
	private $code;
	private $role;
	public function __construct(){
	}
	//set,get
	//Code
	public function setcode($code){
		$this->code=$code;
	}
	public function getcode(){
		return $this->code;
	}
	//Roles
	public function setrole($role){
		$this->role=$role;
	}
	public function getrole(){
		return $this->role;
	}
}
?>