<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Your Revation</title>
</head>

<body>
<div style="width:500px">
<form method="post">
	<fieldset>
		<legend><h3>Change Your Revation</h3></legend>
		Customer Name: <strong>...vd:Thu ngu</strong><br />
		Code: <input type="text" name="code" id="code" size="10" readonly="readonly">
		<span style="float:right">Booking Date: ....</span><br /><br />
	<table>
		<tr>
			<td><strong>Room type:</strong></td>
		</tr>
		<tr>
			<td></td>
			<td width="300">
				<input type="radio" name="roomtype"  checked="checked"/>6 (people)
				<input type="radio" name="roomtype" />...
			</td>
		</tr>
		<tr>
			<td></td>
			<td><div id="erroomtype"></div></td>
		</tr>
	</table><br />

	<table>
		<tr>
			<td><strong>Time in use: </strong></td>
		</tr>
		<tr>
			<td></td>
			<td>Duration:</td>
			<td><input type="text" name="duration" id="duration" size="12" autofocus="autofocus"/> month(s)</td>
		</tr> 
		<tr>
			<td></td>
			<td>Starting date:</td>
			<td><input type="date" name="startdate" id="startdate"/></td>
		</tr> 
		<tr>
			<td></td>
			<td>Finishing date:</td>
			<td>...</td>
		</tr>
			<tr>
				<td></td>
                <td colspan="2"><div id="errtimeinuse"></div><br /></td>
			</tr>
		<tr>
			<td colspan="3"><strong>Paying amount: ..... </strong><br /><br /></td>
		</tr>
		<tr>
			<td align="center" colspan="3">
				<input type="submit" value="Book" id="submit"/>
                <input type="reset" value="Reset" id="button"/><br />
            </td>       
        </tr>
</table>
</fieldset>
</form>
</div>
</body>
</html>