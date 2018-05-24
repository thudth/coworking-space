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
<h2>Revenue with member</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
<thead>
  <tr>
    <th scope="col">Username</th>
    <th scope="col">Seats</th>
    <th scope="col">Team Room</th>
    <th scope="col">Confence Room</th>
    <th scope="col">Total</th>
  </tr>
</thead>
<tbody>
  <?php
	$count=0;
	foreach($RevenueByUser as $a){
  ?>
  <tr>
    <td><?php echo $a->getusername() ?></td>
    <td><?php echo $a->getuserSeatRev() ?></td>
    <td><?php echo $a->getuserTeamRRev() ?></td>
    <td><?php echo $a->getuserConfRRev() ?></td>
    <td><?php echo $tong=$a->getuserConfRRev()+ $a->getuserTeamRRev()+ $a->getuserSeatRev() ?></td>
  </tr>
  <?Php $count+=$tong; }?>
  <tr>
    <td colspan="5" align="right"><strong><?php echo "Total: ".$count; ?></strong></td>
  </tr>
</tbody>
</table><br />
    <a href="Revenue.php" style="float:right; font-size:20px"><i class="fa fa-arrow-left"></i> Back</a>
</body>
</html>