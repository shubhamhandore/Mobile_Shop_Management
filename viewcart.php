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
				Product Qty
			</th>
		
			<th>
				Product Price
			</th>

			<th>
				Product Total
			</th>
		</Tr>
<?php
$q=pg_query("select * from tblcart,tblproduct where tblproduct.pid=tblcart.pid and uid='".$_SESSION['uid']."' and status='0'");
while($r=pg_fetch_array($q)){
	?>
		<tr>
			<Td>
				<?php
	echo $r['pname'];?>
			</Td>
		
			<Td>
				<?php
	echo $r['qty'];?>
			</Td>

			<Td>
				₹<?php
	echo $r['pdprice'];?>/-
			</Td>

		<Td>
				₹<?php
				$z+=$r['qty']*$r['pdprice'];

	echo $r['qty']*$r['pdprice'];?>/-
			</Td>
			
			<td>
				<a href="delete.php?id=<?php echo $r['cartid'];?>" class="btn btn-outline-primary btn-sm">Remove</a>
			</td>
		
			
		</Tr>
		
	
	
	

<?php
}
?>
<Tr>
	<Td colspan=3 align=right>
		<b>Total Bill:</b>
	</Td>
	<Td>
		₹<?php echo $z;?>
	</Td>
</Tr>
</table>

<table class="table">
	<Tr>
		<th>
			Address
		</th>
	</Tr>
<?php
$q1=pg_query("select * from tbladdress where  uid=".$_SESSION['uid']);
while($r1=pg_fetch_array($q1)){
?>
<tr>
	<td>
<?php echo $r1['address'];	?>
</td>
<Td>
	<a href="bill.php?id=<?php echo $r1['addressid'];?>" class="btn btn-outline-primary btn-sm">Choose</a>
	</Td>
</tr>
<?php
}
?>
</table>
<a href="addaddress.php" class="btn btn-outline-primary btn-sm">Add Address</a>
</div>
</div><br>
<?php include 'footer.php';?>
</body>
</html>