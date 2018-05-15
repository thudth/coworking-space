<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reserve your seat</title>
</head>
<style>
	.err {color:red}
</style>
<script language="javascript">
function Pay()
{
	var start= new Date( document.getElementById('startdate').value);
	var finish= new Date( document.getElementById('finishdate').value);
	var price= <?php echo bookDao::instance()->getSeatPrice(); ?>;
	var diffDays = Math.round(Math.abs((start.getTime() - finish.getTime())/(24*60*60*1000)))+1;
	//Giảm giá ưu đãi
	if(diffDays<7)
		pay= diffDays*price;
	else if (diffDays<30)
		pay= diffDays*price- diffDays*price*0.05;
	else if (diffDays<90)
		pay= diffDays*price- diffDays*price*0.1;
	else 
		pay= diffDays*price- diffDays*price*0.2;
	if(!isNaN(diffDays)) document.getElementById('pay').innerHTML= pay +' 000 vnd';
}
function validate()
{
	var start=document.getElementById('startdate').value;
	var finish=document.getElementById('finishdate').value;
	var dateNow= new Date();
	var startDate= new Date(start);
	var finishDate= new Date(finish);
	if(start.length==0 || finish.length==0 || dateNow>startDate || startDate>finishDate)
	{
		document.getElementById('errtimeinuse').innerHTML="*Invalid start date or finish date";
		document.getElementById('startdate').focus();
		return false;
	}
	return true;
}
</script>
<body>
	
<div style="width:500px" align="left">
	<form method="post" class="pure-form">
	<fieldset>
		<legend><h2 align="center">Reserve your seat</h2></legend>
		<table>
			<tr>
				<td><strong>Time in use: </strong></td>
			</tr> 
			<tr>
				<td></td>
				<td>Starting date:</td>
				<td><input type="date" name="startdate" id="startdate" autofocus="autofocus" onchange="Pay()"/><br /><br /></td>
			</tr> 
			<tr>
				<td></td>
				<td>Finishing date:</td>
				<td><input type="date" name="finishdate" id="finishdate" onchange="Pay()"/><br /><br /></td>
			</tr>
			<tr>
                <td colspan="3"><div id="errtimeinuse" class="err"></div><br /></td>
			</tr>
			<tr>
				<td colspan="3"><strong>Paying amount: <span id="pay"></span></strong><br /><br /></td>
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
<div style="height:180px; width:300px; background:#D7D7FF; position:absolute; top:700px; right:250px; padding:20px">
<h3>Discount Sales Promotions</h3>
<p>5% off for reservation over a week</p>
<p>10% off for reservation over a month</p>
<p>20% off for reservation over 3 months</p>
</div>
</body>
</html>