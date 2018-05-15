<?php
class seatsDto
{
	private $code;
	private $seatnumber;
	private $priceperday;
	private $note;
	//constructor
	public function __construct()
	{
	}
	//setter, Getter
	//Code
	public function setcode($code)
	{
		$this->code=$code;
	}
	public function getcode()
	{
		return $this->code;
	}
	//seatnumber
	public function setseatnumber($seatnumber)
	{
		$this->seatnumber=$seatnumber;
	}
	public function getseatnumber()
	{
		return $this->seatnumber;
	}
	//priceperday
	public function setpriceperday($priceperday)
	{
		$this->priceperday=$priceperday;
	}
	public function getpriceperday()
	{
		return $this->priceperday;
	}
	//note
	public function setnote($note)
	{
		$this->note=$note;
	}
	public function getnote()
	{
		return $this->note;
	}
}
?>