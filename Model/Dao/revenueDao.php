<?php
class revenueDao extends baseDao
{
  public static function instance()
  {
	  return new revenueDao();
  }
  public function __construct()
  {
	  baseDao::__construct();
  }
  //Revenue by Year and Detail Year(Month)__________________________________________________________________________________________________________________
  public function OrderYear()
  {//--------------------------------------------------------------Lấy về năm (cái mà có bản ghi trả về)
	  $arr=array();
	  $select= "SELECT DISTINCT(year(orderDate)) As orderYear FROM orders order by orderDate ";
	  $result=$this->executeSelect($select);
	  while($row=mysqli_fetch_array($result))
	  {
		  $year=new ordersDto();
		  $year->setorderYear($row['orderYear']);
		  $arr[]=$year;
	  }
	  $this->DisConnectDB();
	  return $arr;
  }
 
  public function OrderMonth_Year()
  { //----------------------------------------------------------Tra ve mang 2 chieu voi cac thang cua cac nam
	  $arrMonth=array();
	  $year=$this->OrderYear();
	  foreach($year as $a)
	  {
		  $arr=array();
		  $select= "SELECT DISTINCT(month(orderDate)) As orderMonth FROM orders 
		  			where year(orderDate)=".$a->getorderYear(). " order by orderDate";
		  $result=$this->executeSelect($select);
		  while($row=mysqli_fetch_array($result))
		  {
			  $month=new ordersDto();
			  $month->setorderMonth($row['orderMonth']);
			  $arr[]=$month;
		  }
		  $this->DisConnectDB();
		  $arrMonth[]=$arr;
	  }
/*		for( $i=0; $i<count($arrMonth); $i++)
		  for($j=0; $j<count($arrMonth[$i]); $j++)
			  echo $arrMonth[$i][$j]->getorderMonth();
	  Thử kiểm tra xem có lấy đc các tháng trong các năm hay k -->>Lấy được
*/		
	return $arrMonth;
  }
  
  //Revenue by Seats-----------------------------------------------------------
  public function RevenueBySeat()
  {//Trả về mảng là tổng số tiền thu được trong chuỗi tháng đó nhờ Seat
	$arr=array();
	$Year= $this->OrderYear();
	$Month= $this->OrderMonth_Year();
	for($i=0; $i<count($Year); $i++)
	  for($j=0; $j<count($Month[$i]); $j++)
	  {  
		$query= "select ifnull(sum(payingAmount),0) as total from seatbookingdetail JOIN orders 
				ON orders.code=seatbookingdetail.ordercode
				where year(orderDate)=".$Year[$i]->getorderYear()." 
				and month(orderDate)=".$Month[$i][$j]->getorderMonth();
		$result=$this->executeSelect($query);
		while($row=mysqli_fetch_array($result))
		{
			$arr[]= $row['total'];
		} 
	  }
	$this->DisConnectDB();
	return $arr;
  }
  //Revenue by TeamRoom-----------------------------------------------------------
  public function RevenueByTeamRoom()
  {//Trả về mảng là tổng số tiền thu được trong chuỗi tháng đó nhờ TeamRoom
	$arr=array();
	$Year= $this->OrderYear();
	$Month= $this->OrderMonth_Year();
	for($i=0; $i<count($Year); $i++)
	  for($j=0; $j<count($Month[$i]); $j++)
	  {  
		$query= "select ifnull(sum(payingAmount),0) as total from teamroombookingdetail JOIN orders 
				ON orders.code=teamroombookingdetail.ordercode
				where year(orderDate)=".$Year[$i]->getorderYear()." 
				and month(orderDate)=".$Month[$i][$j]->getorderMonth();
		$result=$this->executeSelect($query);
		while($row=mysqli_fetch_array($result))
		{
			$arr[]= $row['total'];
		} 
	  }
	$this->DisConnectDB();
	return $arr;
  }
  //Revenue by ConfRoom-----------------------------------------------------------
  public function RevenueByConfRoom()
  {//Trả về mảng là tổng số tiền thu được trong chuỗi tháng đó nhờ Conference Room
	$arr=array();
	$Year= $this->OrderYear();
	$Month= $this->OrderMonth_Year();
	for($i=0; $i<count($Year); $i++)
	  for($j=0; $j<count($Month[$i]); $j++)
	  {  
		$query= "select ifnull(sum(payingAmount),0) as total from conferenceroombookingdetail JOIN orders 
				ON orders.code=conferenceroombookingdetail.ordercode
				where year(orderDate)=".$Year[$i]->getorderYear()." 
				and month(orderDate)=".$Month[$i][$j]->getorderMonth();
		$result=$this->executeSelect($query);
		while($row=mysqli_fetch_array($result))
		{
			$arr[]= $row['total'];
		} 
	  }
	$this->DisConnectDB();
	return $arr;
  }
  //Revenue by Username____________________________________________________________________________________________________________________________
  public function getRevenueByUser()
  {
	  $arr=array();
	  $select= "select ifnull(sum(seatbookingdetail.payingAmount),0) as seatRev
					, ifnull(sum(teamroombookingdetail.payingAmount),0)as teamRev
					, ifnull(sum(conferenceroombookingdetail.payingAmount),0) as confRev
					, orders.username
					, (ifnull(sum(seatbookingdetail.payingAmount),0)
						+ifnull(sum(teamroombookingdetail.payingAmount),0)
						+ifnull(sum(conferenceroombookingdetail.payingAmount),0) ) as counts 
					FROM orders 
					LEFT JOIN seatbookingdetail ON orders.code=seatbookingdetail.ordercode 
					LEFT JOIN teamroombookingdetail ON orders.code=teamroombookingdetail.ordercode 
					LEFT JOIN conferenceroombookingdetail ON orders.code=conferenceroombookingdetail.ordercode 
				GROUP BY orders.username 
				ORDER BY counts DESC";
	  $result=$this->executeSelect($select);
	  while($row=mysqli_fetch_array($result))
	  {
		  $year=new ordersDto();
		  $year->setusername($row['username']);
		  $year->setuserSeatRev($row['seatRev']);
		  $year->setuserTeamRRev($row['teamRev']);
		  $year->setuserConfRRev($row['confRev']);
		  $arr[]=$year;
	  }
	  $this->DisConnectDB();
	  return $arr;
  }
}
?>