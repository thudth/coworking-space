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
<h2>User Managing</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
<thead>
  <tr>
    <th scope="col">Username</th>
    <th scope="col">Name</th>
    <th scope="col">Gender</th>
    <th scope="col">Birthday</th>
    <th scope="col">Phone</th>
    <th scope="col">Email</th>
    <th scope="col">Role</th>
    <th><a href='?action=add'><i class="fa fa-plus"></i> New Admin</a></th>
  </tr>
</thead>
<tbody>
  <?php foreach($arr as $a) {?>
  <tr>
    <td><?php echo $a->getusername(); ?></td>
    <td><?php echo $a->getfirstName()." ".$a->getlastName(); ?></td>
    <td><?php echo $a->getgender(); ?></td>
    <td><?php echo $a->getdateOfBirth(); ?></td>
    <td><?php echo $a->getphone(); ?></td>
    <td><?php echo $a->getemail(); ?></td>
    <td><?php echo $a->getroles(); ?></td>
    <td>
    	<?php
		if($a->getroles()=="Admin"){
		?>
        <a href='?action=delete&user=<?php echo $a->getusername(); ?>'
        	onclick="return confirm ('Cancel admin role <?php echo $a->getusername(); ?>')">
            <i class="fa fa-times-circle"></i> Cancel admin roles </a>
        <?php } ?>
    </td>
  </tr>
  <?php } ?>
</tbody>
</table>
<br>
<div class="ui buttons">
  <?php
  //Hien thi nut nhan trang___________________________________________________
	$aTag="UserManaging.php?";
  //Lay lai so trang hien tai
	  if(isset($_GET['page']))
		  $trang= $_GET['page'];
	  else $trang=1;
	  $trangtruoc=$trang-1;
	  $trangsau=$trang+1;
  //Link trang
  if($tongtrang>=3)
  {
      if ($trang==1)
      {
          echo "<a class='ui button active' href=".$aTag."&page=$trang>$trang</a>";
          echo "<a class='ui button' href=".$aTag."&page=$trangsau>Next <i class='fa fa-angle-double-right'></i></a>";
      }
      else if ($trang==$tongtrang)
      {
          echo "<a class='ui button' href=".$aTag."&page=$trangtruoc><i class='fa fa-angle-double-left'></i> Previous</a>";
          echo "<a class='ui button active' href=".$aTag."&page=$trang>$trang</a>";
      }
      else
      {
          echo "<a class='ui button' href=".$aTag."&page=$trangtruoc><i class='fa fa-angle-double-left'></i> Previous</a>";
          echo "<a class='ui button active' href=".$aTag."&page=$trang>$trang</a>";
          echo "<a class='ui button' href=".$aTag."&page=$trangsau>Next <i class='fa fa-angle-double-right'></i></a>";
      }
  }
  else
      {
          for ($i=1;$i<=$tongtrang;$i++) {
              if ($i== $trang)
              {
                  echo "<a class='ui button active' href=".$aTag."&page=$i>$i</a>";
              }
              else
              {
                  echo "<a class='ui button' href=".$aTag."&page=$i>$i</a>";
              }
          }
      }
  ?>
</div>
</div>
</body>
</html>
