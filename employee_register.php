<!DOCTYPE>
<?php
session_save_path("/home/ellankis1/logs/logs2");
session_start();
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else
{
?>
<!DOCTYPE>
<html>
    <head> 
        <title> South Asian Handicrafts </title>
		
		
		
    </head>
<body>

  
    

  
   
	   <form action="employee_register.php" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="750">
	   <tr align="center">
	    <td colspan="6"><h2>Create an Employee Account</h2></td>
	   
	   </tr>
	   <tr>
	   <td align="right">Employee Name:</td>
	   <td><input type="text" name="e_name" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Employee Email:</td>
	   <td><input type="text" name="e_email" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Employee Password</td>
	   <td><input type="password" name="e_pass" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Employee Contact:</td>
	   <td><input type="text" name="e_contact"required/></td>
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
 
  $e_name = $_POST['e_name'];
  $e_email = $_POST['e_email'];
  $e_pass = $_POST['e_pass'];
  $e_pass = md5($e_pass);
  $e_contact = $_POST['e_contact'];
  $insert_e = "insert into employee(employee_name,employee_email,employee_pass,employee_contact) values('$e_name','$e_email','$e_pass','$e_contact')";

$run_e = mysqli_query($con,$insert_e);
if($run_e){
echo "<script>alert('registeration successful')</script>";
echo "<script>window.open('index.php','_self')</script>";
}

 }
 ?>
<?php } ?>