<?php
	if(isset($_SESSION['seatStart']) || isset($_SESSION['TeamRoomStart']) || isset($_SESSION['ConfRoomStart']))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Details</title>
</head>
<style>
tbody tr:hover
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
<div style="width:800px">
<?php $sum=0; ?>
	<form method="post" class="pure-form">
        <h2>Customer: <strong><?php echo $orderDto->getusername(); ?></strong></h2><br />
		<span style="font-size:20px">Code:</span>
        	<input type="text" name="code" id="code" size="10" readonly="readonly" 
            	value="<?php echo $orderDto->getcode();?>" class="pure-input-1-4"/>
		<span style="float:right; font-size:20px">Booking Date: <?php echo $orderDto->getorderdate();?></span><br /><br />
<!-------------------------------------------------------------------------------SEAT------------------------------->
  <?php if(isset($_SESSION['seatStart'])){?>
  <h4>SEATS</h4>
  <table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="600px">
    <thead>
	  <tr>
		<th scope="col">Numerical Order</th>
		<th scope="col">Starting Date</th>
		<th scope="col">Finishing Date</th>
		<th scope="col">Paying Amount</th>
		<th scope="col"></th>
	  </tr>
    </thead>
    <tbody>
	  <?php for($a=0;$a<count($_SESSION['seatStart']);$a++) { 
	  		$price=bookDao::instance()->getSeatPrice();
			$lengthOfTime=(abs(strtotime($_SESSION['seatFinish'][$a]) - strtotime($_SESSION['seatStart'][$a]))/(60*60*24)+1);
			//Giảm giá ưu đãi
			if($lengthOfTime<7)
				$pay= $lengthOfTime*$price;
			else if ($lengthOfTime<30)
				$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.05;
			else if ($lengthOfTime<90)
				$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.1;
			else 
				$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.2;
			//
			$sum+=$pay;
	  ?>
	  <tr>
		<td><?php echo $a+1; ?></td>
		<td><?php echo $_SESSION['seatStart'][$a] ?></td>
		<td><?php echo $_SESSION['seatFinish'][$a] ?></td>
		<td><?php echo $pay. " 000 vnd"?></td>
		<td><a href="?action=delSeatCart&id=<?php echo $a;?>">Delete</a></td>
	  </tr>
      <?php }?>
    </tbody>
  </table><br />
  <?php }?> 
    
<!-------------------------------------------------------------------------------TEAM ROOM------------------------------->
  <?php if(isset($_SESSION['TeamRoomStart'])){?>
  <h4>ROOM FOR TEAM</h4>
  <table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="800px">
    <thead>
	  <tr>
		<th scope="col">Numerical Order</th>
		<th scope="col">Room Type</th>
		<th scope="col">Length of Time</th>
		<th scope="col">Starting Date</th>
		<th scope="col">Finishing Date</th>
		<th scope="col">Paying Amount</th>
		<th scope="col"></th>
	  </tr>
    </thead>
    <tbody>
	  <?php for($a=0;$a<count($_SESSION['TeamRoomStart']);$a++) { 
				$price=bookDao::instance()->getOneTeamRoomPrice($_SESSION['TeamRoomType'][$a]);
				$lengthOfTime=$_SESSION['TeamRoomLengthTime'][$a];
				//Giảm giá ưu đãi
				if($lengthOfTime<3)
					$pay= $lengthOfTime*$price;
				else if ($lengthOfTime<6)
					$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.1;
				else if ($lengthOfTime<12)
					$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.15;
				else 
					$pay= $lengthOfTime*$price- $lengthOfTime*$price*0.2;
				//
				$sum+=$pay;
		?>
	  <tr>
		<td><?php echo $a+1; ?></td>
		<td><?php echo bookDao::instance()->getTeamRoomTypeName($_SESSION['TeamRoomType'][$a])?></td>
		<td><?php echo $_SESSION['TeamRoomLengthTime'][$a] ?> * 30 days</td>
		<td><?php echo $_SESSION['TeamRoomStart'][$a] ?></td>
		<td><?php echo $_SESSION['TeamRoomFinish'][$a] ?></td>
		<td><?php echo $pay." 000 vnd" ?></td>
		<td><a href="?action=delTeamRoomCart&id=<?php echo $a;?>">Delete</a></td>
	  </tr>
      <?php } ?>
    </tbody>
  </table><br />
  <?php } ?>
<!-------------------------------------------------------------------------------SEAT------------------------------->
  <?php if(isset($_SESSION['ConfRoomStart'])){?>
  <h4>CONFERENCES</h4>
  <table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="800px">
    <thead>
	  <tr>
		<th scope="col">Numerical Order</th>
		<th scope="col">Room Type</th>
		<th scope="col">Date</th>
		<th scope="col">Starting Time</th>
		<th scope="col">Finishing Time</th>
		<th scope="col">Paying Amount</th>
		<th scope="col"></th>
	  </tr>
    </thead>
    <tbody>
      <?php for($a=0;$a<count($_SESSION['ConfRoomStart']);$a++) { 
				$pay=bookDao::instance()->getOneConfRoomPrice($_SESSION['ConfRoomType'][$a])*
					abs($_SESSION['ConfRoomStart'][$a]-$_SESSION['ConfRoomFinish'][$a]);
				$sum+=$pay;
			?>
	  <tr>
		<td><?php echo $a+1; ?></td>
		<td><?php echo bookDao::instance()->getConfRoomTypeName($_SESSION['ConfRoomType'][$a]) ?></td>
		<td><?php echo $_SESSION['ConfRoomDate'][$a] ?></td>
		<td><?php echo $_SESSION['ConfRoomStart'][$a] ?> o'clock</td>
		<td><?php echo $_SESSION['ConfRoomFinish'][$a] ?> o'clock</td>
		<td><?php echo $pay." 000 vnd"; ?></td>
		<td><a href="?action=delConfRoomCart&id=<?php echo $a;?>">Delete</a></td>
	  </tr>
      <?php }?>
    </tbody>
  </table><br />
  <?php } ?>
<span style="font-size:18px"><?php echo "Total: ".$sum." 000 vnd " ?></span>
<input type="submit" name="insert" class="pure-button pure-button-primary" value="Book"/>       
</form>
       <a href="Book.php#content" style="float:right; font-size:18px">Continue add a reservation </a><br />
</div>
</body>
</html>
<?php
	}
	else
		echo "<h1>You don't have any reservation</h1>";
?>