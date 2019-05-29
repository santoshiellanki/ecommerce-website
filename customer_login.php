<?php
session_save_path("/home/ellankis1/logs");
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
<style>
    body{font-family: times,sans-serif;text-align: center;color: purple;font-weight:bold; font-size: 18px;}
      *{padding-top:6px;padding-bottom:6px;margin: left;}
    #image {background-image: url(images/customer_login.jpg);background-position: center;background-repeat: no-repeat;}
  </style>
</head>
<body background id="image">
<div>
<form method="post" action="">
    <table width="250" align="center">
    
<tr align="center">
    <td colspan="3"><h2> Login or Register to Buy!</h2></td>
</tr>
<tr>
<td align="center"><b>Email:</b></td>
<td><input type="text" name="customer_email" placeholder="enter email"/></td>
</tr>

<tr>
 <td align="center"><b>Password:</b></td>
 <td><input type="password" name="customer_pass" placeholder="enter password" /></td>
</tr>

<tr align="center">
 <td colspan="3"><input type="submit" name="login" value="Login" /></td>
</tr>

</table>
<h2 style="float:center;padding-right:25px;"><a href="customer_register.php"style="text-decoration:none;">New? Register Here</a></h2>

</form>
<?php

  $con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
  if(isset($_POST['login'])){
  $Cust_Email = mysqli_real_escape_string($con,$_POST['customer_email']);
  
  $Cust_Password = mysqli_real_escape_string($con,$_POST['customer_pass']);
  
  $Cust_Password =md5($Cust_Password);
  $Cust_Inf_Qry = "select * from customers where customer_email='$Cust_Email' AND customer_pass = '$Cust_Password'";
  $Cust_Inf_Run = mysqli_query($con,$Cust_Inf_Qry);
  $Cust_Check = mysqli_num_rows($Cust_Inf_Run);
  
  if($Cust_Check==0){
  echo"<script>alert('Password or Name is wrong,try again')</script>";
  
  }
  else
  {
  $_SESSION['customer_email'] = $Cust_Email;
  echo "<script>window.open('index.php','_self')</script>";
  }
  }
  ?>

</div>
</body>
</html>