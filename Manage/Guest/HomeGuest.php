<?php
session_start();
	include("../../Utils/common.php");
	if(isset($_SESSION['user'])&&isset($_SESSION['pass']))
	{
		if($_SESSION['role']==1)
			common::redirectPage('../Admin/HomeAdmin.php');
		if($_SESSION['role']==2)
			common::redirectPage('../Member/HomeMember.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
</head>
<link rel="icon" href="../../images/coworking-logo.jpg">
<link rel="stylesheet" type="text/css" href="../../CssJavaScriptJquery/CSS/HomeCSS.css"/>

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
                <li class="pure-menu-item">
                    <a href="HomeGuest.php#content" class="pure-menu-link">
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>
                <li class="pure-menu-item">
                    <a href="Contact.php#content" class="pure-menu-link">
                        <i class="fa fa-phone"></i> Contact
                    </a>
                </li>
                <li class="pure-menu-item">
                    <a href="PriceList.php#content" class="pure-menu-link">
                        <i class="fa fa-table"></i> Get Prices
                    </a>
                </li>
                <li class="pure-menu-item">
                    <a href="loginOrRegis.php?action=login#content" class="pure-menu-link">
                        <i class="fa fa-sign-in"></i> Login</a>
                </li>
                <li class="pure-menu-item">
                    <a href="loginOrRegis.php?action=register#content" class="pure-menu-link">
                        <i class="fa fa-registered"></i> Register</a>
                </li>
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
<div id="content" > 
	<h2>An Awesome Coworking Space</h2>
    Working online is becoming a trend nowadays. People can make use of their laptops and work everywhere they go. But the big problem is having a stable internet connection. Even if you have a pocket wifi on the go, you will still experience intermittent connection and end up unproductive with your work. This is where coworking spaces come in to the rescue.<br /><br />

For a digital noma﻿﻿d like me who hops from one place to another, I couldn't really tell which internet provider is great to use in a certain area. I have Globe data connection and a Sun pocket wifi. Sometimes, it's really unfortunate if both of them don't have signal or very slow because I couldn't work at all. 
<br /><br />

We're currently here in Baguio City for a 1-month vacation to acclimatize before our Mt. Kinabalu hike early next month. If I say vacation, it's really not pure stroll because I still need to work. However, my source of internet were too slow in the place where we are staying so I need to find an alternative. I thought of Calle Uno Coworking Space and so we go there. I've been hearing about this Calle Uno in a Facebook community of freelancers few months back and I'm really glad that I was able to experience working there.

<br /><br />

A Review of Calle Uno Coworking Space in Baguio 
Here are the things that I loved in Calle Uno:
<br /><br />
Calle Uno is very accessible.
Calle Uno is conveniently located in Quezon Hill, along Naguilian Road, Baguio City. It's just actually an 8-minute drive from our place so it's a great plus for us! Taxi drivers are also very familiar with Calle Uno so they will be able to drop you there. The building is in the vanguard, thus seeing it immediately.
<br /><br />

For a digital noma﻿﻿d like me who hops from one place to another, I couldn't really tell which internet provider is great to use in a certain area. I have Globe data connection and a Sun pocket wifi. Sometimes, it's really unfortunate if both of them don't have signal or very slow because I couldn't work at all. 
<br /><br />

We're currently here in Baguio City for a 1-month vacation to acclimatize before our Mt. Kinabalu hike early next month. If I say vacation, it's really not pure stroll because I still need to work. However, my source of internet were too slow in the place where we are staying so I need to find an alternative. I thought of Calle Uno Coworking Space and so we go there. I've been hearing about this Calle Uno in a Facebook community of freelancers few months back and I'm really glad that I was able to experience working there.

<br /><br />

A Review of Calle Uno Coworking Space in Baguio 
Here are the things that I loved in Calle Uno:
<br /><br />
Calle Uno is very accessible.
Calle Uno is conveniently located in Quezon Hill, along Naguilian Road, Baguio City. It's just actually an 8-minute drive from our place so it's a great plus for us! Taxi drivers are also very familiar with Calle Uno so they will be able to drop you there. The building is in the vanguard, thus seeing it immediately.
<br /><br />

The owner is very accommodating.
We're still in the parking area when a guy approached me and asked, "Hi, how may I help you?" I told him that we will be going to Calle Uno coworking space and I was so surprised to know that he's the owner. He is very hands on with his business, welcomed us warmly and he showed us each and every facility that they have there. Our son Wyatt Maktrav was also with us when we went to Calle Uno. Originally, kids aren't allowed to prevent disturbance to the people working there. But Sir Ace is very understanding and he said that if the child is behave, he can go inside. I was so worried because I know my son is very active and couldn't stay in one place. Surprisingly, Wyatt was so cooperative and he stayed quietly. Great job baby!
<br /><br />

The retro-themed interior is relaxing.
Honestly, I love anything retro. I have a collection of old banknotes and even my favorite songs are oldies. Upon stepping inside Calle Uno's premises, I immediately noticed the old typewriter, old sewing machine, old television, old turntable, old telephone, old table lamp, old flat iron, and lot more things that are antiquated. The relaxed ambience because of the interior blends well with Baguio's cold climate. I super love it there, really.
<br /><br />	


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
<div id="common">
    <span>Connect with us</span>
    <a href="https://www.facebook.com"><i class="fa fa-facebook-square"></i></a>
    <a href="https://plus.google.com"><i class="fa fa-google-plus-square"></i></a>
    <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
    <a href="https://twitter.com"><i class="fa fa-twitter-square"></i></a>
    <a href="https://www.youtube.com"><i class="fa fa-youtube-square"></i></a>
    <a href="https://www.pinterest.com"><i class="fa fa-pinterest-square"></i></a>
</div>
</body>
</html>