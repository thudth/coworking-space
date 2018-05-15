<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
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
	var cpass = document.getElementById("cpass").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var dob = document.getElementById("dob").value;
	
	var YearDob= new Date(dob);
	
	var reg= /^[A-Za-z0-9]+$/;
	var regMail =/^[A-Za-z]+[a-zA-Z0-9._]+@[A-Za-z0-9]+\.?[A-Za-z]*\.[a-zA-Z]{2,3}$/;
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
	if(pass.length<=5 || pass.length>30 || !reg.test(pass) || cpass.length<=5 || cpass.length>30 || !reg.test(cpass))
	{
		document.getElementById("errpass").innerHTML=
			"Enter from 6 to 30 characters<br />Password is characters and number (No space or special characters)";
		if(pass.length<=5 || pass.length>30 || !reg.test(pass))
		{
			document.getElementById("pass").focus();
			return false;
		}
		if(cpass.length<=5 || cpass.length>30 || !reg.test(cpass))
		{
			document.getElementById("cpass").focus();
			return false;
		}
	}
	if(pass!=cpass)
	{
		document.getElementById("errpass").innerHTML="Confirm password does not match new password";
		document.getElementById("cpass").focus();
		return false;	
	}
	else 
	{
		document.getElementById("errpass").innerHTML="";
	}
//Validate Email _______________________________________________________________________________________________________________________
	if(email.length<=10 || email.length>50 || !regMail.test(email))
	{
		document.getElementById("erremail").innerHTML="Invalid email";
		document.getElementById("email").focus();
		return false;	
	}
	else 
	{
		document.getElementById("erremail").innerHTML="";
	}
//Validate Phone _______________________________________________________________________________________________________________________
	if(isNaN(phone) || phone.length<10 || phone.length>11)
	{
		document.getElementById("errphone").innerHTML="Invalid phone number";
		document.getElementById("phone").focus();
		return false;	
	}
	else 
	{
		document.getElementById("errphone").innerHTML="";
	}
//Validate First Name _______________________________________________________________________________________________________________________
	if(fname.length<5 || fname.length>20)
	{
		document.getElementById("errfname").innerHTML="First name must be fewer than 20 letters and more than 5 letters";
		document.getElementById("fname").focus();
		return false;
	}
	else 
	{
		document.getElementById("errfname").innerHTML="";
	}
//Validate Last Name _______________________________________________________________________________________________________________________
	if(lname.length>20)
	{
		document.getElementById("errlname").innerHTML="Last name must be fewer than 20 letters";
		document.getElementById("lname").focus();
		return false;
	}
	else 
	{
		document.getElementById("errlname").innerHTML="";
	}
//Validate Date of birth _______________________________________________________________________________________________________________________
	if(dob.length==0)
	{
		document.getElementById("errdob").innerHTML="Fill in your date of birth";
		document.getElementById("dob").focus();
		return false;	
	}
	if(YearDob.getFullYear()>=2000)
	{
		document.getElementById("errdob").innerHTML="Are you enough 18 years old?";
		document.getElementById("dob").focus();
		return false;	
	}
	else 
	{
		document.getElementById("errdob").innerHTML="";
	}
	return true;
}
</script>
<body>
<div style="width:500px">
<form method="post" class="pure-form" id="register">
<fieldset>
    <legend><h2>Fill out information</h2></legend>
    <table align="center" width="100%">
        <tr>
            <td>
                <label for="uname">USERNAME</label><br />
                <input type="text" name="uname" id="uname" size="30" class="pure-input-1"
                	placeholder="Username is characters and numbers (No special characters)" autofocus="autofocus" onchange="thu()" />
                <div id="erruname" class="err"><?php if(isset($_GET['userUsed'])) echo "*Username was used";?> </div><br />
            </td>
        </tr>
         <tr>
            <td>
                <label for="pass">PASSWORD:</label><br />
                <input type="password" name="pass" id="pass" size="30" class="pure-input-1"
                	placeholder="Password is character and numbers"/>
                <div id="errpass" class="err"></div><br />
            </td>
        </tr>
        <tr>
            <td>
                <label for="cpass">CONFIRM PASSWORD:</label><br />
                <input type="password" name="cpass" id="cpass" size="30" class="pure-input-1" /><br /><br />
            </td>
        </tr>        
        <tr>
            <td>
                <label for="email">Email:</label><br />
                <input type="text" name="email" id="email" size="30" class="pure-input-1"
                	placeholder="Điền đầy đủ tên miền. Vd:@gmail.com"/>
                <div id="erremail" class="err"><?php if(isset($_GET['mailUsed'])) echo "*Email was used";?></div><br />
            </td>
        </tr>
        <tr>
            <td>
                <label for="phone">Phone number:</label><br />
                <input type="text" name="phone" id="phone" size="30" class="pure-input-1"/>
                <div id="errphone" class="err"><?php if(isset($_GET['phoneUsed'])) echo "*Phone number was used";?></div><br />
            </td>
        </tr>
        <tr>
            <td>
                <label for="fname">First name:</label><br />
                <input type="text" name="fname" id="fname" class="pure-input-1"/>
                <div id="errfname" class="err"> </div><br />
            </td>
        </tr> 
        <tr>
            <td>
                <label for="lname">Last name:</label><br />
                <input type="text" name="lname" id="lname" size="30" class="pure-input-1"/>
                <div id="errlname" class="err"> </div><br />
            </td>
        </tr>
        <tr>
            <td>
                Gender:
                <input type="radio" name="gender" value="1" id="male" checked="checked" style="margin-left:50px"/>
                	<label for="male" style="margin-right: 50px">Male </label>
                <input type="radio" name="gender" value="0" id="female"/><label for="female">Female</label>
                <div id="errgender" class="err"></div><br />
             </td>
        </tr>
        </tr>
        <tr>
            <td>
                <label for="dob">Date of birth:</label>
                <input type="date" name="dob" id="dob" style="width:400px" placeholder="dd/mm/yyyy"/>
                <div id="errdob" class="err"></div><br />
            </td>
        </tr>
        <tr>	
            <td align="center">
                <input type="submit" value="REGISTER" name="regis" id="submit" class="pure-button pure-button-primary" onclick="return validate()"/>
                <input type="reset" value="Clear" id="button" class="pure-button pure-button-active"/>
            </td>
        </tr>
	</table>
    <a href="?action=login" style="float:right; font-size:20px">Login</a>
</fieldset
></form>
</div>
</body>
</html>