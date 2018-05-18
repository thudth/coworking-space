<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<!--	</script><script type="text/javascript" src="../../../CssJavaScriptJquery/Chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../CssJavaScriptJquery/ChartMinCSS.css" media="all" />
-->
<style>
table
{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:15px;
}
</style>

<body>
<h2>Revenue</h2>
<table border="1" cellspacing="0" class="pure-table pure-table-bordered">
  <tr>
    <th scope="row">Year</th>
    <?php 
		for($i=0;$i<count($month);$i++) {?>
    <td colspan="<?php echo count($month[$i]) ?>"><?php echo $year[$i]->getorderYear() ?></td><?php }?>
  </tr>
  <tr>
    <th scope="row">Month</th>
	<?php 
		for($i=0;$i<count($month);$i++) 
			for($j=0;$j<count($month[$i]);$j++) {?>
    <td><?php echo $month[$i][$j]->getorderMonth(); ?></td> <?Php }?>
  </tr>
  <tr>
    <th scope="row">Revenue</th>
   <?php  for($k=0;$k<count($revenue);$k++) {?>
    <td><?php echo $revenue[$k];  ?></td><?php }?>
  </tr>
  <tr>
    <th scope="row"></th>
    <?php 
		for($i=0;$i<count($month);$i++) {?>
    <td colspan="<?php echo count($month[$i]) ?>"><a href="?action=month&y=<?php echo $year[$i]->getorderYear()?>">
                <i class="fa fa-eye"></i> Detail</a></td><?php }?>
  </tr>
</table><br />
    <a href="?action=user" style="float:right; font-size:20px"><i class="fa fa-eye"></i> Revenue with member</a>
</body>
</html>