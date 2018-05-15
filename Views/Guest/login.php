<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log in</title>
</head>
<style>
	.err{color:red}
</style>
<script>
function validate()
{
//Lấy thông tin từ form về ______________________________________________________________________________________________________________
	var uname =  document.getElementById("uname").value;
	var pass = document.getElementById("pass").value;
	var reg= /^[A-Za-z0-9]+$/;
//Validate Username_______________________________________________________________________________________________________________________
	if(uname.length<=7 || uname.length>50 || !reg.test(uname))
	{
		document.getElementById("erruname").innerHTML=
			"Enter from 8 to 50 characters<br />Username is characters and number (No space or special characters)";
		document.getElementById("uname").focus();
		return false;	
	}
	else 
	{
		document.getElementById("erruname").innerHTML="";
	}
//Validate Password _______________________________________________________________________________________________________________________
	if(pass.length<=5 || pass.length>50 || !reg.test(pass))
	{
		document.getElementById("errpass").innerHTML=
			"Enter from 6 to 50 characters<br />Password is characters and number (No space or special characters)";
		document.getElementById("pass").focus();
		return false;	
	}
	else 
	{
		document.getElementById("errpass").innerHTML="";
	}
	return true;
}
</script>
<body>
<div style="width:500px"> 
    <form method="post" class="pure-form">
      <fieldset>
      <legend><h2 align="center">Login</h2></legend>
      <?php 
		if(isset($_GET['errlogin']))
			echo "<h4 style='color:#F00'>*Username or password is not correct</h4>";
		if(isset($_GET['eraccount']))
			echo "<h4 style='color:#F00'>*This account cannot access</h4>";
	  ?>
        <table align="center" width="100%">
            <tr>
              <td>
                <label for="uname">Username:</label><br />
                <input type="text" name="uname" id="uname" autofocus="autofocus" class="pure-input-1" />
                <div id="erruname" class="err"></div><br />
              </td>
            </tr>
            <tr>
              <td>
                <label for="pass">Password:</label><br />
                <input type="password" name="pass" id="pass" class="pure-input-1"/>
                <div id="errpass" class="err"></div><br />
              </td>
            </tr>
            <tr>
                <td align="center">
                <button type="submit" class="pure-button pure-button-primary" name="login" onclick="return validate()">Sign in</button><br /><br />
                </td>
            </tr>
            <tr>
              	<td>        
                    <a href="?action=forgotpass" style="float:left; font-size:18px">Forgot your password?</a>
                    <a href="?action=register" style="float:right; font-size:18px">Register</a><br />
				</td>
            </tr>
        </table>
    </fieldset>
    </form>
</div>
</body>
</html>