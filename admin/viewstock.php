<!DOCTYPE html>
<html>
<head>
	
	<title></title>
<?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?>
<div class="row">
	<div class="col-md-12">
	<table class="table">
		<Tr>
			<th>
				Product Name
			</th>
			
			<th>
				Stock
			</th>

			<Td>
				<b>Product Price Total</b>
			</Td>
		</Tr>
<?php
$q=pg_query("select * from tblproduct");
while($r=pg_fetch_array($q)){
	?>
		<tr>
			</Td>
			<Td>
				<?php
	echo $r['pname'];?>
			</Td>

		<td>
				<a href="updatestock.php?id=<?php echo $r['pid'];?>"><?php echo $r['pstock']?></a>
			</td>

			<Td>
				<b>₹</b><?php
				$z+=$r['pstock']*$r['pdprice'];

	echo $r['pstock']*$r['pdprice'];?>/-
			</Td>

		</Tr>
<?php
}
?>
<Tr >
	<Td colspan=2 align=right>
		<b>Total Bill:</b>
	</Td>
	<Td>
		<b>₹</b><?php echo $z;?>
	</Td>
</Tr>
</table>

<?php include 'footer.php';?>
</body>
</html>