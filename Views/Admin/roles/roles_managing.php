<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
<h2>Manage Roles</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
  <thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Role</th>
      <th colspan="2"><a href="?action=add"><i class="fa fa-plus"></i> New Role</a></th>
    </tr>
  </thead>
  <tbody>  
	<?php
      foreach($arrRole as $a){
    ?>
    <tr>
      <td><?php echo $a->getcode(); ?></td>
      <td><?php echo $a->getrole(); ?></td>
      <td><a href="?action=edit&id=<?php echo $a->getcode(); ?>"><i class="fa fa-edit"></i> Edit</a></td>
      <td><a href="?action=delete&id=<?php echo $a->getcode(); ?>" 
              onclick="return confirm ('Delete <?php echo $a->getcode(); ?>')"><i class="fa fa-trash"></i> Delete</a></td>
    </tr>
	<?php } ?>
  </tbody>    
</table>
</div>
</body>
</html>