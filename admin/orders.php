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
				User Name
			</th>
			<th>
				Phone No
			</th>
			<th>
				Product Name
			</th>
			<th>
				Product Price
			</th>
			<th>
				Product Qty
			</th>
			<th>
				Product
				Total Price
			</th>
			<th>
				Address
			</th>
			<th>
				Status
			</th>
		</Tr>
<?php
$q=pg_query("select * from tblcart,tblproduct,tbluser where tbluser.uid=tblcart.uid and tblproduct.pid=tblcart.pid and status>=1");
while($r=pg_fetch_array($q)){
	?>
		<tr>
			<Td>
				<?php
	echo $r['uname'];?>
			</Td>
			<Td>
				<?php
	echo $r['phoneno'];?>
			</Td>
			<Td>
				<?php
	echo $r['pname'];?>
			</Td>
		
			<Td>
				<b>₹</b><?php
	echo $r['pdprice'];?>/-
			</Td>
			<Td>
				<?php
	echo $r['qty'];?>
			</Td>
		<Td>
				<b>₹</b><?php
				$z+=$r['qty']*$r['pdprice'];

	echo $r['qty']*$r['pdprice'];?>/-
			</Td>
			<Td>
			<?php
				$a=$r['addressid'];
					$q2=pg_query("select * from tbladdress where addressid='$a'");
					$r2=pg_fetch_array($q2);
					echo $r2['address']
				?>
			</Td>
			<td>
				<?php
				$s="";
				switch ($r["status"]) {
					case 1:$s="Not Yet Dispatched";
						break;
					case 2:$s="Dispatched";
						break;
					case 3:$s="Arriving Soon";
						break;
					case 4:$s="Arriving Today";
						break;
					case 5:$s="Delivered";
						break;
					
					default:
						// code...
						break;
				}
				?>
				<a href="setstatus.php?id=<?php echo $r['cartid'];?>"><?php echo $s?></a>
			</td>
		</Tr>
<?php
}
?>
<Tr>
	<Td colspan=5 align=right>
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