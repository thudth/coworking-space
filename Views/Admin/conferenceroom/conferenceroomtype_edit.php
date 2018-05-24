<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit for conference room type</title>
</head>
<style>
	.err {color:red}
</style>
<script>
function validate()
{
	var conferenceroomtype= document.getElementById('conferenceroomtype').value;
	var pph= document.getElementById('pph').value;
	
	if(conferenceroomtype.length==0 || conferenceroomtype.length>20)
	{
		document.getElementById('errconferenceroomtype').innerHTML="Type name invalid<br />Type name must be fewer than 5 letters";
		document.getElementById('conferenceroomtype').focus();
		return false;
	}
	else document.getElementById('errconferenceroomtype').innerHTML="";
	
	if(pph.length==0 || isNaN(pph))
	{
		document.getElementById('errpph').innerHTML="Price is number and not empty";
		document.getElementById('pph').focus();
		return false;
	}
	else document.getElementById('errpph').innerHTML="";
	
}
</script>
<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
		<legend><h2>Edit for conference room type</h2></legend>
		<table align="center" width="100%">
			<tr>
				<td>
                    <label for="conferenceroomcode"><strong>Code:</strong></label><br />
                    <input type="text" name="conferenceroomcode" id="conferenceroomcode" class="pure-input-1" readonly="readonly"
                    	value="<?php echo $conferenceroomtypeDto->getcode(); ?>"/><br /><br />
                </td>
			</tr>
			<tr>
				<td>
                    <label for="conferenceroomtype"><strong>Room type:</strong></label><br />
                    <input type="text" name="conferenceroomtype" id="conferenceroomtype" class="pure-input-1" autofocus="autofocus"
						value="<?php echo $conferenceroomtypeDto->getname(); ?>"/>
                    <div id="errconferenceroomtype" class="err"> </div><br />
                </td>
			</tr>
			<tr>
				<td>
                	<label for="pph"><strong>Price per hour:</strong></label><br />
                    <input type="text" name="pph" id="pph" class="pure-input-3-4" autofocus="autofocus"
						value="<?php echo $conferenceroomtypeDto->getpricePerHour(); ?>"/> &nbsp;&nbsp; <strong>000 vnd</strong>
                    <div id="errpph" class="err"> </div><br />
                </td>
			</tr>
			<tr>
				<td>
                    <label for="note"><strong>Note:</strong></label><br />
                    <textarea name="note" id="note" autofocus="autofocus" class="pure-input-1"><?php echo $conferenceroomtypeDto->getnote(); ?></textarea>
                </td>
			</tr>
			<tr>
				<td  align="center"><br />
                    <button type="submit" name="save" id="submit" class="pure-button pure-button-primary" onclick="return validate()">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <button type="reset" id="button" class="pure-button pure-button-active">
                        <i class="fa fa-undo"></i> Reset
                    </button>
				</td>
			</tr>
		</table>        
        <a href="ConferenceRoomType.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
	</fieldset>
  </form>
</div>
</body>
</html>