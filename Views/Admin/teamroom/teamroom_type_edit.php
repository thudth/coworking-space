<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit for team room type</title>
</head>
<style>
	.err {color:red}
</style>
<script>
function validate()
{
	var teamroomtype= document.getElementById('teamroomtype').value;
	var ppm= document.getElementById('ppm').value;
	
	if(teamroomtype.length==0 || teamroomtype.length>20)
	{
		document.getElementById('errteamroomtype').innerHTML="Type name invalid<br />Type name must be fewer than 5 letters";
		document.getElementById('teamroomtype').focus();
		return false;
	}
	else document.getElementById('errteamroomtype').innerHTML="";
	
	if(ppm.length==0 || isNaN(ppm))
	{
		document.getElementById('errppm').innerHTML="Price is number and not empty";
		document.getElementById('ppm').focus();
		return false;
	}
	else document.getElementById('errppm').innerHTML="";
	
}
</script>
<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
		<legend><h3>Edit for team room type</h3></legend>
		<table align="center" width="100%">
			<tr>
				<td>
                    <label for="teamroomcode"><strong>Code:</strong></label><br />
                    <input type="text" name="teamroomcode" id="teamroomcode" class="pure-input-1" readonly="readonly"
                    	value="<?php echo $teamroomtypesDto->getcode(); ?>"/><br /><br />
                </td>
			</tr>
			<tr>
				<td>
                    <label for="teamroomtype"><strong>Room type:</strong></label><br />
                    <input type="text" name="teamroomtype" id="teamroomtype" class="pure-input-1" autofocus="autofocus"
                    	value="<?php echo $teamroomtypesDto->getname(); ?>"/>
                    <div id="errteamroomtype" class="err"> </div><br />
                </td>
			</tr>
			 <tr>
				<td>
                    <label for="ppm"><strong>Price per month:</strong></label><br />
                    <input type="text" name="ppm" id="ppm" class="pure-input-3-4"
                    	value="<?php echo $teamroomtypesDto->getpricePerMonth(); ?>"/> &nbsp;&nbsp; <strong>000 vnd</strong>
                    <div id="errppm" class="err"> </div><br />
                </td>
			</tr>
			<tr>
				<td>
                    <label for="note"><strong>Note:</strong></label><br />
                    <textarea name="note" id="note" class="pure-input-1"><?php echo $teamroomtypesDto->getnote(); ?></textarea>
                </td>
			</tr>
			<tr>
				<td align="center"><br />
					<input type="submit" value="Save" name="save" id="submit" class="pure-button pure-button-primary" onclick="return validate()"/>
					<input type="reset" value="Clear" id="button" class="pure-button pure-button-active"/><br />
				</td>
			</tr>
		</table>
        <a href="TeamRoomTypes.php" style="float:right; font-size:20px">Back</a>
	</fieldset>
  </form>
</div>
</body>
</html>