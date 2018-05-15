<?php
class revenueView
{
	public function Year($year,$month,$revenue)
	{
		include("Year.php");
	}
	public function Month($month,$revenueBySeats,$revenueByTeamRoom,$revenueByConfRoom,$total)
	{
		include("Month.YearDetail.php");
	}
	public function User($RevenueByUser)
	{
		include("MemberRevenue.php");
	}
}
?>