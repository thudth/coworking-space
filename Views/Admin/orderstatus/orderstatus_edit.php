<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Order Status</title>
</head>

<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
	<legend><h2>Edit Order Status</h2></legend>
	<table align="center" width="100%">
	  <tr>
      	<td>
            <label for="code"><strong>Code</strong></label><br />
            <input type="text" name="code" id="code" class="pure-input-1" readonly="readonly" 
            	value="<?php echo $orderstatusDto->getcode();?>" />
            <div id="errcode"></div><br />
        </td>
	  </tr>
	  <tr>
		<td>
            <label for="status"><strong>Stutus</strong></label><br />
            <input type="text" name="status" id="status" class="pure-input-1" autofocus="autofocus" 
            	value="<?php echo $orderstatusDto->getstatus();?>"/>
            <div id="errstatus"></div><br />
        </td>
	  </tr>
	  <tr>
		<td align="center">
            <input type="submit" name="save" value="Save" id="submit" class="pure-button pure-button-primary"/>
            <input type="reset" value="Reset" id="button" class="pure-button pure-button-active"/>
		</td>
	  </tr>
	</table>
    <a href="Orderstate.php" style="float:right; font-size:20px">Back</a>
  </fieldset>
</form>
</div>
</body>
</html>
