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
	var seatnumber= document.getElementById('seatnumber').value;
	
	if(seatnumber.length==0 || isNaN(seatnumber) || seatnumber.length>5)
	{
		document.getElementById('errseatnumber').innerHTML="Seat Number is number and not empty<br />Seat number must be fewer than 5 letters";
		document.getElementById('seatnumber').focus();
		return false;
	}
	else document.getElementById('errseatnumber').innerHTML="";
}
</script>
<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
		<legend><h2>Edit seat</h2></legend>
		<table align="center" width="100%">
            <tr>
                <td>
                    <label for="code"><strong>Code:</strong></label><br />
                    <input type="text" name="code" id="code" class="pure-input-1" readonly="readonly"
						value="<?php echo $seatsDto->getcode(); ?>"/><br /><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="seatnumber"><strong>Seat Number:</strong></label><br />
                    <input type="text" name="seatnumber" id="seatnumber" class="pure-input-1" autofocus="autofocus"
						value="<?php echo $seatsDto->getseatnumber(); ?>"/>
                    <div id="errseatnumber" class="err"> </div><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="note"><strong>Note:</strong></label><br />
                    <textarea name="note" id="note" autofocus="autofocus" class="pure-input-1"><?php echo $seatsDto->getnote(); ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <br>
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