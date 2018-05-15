<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Conference Room Types</title>
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
<h2>Conference Room Types</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="880px">
<thead>
  <tr>
    <th scope="col">Code</th>
    <th scope="col">Name</th> 
    <th scope="col">Price per hour</th>
    <th scope="col">Note for this room type</th>
    <th colspan="2"><a href="?action=add">Add</a></th>
  </tr>
</thead>
<tbody>
  <?php
  foreach($arr as $conferenceroomtypesDto){
  ?>
  <tr>
    <td><?php echo $conferenceroomtypesDto->getcode(); ?></td>
    <td><?php echo $conferenceroomtypesDto->getname(); ?></td>
    <td><?php echo $conferenceroomtypesDto->getpricePerHour(); ?></td>
    <td><?php echo $conferenceroomtypesDto->getnote(); ?></td>
    <td><a href="?action=edit&id=<?php echo $conferenceroomtypesDto->getcode();?>">Edit</a></td>
	<td><a href="?action=delete&id=<?php echo $conferenceroomtypesDto->getcode();?>"
    	onclick="return confirm ('Delete <?php echo $conferenceroomtypesDto->getcode();?>')">Delete</a></td>
  </tr>
  <?php }?>
  </tbody>
</table>
</body>
</html>