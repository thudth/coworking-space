<?php 
	class teamroomsDto
	{
		//fields
		private  $roomNumber;
		private  $roomType;
		private  $description;
		private  $RoomTypeName;
		private  $PricePerMonth;
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
		//Name room type		
		public function setRoomTypeName($RoomTypeName)
		{
			$this->RoomTypeName = $RoomTypeName;
		}
		public function getRoomTypeName()
		{
			return $this->RoomTypeName;
		}
		//Price Per Month		
		public function setPricePerMonth($PricePerMonth)
		{
			$this->PricePerMonth = $PricePerMonth;
		}
		public function getPricePerMonth()
		{
			return $this->PricePerMonth;
		}
		//Note	
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