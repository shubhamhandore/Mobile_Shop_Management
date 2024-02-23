<!DOCTYPE html>
<html>
<head>
	
	<title></title>
<?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?><br>
<div class="row">
	<div class="col-md-6">
<form method="post">
	<table>
		<Tr>
			<Td style="font-size:15px">
				Category
			</Td>
			<Td>
				<select name="cmbcname" class="form-control">
					<option value="0">All Category</option>
					<?php
					$q=pg_query("select * from tblcategory");
					while ($r=pg_fetch_array($q)) {
						?>
						<option value="<?php echo $r['cid'];?>"><?php echo $r['cname'];?></option>
						<?php
					}
					?>

				</select>
			</Td>
			<td>
				<input type="submit" name="btnsearchbycategory" class="btn btn-outline-primary" value="Search By Category">
			</td>
		</Tr>
	</table>
</form>
</div>
<div class="col-md-6">
<form method="post">
	<table>
		<Tr>
			<Td>
				Search
			</Td>
			<Td>
				<input type="text" class="form-control" name="txtsearch" placeholder="search product">
			</Td>
		
			<td>
				<input type="submit" name="btnsearch" class="btn btn-outline-primary" value="Search">
			</td>
		</Tr>
	</table>
</form>
</div>
</div><br>
<?php
if(isset($_POST['btnsearch'])){
extract($_POST);
	$query="select * from tblproduct where pname like '%".$txtsearch."%'";
}
else{
	$query="select * from tblproduct order by pid desc";
}
?>
<?php
if(isset($_POST['btnsearchbycategory'])){
extract($_POST);
if($cmbcname==0){
$query="select * from tblproduct";
}
else{
$query="select * from tblproduct where cid = '".$cmbcname."'";
}
}
?>
<div class="row">

<?php
$q=pg_query($query);
while($r=pg_fetch_array($q)){
	?>
	<div class="col-md-6">
	<table class="table">
		<Tr>
			
			<Td colspan=2 align=center>
				<img src=admin/<?php
	echo $r['pimage'];?> height=200px width=200px>
			</Td>
		</Tr>
		<Tr>
			<td>
				<b>Product Name:</b>
			</td>
			<Td>
				<?php
	echo $r['pname'];?>
			</Td>
		</Tr>
		<Tr>
			<td>
				<b>Product Price:</b>
			</td>
			<Td>
				₹<strike><?php
	echo $r['pprice'];?></strike>/-
			</Td>
		</Tr>
		<Tr>
			<td>
				<b>Product Discount Price:</b>
			</td>
			<Td>
				₹<?php
	echo $r['pdprice'];?>/-
			</Td>
		</Tr>
		<Tr>
			<td>
				<b>Discount %:</b>
			</td>
			<Td>
				<?php
 echo $z=100-($r['pdprice']/$r['pprice'])*100;
	
?>%
		
			</Td>
		</Tr>
		<tr>
			<Td colspan=2 align=center>
				<a href="details.php?id=<?php echo $r['pid'];?>" class="btn btn-outline-primary"><b>Details</b></a>
			</Td>

		</Tr>
	</table>
	</div>
	
	

<?php
}
?>
</div>
<?php include 'footer.php';?>
</body>
</html>