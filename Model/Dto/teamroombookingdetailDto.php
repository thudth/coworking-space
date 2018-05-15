<?php 
	class teamroombookingdetailDto
	{
		//fields
		private  $code;
		private  $ordercode;
		private  $roomType;
		private  $roomTypeName;
		private  $startingDate;
		private  $finishingDate;
		private  $lengthoftime;
		private  $payingAmount;
		private  $roomNumber;
		private  $roomNumberdescription ;
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
		//ordercode
		public function setordercode($ordercode)
		{
			$this->ordercode = $ordercode;
		}
		public function getordercode()
		{
			return $this->ordercode;
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
		//roomTypeName
		public function setroomTypeName($roomTypeName)
		{
			$this->roomTypeName = $roomTypeName;
		}
		public function getroomTypeName()
		{
			return $this->roomTypeName;
		}
		//startingDate
		public function setstartingDate($startingDate)
		{
			$this->startingDate = $startingDate;
		}
		public function getstartingDate()
		{
			return $this->startingDate;
		}
		//finishingDate
		public function setfinishingDate($finishingDate)
		{
			$this->finishingDate = $finishingDate;
		}
		public function getfinishingDate()
		{
			return $this->finishingDate;
		}
		//lengthoftime
		public function setlengthoftime($lengthoftime)
		{
			$this->lengthoftime = $lengthoftime;
		}
		public function getlengthoftime()
		{
			return $this->lengthoftime;
		}
		//payingAmount
		public function setpayingAmount($payingAmount)
		{
			$this->payingAmount = $payingAmount;
		}
		public function getpayingAmount()
		{
			return $this->payingAmount;
		}
		//roomNumber
		public function setroomNumber($roomNumber)
		{
			$this->roomNumber = $roomNumber;
		}
		public function getroomNumber()
		{
			return $this->roomNumber;
		}
		//roomNumberdescription
		public function setroomNumberdescription($roomNumberdescription)
		{
			$this->roomNumberdescription = $roomNumberdescription;
		}
		public function getroomNumberdescription()
		{
			return $this->roomNumberdescription;
		}
	}
?>