<?php 
	class conferenceroombookingdetailDto
	{
	//fields
		private  $code;
		private  $ordercode;
		private  $roomType;
		private  $roomTypeName;
		private  $date;
		private  $startingTime;
		private  $finishingTime;
		private  $payingAmount;
		private  $roomNumber;
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
	//date
		public function setdate($date)
		{
			$this->date = $date;
		}
		public function getdate()
		{
			return $this->date;
		}
	//startingTime
		public function setstartingTime($startingTime)
		{
			$this->startingTime = $startingTime;
		}
		public function getstartingTime()
		{
			return $this->startingTime;
		}
	//finishingTime
		public function setfinishingTime($finishingTime)
		{
			$this->finishingTime = $finishingTime;
		}
		public function getfinishingTime()
		{
			return $this->finishingTime;
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
	}
?>