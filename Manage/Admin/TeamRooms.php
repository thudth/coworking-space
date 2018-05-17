<?php 
ob_start();
session_start();
	include("../../Utils/common.php");
	if(isset($_SESSION['user'])&&isset($_SESSION['pass'])){
		if($_SESSION['role']==2)
			common::redirectPage('../Member/HomeMember.php');}
	else common::redirectPage('../Guest/HomeGuest.php');	
	
	include("../../Model/Dao/baseDao.php");
	include("../../Model/Dao/usersDao.php");
	
	include("../../Model/Dto/teamroomsDto.php");
	include("../../Model/Dto/teamroomtypesDto.php");
	
	include("../../Model/Dao/teamroomsDao.php");
	include("../../Model/Dao/teamroomtypesDao.php");
	
	include("../../Model/Logic/teamroomsLogic.php");
	include("../../Model/Logic/teamroomtypesLogic.php");
	
	include("../../Views/Admin/teamroom/teamroom_list_view.php");
	include("../../Controllers/Admin/teamroomsController.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Team Room</title>
</head>
<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/HomeAdminCSS.css"/>

<script type="text/javascript" src="../../CssJavaScriptJquery/jquery-3.1.1.min.js"></script>


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
                <li class="pure-menu-item" id="title">
                    <a href="Order.php" class="pure-menu-link">
                        <i class="fa fa-book"></i> Order</a></li>
                <li class="pure-menu-item" id="title">
                    <a href="Schedule.php" class="pure-menu-link">
                        <i class="fa fa-calendar"></i> Schedule</a></li>
                <li class="pure-menu-item" id="title">
                    <a href="Revenue.php" class="pure-menu-link">
                        <i class="fa fa-bar-chart"></i> Revenue</a></li>
                <li class="pure-menu-heading">Other</li>
                <li class="pure-menu-item" id="title">
                    <a href="UserManaging.php" class="pure-menu-link">
                        <i class="fa fa-users"></i> User Managing</a></li>
                <li class="pure-menu-item" id="title">
                    <a href="Roles.php" class="pure-menu-link">
                        <i class="fa fa-user-times"></i> Role (User)</a></li>
                <li class="pure-menu-item" id="title">
                    <a href="Orderstate.php" class="pure-menu-link">
                        <i class="fa fa-cogs"></i> Order State</a></li>
            </ul>
        </div>
        <a href="https://www.facebook.com"><i class="fa fa-facebook-square link-icon"></i></a>
        <a href="https://plus.google.com"><i class="fa fa-google-plus-square link-icon"></i></a>
        <a href="https://www.instagram.com"><i class="fa fa-instagram link-icon"></i></a>
        <a href="https://twitter.com"><i class="fa fa-twitter-square link-icon"></i></a>
        <a href="https://www.youtube.com"><i class="fa fa-youtube-square link-icon"></i></a>
        <a href="https://www.pinterest.com"><i class="fa fa-pinterest-square link-icon"></i></a>
    </div>
    <!--Header---------------------------------------------------------------------------------------->
    <div id="header">
        <p align="center"><strong>Coworking spaces in Freedom</strong></p>
    </div>
    <!--Personal----------------------------------------------------------------->
    <div class="pure-u-1-4" id="user">
        <div class="pure-menu pure-menu-horizontal" id="tuckedMenu">
            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" id="menuLink1" class="pure-menu-link">
                        <i class="fa fa-user"></i>
                        <?php echo usersDao::instance()->getName($_SESSION['user']); ?></a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item"><a href="Personal.php?action=editPass" class="pure-menu-link">
                                <i class="fa fa-key"></i> Change Password</a></li>
                        <li class="pure-menu-item"><a href="Personal.php" class="pure-menu-link">
                                <i class="fa fa-pencil-square-o"></i> Edit Information</a></li>
                        <li class="pure-menu-item"><a href="../Logout.php" class="pure-menu-link">
                                <i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<!--------------------------Content----------------------------------------->
  <div id="content" align="center">
  <?php 	teamroomsController::instance()->invoke(); ?>
  </div>
</div>
</body>
</html>