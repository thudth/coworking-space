<?php
class bookLogic
{
	public static function instance()
	{
		return new bookLogic();
	}
//Bang gia---------------------------------------------------------------------------------------------------------------------------------------------------
	public function SeatPrice()
	{
		return bookDao::instance()->SeatPrice();
	}
	public function TeamRoomTypes()
	{
		return bookDao::instance()->TeamRoomTypes();
	}
	public function ConferenceRoomTypes()
	{
		return bookDao::instance()->ConferenceRoomTypes();
	}
//Them vao gio hang-------------------------------------------------------------------------------------------------------------------------------------------
	//SEATS---------------------------------------------------------------------------------------------
	public function addseats($seatDto)
	{
		//Nếu đã có đơn trong cart rồi thì lấy session về, rồi gán giá trị tiếp theo vào mảng
		if(isset($_SESSION['seatStart']))
		{
			$arrStart=$_SESSION['seatStart'];
			$arrFinish=$_SESSION['seatFinish'];
			$arrMessages=$_SESSION['seatMessages'];

			$arrStart[]=$seatDto->getstartingDate();
			$arrFinish[]=$seatDto->getfinishingDate();
			$arrMessages[]="";
		}
		else 
		//Nếu chưa có thì khởi tạo mảng và gán giá trị vào mảng
		{
			$arrStart=array();
			$arrFinish=array();
			$arrMessages=array();

			$arrStart[0]=$seatDto->getstartingDate();
			$arrFinish[0]=$seatDto->getfinishingDate();
			$arrMessages[0]="";
		}
		//Gán vào session mảng mới nhất
		$_SESSION['seatStart']=$arrStart;
		$_SESSION['seatFinish']=$arrFinish;
		$_SESSION['seatMessages']=$arrMessages;
	}
	//Team Room-------------------------------------------------------------------------------------------
	public function addTeamRoom($teamroomDto)
	{
		
		if(isset($_SESSION['TeamRoomStart']))
		{
			$arrType=$_SESSION['TeamRoomType'];
			$arrLengthTime=$_SESSION['TeamRoomLengthTime'];
			$arrStart=$_SESSION['TeamRoomStart'];
			$arrFinish=$_SESSION['TeamRoomFinish'];
			$arrMessages=$_SESSION['TeamRoomMessages'];

			$arrType[]=$teamroomDto->getroomType();
			$arrLengthTime[]=$teamroomDto->getlengthoftime();
			$arrStart[]=$teamroomDto->getstartingDate();
			$arrFinish[]=$teamroomDto->getfinishingDate();
			$arrMessages[]="";
		}
		else 
		{
			$arrType=array();
			$arrLengthTime=array();
			$arrStart=array();
			$arrFinish=array();
			$arrMessages=array();

			$arrType[]=$teamroomDto->getroomType();
			$arrLengthTime[]=$teamroomDto->getlengthoftime();
			$arrStart[]=$teamroomDto->getstartingDate();
			$arrFinish[]=$teamroomDto->getfinishingDate();
			$arrMessages[]="";
		}
		$_SESSION['TeamRoomType']=$arrType;
		$_SESSION['TeamRoomLengthTime']=$arrLengthTime;
		$_SESSION['TeamRoomStart']=$arrStart;
		$_SESSION['TeamRoomFinish']=$arrFinish;
		$_SESSION['TeamRoomMessages']=$arrMessages;
	}

	//Conference Room-------------------------------------------------------------------------------------
	public function addConfRoom($ConfRoomoDto)
	{
		if(isset($_SESSION['ConfRoomStart']))
		{
			$arrType=$_SESSION['ConfRoomType'];
			$arrDate=$_SESSION['ConfRoomDate'];
			$arrStart=$_SESSION['ConfRoomStart'];
			$arrFinish=$_SESSION['ConfRoomFinish'];
			$arrMessages=$_SESSION['ConfRoomMessages'];

			$arrType[]=$ConfRoomoDto->getroomType();
			$arrDate[]=$ConfRoomoDto->getdate();
			$arrStart[]=$ConfRoomoDto->getstartingTime();
			$arrFinish[]=$ConfRoomoDto->getfinishingTime();
			$arrMessages[]="";
		}
		else 
		{
			$arrType=array();
			$arrDate=array();
			$arrStart=array();
			$arrFinish=array();
			$arrMessages=array();

			$arrType[]=$ConfRoomoDto->getroomType();
			$arrDate[]=$ConfRoomoDto->getdate();
			$arrStart[]=$ConfRoomoDto->getstartingTime();
			$arrFinish[]=$ConfRoomoDto->getfinishingTime();
			$arrMessages[]="";
		}
		$_SESSION['ConfRoomType']=$arrType;
		$_SESSION['ConfRoomDate']=$arrDate;
		$_SESSION['ConfRoomStart']=$arrStart;
		$_SESSION['ConfRoomFinish']=$arrFinish;
		$_SESSION['ConfRoomMessages']=$arrMessages;
	}
//Xoa don dat trong gio hang--------------------------------------------------------------------------------------------------------------------------------
	//seats-------------------------------------------------------------------------------------------------
	public function delSeatCart($idSeatCart)
	{
		$n=count($_SESSION['seatStart']);
		if($n==1)
		{
			//Nếu chỉ có 1 đơn đặt thì khi xóa đơn đặt đó thì xóa luôn session chứa cart
			unset($_SESSION['seatStart']);
			unset($_SESSION['seatFinish']);
			unset($_SESSION['seatMessages']);
		}
		else
		{
			//Đẩy các phần tử của mảng lên tính từ phần tử cần xóa bỏ
			for($i=$idSeatCart; $i<$n; $i++)
			{
				$_SESSION['seatStart'][$i]=$_SESSION['seatStart'][$i+1];
				$_SESSION['seatFinish'][$i]=$_SESSION['seatFinish'][$i+1];
                $_SESSION['seatMessages'][$i]=$_SESSION['seatMessages'][$i+1];
			}
			//Gỡ bỏ phần tử cuối của mảngs
			unset($_SESSION['seatStart'][$n-1]);
			unset($_SESSION['seatFinish'][$n-1]);
			unset($_SESSION['seatMessages'][$n-1]);
		}
		common::redirectPage('Book.php?action=cart');
	}
	//TEAM ROOM-------------------------------------------------------------------------------------------------
	public function delTeamRoomCart($idTeamRoomCart)
	{
		$n=count($_SESSION['TeamRoomStart']);
		if($n==1)
		{
			//Nếu chỉ có 1 đơn đặt thì khi xóa đơn đặt đó thì xóa luôn session chứa cart
			unset($_SESSION['TeamRoomType']);
			unset($_SESSION['TeamRoomLengthTime']);
			unset($_SESSION['TeamRoomStart']);
			unset($_SESSION['TeamRoomFinish']);
			unset($_SESSION['TeamRoomMessages']);
		}
		else
		{
			//Đẩy các phần tử của mảng lên tính từ phần tử cần xóa bỏ
			for($i=$idTeamRoomCart; $i<$n; $i++)
			{
				$_SESSION['TeamRoomType'][$i]=$_SESSION['TeamRoomType'][$i+1];
				$_SESSION['TeamRoomLengthTime'][$i]=$_SESSION['TeamRoomLengthTime'][$i+1];
				$_SESSION['TeamRoomStart'][$i]=$_SESSION['TeamRoomStart'][$i+1];
				$_SESSION['TeamRoomFinish'][$i]=$_SESSION['TeamRoomFinish'][$i+1];
				$_SESSION['TeamRoomMessages'][$i]=$_SESSION['TeamRoomMessages'][$i+1];
			}
			//Gỡ bỏ phần tử cuối của mảngs
			unset($_SESSION['TeamRoomType'][$n-1]);
			unset($_SESSION['TeamRoomLengthTime'][$n-1]);
			unset($_SESSION['TeamRoomStart'][$n-1]);
			unset($_SESSION['TeamRoomFinish'][$n-1]);
			unset($_SESSION['TeamRoomMessages'][$n-1]);
		}
	}
	//Conference ROOM-------------------------------------------------------------------------------------------------
	public function delConfRoomCart($idConfRoomCart)
	{
		$n=count($_SESSION['ConfRoomStart']);
		if($n==1)
		{
			//Nếu chỉ có 1 đơn đặt thì khi xóa đơn đặt đó thì xóa luôn session chứa cart
			unset($_SESSION['ConfRoomType']);
			unset($_SESSION['ConfRoomDate']);
			unset($_SESSION['ConfRoomStart']);
			unset($_SESSION['ConfRoomFinish']);
			unset($_SESSION['ConfRoomMessages']);
		}
		else
		{
			//Đẩy các phần tử của mảng lên tính từ phần tử cần xóa bỏ
			for($i=$idConfRoomCart; $i<$n; $i++)
			{
				$_SESSION['ConfRoomType'][$i]=$_SESSION['ConfRoomType'][$i+1];
				$_SESSION['ConfRoomDate'][$i]=$_SESSION['ConfRoomDate'][$i+1];
				$_SESSION['ConfRoomStart'][$i]=$_SESSION['ConfRoomStart'][$i+1];
				$_SESSION['ConfRoomFinish'][$i]=$_SESSION['ConfRoomFinish'][$i+1];
				$_SESSION['ConfRoomMessages'][$i]=$_SESSION['ConfRoomMessages'][$i+1];
			}
			//Gỡ bỏ phần tử cuối của mảngs
			unset($_SESSION['ConfRoomType'][$n-1]);
			unset($_SESSION['ConfRoomDate'][$n-1]);
			unset($_SESSION['ConfRoomStart'][$n-1]);
			unset($_SESSION['ConfRoomFinish'][$n-1]);
			unset($_SESSION['ConfRoomMessages'][$n-1]);
		}
	}
//Dat Hang (Luu vao DB)--------------------------------------------------------------------------------------------------------------------------------
	public function book()
	{
		return bookDao::instance()->book();
	}
}
?>

