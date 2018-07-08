<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script language="javascript">
	function Find()
	{
		document.getElementById("search").submit();
	}
</script>
<body>
<h2>Conference Room Schedule</h2>
<form method="post" class="pure-form" id="search">
	<strong>Date:</strong>
    <?php
    $date = date('Y-m-d');
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    } ?>
    <input type="date" name="date" value="<?php echo $date; ?>" onchange="Find()"/>
	<strong>Hour:</strong>
    <select name="hour" id="hour" onchange="Find()">
        <option>chọn</option>
        <?php for ( $i=0; $i<24; $i++){?>
            <option value="<?php echo $i; ?>" 
				<?php if(isset($_POST['hour'])&& $_POST['hour']==$i) echo "selected='selected'";
					 else if(!isset($_POST['hour']) && date('H')==$i) echo "selected='selected'"?>>
			<?php echo $i; ?></option>
        <?php } ?>
    </select><br />
</form><br />
<table border="1" cellspacing="0" class="pure-table">
<thead>
  <tr>
    <th scope="col">In Use</th>
    <th scope="col">Empty</th>
    <th scope="col">
      Unallocated
      <br><span class="note">(Room type: There are(is) ... unallocated position(s))</span>
    </th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>
    	<?php
			foreach($confRoomUse as $a) echo $a."<br>";
		?>
    </td>
    <td>
    	<?php
			foreach($confRoomEmpty as $a) echo $a."<br>";
		?>
    </td>
    <td>
    	<?php
			foreach($ConfRoomNotYetAllocate as $a) echo $a."<br>";
		?>
    </td>
  </tr>
</tbody>
</table><br />
    <div style="width:700px">
        <a href="?action=teamroom" style="float:right; font-size:20px">Team Room Schedule</a>
        <a href="?action=seat" style="float:left; font-size:20px">Seat Schedule</a>
    </div>
</body>
</html>