<?php 
	class conferenceroomtypesDto
	{
		//fields
		private  $code;
		private  $name;
		private  $pricePerHour;
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
		//pricePerHour
		public function setpricePerHour($pricePerHour)
		{
			$this->pricePerHour = $pricePerHour;
		}
		public function getpricePerHour()
		{
			return $this->pricePerHour;
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