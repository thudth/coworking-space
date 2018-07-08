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
<h2>Team Room Schedule</h2>
<form method="post" class="pure-form" id="search">
	<strong>Date:</strong>
    <?php
    $date = date('Y-m-d');
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    } ?>
    <input type="date" name="date" value="<?php echo $date;?>" onchange="Find()"/>
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
			foreach($teamroomUse as $a) echo $a."<br>";
		?>
    </td>
    <td>
    	<?php
			foreach($teamroomEmpty as $a) echo $a."<br>";
		?>
    </td>
    <td>
    	<?php
			foreach($TeamRoomNotYetAllocate as $a) echo $a."<br>";
		?>
    </td>
  </tr>
</tbody>
</table><br />
    <div style="width:700px">
        <a href="?action=seat" style="float:right; font-size:20px">Seat Schedule</a>
        <a href="?action=confroom" style="float:left; font-size:20px">Conference Room Schedule</a>
    </div>
</body>
</html>