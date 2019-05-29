<!DOCTYPE>
<?php

$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}

?>
<!DOCTYPE>
<html>
    <head> 
        <title> South Asian Handicrafts </title>
		
		
		
    </head>
<body>

  
    

  
   
	   <form action="admin_register.php" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="750">
	   <tr align="center">
	    <td colspan="6"><h2>Create an Admin Account</h2></td>
	   
	   </tr>
	   <tr>
	   <td align="right">Admin Name:</td>
	   <td><input type="text" name="a_name" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Admin Email:</td>
	   <td><input type="text" name="a_email" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Admin Password</td>
	   <td><input type="password" name="a_pass" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Admin Contact:</td>
	   <td><input type="text" name="a_contact"required/></td>
	   </tr>
	   <tr align="center">
	   <td colspan="6"><input type="submit" name="register" value="Create Account"/></td>
	   </tr>
	   </table>
	   </form>

</body>
</html>
<?php
 if(isset($_POST['register'])){
 
  $a_name = $_POST['a_name'];
  $a_email = $_POST['a_email'];
  $a_pass = $_POST['a_pass'];
  $a_pass = md5($a_pass);
  $a_contact = $_POST['a_contact'];
  $insert_a = "insert into administrator(admin_name,admin_email,admin_pass,admin_contact) values('$a_name','$a_email','$a_pass','$a_contact')";

$run_a = mysqli_query($con,$insert_a);
if($run_a){
echo "<script>alert('registeration successful')</script>";
echo "<script>window.open('index.php','_self')</script>";
}

 }
 ?>
