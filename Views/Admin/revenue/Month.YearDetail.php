<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
tbody tr:hover
{
	background:#CCC;
}
table
{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:15px;
}
</style>

<body>
<h2>Revenue Detail <?php echo $_GET['y']?></h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
<thead>
  <tr>
    <th scope="col">Month</th>
    <th scope="col">Revenue by Seats</th>
    <th scope="col">Revenue by Team Room</th>
    <th scope="col">Revenue by Conference</th>
    <th scope="col">Total</th>
  </tr>
</thead>
<tbody>
  <?php 
	$count= 0;
	for ($i=0; $i<count($revenueBySeats); $i++) {
	$count+=$total[$i]
  ?>
  <tr>
    <td><?php echo $month[$i]; ?></td>
    <td><?php echo $revenueBySeats[$i]; ?></td>
    <td><?php echo $revenueByTeamRoom[$i]; ?></td>
    <td><?php echo $revenueByConfRoom[$i]; ?></td>
    <td><?php echo $total[$i]; ?></td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="5" align="right"><strong>Total: <?php echo $count ?></strong></td>
  </tr>
</tbody>
</table><br />
    <a href="Revenue.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
    <a href="?action=user" style="float:left; font-size:20px"><i class="fa fa-eye"></i> Revenue with member</a>
</body>
</html>