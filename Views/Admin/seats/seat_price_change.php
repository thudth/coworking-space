<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit seats</title>
</head>
<style>
	.err {color:red}
</style>
<script>
function validate()
{
	var ppd= document.getElementById('ppd').value;
	
	if(ppd.length==0 || isNaN(ppd))
	{
		document.getElementById('errppd').innerHTML="Price is number and not empty";
		document.getElementById('ppd').focus();
		return false;
	}
	else document.getElementById('errppd').innerHTML="";
}
</script>
<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
		<legend><h2>Edit Seat Price</h2></legend>
		<table align="center" width="100%">
            <tr>
                <td>
                    <label for="ppd"><strong>Price per day:</strong></label><br />
                    <input type="text" name="ppd" id="ppd" class="pure-input-3-4"
						value="<?php echo $oldPrice ?>"/> &nbsp;&nbsp; <strong>000 vnd</strong>
                    <div id="errppd" class="err"> </div><br />
                </td>
            </tr>
            <tr>
                <td align="center"><br />
                    <button type="submit" name="Save" id="submit" class="pure-button pure-button-primary" onclick="return validate()">
                        <i class="fa fa-save"></i> Save
                    </button>
					<button type="reset" id="button" class="pure-button pure-button-active">
                        <i class="fa fa-undo"></i> Reset
                    </button>
				</td>
			</tr>
		</table>
        <a href="Seats.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
    </fieldset>
  </form>
</div>
</body>
</html>