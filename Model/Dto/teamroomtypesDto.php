<?php 
	class teamroomtypesDto
	{
		//fields
		private  $code;
		private  $name;
		private  $pricePerMonth;
		private  $note;
		//constructor
		public function __construct()
		{			
		}		
		//setter,getter
		//code
		public function setcode($code)
		{
			$this->code = $code;
		}
		public function getcode()
		{
			return $this->code;
		}
		//name
		public function setname($name)
		{
			$this->name = $name;
		}
		public function getname()
		{
			return $this->name;
		}
		//pricePerMonth
		public function setpricePerMonth($pricePerMonth)
		{
			$this->pricePerMonth = $pricePerMonth;
		}
		public function getpricePerMonth()
		{
			return $this->pricePerMonth;
		}
		//note
		public function setnote($note)
		{
			$this->note = $note;
		}
		public function getnote()
		{
			return $this->note;
		}
	}
?>