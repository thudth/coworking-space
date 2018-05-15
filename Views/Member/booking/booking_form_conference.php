<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Have your conference take place here</title>
</head>
<style>
	.err {color:red}
</style>
<script language="javascript">
function Pay()
{
//Lấy thông tin từ form
	var startingtime= document.getElementById('startingtime').value;
	var finishingtime= document.getElementById('finishingtime').value;
	var distanceTime= finishingtime-startingtime;
	//Lấy loại phòng được chọn từ form
	var roomtype= document.getElementsByName('roomtype');
	var roomtypechecked;
	for(var i =0; i<roomtype.length; i++)
		if(roomtype[i].checked === true) roomtypechecked=roomtype[i].value;
//Tính và hiển thị ra giá
	//Lấy được mảng mã và giá từ DB
	var price = new Array();
	var typecode= new Array();
	<?php foreach(bookDao::instance()->getAllConfRoomPrice() as $abc) { ?>
		typecode.push('<?php echo $abc->getcode();?>');
		price.push('<?php echo $abc->getpricePerHour();?>');
	<?php }?>
	//So sánh để lấy ra giá cuả loại được chọn
	var pay;
	for(var j =0; j<typecode.length; j++)
		if(typecode[j]==roomtypechecked)
			pay=price[j];
	//Tính và hiển thị giá của đơn hàng
	if(!isNaN(distanceTime) && distanceTime!=0)
		document.getElementById('paying').innerHTML=pay*distanceTime+' 000 vnd';
}
function validate()
{
	var date=document.getElementById('date').value;
	var start=document.getElementById('startingtime').value;
	var finish=document.getElementById('finishingtime').value;
	if(date.length==0 || isNaN(start) || isNaN(finish) || finish<=start)
	{
		document.getElementById('errtimeinuse').innerHTML="*Invalid date or time";
		document.getElementById('startingtime').focus();
		return false;
	}
	return true;
}

</script>
<body>
<div style="width:500px">
<form method="post" class="pure-form">
	<fieldset>
		<legend><h3 align="center">Have your conference take place here</h3></legend>
	<table>
		<tr>
			<td><strong>Room type:</strong></td>
		</tr>
		<tr>
			<td></td>
			<td width="300">
			  <?php foreach($confRoomTypes as $a) {?>
				<input type="radio" name="roomtype" checked="checked" onclick="Pay()"
                	 value="<?php echo $a->getcode();?>" id="<?php echo $a->getcode();?>"/>
                <label for="<?php echo $a->getcode();?>"><?php echo $a->getname();?></label><br />
			  <?php } ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><div id="erroomtype"></div></td>
		</tr>
	</table><br />
	<table>
		<tr>
			<td><strong>Time in use: </strong></td>
		</tr>
		<tr>
			<td></td>
			<td>Date:</td>
			<td><input type="date" name="date" id="date" size="10" autofocus="autofocus" onchange="Pay()"/><br /><br /></td>
		</tr> 
		<tr>
			<td></td>
			<td>Starting time:</td>
			<td>
            	<select name="startingtime" id="startingtime" onchange="Pay()">
                	<option>chọn</option>
					<?php for ( $i=0; $i<24; $i++){?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select> giờ<br /><br />
            </td>
		</tr>
		<tr>
			<td></td>
			<td>Finishing time:</td>
			<td>
            	<select name="finishingtime" id="finishingtime" onchange="Pay()">
                	<option>chọn</option>
					<?php for ( $i=0; $i<24; $i++){?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select> giờ<br /><br />
            </td>
		</tr>
		<tr>
            <td colspan="3"><div id="errtimeinuse" class="err"></div><br /></td>
		</tr>
		<tr>
			<td colspan="3"><strong>Paying amount: <span id="paying"></span> </strong><br /><br /></td>
		</tr>
		<tr>
			<td align="center" colspan="3">
                    <input type="submit" value="Add to CART" name="book" id="submit" class="pure-button pure-button-primary" onclick="return validate()"/>
                	<input type="reset" value="Clear" id="button" class="pure-button pure-button-active"/><br />
                    <a href="?action=cart#content" style="float:left; font-size:17px">Go to cart</a>
                	<a href="Book.php#content" style="float:right; font-size:17px">Back</a>
			</td>       
		</tr>
	</table>
</fieldset>
</form>
</div> 
</body>
</html>