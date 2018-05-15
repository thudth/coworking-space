<?php
class revenueController
{
	public static function instance()
	{
		return new revenueController();
	}
	public function invoke()
	{
		$action="year";
		if(isset($_GET['action']))
			$action=$_GET['action'];
		switch($action)
		{
			//Time
			case "year":
			{
				$year=revenueDao::instance()->OrderYear();
				$month=revenueDao::instance()->OrderMonth_Year();
				
				$revenue=array();
				$revBySeat=revenueDao::instance()->RevenueBySeat();
				$revByTeamRoom=revenueDao::instance()->RevenueByTeamRoom();
				$revByConfRoom=revenueDao::instance()->RevenueByConfRoom();
				
				for($i=0;$i<count($revBySeat);$i++)
					$revenue[]= $revBySeat[$i]+$revByTeamRoom[$i]+$revByConfRoom[$i];
				revenueView::Year($year,$month,$revenue);
				break;
			}
			case "month":
			{
				//Lấy về tất cả bản ghi tháng và năm có trong DB
				$year=revenueDao::instance()->OrderYear();
				$month=revenueDao::instance()->OrderMonth_Year();
				
				//Lấy về tổng doanh thu của tất cả các tháng (theo từng giai đoạn) theo seat, conf, team
				$revBySeat=revenueDao::instance()->RevenueBySeat();
				$revByTeamRoom=revenueDao::instance()->RevenueByTeamRoom();
				$revByConfRoom=revenueDao::instance()->RevenueByConfRoom();
				
				//Xem chi tiết (xem ra doanh thu năm đó): Xem từng tháng thu đc bao nhiêu vơi seat, conf, team, rồi cộng tổng
				$monthDetail=array();
				$revenue=array();
				$revenueSeat=array();
				$revenueTeamRoom=array();
				$revenueConfRoom=array();
				/*Vì $revBySeat,... là mảng 1 chiều, chưa tất cả các bản ghi của doanh thu trong tất cả các thàng
				Còn $month là mảng 2 chiều, 1 chiều là năm, chiều còn lại là tháng trong năm nên phải chuyển k thành số thứ tự trong mảng trên
				Và detail: chỉ hiển thị doanh thu trong 1 năm nên chỉ chọn 1 vài kết quả trong cả dãy kết quả (lênh if)*/
				$k=0;
				for($i=0;$i<count($month);$i++){
					if($year[$i]->getorderYear()==$_GET['y'])
					{
						for($j=0; $j<count($month[$i]); $j++)
							{
								$monthDetail[]= $month[$i][$j]->getorderMonth();
								$revenue[]= $revBySeat[$k]+$revByTeamRoom[$k]+$revByConfRoom[$k];
								$revenueSeat[]=$revBySeat[$k];
								$revenueTeamRoom[]=$revByTeamRoom[$k];
								$revenueConfRoom[]=$revByConfRoom[$k];
								$k++;
							}
					}
					else 
						for($j=0; $j<count($month[$i]); $j++)
							$k++;
				}
				
				revenueView::Month($monthDetail,$revenueSeat,$revenueTeamRoom,$revenueConfRoom,$revenue);
				break;
			}
			case "user":
			{
				$RevenueByUser=revenueDao::instance()->getRevenueByUser();
				revenueView::User($RevenueByUser);

				break;
			}
		}
	}
}
?>