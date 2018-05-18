<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Seats</title>
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
<h2>Seats</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
<thead>
	  <tr>
		<th scope="col">Code</th>
		<th scope="col">Seat Number</th>
		<th scope="col">Price/day (vnd) <a href="?action=changePrice"><i class="fa fa-pencil-square-o"></i></a></th>
		<th scope="col">Note</th>
		<th colspan="2"><a href="?action=insert"><i class="fa fa-plus"></i> New seat</a></th>
	  </tr>
   </thead>
   <tbody>   
	  <?php
	  	foreach($arr as $seatsDto){
	  ?>
	  <tr>
		<td><?php echo $seatsDto->getcode(); ?></td>
		<td><?php echo $seatsDto->getseatnumber(); ?></td>
		<td><?php echo $seatsDto->getpricePerDay(); ?> 000 vnd</td>
		<td><?php echo $seatsDto->getnote(); ?></td>
		<td><a href="?action=edit&id=<?php echo $seatsDto->getcode(); ?>"><i class="fa fa-edit"></i> Edit</a></td>
		<td><a href="?action=delete&id=<?php echo $seatsDto->getcode(); ?>"
        		onclick="return confirm ('Delete <?php echo $seatsDto->getcode(); ?>')"><i class="fa fa-trash"></i> Delete</a></td>
	  </tr>
	  <?php } ?>
    </tbody>
</table>
</div>
</body>
</html>