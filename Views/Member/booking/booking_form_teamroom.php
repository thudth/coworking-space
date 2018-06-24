<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Get your team a room</title>
</head>	
<style>
	.err {color:red}
</style>
<script language="javascript">
//Tính giá tiền______________________________________________________________________________
function Pay()
{
//Lấy dữ liệu từ form về
	var duration= parseInt(document.getElementById('duration').value);
	var start=new Date(document.getElementById('startdate').value);
//Lấy loại phòng được chọn từ form
	var roomtype= document.getElementsByName('roomtype');
	var roomtypechecked;
	for(var i =0; i<roomtype.length; i++)
		if(roomtype[i].checked === true) roomtypechecked=roomtype[i].value;
		
//Tính và hiển thị ra ngày kết thúc
	var finish=new Date(start.setDate(start.getDate() + duration*30)); //Công thời gian
	var finishDate= finish.getDate()+'/'+(finish.getMonth()+1)+'/'+finish.getFullYear();//Chuyển đổi sang dạng hiển thị cho thích hợp
	if(!isNaN(finish))
		document.getElementById('finishDate').innerHTML=finishDate;
		
//Tính và hiển thị ra giá
	//Lấy được mảng mã và giá từ DB
	var price = new Array();
	var typecode= new Array();
	<?php foreach(bookDao::instance()->getAllTeamRoomPrice() as $abc) { ?>
		typecode.push('<?php echo $abc->getcode();?>');
		price.push('<?php echo $abc->getpricePerMonth();?>');
	<?php }?>
	//So sánh để lấy ra giá của loại được chọn
	var pay;
	for(var j =0; j<typecode.length; j++)
		if(typecode[j]==roomtypechecked)
			pay=price[j];
	
	//Giảm giá ưu đãi
	if(duration<3)
		Sum= pay*duration;
	else if (duration<6)
		Sum= pay*duration - pay*duration*0.1;
	else if (duration<12)
		Sum= pay*duration - pay*duration*0.15;
	else 
		Sum= pay*duration - pay*duration*0.2;
	//Tính và hiển thị giá của đơn hàng
	if(!isNaN(duration))
		document.getElementById('paying').innerHTML=Sum+' 000 vnd';
}
//Validate________________________________________________________________________________________
function validate()
{
	
	var duration=document.getElementById('duration').value;
	var start=document.getElementById('startdate').value;
    var dateNow= new Date();
    var startDate= new Date(start);
	if(start.length==0 || duration.length==0 || isNaN(duration) || dateNow>startDate)
	{
		document.getElementById('errtimeinuse').innerHTML="*Invalid start date or duration";
		document.getElementById('duration').focus();
		return false;
	}
	return true;
}
</script>

<body>
<div style="width:500px" align="left">
<form method="post" class="pure-form">
	<fieldset>
		<legend><h2 align="center">Get your team a room</h2></legend>
	<table>
		<tr>
			<td><strong>Room type:</strong></td>
		</tr>
		<tr>
			<td></td>
			<td width="300">
			  <?php foreach($teamroomtypes as $a) {?>
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
			<td>Duration:</td>
			<td><input type="text" name="duration" id="duration" size="12" autofocus="autofocus" onchange="Pay()"/> * 30days<br /><br /></td>
		</tr> 
		<tr>
			<td></td>
			<td>Starting date:</td>
			<td><input type="date" name="startdate" id="startdate" onchange="Pay()"/><br /><br /></td>
		</tr> 
		<tr>
			<td></td>
			<td width="120px">Finishing date: </td>
			<td> <span id="finishDate"></span></td>
		</tr>
        <tr>
            <td colspan="3"><div id="errtimeinuse" class="err"></div><br /></td>
        </tr>
		<tr>
			<td colspan="3"><strong>Paying amount: <span id="paying"></span></strong><br /><br /></td>
		</tr>
		<tr>
			<td align="center" colspan="3">
                <button type="submit" name="book" id="submit" class="pure-button pure-button-primary" onclick="return validate()">
                    <i class="fa fa-cart-plus"></i> Add to Cart
                </button>
                <button type="reset" id="button" class="pure-button pure-button-active">
                    <i class="fa fa-undo"></i> Clear
                </button>
                <br>
                <a href="?action=cart#content" style="float:left; font-size:17px"><i class="fa fa-shopping-cart"></i> Go to cart</a>
                <a href="Book.php#content" style="float:right; font-size:17px"><i class="fa fa-arrow-left"></i> Back</a>
			</td>       
		</tr>
	</table>
</fieldset>
</form>
</div>
<div style="height:180px; width:300px; background:#D7D7FF; position:absolute; top:700px; right:250px; padding:20px">
<h3>Discount Sales Promotions</h3>
<p>10% off for reservation over 3 months</p>
<p>15% off for reservation over 6 months</p>
<p>20% off for reservation over a year</p>
</div>
</body>
</html>