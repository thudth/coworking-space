<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
        <legend><h2>Edit Role</h2></legend>
        <table align="center" width="100%">
            <tr>
                <td>
                    <label for="code"><strong>Code:</strong></label><br />
                    <input type="text" name="code" id="code"  class="pure-input-1" readonly="readonly"
						value="<?php echo $rolesDto->getcode(); ?>"/>
                    <div id="errcode"></div><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="role"><strong>Role:</strong></label><br />
                    <input type="text" name="role" id="role"  class="pure-input-1" autofocus="autofocus"
						value="<?php echo $rolesDto->getrole(); ?>"/>
                    <div id="errrole"> </div><br />
                </td>
            </tr>
            <tr>
                <td align="center">
                    <button type="submit" name="Save" id="submit" class="pure-button pure-button-primary">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <button type="reset" id="button" class="pure-button pure-button-active">
                        <i class="fa fa-undo"></i> Reset
                    </button>
                </td>
            </tr>
        </table>
        <a href="Roles.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
    </fieldset>
  </form>
</div>
</body>
</html>