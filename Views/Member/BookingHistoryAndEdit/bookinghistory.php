<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking History</title>
</head>
<body>
<?php 
	if(count($orderDto)==0) echo "<h2>You don't have any order</h2>" ;
	else {
?>
<h2>Booking History</h2>
<table cellspacing="0" class="pure-table pure-table-horizontal">
  <thead>
      <tr>
          <th>Code</th>
          <th>Order Date</th>
          <th>Paying Amount</th>
          <th>Order State</th>
          <th colspan="2"></th>
      </tr>
  </thead>
  <tbody>
  <?php foreach($orderDto as $a){ ?>
  <tr>
    <td><?php echo $a->getcode(); ?></td>
    <td><?php echo $a->getorderDate(); ?></td>
    <td><?php echo historyDao::instance()->getOrderPayingAmount($a->getcode())." 000 vnd"; ?></td>
    <td><?php echo $a->getorderStateName(); ?></td>
    <?php if($a->getorderState()==1){ ?>
        <td><a href="?action=detail&id=<?php echo $a->getcode(); ?>#content">Detail</a></td>
        <td><a href="?action=cancel&id=<?php echo $a->getcode(); ?>" onclick="return confirm('Do you want to cancel order <?php echo $a->getcode()?>')">Cancel</a></td>
    <?php } else { ?>
        <td colspan="2"><a href="?action=detail&id=<?php echo $a->getcode(); ?>#content">Details</a></td>
    <?php }?>
  </tr>
  <?php }?>
  </tbody>
</table>
<?php } ?><br />
<div style="height:180px; width:800px; background:#D7D7FF; padding:20px">
<h3>Forms of Payment</h3>
<p>Transfer payment to this bank account: 5198025431804091152 <br />
And Send confirmation message to this email address: confirmemail@gmail.com</p>
</div>
</body>
</html>