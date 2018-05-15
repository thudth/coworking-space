<?php

	include("../../Utils/common.php");
	include("../../Model/Dao/baseDao.php");
	include("../../Model/Dto/usersDto.php");
	include("../../Model/Dao/usersDao.php");
	include("../../Model/Logic/usersLogic.php");
	include("../../Views/Guest/guestView.php");
	include("../../Controllers/Guest/guestController.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
</head>
<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/HomeCSS.css"/>

<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/pureCSS.css"/>
<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/semanticCard.css"/>
<script type="text/javascript" src="../../CssJavaScriptJquery/jquery-3.1.1.min.js"></script>


<body>
<!-----------------------------Header------------------------------------------------------------------------------------------------------------------------>
<div id="header" class="pure-g">
<!-----------------------------Menu Bar---------------->
  <div id="menubar" class="pure-u-1-1">
    <!-------------------------------Logo-->
    <div id="logo" class="pure-u-1-5">
    	<img id="logoimage" src="../../images/images.png"/>
    </div>
    <!-------------------------------Menu-------------->
    <div id="menu" class="pure-u-5-8" >
      <p align="center"><strong>Coworking spaces in Freedom</strong></p>
        <div class="pure-menu pure-menu-horizontal pure-menu-scrollable custom-menu custom-menu-bottom custom-menu-tucked" 
        	id="tuckedMenu" align="center">
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="HomeGuest.php#content" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="Contact.php#content" class="pure-menu-link">Contact</a></li>
                <li class="pure-menu-item"><a href="PriceList.php#content" class="pure-menu-link">Get Prices</a></li>
                <li class="pure-menu-item"><a href="loginOrRegis.php?action=login#content" class="pure-menu-link">Login</a></li>
                <li class="pure-menu-item"><a href="loginOrRegis.php?action=register#content" class="pure-menu-link">Register</a></li>
            </ul>
        </div>
    </div>
    <!-------------------------------Login or register-->
    	
      <div class="pure-u-1-8" style="width:200px">
        </div></a>
      </div>
  </div>
<!-----------------------------Images------------------------------------------------------------------------------------------------------->  
  <div id="images">
  	<div><img id="img1" src="../../images/images (5).jpg" /></div>
    <div><img id="img2" src="../../images/images (3).jpg"/></div>
    <div><img id="img3" src="../../images/download (4).jpg"/></div>
    <div><img id="img4" src="../../images/hero-b-img-a.png"/></div>
    <div><img id="img5" src="../../images/Start_up_Startup-e1489470260829-770x435.jpg" /></div>
    <div><img id="img6" src="../../images/eda9f368b6ad49b6674a33f4f61efe0c.jpg" /></div>
    <div><img id="img7" src="../../images/images (4).jpg"/></div>
  </div>
</div>
<!-----------------------------------------------------------------------------------------------------Content----------------------------------------------->
<div id="content" align="center"> 
	<?php 
	guestController::instance()->invoke();
	?>

</div>

<!-----------------------------------------------------------------------------------------------------Footer----------------------------------------------->
<div id="footer1">

<!-------------------------------------------------Book-------------------------------------->
	<div id="book" class="ui link cards">
    <!---------------------------Seats------------------------>
    	<div id="bookseat">
        	<div class="ui card">
              <div class="image">
                <img src="../../images/87c4261d7192f410234717ff4f5f9d80.jpg">
              </div>
              <div class="content">
                <a class="header" onclick="return confirm ('You have to login to book')">Seats</a>
                <div class="description">
                    100.000 vnd/day
                </div>
              </div>
              <div class="extra content">
                <div class="right floated author">
                 <a onclick="return confirm ('You have to login to book')">Book a seat</a>
                </div>
              </div>
            </div>
        </div>
     <!---------------------------Team room------------------------>

        <div id="teamroomseat" >
        	<div class="ui card">
              <div class="image">
                <img src="../../images/download (7).jpg">
              </div>
              <div class="content">
                <a class="header" onclick="return confirm ('You have to login to book')">Team Room</a>
                <div class="description">
                    4 people; 8 people; 12 people and more 15peole...
                </div>
              </div>
              <div class="extra content">
                <div class="right floated author">
                 <a onclick="return confirm ('You have to login to book')">Book a Team Room</a>
                </div>
              </div>
            </div>
        </div>
     <!---------------------------Conference room------------------------>
        <div id="conferenceRoom" >
        	<div class="ui card">
              <div class="image">
                <img src="../../images/18582257_495622294102699_6575871928601094448_n.jpg">
              </div>
              <div class="content">
                <a class="header" onclick="return confirm ('You have to login to book')">Conference Room</a>
                <div class="description">
                    less 40 people; 50 people; 100 people; 150 people and more 200 people
                </div>
              </div>
              <div class="extra content">
                <div class="right floated author">
                 <a onclick="return confirm ('You have to login to book')">Book a Conference Room</a>
                </div>
              </div>
            </div>
        </div>
    <!----------------------------------------------->
    </div>
</div>
<!-------------------------------------------------Common-------------------------------------->
<div id="common" style="background:#099;width:100%;height:60px;" align="right">
		
    	<span>Connect with Us</span>
        <a href="https://www.facebook.com"><img src="../../images/facebook-3-xxl.png" /></a>
        <a href="https://plus.google.com"><img src="../../images/google-plus-6-xxl.png" /></a>
        <a href="https://www.instagram.com"><img src="../../images/instagram-xxl.png" /></a>
        <a href="https://twitter.com"><img src="../../images/twitter-3-xxl.png" /></a>
        <a href="https://www.youtube.com"><img src="../../images/youtube-3-xxl.png" /></a>
        <a href="https://www.pinterest.com"><img src="../../images/pinterest-3-xxl.png" /></a>
</div>
</body>
</html>