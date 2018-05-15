<?php 
	$checksess=false;
	if(isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['role']=2)
		$checksess=true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
#emp:hover
{
	background:#CCC;
}
table
{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:15px;
}
</style>
<body>
<table border="1" cellspacing="0" width="950px" class="pure-table pure-table-horizontal">
<thead>
    <tr>
        <th colspan="3"><h3 align="center">Price List</h3></th>
    </tr>
</thead>
<tbody>
<!------------------------------Seat Price-------------------------------->
  <tr>
    <th rowspan="<?php echo count($SeatPrice)+1 ?>"><h3>Seat</h3><br />
    	<?php if($checksess) echo "<a href='?action=seats'>Book</a>"; else{?>
        <a onclick="return confirm ('You have to login to book')" href="#content">Book</a><?php }?>
    </th>
  </tr>
<?php foreach($SeatPrice as $seatDto){ ?>
  <tr id="emp">
    <td colspan="2"><?php echo $seatDto->getpriceperday(); ?> 000 (vnd/day)</td>
  </tr>
<?php } ?>


<!------------------------------Team room Price-------------------------------->
 <tr>
    <th rowspan="<?php echo count($arrTeamRoomPrice)+1 ?>"><h3>Team Room</h3>
    	<?php if($checksess) echo "<a href='?action=teamroom'>Book</a>"; else{?>
        <a onclick="return confirm ('You have to login to book')" href="#content">Book</a><?php }?>
    </th>
  </tr>
<?php foreach($arrTeamRoomPrice as $teamroomtype) {?>
 <tr id="emp">
    <td><?php echo $teamroomtype->getpricePerMonth(); ?> 000 (vnd/30days)</td>
    <td><?php echo $teamroomtype->getname()."<br/>".$teamroomtype->getnote(); ?></td>
  </tr>
<?php } ?>


<!------------------------------Conference room Price-------------------------------->
 <tr>
    <th scope="row" rowspan="<?php echo count($arrConfRoomPrice)+1 ?>"><h3>Confernce Room</h3>
	   <?php if($checksess) echo "<a href='?action=conferenceroom'>Book</a>"; else {?>
        <a onclick="return confirm ('You have to login to book')" href="#content">Book</a><?php }?>
    </th>
  </tr>
<?php foreach($arrConfRoomPrice as $teamroomtype) {?>
 <tr id="emp">
    <td><?php echo $teamroomtype->getpricePerHour(); ?> 000 (vnd/month)</td>
    <td><?php echo $teamroomtype->getname()."<br/>".$teamroomtype->getnote(); ?></td>
  </tr>
<?php } ?>
</tbody>
</table>

</body>
</html>