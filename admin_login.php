<?php
session_save_path("/home/ellankis1/logs/logs2");
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
<body background="images.jpg">

<div class="login">
<h2 style="color:black; text-align:center:"><?php echo @$_GET['Admin Logout']; ?></h2>
<div id="login_admin">
<div><td colspan="3"><h2 id="admin_info">Admin Login</h2></div>
  <form method="post">
  <table width="1000" align="center">
    
    
<tr>
  <td align="right"><b>Name:</b></td>
  <td><input type="text" name="admin_name" placeholder="admin_name" required="required" /></td>
</tr>
<tr>  
  <td align="right"><b>Password:</b></td>
  <td><input type="password" name="admin_pass" placeholder="Password" required="required" /></td>
</tr>
<tr align="center">  
  <td colspan="3"><button type="submit" class="btn btn-primary btn-block btn-large" name="login"> Login</button></td>
  <h2 style="color:black; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
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
  $Admim_Inf_Name = mysqli_real_escape_string($con,$_POST['admin_name']);
  $Admin_Inf_Pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
  $Admin_Inf_Pass =md5($Admin_Inf_Pass);
  $Admin_Inf_Qry = "select * from administrator where admin_name='$Admim_Inf_Name' AND admin_pass = '$Admin_Inf_Pass'";
  $Admin_Inf_Run = mysqli_query($con,$Admin_Inf_Qry);
  $Admin_Inf_Res = mysqli_num_rows($Admin_Inf_Run);
  
  if($Admin_Inf_Res==0){
  echo"<script>alert('Password or Name is wrong,try again')</script>";
  
  }
  else
  {
  $_SESSION['admin_name'] = $Admim_Inf_Name;
  echo "<script>window.open('index.php','_self')</script>";
  }
  }
  ?>