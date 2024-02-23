<?php
include 'head.php';

include 'menu.php';
if(isset($_POST['btnupdate'])){
	extract($_POST);
	echo "update tblproduct set pstock='$txtstock' where pid=".$_GET['id'];
pg_Query("update tblproduct set pstock='$txtstock' where pid=".$_GET['id']);
?>
<script type="text/javascript">
	window.location.href="viewstock.php";
</script>
<?php
}
?>
<form method="post">
	<table>
		<Tr>
			<Td>
				Stock
			</Td>
			<td>
				<input type="text" name="txtstock" required class="form-control"><br>
			</td>
		</Tr>
		<tr>
			<Td colspan=2 align="center">
				<input type="submit" class="btn btn-outline-primary btn-sm" name="btnupdate" value="Update">
			</Td>
		</tr>
	</table>
</form>
