<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add for team room</title>
</head>
<style>
	.err {color:red}
</style>
<script>
function validate()
{
	var teamroomtype= document.getElementById('teamroomtype').value;
	if(teamroomtype==0)
	{
		document.getElementById('errteamroomtype').innerHTML="Team room type invalid";
		document.getElementById('teamroomtype').focus();
		return false;
	}
	else document.getElementById('errteamroomtype').innerHTML="";
return true;
}
</script>
<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
		<legend><h2>Add team room</h2></legend>
		<table align="center" width="100%">
			<tr>
				<td>
                    <label for="teamroomnumber"><strong>Team room Number:</strong></label><br />
                    <input type="text" name="teamroomnumber" id="teamroomnumber" class="pure-input-1" 
                    	value="<?php echo $newCode ?>" readonly="readonly"/><br /><br />
                </td>
			</tr>
			<tr>
				<td>
                    <label for="teamroomtype"><strong>Room type:</strong></label><br />
                        <select name="teamroomtype" class="pure-input-1" id="teamroomtype">
                            <option value="0">Something</option>
                            <?php foreach ($arrteamroomtype as $a){?>
                            	<option value="<?php echo $a->getcode(); ?>"><?php echo $a->getname(); ?></option>
                            <?php } ?>
                        </select>
                    <div id="errteamroomtype" class="err"> </div><br />
                </td>
			</tr>
			<tr>
				<td>
                    <label for="note"><strong>Description:</strong></label><br />
                    <textarea name="Description" id="Description" autofocus="autofocus" class="pure-input-1"></textarea>
			</tr>
			<tr>
				<td align="center"><br />
                    <button type="submit" name="save" id="submit" class="pure-button pure-button-primary" onclick="return validate()">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <button type="reset" id="button" class="pure-button pure-button-active">
                        <i class="fa fa-undo"></i> Clear
                    </button>
				</td>
			</tr>
		</table>
        <a href="TeamRooms.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
	</fieldset>
  </form>
</div>
</body>
</html>