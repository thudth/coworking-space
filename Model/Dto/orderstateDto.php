<?php 
	class orderstateDto
	{
		//fields
		private  $code;
		private  $status;
		//constructor
		public function __construct()
		{			
		}		
		//setter,getter
		//Code
		public function setcode($code)
		{
			$this->code = $code;
		}
		public function getcode()
		{
			return $this->code;
		}
		//Status
		public function setstatus($status)
		{
			$this->status = $status;
		}
		public function getstatus()
		{
			return $this->status;
		}
	}
?>