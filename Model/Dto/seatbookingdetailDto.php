<?php 
	class seatbookingdetailDto
	{
		//fields
		private  $code;
		private  $ordercode;
		private  $startingDate;
		private  $finishingDate;
		private  $payingAmount;
		private  $seatNumber;
		private  $seatNumberName;
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
		//payingAmount
		public function setpayingAmount($payingAmount)
		{
			$this->payingAmount = $payingAmount;
		}
		public function getpayingAmount()
		{
			return $this->payingAmount;
		}
		//seatNumber
		public function setseatNumber($seatNumber)
		{
			$this->seatNumber = $seatNumber;
		}
		public function getseatNumber()
		{
			return $this->seatNumber;
		}
		//seatNumberName
		public function setseatNumberName($seatNumberName)
		{
			$this->seatNumberName = $seatNumberName;
		}
		public function getseatNumberName()
		{
			return $this->seatNumberName;
		}
	}
?>