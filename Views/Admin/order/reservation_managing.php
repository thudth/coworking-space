<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders</title>
</head>
<?php
	$aTag="Order.php?";
?>
<script language="javascript">
	function Filter()
	{
		document.getElementById("Status").submit();
	}
</script>
<body>
<h2>Orders</h2>
<?php 
	if(isset($_GET['OrderState'])) $aTag.="&OrderState=".$_GET['OrderState'];
	if(isset($_GET['User'])) $aTag.="&User=".$_GET['User'];
	if(isset($_GET['Date'])) $aTag.="&Date=".$_GET['Date'];
?>
<div style="width:60%; height:150px">
<form method="get" id="Status" class="pure-form">
<!--Search By Status-->
<div align="left" style="float:right">
  <?php foreach($arrOrderState as $a){ ?>
      <input type='radio' name='OrderState' value='<?php echo $a->getcode()?>' id='<?php echo $a->getcode()?>'  onclick= 'Filter()'
          <?php if(isset($_GET['OrderState']) && $_GET['OrderState']==$a->getcode()) echo "checked='checked'"; ?>/>
      <label for='<?php echo $a->getcode()?>'><?php echo $a->getstatus()?></label><br>
  <?php }?>
</div>
<!--Search By UserName-->
<div align="left" style="float:left; width:250px">
  <input type="text" name="User" value="<?php if(isset($_GET['User'])) echo $_GET['User']?>" 
  		placeholder="Search By UserName" onblur="Filter()" class="pure-input-1"/><br /><br />
<!--Search By Date-->
  <input type="date" name="Date" value="<?php if(isset($_GET['Date'])) echo $_GET['Date'];?>" onchange="Filter()" class="pure-input-1"/>
</div>
</form>
</div>
<div style="width: 100%">
<table border="1" cellspacing="0" class="pure-table pure-table-horizontal">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Code</th>
      <th scope="col">Username</th>
      <th scope="col">Order Date</th>
      <th scope="col">Status</th>
      <th scope="col">Confirm Staff</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>  
    <?php $i=1;
    foreach($arrOrder as $a){?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $a->getcode();?></td>
      <td><?php echo $a->getusername();?></td>
      <td><?php echo $a->getorderDate();?></td>
      <td><?php echo $a->getorderStateName();?></td>
      <td><?php echo $a->getconfirmStaffMember();?></td>
      <td>
          <?php
          if($a->getorderState()==1)
              echo "<a href='?action=upStatus&id=".$a->getcode()."'><i class='fa fa-arrow-up'></i> Update Status</a>";
          else if($a->getorderState()==2)
              //echo $a->getorderState();
              echo "<a href='?action=allocate&id=".$a->getcode()."'><i class='fa fa-cogs'></i> Allocating</a>";
          else 
              echo "<a href='?action=detail&id=".$a->getcode()."'><i class='fa fa-eye'></i> Detail</a>";
          ?>
      </td>
    </tr>
    <?php $i++;}?>
  </tbody>
</table><br />

    <div class="ui buttons">
  <?php
  //Hien thi nut nhan trang___________________________________________________
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