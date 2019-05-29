<?php
include("functions/functions.php");
include("includes/db.php");
?>
<!DOCTYPE>
<html>
    <head> 
        <title> South Asian Handicrafts </title>
		
	<style>
      body{font-family: times,sans-serif;text-align: center;color:#8e0d0d;font-weight:bolder;}
            *{padding-top:5px;padding-bottom: 5px;margin: left;}
            #Image {background-image: url(images/customer_registration.jpg);
            background-position:center;background-repeat: no-repeat;background-size: auto;}
         </style>

		
    </head>
<body background id="Image">

     
	   <form action="customer_register.php" method="post" enctype="multipart/form data">
	   
	   <table align="center" width="1000">
	   <tr align="center">
	    <td colspan="6"><h2><b>Create an Account</b></h2></td>
	   
	   </tr>
	   <tr>
	   <td align="right"><b>Customer Name:</b></td>
	   <td><input type="text" name="c_name" required/></td>
	   </tr>
	   <tr>
	   <td align="right"><b>Customer Email:</b></td>
	   <td><input type="text" name="c_email" required/></td>
	   </tr>
	   <tr>
	   <td align="right"><b>Customer Password:</b></td>
	   <td><input type="password" name="c_pass" required/></td>
	   </tr>
	   <tr>
	   <td align="right"><b>Customer Country</b></td>
	   <td>
	   <select name="c_country">
	    <option>Select a Country</option>
	    <option>Afghanistan</option>
            <option>Bangladesh</option>
            <option>Brazil</option>
            <option>China</option>
            <option>India</option>
            <option>Israel</option>
            <option>Japan</option>
            <option>Nepal</option>
            <option>Pakistan</option>
            <option>Srilanka</option>
            <option>United Arab Emirates</option>
	    <option>United States</option>
	    <option>United Kingdom</option>
            <option>Other</option>

	   </select>
	   </td>
	   </tr>
	   <tr>
	   <td align="right"><b>Customer City:</b></td>
	   <td><input type="text" name="c_city"/></td>
	   </tr>
	   <tr>
	   <td align="right"><b>Customer Contact:</b></td>
	   <td><input type="text" name="c_contact"required/></td>
	   </tr>
	   <tr>
	   <td align="right"><b>Customer Address:</b></td>
	   <td><input type="text" name="c_address"required/></td>
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
 
  $ip = getIp();
  $Cust_Inf_name = $_POST['c_name'];
  $Cust_Inf_Email = $_POST['c_email'];
  $Cust_Inf_Pass = $_POST['c_pass'];
  $Cust_Inf_Pass = md5($Cust_Inf_Pass);
  //$c_image = $_FILES['c_image']['name'];
  //$c_image_tmp = $_FILES['c_image']['tmp_name'];
  $Cust_Inf_Cntry = $_POST['c_country'];
  $Cust_Inf_City = $_POST['c_city'];
  $Cust_Inf_Cont = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  //move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
  $insert_c = "insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address) values('$ip','$Cust_Inf_name','$Cust_Inf_Email','$Cust_Inf_Pass','$Cust_Inf_Cntry','$Cust_Inf_City','$Cust_Inf_Cont','$c_address')";

$run_c = mysqli_query($con,$insert_c);
if($run_c){
echo "<script>alert('registeration successful')</script>";
echo "<script>window.open('customer_login.php','_self')</script>";
}

 }
 ?>
