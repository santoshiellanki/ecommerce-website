<?php

$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}

 $Account_User = $_SESSION['customer_email'];
 $Account_Details_Qry = "select * from customers where customer_email ='$Account_User'";
 $Account_Details_Run = mysqli_query($con,$Account_Details_Qry);
 $Account_Cust = mysqli_fetch_array($Account_Details_Run);
 $Acc_Cust_Id = $Account_Cust['customer_id'];
 $Acc_Cust_Name = $Account_Cust['customer_name'];
 $Acc_Cust_Email = $Account_Cust['customer_email'];
 //$country = $Account_Cust['customer_country'];
 $Acc_Cust_City = $Account_Cust['customer_city'];
 $Acc_Cust_Contct = $Account_Cust['customer_contact'];
 $Acc_Cust_Addr = $Account_Cust['customer_address'];
?>
	   <form action="" method="post" enctype="multipart/form-data">
	   <table align="center" width="750">
	   <tr align="center">
	    <td colspan="6"><h2>Update your Account</h2></td>
	   
	   </tr>
	   <tr>
	   <td align="right">Customer Name:</td>
	   <td><input type="text" name="c_name" value="<?php echo $Acc_Cust_Name; ?>"/></td>
	   </tr>
	   <tr>
	   <td align="right">Customer Email:</td>
	   <td><input type="text" name="c_email" value="<?php echo $Acc_Cust_Email; ?>"/></td>
	   </tr>
	   <tr>
	   <td align="right">Customer City:</td>
	   <td><input type="text" name="c_city" value="<?php echo $Acc_Cust_City; ?>"/></td>
	   </tr>
	   <tr>
	   <td align="right">Customer Contact:</td>
	   <td><input type="text" name="c_contact"required value="<?php echo $Acc_Cust_Contct; ?>"/></td>
	   </tr>
	   <tr>
	   <td align="right">Customer Address</td>
	   <td><input type="text" name="c_address"required value="<?php echo $Acc_Cust_Addr; ?>" /></td>
	   </tr>
	   <tr align="center">
	   <td colspan="6"><input type="submit" name="update" value="Update Account"/></td>
	   </tr>
	   </table>
	   </form>


<?php
 if(isset($_POST['update'])){
 
  $ip = getIp();
  $Cust_Updt_Id = $Acc_Cust_Id;
  $Cust_Updt_Name = $_POST['c_name'];
  $Cust_Updt_Email = $_POST['c_email'];
  
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $Run_Update = "update customers set customer_name='$Cust_Updt_Name', customer_email='$Cust_Updt_Email',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address' where customer_id='$Cust_Updt_Id'";
  $R_Update = mysqli_query($con,$Run_Update);
  if($R_Update){

  echo"<script> alert('Your account is successfully updated'+','+'$Cust_Updt_Id')</script>";
  echo"<script>window.open('MyAccount.php?','_self')</script>";
}
 }
?>