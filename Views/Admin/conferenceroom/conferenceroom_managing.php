<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Conference Rooms</title>
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
<h2>Conference Rooms</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal" width="880px">
<thead>
  <tr>
    <th scope="col">Room Number</th>
    <th scope="col">Room Type</th>
    <th scope="col">Price Per Hour</th>
    <th scope="col">Note For This Room</th>
    <th scope="col">Description For Room Type</th>
    <th scope="col" colspan="2"><a href="?action=add">Add</a></th>
  </tr>
</thead>
<tbody>
  <?php
  	foreach($arr as $conferenceroomsDto){
  ?>
  <tr>
    <td><?php echo $conferenceroomsDto->getroomNumber(); ?></td>
    <td><?php echo $conferenceroomsDto->getRoomTypeName(); ?></td>
    <td><?php echo $conferenceroomsDto->getpriceperhour(); ?></td>
    <td><?php echo $conferenceroomsDto->getdescription(); ?></td>
    <td><?php echo $conferenceroomsDto->getnote(); ?></td>
    <td><a href="?action=edit&id=<?php echo $conferenceroomsDto->getroomNumber(); ?>">Edit</a></td>
    <td><a href="?action=delete&id=<?php echo $conferenceroomsDto->getroomNumber(); ?>" 
    		onclick="return confirm ('Delete <?php echo $conferenceroomsDto->getroomNumber(); ?>')">Delete</a></td>
  </tr>
  <?php } ?>
</tbody>
</table>
</body>
</html>
