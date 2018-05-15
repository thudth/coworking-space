<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add for conference room</title>
</head>
<style>
	.err {color:red}
</style>
<script>
function validate()
{
	var conferenceroomtype= document.getElementById('conferenceroomtype').value;
	if(conferenceroomtype==0)
	{
		document.getElementById('errconferenceroomtype').innerHTML="Conference room type invalid";
		document.getElementById('conferenceroomtype').focus();
		return false;
	}
	else document.getElementById('errconferenceroomtype').innerHTML="";
return true;
}
</script>
<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
		<legend><h2>Add conference room</h2></legend>
		<table align="center" width="100%">
			<tr>
				<td>
                    <label for="conferenceroomnumber"><strong>Conference room Number:</strong></label><br />
                    <input type="text" name="conferenceroomnumber" id="conferenceroomnumber" class="pure-input-1" 
                    		value="<?php echo $newCode ?>" readonly="readonly"/><br /><br />
                </td>
			</tr>
			<tr>
				<td>
               		<label><strong>Room type:</strong></label><br />
					<select name="conferenceroomtype" class="pure-input-1" id="conferenceroomtype">
						<option value="0">Something</option>
						<?php  foreach($arrConferenceroomtype as $a){?>
                            <option value="<?php echo $a->getcode(); ?>"><?php echo $a->getname(); ?></option>
                        <?php } ?>
					</select><div id="errconferenceroomtype" class="err"></div><br />
                    </td>
			</tr>
			<tr>
				<td>
                  <label for="note"><strong>Desciption:</strong></label><br />
                  <textarea name="description" id="description" class="pure-input-1" autofocus="autofocus"></textarea>
                </td>
			</tr>
			<tr>
				<td align="center"><br />
					<input type="submit" value="Save" name="save" id="submit" class="pure-button pure-button-primary" onclick="return validate()"/>
					<input type="reset" value="Clear" id="button" class="pure-button pure-button-active"/>
				</td>
			</tr>
		</table>        
        <a href="ConferenceRoom.php" style="float:right; font-size:20px">Back</a>
	</fieldset>
  </form>
</div>
</body>
</html>