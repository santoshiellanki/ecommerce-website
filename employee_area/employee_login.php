<?php
session_save_path("/home/ellankis1/logs/logs3");
session_start();
?>
<!DOCTYPE>
<html>
<head>
<style>
#login_admin{padding:200px}
#admin_info{padding-left:300px}
</style>
 <title>Login Form </title>
</head>
<body background="building_bg2.jpg">

<div class="login">
<h2 style="color:black; text-align:center:"><?php echo @$_GET['Employee Logout']; ?></h2>
<div id="login_admin">
<div><h2 id="admin_info">Employee Login</h2></div>
  <form method="post">
  <table width="1000" align="center">
    
    
<tr>
  <td align="right"><b>Name:</b></td>
  <td><input type="text" name="employee_name" placeholder="employee_name" required="required" /></td>
</tr>
<tr>  
  <td align="right"><b>Password:</b></td>
  <td><input type="password" name="employee_pass" placeholder="Password" required="required" /></td>
</tr>
<tr align="center">  
  <td colspan="2"><button type="submit" class="btn btn-primary btn-block btn-large" name="login"> Login</button></td>
  <h2 style="color:black; text-align:center;"><?php echo @$_GET['not_emplyoee']; ?></h2>
  </form>
  </div>
  </div>
  </body>
  </html>
  <?php

  $con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
  if(isset($_POST['login'])){
  $Emp_Inf_Name = mysqli_real_escape_string($con,$_POST['employee_name']);
  $Emp_Inf_Pass = mysqli_real_escape_string($con,$_POST['employee_pass']);
  $Emp_Inf_Pass =md5($Emp_Inf_Pass);
  $Emp_Inf_Qry = "select * from employee where employee_name='$Emp_Inf_Name' AND employee_pass = '$Emp_Inf_Pass'";
  $Emp_Inf_Run = mysqli_query($con,$Emp_Inf_Qry);
  $Emp_Inf_Res = mysqli_num_rows($Emp_Inf_Run);
  
  if($Emp_Inf_Res==0){
  echo"<script>alert('Password or Name is wrong,try again')</script>";
  
  }
  else
  {
  $_SESSION['employee_name'] = $Emp_Inf_Name;
  echo "<script>window.open('index.php','_self')</script>";
  }
  }
  ?>