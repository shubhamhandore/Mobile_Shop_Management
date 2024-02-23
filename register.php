<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?>
<?php
if(isset($_POST['btnsave'])){
  extract($_POST);
  
  pg_query("INSERT INTO tbluser(uname, upass, email, phoneno) VALUES ('$txtname','$txtpass','$txtemail','$txtphone')");
  ?>
  <script type="text/javascript">
    alert("Registeration Successfull");
    window.location.href="login.php";
  </script>
  <?php
}

?>


<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <form method="post">
      <table class="table">
        <Tr>
          <Td>
            Name
          </Td>
          <td>
            <input type="text" name="txtname" placeholder="Enter Name" required class="form-control" placeholder="Name">
          </td>
        </Tr>
        <Tr>
          <Td>
            Password
          </Td>
          <td>
            <input type="password" required name="txtpass" class="form-control" placeholder="Password">
          </td>
        </Tr>
        <Tr>
          <Td>
            Email
          </Td>
          <td>
            <input type="email" name="txtemail" required class="form-control" placeholder="Email">
          </td>
        </Tr>
        <Tr>
          <Td>
           Phone No
          </Td>
          <td>
            <input type="text" title="Min & Max 10 Digits" name="txtphone" required pattern="^[0-9]{10}$" class="form-control" placeholder="Phone no">
          </td>
        </Tr>
        <Tr>
          <Td colspan=2 align=center>
            <input type="submit" name="btnsave" value="Register" class="btn btn-outline-primary">
          </Td>
          
        </Tr>
      </table>
    </form>
  </div>
</div>

<?php include 'footer.php';?>
</body>
</html>