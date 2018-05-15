<?php 
	class conferenceroomsDto
	{
		//fields
		private  $roomNumber;
		private  $roomType;
		private  $description;
		private  $images;
		private  $roomtypename;
		private  $priceperhour;
		private  $note;
		//constructor
		public function __construct()
		{			
		}		
		//setter,getter
		//roomNumber
		public function setroomNumber($roomNumber)
		{
			$this->roomNumber = $roomNumber;
		}
		public function getroomNumber()
		{
			return $this->roomNumber;
		}
		//roomType
		public function setroomType($roomType)
		{
			$this->roomType = $roomType;
		}
		public function getroomType()
		{
			return $this->roomType;
		}
		//description
		public function setdescription($description)
		{
			$this->description = $description;
		}
		public function getdescription()
		{
			return $this->description;
		}
		//Room types Name
		public function setRoomTypeName($roomtypename)
		{
			$this->roomtypename = $roomtypename;
		}
		public function getRoomTypeName()
		{
			return $this->roomtypename;
		}
		//Price Per Hour
		public function setpriceperhour($priceperhour)
		{
			$this->priceperhour = $priceperhour;
		}
		public function getpriceperhour()
		{
			return $this->priceperhour;
		}
		//Note for room type
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