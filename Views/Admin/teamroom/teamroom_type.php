<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Team room Types</title>
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
<div>
<h2>Team room Types</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
<thead>
  <tr>
    <th scope="col">Code</th>
    <th scope="col">Room type</th>
    <th scope="col">Price per month</th>
    <th scope="col">Note</th>
    <th colspan="2"><a href="?action=add"><i class="fa fa-plus"></i> New Type</a></th>
  </tr>
</thead>
<tbody>
  <?php
  foreach($arr as $teamroomtypesDto){
  ?>
  <tr>
    <td><?php echo $teamroomtypesDto->getcode(); ?></td>
    <td><?php echo $teamroomtypesDto->getname(); ?></td>
    <td><?php echo $teamroomtypesDto->getpricePerMonth(); ?></td>
    <td><?php echo $teamroomtypesDto->getnote(); ?></td>
    <td><a href="?action=edit&id=<?php echo $teamroomtypesDto->getcode();?>"><i class="fa fa-edit"></i> Edit</a></td>
	<td><a href="?action=delete&id=<?php echo $teamroomtypesDto->getcode();?>"
    	onclick="return confirm ('Delete <?php echo $teamroomtypesDto->getcode();?>')"><i class="fa fa-trash"></i> Delete</a></td>
  </tr>
  <?php }?>
</tbody>
</table>
</div>
</body>
</html>