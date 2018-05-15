<?php
class bookController
{
	public static function instance()
	{
		return new bookController();
	}
	public function invoke()
	{
		$action="";
		if(isset($_GET['action']))
			$action=htmlentities($_GET['action']);
			
		switch($action)
		{
			case "":
			{
				$seatPrice=bookLogic::instance()->SeatPrice();
				$TeamRoomPrice=bookLogic::instance()->TeamRoomTypes();	
				$ConferenceRoomPrice=bookLogic::instance()->ConferenceRoomTypes();
				bookView::BangGia($seatPrice,$TeamRoomPrice,$ConferenceRoomPrice);
				break;
			}
//Thêm vào giỏ hàng___________________________________________________________________________________________________________________________________________
	//Seat-----------------------------------------------------------------------------------
			case "seats":
			{
					if(isset($_POST['book']))
					{
						$seatbook= new seatbookingdetailDto();
						$seatbook->setstartingDate(htmlentities($_POST['startdate']));
						$seatbook->setfinishingDate(htmlentities($_POST['finishdate']));
						bookLogic::instance()->addseats($seatbook);
						common::redirectPage('Book.php?action=cart#content');
					}
					else
					{
						bookView::SeatBook();
					}
					break;
			}
	//Team Room-----------------------------------------------------------------------------------
			case "teamroom":
			{
					if(isset($_POST['book']))
					{
						$teamroombook= new teamroombookingdetailDto();
						$teamroombook->setroomType(htmlentities($_POST['roomtype']));
						$teamroombook->setlengthoftime(htmlentities($_POST['duration']));
						$teamroombook->setstartingDate(htmlentities($_POST['startdate']));
						
						$lengthUse= $teamroombook->getlengthoftime()*30;//Tính thời lượng sử dụng phòng
						$teamroombook->setfinishingDate(strftime("%Y-%m-%d",strtotime(date("Y-m-d", //Chuyển sang dạng date
										strtotime($teamroombook->getstartingDate()))."+".$lengthUse." day"))); //Cộng với thời lượng sử dụng để trả về ngày cuối
						bookLogic::instance()->addTeamRoom($teamroombook);
						common::redirectPage('Book.php?action=cart#content');
					}
					else
					{
						$TeamRoomTypes=bookLogic::instance()->TeamRoomTypes();
						bookView::TeamRoomBook($TeamRoomTypes);
					}
				break;
			}
	//Conference Room-----------------------------------------------------------------------------------
			case "conferenceroom":
			{
					if(isset($_POST['book']))
					{
						$confroombook= new conferenceroombookingdetailDto();
						$confroombook->setroomType(htmlentities($_POST['roomtype']));
						$confroombook->setdate(htmlentities($_POST['date']));
						$confroombook->setstartingTime(htmlentities($_POST['startingtime']));
						$confroombook->setfinishingTime(htmlentities($_POST['finishingtime']));
						bookLogic::instance()->addConfRoom($confroombook);
						common::redirectPage('Book.php?action=cart#content');
					}
					else
					{
						$ConferenceRoomType=bookLogic::instance()->ConferenceRoomTypes();
						bookView::ConferenceRoomBook($ConferenceRoomType);
					}			
				break;
			}
//giỏ hàng ________________________________________________________________________________________________________________________________________________
			case "cart":
			{
				if(isset($_SESSION['user']) && $_SESSION['role']==2 && isset($_SESSION['pass']))
				{
					//Đặt Hàng (Lưu vào DB)_______________________________________________________________________________________________________________
					if(isset($_POST['insert']) && (isset($_SESSION['seatStart']) || isset($_SESSION['TeamRoomStart']) || isset($_SESSION['ConfRoomStart'])))
					{
						bookDao::instance()->insertOrder();
						//Insert Seat Booking Detail-------------------------------------
						if(isset($_SESSION['seatStart']))
						{
							for($i=0;$i<count($_SESSION['seatStart']);$i++)
							{
								$seatBookingDetailDto= new seatbookingdetailDto();
								$seatBookingDetailDto->setstartingDate($_SESSION['seatStart'][$i]);
								$seatBookingDetailDto->setfinishingDate($_SESSION['seatFinish'][$i]);
								bookDao::instance()->insertSeatDetail($seatBookingDetailDto);
							}
							unset ($_SESSION['seatStart']);
							unset ($_SESSION['seatFinish']);
						}
						//Insert Team Room Booking Detail-------------------------------------						
						if(isset($_SESSION['TeamRoomStart']))
						{

							for($i=0;$i<count($_SESSION['TeamRoomStart']);$i++)
							{
								$teamroomBookingDetailDto= new teamroombookingdetailDto();
								$teamroomBookingDetailDto->setroomType($_SESSION['TeamRoomType'][$i]);
								$teamroomBookingDetailDto->setlengthoftime($_SESSION['TeamRoomLengthTime'][$i]);
								$teamroomBookingDetailDto->setstartingDate($_SESSION['TeamRoomStart'][$i]);
								$teamroomBookingDetailDto->setfinishingDate($_SESSION['TeamRoomFinish'][$i]);
								bookDao::instance()->insertTeamRoomDetail($teamroomBookingDetailDto);
							}
							unset ($_SESSION['TeamRoomType']);
							unset ($_SESSION['TeamRoomLengthTime']);
							unset ($_SESSION['TeamRoomStart']);
							unset ($_SESSION['TeamRoomFinish']);
						}
						//Insert Conference Room Booking Detail-------------------------------------						
						if(isset($_SESSION['ConfRoomStart']))
						{

							for($i=0;$i<count($_SESSION['ConfRoomStart']);$i++)
							{
								$confroomBookingDetailDto= new conferenceroombookingdetailDto();
								$confroomBookingDetailDto->setroomType($_SESSION['ConfRoomType'][$i]);
								$confroomBookingDetailDto->setdate($_SESSION['ConfRoomDate'][$i]);
								$confroomBookingDetailDto->setstartingTime($_SESSION['ConfRoomStart'][$i]);
								$confroomBookingDetailDto->setfinishingTime($_SESSION['ConfRoomFinish'][$i]);
								bookDao::instance()->insertConfRoomDetail($confroomBookingDetailDto);
							}
							unset ($_SESSION['ConfRoomType']);
							unset ($_SESSION['ConfRoomDate']);
							unset ($_SESSION['ConfRoomStart']);
							unset ($_SESSION['ConfRoomFinish']);
						}
						common::redirectPage('History.php');
					}
					else
					{
						//Hien thi gio hang------------------------------------------------------------------------------------------------------------------
						$seatPrice=bookLogic::instance()->SeatPrice();
						$TeamRoomPrice=bookLogic::instance()->TeamRoomTypes();	
						$ConferenceRoomPrice=bookLogic::instance()->ConferenceRoomTypes();
						
						$orderDto= new ordersDto();
						$orderDto->setusername($_SESSION['user']);
						//echo $this->executeSelect("select concat(users.firstName , ' ', users.lastName) as name FROM users where username='".$_SESSION['user']."'");
						$orderDto->setorderDate(date('d/m/Y'));
						$orderDto->setcode('O'.(bookDao::instance()->createOrderCode()+1));
						
						bookView::Cart($seatPrice,$TeamRoomPrice,$ConferenceRoomPrice, $orderDto);
					}
				}
				else common::redirectPage('../Guest/PriceList.php');
				break;
			}
//Xóa đơn đặt trong cart__________________________________________________________________________________________________________________________________
			case "delSeatCart":
			{
					$idSeatCart=$_GET['id'];
					bookLogic::instance()->delSeatCart($idSeatCart);
					common::redirectPage('?action=cart#content');
				break;
			}
			case "delTeamRoomCart":
			{
					$idTeamRoomCart=$_GET['id'];
					bookLogic::instance()->delTeamRoomCart($idTeamRoomCart);
					common::redirectPage('?action=cart#content');
				break;
			}
			case "delConfRoomCart":
			{
					$idConfRoomCart=$_GET['id'];
					bookLogic::instance()->delConfRoomCart($idConfRoomCart);
					common::redirectPage('?action=cart#content');
				break;
			}
		}
	}
}
?>