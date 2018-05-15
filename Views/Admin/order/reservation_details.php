<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Details</title>
</head>

<body>
<h2><?php echo 'Order Code: '.$_GET['id']?></h2>
<!---------------------------------------------------------------------------------------------------->
<?php if(count($arrSeatOrder)>0){ ?>
	<h4>SEATS</h4>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="500px">
  <thead>
	  <tr>
		<th scope="col">Code</th>
		<th scope="col">Starting Date</th>
		<th scope="col">Finishing Date</th>
		<th scope="col">Seats</th>
	  </tr>
    </thead>
    <tbody>
      <?php if(count($arrSeatOrder)>0) foreach($arrSeatOrder as $a){ ?>
	  <tr>
		<td><?php echo $a->getcode(); ?></td>
		<td><?php echo $a->getstartingDate(); ?></td>
		<td><?php echo $a->getfinishingDate(); ?></td>
		<td><?php echo $a->getseatNumber()." (".$a->getseatNumberName().")"; ?></td>
	  </tr>
      <?php } ?>
    </tbody>
</table><br />
<?php }?>
<!---------------------------------------------------------------------------------------------------->
<?php if(count($arrTeamRoomOrder)>0){ ?>
	<h4>ROOM FOR TEAM</h4>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="800px">
  <thead>
	  <tr>
		<th scope="col">Code</th>
		<th scope="col">Room Type</th>
		<th scope="col">Starting Date</th>
		<th scope="col">Finishing Date</th>
		<th scope="col">Length of Time</th>
		<th scope="col">Room</th>
	  </tr>
    </thead>
    <tbody>
      <?php foreach($arrTeamRoomOrder as $a){ ?>
	  <tr>
		<td><?php echo $a->getcode(); ?></td>
		<td><?php echo $a->getroomType()." (".$a->getroomTypeName().")"; ?></td>
		<td><?php echo $a->getstartingDate(); ?></td>
		<td><?php echo $a->getfinishingDate(); ?></td>
		<td><?php echo $a->getlengthoftime(); ?> month</td>
		<td><?php echo $a->getroomNumber() ;?></td>
	  </tr>
      <?php } ?>
  </tbody>
</table><br />
<?php }?>
<!---------------------------------------------------------------------------------------------------->	
<?php if(count($arrConferenceOrder)>0){ ?>
	<h4>CONFERENCE ROOM</h4>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="800px">
  <thead>
	  <tr>
		<th scope="col">Code</th>
		<th scope="col">Room Type</th>
		<th scope="col">Date</th>
		<th scope="col">Starting Time</th>
		<th scope="col">Finishing Time</th>
		<th scope="col">Room</th>
	  </tr>
  </thead>
  <tbody>
      <?php foreach($arrConferenceOrder as $a){ ?>
	  <tr>
		<td><?php echo $a->getcode(); ?></td>
		<td><?php echo $a->getroomType()." (".$a->getroomTypeName().")"; ?></td>
		<td><?php echo $a->getdate(); ?></td>
		<td><?php echo $a->getstartingTime(); ?></td>
		<td><?php echo $a->getfinishingTime(); ?></td>
		<td><?php echo $a->getroomNumber(); ?></td>
	  </tr>
      <?php } ?>
  </tbody>
</table>
<div style="width:500px"><br />
<a href="Order.php#content" style="float:right; font-size:20px">Back</a><br /></div>

<?php }?>
</body>
</html>