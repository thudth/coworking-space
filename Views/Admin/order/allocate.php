<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Details</title>
</head>
<style>
	.err {color:red; font-size:18px}
</style>
<script>
function validate()
{
	//Seat ___________________________________________________________________________________________
	<?php for($a=0; $a<count($arrSeatOrder); $a++){?>
	var <?php echo $arrSeatOrder[$a]->getcode();?>= document.getElementById('<?php echo $arrSeatOrder[$a]->getcode();?>').value;
	if(<?php echo $arrSeatOrder[$a]->getcode();?>==0)
	{
		document.getElementById('errAllocateSeat').innerHTML="Seats invalid";
		document.getElementById('<?php echo $arrSeatOrder[$a]->getcode();?>').focus();
		return false;
	}
	else document.getElementById('errAllocateSeat').innerHTML="";
	<?php }?>

	//Team Room ___________________________________________________________________________________________
	<?php for($b=0; $b<count($arrTeamRoomOrder); $b++){?>
	var <?php echo $arrTeamRoomOrder[$b]->getcode();?>= document.getElementById('<?php echo $arrTeamRoomOrder[$b]->getcode();?>').value;
	if(<?php echo $arrTeamRoomOrder[$b]->getcode();?>==0)
	{
		document.getElementById('errAllocateTeamRoom').innerHTML="Room for Team invalid";
		document.getElementById('<?php echo $arrTeamRoomOrder[$b]->getcode();?>').focus();
		return false;
	}
	else document.getElementById('errAllocateTeamRoom').innerHTML="";
	<?php }?>

	//ConfRoom ___________________________________________________________________________________________
	<?php for($c=0; $c<count($arrConferenceOrder); $c++){?>
	var <?php echo $arrConferenceOrder[$c]->getcode();?>= document.getElementById('<?php echo $arrConferenceOrder[$c]->getcode();?>').value;
	if(<?php echo $arrConferenceOrder[$c]->getcode();?>==0)
	{
		document.getElementById('errAllocateConfRoom').innerHTML="Room for conference invalid";
		document.getElementById('<?php echo $arrConferenceOrder[$c]->getcode();?>').focus();
		return false;
	}
	else document.getElementById('errAllocateConfRoom').innerHTML="";
	<?php }?>
	
}
</script>
<body>
<form method="post">
<h2><?php echo 'Order Code: '.$_GET['id']?></h2>
<!---------------------------------------------------------------------------------------------------->

<?php if(count($arrSeatOrder)>0){ ?>
	<h4>SEATS</h4>
    <?php for($a=0; $a<count($arrSeatOrder); $a++){
		for($i=$a+1; $i<count($arrSeatOrder); $i++){
			 echo $arrSeatOrder[$i]->getcode();}}
		?>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
  <thead>
	  <tr>
		<th scope="col">Code</th>
		<th scope="col">Starting Date</th>
		<th scope="col">Finishing Date</th>
		<th scope="col">Seats</th>
	  </tr>
  </thead>
  <tbody>
      <?php for($a=0; $a<count($arrSeatOrder); $a++){?>
	  <tr>
		<td><?php echo $arrSeatOrder[$a]->getcode(); ?></td>
		<td><?php echo $arrSeatOrder[$a]->getstartingDate(); ?></td>
		<td><?php echo $arrSeatOrder[$a]->getfinishingDate(); ?></td>
		<td>
        	<select name="<?php echo $arrSeatOrder[$a]->getcode();?>" id="<?php echo $arrSeatOrder[$a]->getcode();?>" onchange="validate1()">
				<option value="0">Chon cho ngoi</option>
        		<?php 
		  		foreach($arSeatFit[$a] as $b) 
					echo "<option value='".$b->getcode()."'>".$b->getseatNumber()." (".$b->getnote().")</option>";
				?>
			</select>
        </td>
	  </tr>
      <?php } ?>
  </tbody>
</table>
<div class="err" id="errAllocateSeat" align="left" style="width:600px"></div>
<br /><br />
<?php }?>
<!---------------------------------------------------------------------------------------------------->
<?php if(count($arrTeamRoomOrder)>0){ ?>
	<h4>ROOM FOR TEAM</h4>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
  <thead>
	  <tr>
		<th scope="col">Code</th>
		<th scope="col">Room Type</th>
		<th scope="col">Starting Date</th>
		<th scope="col">Length of Time</th>
		<th scope="col">Room</th>
	  </tr>
  </thead>
  <tbody>
      <?php for($a=0; $a<count($arrTeamRoomOrder); $a++){?>
	  <tr>
		<td><?php echo $arrTeamRoomOrder[$a]->getcode(); ?></td>
		<td><?php echo $arrTeamRoomOrder[$a]->getroomType().": ".$arrTeamRoomOrder[$a]->getroomTypeName(); ?></td>
		<td><?php echo $arrTeamRoomOrder[$a]->getstartingDate(); ?></td>
		<td><?php echo $arrTeamRoomOrder[$a]->getlengthoftime(); ?> month</td>
		<td>
        	<select name="<?php echo $arrTeamRoomOrder[$a]->getcode();?>" id="<?php echo $arrTeamRoomOrder[$a]->getcode();?>" onchange="validate2()">
				<option value="0">Chon phong</option>
                <?php 
		  		foreach($arTeamRoomFit[$a] as $b) 
					echo "<option value='".$b->getroomNumber()."'>".$b->getroomNumber()." (".$b->getRoomTypeName().")</option>";
				?>
			</select>
		</td>
	  </tr>
      <?php } ?>
  </tbody>
</table>
<div class="err" id="errAllocateTeamRoom" align="left"></div>
<br /><br />
<?php }?>
<!---------------------------------------------------------------------------------------------------->
<?php if(count($arrConferenceOrder)>0){ ?>
	<h4>CONFERENCE ROOM</h4>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
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
      <?php for($a=0; $a<count($arrConferenceOrder); $a++){ ?>
	  <tr>
		<td><?php echo $arrConferenceOrder[$a]->getcode(); ?></td>
		<td><?php echo $arrConferenceOrder[$a]->getroomType().": ".$arrConferenceOrder[$a]->getroomTypeName(); ?></td>
		<td><?php echo $arrConferenceOrder[$a]->getdate(); ?></td>
		<td><?php echo $arrConferenceOrder[$a]->getstartingTime(); ?></td>
		<td><?php echo $arrConferenceOrder[$a]->getfinishingTime(); ?></td>
		<td>
        	<select name="<?php echo $arrConferenceOrder[$a]->getcode();?>" id="<?php echo $arrConferenceOrder[$a]->getcode();?>" onchange="validate3()">
				<option value="0">Chon phong</option>
                <?php 
		  		foreach($arConferenceRoomFit[$a] as $b) 
					echo "<option value='".$b->getroomNumber()."'>".$b->getroomNumber()." (".$b->getRoomTypeName().")</option>";
				?>
			</select>
        </td>
	  </tr>
      <?php } ?>
  </tbody>
</table>
<div class="err" id="errAllocateConfRoom" align="left" style="width:800px"></div>
<br />
<?php }?>
<input type="submit" value="Allocate" name="allocate" class="pure-button pure-button-primary" onclick="return validate()"/>
</form>
<div style="width:500px">
<a href="Order.php#content" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a></div>
</body>
</html>