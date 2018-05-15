<?php 
	class ordersDto
	{
		//fields
		private  $code;
		private  $username;
		private  $userSeatRev;
		private  $userTeamRRev;
		private  $userConfRRev;
		private  $orderDate;
		private  $orderMonth;
		private  $orderYear;
		private  $confirmStaffMember;
		private  $orderState;
		private  $orderStateName;
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
		//username
		public function setusername($username)
		{
			$this->username = $username;
		}
		public function getusername()
		{
			return $this->username;
		}
		//userSeatRev
		public function setuserSeatRev($userSeatRev)
		{
			$this->userSeatRev = $userSeatRev;
		}
		public function getuserSeatRev()
		{
			return $this->userSeatRev;
		}
		//userTeamRRev
		public function setuserTeamRRev($userTeamRRev)
		{
			$this->userTeamRRev = $userTeamRRev;
		}
		public function getuserTeamRRev()
		{
			return $this->userTeamRRev;
		}
		//userConfRRev
		public function setuserConfRRev($userConfRRev)
		{
			$this->userConfRRev = $userConfRRev;
		}
		public function getuserConfRRev()
		{
			return $this->userConfRRev;
		}
		//orderDate
		public function setorderDate($orderDate)
		{
			$this->orderDate = $orderDate;
		}
		public function getorderDate()
		{
			return $this->orderDate;
		}
		//orderMonth
		public function setorderMonth($orderMonth)
		{
			$this->orderMonth = $orderMonth;
		}
		public function getorderMonth()
		{
			return $this->orderMonth;
		}
		//orderYear
		public function setorderYear($orderYear)
		{
			$this->orderYear = $orderYear;
		}
		public function getorderYear()
		{
			return $this->orderYear;
		}
		//confirmStaffMember
		public function setconfirmStaffMember($confirmStaffMember)
		{
			$this->confirmStaffMember = $confirmStaffMember;
		}
		public function getconfirmStaffMember()
		{
			return $this->confirmStaffMember;
		}
		//orderState
		public function setorderState($orderState)
		{
			$this->orderState = $orderState;
		}
		public function getorderState()
		{
			return $this->orderState;
		}
		//orderStateName
		public function setorderStateName($orderStateName)
		{
			$this->orderStateName = $orderStateName;
		}
		public function getorderStateName()
		{
			return $this->orderStateName;
		}
	}
?>