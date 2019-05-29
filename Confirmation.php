<?php
session_save_path("/home/ellankis1/logs");
session_start();
if(!isset($_SESSION['customer_email'])){
echo "<script>window.open('customer_login.php? not_customer = You are not a customer.','_self')</script>";
}
else
{
include("functions/functions.php");
?>

<!DOCTYPE>
<html>
    <head> 
        <title> South Asian Handicrafts </title>
		
		<link rel="stylesheet" href="styles/style1.css" media="all"> 
		<style>
		  #Msg{Padding-left:300px;}
		</style>
    </head>
<body>

  
       <div class="header_wrapper"> 
         <h1 id="Heading">South Asian Handicrafts</h1>
        
	 
	</div> 


    <div class="menubar"> 
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="MyAccount.php"> MyAccount</a></li>	
				<div id="form">
		<form method="get" action="results.php" enctype="multipart/form-data">
			<input type="text" name="user_query" placeholder="Search a Product"/>
			<input type="submit" name="search" value="Search"/>
				
		</form>
                    
		
	</div>			
            </ul>
			<?php cart(); ?>
			
	  <div id="shopping_cart">
	    <span style="float:right;font-size:18px;">
	    <?php
	    if(isset($_SESSION['customer_email'])){
            echo"<b>Welcome: </b>" . $_SESSION['customer_email'];
            }
            else{
            echo"<b>Welcome Guest:</b>";
            }
	    ?>
	    
	 
	    
	    
	    <a href="cart.php">Shopping Cart</a> 
	    <a href="logout.php"> Logout </a>
	    
	    </span>
	    
	   </div>
    </div>
	
	<div id="Info">
<form  action="Confirmation.php" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="550">
	   <tr align="center">
	    <th colspan="6"><h2>Enter the Shipping and Payment Details</h2></th>
            <th ><h2></h2></th>
	   
	   </tr>
	   <tr>
	   <td align="right">First Name:</td>
	   <td><input type="text" name="Fname" onkeypress="return onlyAlphabets(event,this);" required/></td>
           <td align="right">Name on Card:</td>
	   <td><input type="text" name="Name" onkeypress="return onlyAlphabets(event,this);" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Last Name:</td>
	   <td><input type="text" name="Lname" onkeypress="return onlyAlphabets(event,this);" required/></td>
            <td align="right">Card Type:</td>
	   <td><input type="text" name="Type" onkeypress="return onlyAlphabets(event,this);" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Address Street 1:</td>
	   <td><input type="text" name="Street1" required/></td>
           <td align="right">Card Number:</td>
	   <td><input type="text" name="Num" onkeypress="return onlyAlphabets(event,this);" required/></td>
	   </tr>
	   <tr>
	   <td align="right">Address Street 2:</td>
	   <td><input type="text" name="Street2" /></td>
           <td align="right">Expiration Date:</td>
	   <td><input type="text" name="Name" onkeypress="return onlyAlphabets(event,this);" required/></td>
	   </tr>
	   <tr>
           <td align="right">City:</td>
	   <td><input type="text" name="city" onkeypress="return onlyAlphabets(event,this);" required/></td> 
	   </tr>
           <tr>
	   <td align="right">State:</td>
	   <td><input type="text" name="state" onkeypress="return onlyAlphabets(event,this);" required/></td>
	   </tr>
           <tr>
	   <td align="right">Zip:</td>
	   <td><input type="text" name="zip" required/></td>
	   </tr>
           

	   <tr align="right">
            <td><input type="submit" name="placeorder" value="Place Order"/></td>
           
	   </tr>
	   </table>
	   </form>
</div>


  
   <div class="content_wrapper"> 
	  
	     
    <script language="Javascript" type="text/javascript">

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }

    </script>


   <div id="footer"> <h2 style="text-align:center;padding-top:30px;">&copy; 2016 by South Asian Handicrafts</h2>
   </div>
   </div>
</body>
</html>


<?php
if(isset($_POST['placeorder'])){
global $con;
$ip = getIp();
$Cart_Qry = "select * from cart where ip_add='$ip'";
$Cart_Qry_Run = mysqli_query($con,$Cart_Qry);
while($Cart_Res_Qry=mysqli_fetch_array($Cart_Qry_Run)){
$Cart_Prod_Id= $Cart_Res_Qry['p_id'];
$Cart_Qty=$Cart_Res_Qry['qty'];	
$Cart_Price=$Cart_Res_Qry['price'];
$Prod_Sel_Qry = "select * from products where product_id='$Cart_Prod_Id'";
$Prod_Sel_Run=mysqli_query($con,$Prod_Sel_Qry);
while($Prod_Qry_Res = mysqli_fetch_array($Prod_Sel_Run)){
$product_price= array($Prod_Qry_Res['product_price']);
$product_title = $Prod_Qry_Res['product_title'];
$product_image = $Prod_Qry_Res['product_image'];
$single_price = $Prod_Qry_Res['product_price'];
$values=$single_price*$Cart_Qty; 
    

  $Ord_F_name = $_POST['Fname'];
  $Ord_L_Name = $_POST['Lname'];
  $Ord_Addr_1 = $_POST['Street1'];
  $Ord_Addr_2 = $_POST['Street2'];
  $Ord_City = $_POST['city'];
  $Ord_State = $_POST['state'];
  $Ord_Zip = $_POST['zip'];
  $Ord_Email=$_SESSION['customer_email'];

  $Ord_Insert = "insert into Orders(Ip,Prod_Id,Email,First_Name,Last_Name,Address_Line_1,Address_Line_2,City,State,Zip,Product_Title,Quantity,Price) values('$ip','$Cart_Prod_Id','$Ord_Email','$Ord_F_name','$Ord_L_Name','$Ord_Addr_1','$Ord_Addr_2','$Ord_City','$Ord_State','$Ord_Zip','$product_title','$Cart_Qty','$values')";
$Ord_Exe = mysqli_query($con,$Ord_Insert);

}
}
echo "<script>window.open('OrderConfirmation.php','_self')</script>";
	   }

?>

<?php } ?>






