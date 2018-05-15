<?php
class scheduleDao extends baseDao
{
	public static function instance()
	{
		return new scheduleDao();
	}
//Seat------------------------------------------------------------------------------------------------------------------------------------	
	public function seatUse($date)
	{
		$seatUse=array();
		$query= "SELECT seatNumber FROM seatbookingdetail WHERE startingDate<='$date' AND finishingDate>='$date' AND seatNumber is not null";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$seatUse[]=$row['seatNumber'];
		}
		$this->DisConnectDB();
		return $seatUse;
	}
	public function seatEmpty($date)
	{
		$seatEmpty=array();
		$query= "SELECT code FROM seats WHERE code not in  
		(SELECT seatNumber FROM seatbookingdetail WHERE startingDate<='$date' AND finishingDate>='$date' AND seatNumber is not null)";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$seatEmpty[]=$row['code'];
		}
		$this->DisConnectDB();
		return $seatEmpty;
	}
//Team Room------------------------------------------------------------------------------------------------------------------------------------	
	public function TeamRoomUse($date)
	{
		$seatUse=array();
		$query= "SELECT roomNumber FROM teamroombookingdetail WHERE startingDate<='$date' AND finishingDate>='$date' AND roomNumber is not null";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$seatUse[]=$row['roomNumber'];
		}
		$this->DisConnectDB();
		return $seatUse;
	}
	public function TeamRoomEmpty($date)
	{
		$seatEmpty=array();
		$query= "SELECT roomNumber FROM teamrooms WHERE roomNumber not in  
		(SELECT roomNumber FROM teamroombookingdetail WHERE startingDate<='$date' AND finishingDate>='$date' AND roomNumber is not null)";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$seatEmpty[]=$row['roomNumber'];
		}
		$this->DisConnectDB();
		return $seatEmpty;
	}
//Conference Room------------------------------------------------------------------------------------------------------------------------------------	
	public function ConfRoomUse($date,$hour)
	{ 
		$seatUse=array();
		$query= "SELECT roomNumber FROM conferenceroombookingdetail 
					WHERE date='$date' AND startingTime<='$hour' AND finishingTime>='$hour'  AND roomNumber is not null";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$seatUse[]=$row['roomNumber'];
		}
		$this->DisConnectDB();
		return $seatUse;
	}
	public function ConfRoomEmpty($date,$hour)
	{
		$seatEmpty=array();
		$query= "SELECT roomNumber FROM conferencerooms  WHERE roomNumber not in  
		(SELECT roomNumber FROM conferenceroombookingdetail 
		WHERE date='$date' AND startingTime<='$hour' AND finishingTime>='$hour' AND roomNumber is not null)";
		$result=$this->executeSelect($query);
		while($row= mysqli_fetch_array($result))
		{
			$seatEmpty[]=$row['roomNumber'];
		}
		$this->DisConnectDB();
		return $seatEmpty;
	}

}
?>