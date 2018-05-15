<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking History Details</title>
</head>

<body>
<div style="width:900px">
<h2 align="center">Order <?php echo $_GET['id']; ?> Detail</h2>
<span style="float:right;font-size:15px; font-weight:bold">Paying Amount:
	<?php echo historyDao::instance()->getOrderPayingAmount($_GET['id'])." 000 vnd"; ?>
</span><br />
<?php if(count($seatOrder)>0){ ?>
<h3>SEATS</h3>
<table class="pure-table pure-table-horizontal" cellspacing="0">
<thead>
  <tr>
    <th scope="col">Code</th>
    <th scope="col">Starting Date</th>
    <th scope="col">Finishing Date</th>
    <th scope="col">Paying Amount</th>
    <th scope="col">Seats</th>
  </tr>
</thead>
  <?php foreach($seatOrder as $a) {?>
  <tr>
    <td><?php echo $a->getcode(); ?></td>
    <td><?php echo $a->getstartingDate(); ?></td>
    <td><?php echo $a->getfinishingDate(); ?></td>
    <td><?php echo $a->getpayingAmount(); ?> 000 vnd</td>
    <td><?php echo $a->getseatNumberName(); ?></td>
  </tr>
  <?php } ?>
</table><br />
<?php } 
/*___________________________________________________________________________________________________*/
	if(count($teamRoomOrder)>0){
?>

<h3>ROOM FOR TEAM</h3>
<table class="pure-table pure-table-horizontal" cellspacing="0">
<thead>
  <tr>
    <th scope="col">Code</th>
    <th scope="col">Room Type</th>
    <th scope="col">Starting Date</th>
    <th scope="col">Finishing Date</th>
    <th scope="col">Paying Amount</th>
    <th scope="col">Room</th>
  </tr>
</thead>
  <?php foreach($teamRoomOrder as $a) {?>
  <tr>
    <td><?php echo $a->getcode(); ?></td>
    <td><?php echo $a->getroomTypeName(); ?></td>
    <td><?php echo $a->getstartingDate(); ?></td>
    <td><?php echo $a->getfinishingDate(); ?></td>
    <td><?php echo $a->getpayingAmount(); ?> 000 vnd</td>
    <td><?php echo $a->getroomNumber(); ?></td>
  </tr>
  <?php }?>
</table><br />
<?php }
/*___________________________________________________________________________________________________*/
	if(count($confRoomOrder)>0){
?>
<h3>Conference Room</h3>
<table class="pure-table pure-table-horizontal" cellspacing="0">
<thead>
  <tr>
    <th scope="col">Code</th>
    <th scope="col">Room Type</th>
    <th scope="col">Date</th>
    <th scope="col">Starting Time</th>
    <th scope="col">Finishing Time</th>
    <th scope="col">Paying Amount</th>
    <th scope="col">Room</th>
  </tr>
</thead>
  <?php foreach($confRoomOrder as $a) {?>
  <tr>
    <td><?php echo $a->getcode(); ?></td>
    <td><?php echo $a->getroomTypeName(); ?></td>
    <td><?php echo $a->getdate(); ?></td>
    <td><?php echo $a->getstartingTime(); ?> o'clock</td>
    <td><?php echo $a->getfinishingTime(); ?> o'clock</td>
    <td><?php echo $a->getpayingAmount(); ?> 000 vnd</td>
    <td><?php echo $a->getroomNumber(); ?></td>
  </tr>
  <?php }?>
</table><br /><br />
<?php }?>
<a href="History.php#content" style="float:right; font-size:18px">Back to History</a>
</div>
</body>
</html>