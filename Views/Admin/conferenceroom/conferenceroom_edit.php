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
    	<legend><h2 align="center">Edit for conference room</h2></legend>
        <table align="center" width="100%">
			<tr>
				<td>
                    <label for="conferenceroomnumber"><strong>Conference room Number:</strong></label><br />
                    <input type="text" name="conferenceroomnumber" id="conferenceroomnumber" class="pure-input-1" autofocus="autofocus" readonly="readonly"
                    	value="<?php echo $conferenceroomDto->getroomNumber();?>"/><br /><br />
                </td>
			</tr>
			<tr>
				<td>
               		<label><strong>Room type:</strong></label><br />
					<select name="conferenceroomtype" class="pure-input-1" id="conferenceroomtype">
						<option value="0">Something</option>
						<?php  foreach($arrConferenceroomtype as $a){?>
                            <option value="<?php echo $a->getcode(); ?>"
                             <?php if($conferenceroomDto->getroomType()==$a->getcode()) echo 'selected';?>>
							 <?php echo $a->getname(); 
							?></option>
                        <?php } ?>
					</select><div id="errconferenceroomtype" class="err"></div><br />
                    </td>
			</tr>
			<tr>
				<td>
                  <label for="note"><strong>Desciption:</strong></label><br />
                  <textarea name="description" id="description" autofocus="autofocus" class="pure-input-1"><?php echo $conferenceroomDto->getdescription();?></textarea>
                </td>
			</tr>
			<tr>
				<td align="center"><br />
                    <button type="submit" name="save" id="submit" class="pure-button pure-button-primary" onclick="return validate()">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <button type="reset" id="button" class="pure-button pure-button-active">
                        <i class="fa fa-undo"></i> Reset
                    </button>
				</td>
			</tr>
		</table>
        <a href="ConferenceRoom.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
	</fieldset>
  </form>
</div>
</body>
</html>