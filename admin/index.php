<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include 'head.php';?>
</head>
<body>
	<center>
		<h1><b>Admin Panel</b></h1>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
<form method="post">
	<table class=table>
		<Tr>
			<Td>
				Admin Username
			</Td>
			<Td>
				<input type="text" name="txtname" required class="form-control" placeholder="username">
			</Td>
		</Tr>
		<Tr>
			<Td>
				Admin Password
			</Td>
			<Td>
				<input type="password" name="txtpass" required class="form-control" placeholder="password">
			</Td>
		</Tr>
		<tR>
			<Td colspan=2 align=center>
				<input type="submit" name="btnlogin" value="Login" class="btn btn-outline-primary">
			</Td>
		</tR>
	</table>
</form>
</div>
</div>
<?php
if(isset($_POST['btnlogin'])){
	extract($_POST);
	$q1=pg_query("select * from tbladmin where username='$txtname' and password='$txtpass'");
	if(pg_num_rows($q1)>0){
		header("location:addcategory.php");
	}
	else{
		?>
		<script type="text/javascript">
			alert("Invalid Credentials");
		</script>
		<?php
	}
}
?>
</center>
</body>
</html>