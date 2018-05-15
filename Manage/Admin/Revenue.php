	<?php 
ob_start();
session_start();
	include("../../Utils/common.php");
	if(isset($_SESSION['user'])&&isset($_SESSION['pass'])){
		//echo $_SESSION['role'];
		if($_SESSION['role']==2)
			common::redirectPage('../Member/HomeMember.php');}
	else common::redirectPage('../Guest/HomeGuest.php');
	
	include("../../Model/Dao/baseDao.php");
	include("../../Model/Dao/usersDao.php");
	include("../../Model/Dao/revenueDao.php");
	
	include("../../Model/Dto/ordersDto.php");
	include("../../Model/Dto/seatbookingdetailDto.php");
	include("../../Model/Dto/teamroombookingdetailDto.php");
	include("../../Model/Dto/conferenceroombookingdetailDto.php");
	
	include("../../Views/Admin/revenue/revenueView.php");
	include("../../Controllers/Admin/revenueController.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Revenue</title>
</head>
<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/HomeAdminCSS.css"/>

<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/pureCSS.css"/>
<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/semanticCard.css"/>
<script type="text/javascript" src="../../CssJavaScriptJquery/jquery-3.1.1.min.js"></script>

</script><script type="text/javascript" src="../../CssJavaScriptJquery/Chart.min.js"></script>

<body>
<div>
<!--Mennu----------------------------------------------------------------------------------------->
  <div id="menu">
    <a href="HomeAdmin.php"><img src="../../images/images.png" id="logo" /></a>
    <div class="pure-menu custom-restricted-width" id="mainmenu">
        <ul class="pure-menu-list">
            <li class="pure-menu-heading">Resources</li>
            <li class="pure-menu-item" id="title"><a href="Seats.php" class="pure-menu-link">Seats</a></li>
            <li class="pure-menu-item" id="title"><a href="TeamRooms.php" class="pure-menu-link">Team Rooms</a></li>
            <li class="pure-menu-item" id="title"><a href="TeamRoomTypes.php" class="pure-menu-link">Team Room Type</a></li>
            <li class="pure-menu-item" id="title"><a href="ConferenceRoom.php" class="pure-menu-link">Conference Rooms</a></li>
            <li class="pure-menu-item" id="title"><a href="ConferenceRoomType.php" class="pure-menu-link">Conference Room Type</a></li>
            <li class="pure-menu-heading">Order</li>
            <li class="pure-menu-item" id="title"><a href="Order.php" class="pure-menu-link">Order</a></li>
            <li class="pure-menu-item" id="title"><a href="Schedule.php" class="pure-menu-link">Schedule</a></li>
            <li class="pure-menu-item" id="title"><a href="Revenue.php" class="pure-menu-link">Revenue</a></li>
            <li class="pure-menu-heading">Other</li>
            <li class="pure-menu-item" id="title"><a href="UserManaging.php" class="pure-menu-link">User Mangaging</a></li>
            <li class="pure-menu-item" id="title"><a href="Roles.php" class="pure-menu-link">Role (User)</a></li>
            <li class="pure-menu-item" id="title"><a href="Orderstate.php" class="pure-menu-link">Order State</a></li>
        </ul>
    </div>
        <a href="https://www.facebook.com"><img src="../../images/facebook-3-xxl.png" id="link"/></a>
        <a href="https://plus.google.com"><img src="../../images/google-plus-6-xxl.png" id="link"/></a>
        <a href="https://www.instagram.com"><img src="../../images/instagram-xxl.png" id="link"/></a>
        <a href="https://twitter.com"><img src="../../images/twitter-3-xxl.png" id="link"/></a>
        <a href="https://www.youtube.com"><img src="../../images/youtube-3-xxl.png" id="link"/></a>
        <a href="https://www.pinterest.com"><img src="../../images/pinterest-3-xxl.png" id="link"/></a>
  </div>
<!--Header---------------------------------------------------------------------------------------->
  <div id="header">
      <p align="center"><strong>Coworking spaces in Freedom</strong></p>
  </div>
<!--Personal----------------------------------------------------------------->
  <div class="pure-u-1-8" style="width:200px" id="user">
    <div class="pure-menu pure-menu-horizontal" id="tuckedMenu" align="center">
        <ul class="pure-menu-list">
            <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                <a href="" id="menuLink1" class="pure-menu-link"><?php echo usersDao::instance()->getName($_SESSION['user']); ?></a>
                <ul class="pure-menu-children">
                    <li class="pure-menu-item"><a href="Personal.php?action=editPass" class="pure-menu-link">Change Password</a></li>
                        <li class="pure-menu-item"><a href="Personal.php" class="pure-menu-link">Edit Information</a></li>
                        <li class="pure-menu-item"><a href="../Logout.php" class="pure-menu-link">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
  </div>
<!--------------------------Content----------------------------------------->
  <div id="content" align="center">
  <?php revenueController::instance()->invoke() ?>
  </div>
</div>
</body>
</html>