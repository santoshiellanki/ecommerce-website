<?php
session_save_path("/home/ellankis1/logs/logs1");
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
<body background="images-2.jpeg">

<div class="login">
<h2 style="color:black; text-align:center"><?php echo @$_GET['Owner Logout']; ?></h2>
<div id="login_admin">
<div><td colspan="4"><h2 id="owner_info">Owner Login</h2></div>
  <form method="post">
  <table width="1000" align="center">
    
    
<tr>
  <td align="right"><b>Name:</b></td>
  <td><input type="text" name="owner_name" placeholder="owner_name" required="required" /></td>
</tr>
<tr>  
  <td align="right"><b>Password:</b></td>
  <td><input type="password" name="owner_pass" placeholder="Password" required="required" /></td>
</tr>
<tr align="center">  
  <td colspan="3"><button type="submit" class="btn btn-primary btn-block btn-large" name="login"> Login</button></td>
  <h2 style="color:black; text-align:center;"><?php echo @$_GET['not_owner']; ?></h2>
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
  $Owner_Inf_Name = mysqli_real_escape_string($con,$_POST['owner_name']);
  $Owner_Inf_Pass = mysqli_real_escape_string($con,$_POST['owner_pass']);
  $Owner_Inf_Pass =md5($Owner_Inf_Pass);
  $Owner_Inf_Qry = "select * from owner where owner_name='$Owner_Inf_Name' AND owner_pass = '$Owner_Inf_Pass'";
  $Owner_Inf_Run = mysqli_query($con,$Owner_Inf_Qry);
  $Owner_Inf_Res = mysqli_num_rows($Owner_Inf_Run);
  
  if($Owner_Inf_Res==0){
  echo"<script>alert('Password or Name is wrong,try again')</script>";
  
  }
  else
  {
  $_SESSION['owner_name'] = $Owner_Inf_Name;
  echo "<script>window.open('index.php','_self')</script>";
  }
  }
  ?>