<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Personal Information</title>
</head>
<style>
	.err{color:red}
</style>
<script>
function validate()
{
//Lấy thông tin từ form về ______________________________________________________________________________________________________________
	var fname =  document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var dob = document.getElementById("dob").value;
	var phone = document.getElementById("phone").value;
	var email = document.getElementById("email").value;
	
	var YearDob= new Date(dob);
	
	var reg= /^[A-Za-z0-9]+$/;
	var regMail =/^[A-Za-z]+[a-zA-Z0-9._]+@[A-Za-z0-9]+\.?[A-Za-z]*\.[a-zA-Z]{2,3}$/;
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
	//else 
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
	
	return true;
}
</script>
<body>
<div style="width:500px">
<form method="post" class="pure-form">
  <fieldset>
    <legend><h2>Edit Personal Information</h2></legend>
    <table align="center" width="100%">
      <tr>
        <td>
          <label for="fname"><strong>First name:</strong></label><br />
          <input type="text" name="fname" id="fname" class="pure-input-1" autofocus="autofocus" 
		  	value="<?php echo $arrinfor->getfirstName();?>"/>
          <div id="errfname" class="err"> </div><br />
        </td>
      </tr> 
      <tr>
        <td>
          <label for="lname"><strong>Last name:</strong></label><br />
          <input type="text" name="lname" id="lname" class="pure-input-1"
		  	value="<?php echo $arrinfor->getlastName();?>"/>
          <div id="errlname" class="err"> </div><br />
        </td>
      </tr>
      <tr>
        <td>
          <strong>Gender:</strong>
          <input type="radio" name="gender" value="1" id="male" checked="checked" style="margin-left:50px"/>
          		<label for="male" style="margin-right: 50px">Male</label>
          <input type="radio" name="gender" value="0" id="female"
		  	<?php if($arrinfor->getgender()=='Female') echo "checked='checked'" ?>/><label for="female">Female</label>
          <div id="errgender"></div><br />
        </td>
      </tr>
      <tr>
        <td>
          <label for="dob"><strong>Date of birth:</strong></label>
		  <input type="date" name="dob" id="dob" style="width:400px"
		  	value="<?php echo $arrinfor->getdateOfBirth();?>"/>
          <div id="errdob" class="err"></div><br />
        </td>
      </tr>
      <tr>
        <td>
          <label for="phone"><strong>Phone number:</strong></label><br />
          <input type="text" name="phone" id="phone" class="pure-input-1"
		  	value="<?php echo $arrinfor->getphone();?>"/>
          <div id="errphone" class="err"><?php if(isset($_GET['phoneUsed'])) echo "*Phone number was used";?></div><br />
        </td>
      </tr>
      <tr>
        <td>
          <label for="email"><strong>Email:</strong></label><br />
          <input type="text" name="email" id="email" class="pure-input-1"
		  	value="<?php echo $arrinfor->getemail();?>"/>
          <div id="erremail" class="err"><?php if(isset($_GET['mailUsed'])) echo "*Email was used";?></div><br />
        </td>
      </tr>
      <tr>	
        <td align="center">
          <input type="submit" value="Save" name="save" id="submit" class="pure-button pure-button-primary" onclick="return validate()"/>
          <input type="reset" value="Reset" id="button" class="pure-button pure-button-active"/><br />
        </td>
      </tr>  
	</table>
	<a href="?action=editPass"  style="float:right; font-size:20px">Edit Password</a>
  </fieldset>
</form>
</div>        
</body>
</html>