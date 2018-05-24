<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<script type="text/javascript" src="../../../Calendar/Calendar.js"></script>
<link rel="stylesheet" type="text/css" href="../../../Calendar/Calendar.css"/>
<body>
<div style="width:400px"> 
  <form method="post" class="pure-form">
	<fieldset>
    <legend><h3>Add Administrator</h3></legend>
    <table align="center" width="100%">
        <tr>
            <td>
                <label for="fname"><strong>First name:</strong></label><br />
                <input type="text" name="fname" id="fname" class="pure-input-1" autofocus="autofocus"/>
                <div id="errfname"> </div><br />
            </td>
        </tr> 
        <tr>
            <td>
                <label for="lname"><strong>Last name:</strong></label><br />
                <input type="text" name="lname" id="lname" class="pure-input-1" />
                <div id="errlname"> </div><br />
            </td>
        </tr>
        <tr>
            <td>
                <label for="uname"><strong>USERNAME</strong></label><br />
                <input type="text" name="uname" id="uname" class="pure-input-1" />
                <div id="erruname"> </div><br />
            </td>
        </tr>
         <tr>
            <td>
                <label for="pass"><strong>PASSWORD:</strong></label><br />
                <input type="text" name="pass" id="pass" class="pure-input-1" value="12345" readonly="readonly"/>
                <div id="errpass"></div><br />
            </td>
        </tr>
        <tr>
            <td>
                <strong>Gender:</strong>
                <input type="radio" name="gender" value="1" id="male" checked="checked" style="margin-left:50px"/>
                	<label for="male" style="margin-right: 50px">Male</label>
                <input type="radio" name="gender" value="0" id="female"/><label for="female">Female</label>
                <div id="errgender"></div><br />
             </td>
        </tr>
        </tr>
        <tr>
            <td>
                <label for="txtDate"><strong>Date of birth:</strong></label>
                <input type="date" name="dob" id="dob" style="width:290px"/>
                <div id="errdob"></div><br />
            </td>
        </tr>
        <tr>
            <td>
                <label for="phone"><strong>Phone number:</strong></label><br />
                <input type="text" name="phone" id="phone" class="pure-input-1" />
                <div id="errphone"></div><br />
            </td>
        </tr>
        <tr>
            <td>
                <label for="email"><strong>Email:</strong></label><br />
                <input type="text" name="email" id="email" class="pure-input-1"/>
                <div id="erremail"></div><br />
            </td>
        </tr>
        <tr>	
            <td align="center">
                <button type="submit" name="save" id="submit" class="pure-button pure-button-primary">
                    <i class="fa fa-save"></i> Add
                </button>
                <button type="reset" id="button" class="pure-button pure-button-active">
                    <i class="fa fa-undo"></i> Clear
                </button>
            </td>
        </tr>
	</table>
    <a href="UserManaging.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
  </fieldset>
</form>
</div>
</body>
</html>