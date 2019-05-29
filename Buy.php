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
		
		<link rel="stylesheet" href="styles/style1.css"> 
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
  
   <div class="content_wrapper"> 
	   <div id="content_area">
	   
	   <?php $ip=getIp(); ?>
	   <h3>Your Final Shipping Items</h3>
	   <div id="products_box">
	   <form action="" method="post" enctype="multipart/form-data">
	     <table align="center" width="700" bgcolor="white">
	      
	      <tr align="center">
	      <th>Product(s)</th>
	      <th>Quantity</th>
	      <th>Price</th>
	      <th>Total Price</th>
	      </tr>
	      
	      
<?php
$Prods_Total_Price=0;
global $con;
$ip = getIp();
$Cart_Sel_Qry = "select * from cart where ip_add='$ip'";
$Cart_Run = mysqli_query($con,$Cart_Sel_Qry);
//$itemnumber = 1;
while($Cart_Qry_Res=mysqli_fetch_array($Cart_Run)){
$Cart_Prod_Id= $Cart_Qry_Res['p_id'];
$Cart_Qty=$Cart_Qry_Res['qty'];	
$Cart_Prod_Price=$Cart_Qry_Res['price'];
if($Cart_Prod_Price==0)
{
continue;
}
$Prod_Sel_Qry = "select * from products where product_id='$Cart_Prod_Id'";
$Prod_Sel_Run=mysqli_query($con,$Prod_Sel_Qry);
while($Prod_Sel_Res = mysqli_fetch_array($Prod_Sel_Run)){
$product_price= array($Prod_Sel_Res['product_price']);
$product_title = $Prod_Sel_Res['product_title'];
$product_image = $Prod_Sel_Res['product_image'];
$Prod_Sing_Price = $Prod_Sel_Res['product_price'];
$Prod_Updt_Price=$Prod_Sing_Price*$Cart_Qty; 
    
$Prods_Total_Price += $Prod_Updt_Price;
}	
   	      
	 ?> 
	 <tr align="center">
	 
	 <td><?php echo $product_title; ?><br>
	 <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
	 </td>
	 <td><?php echo $Cart_Qty;?></td>
	     <td><?php echo "$". $Prod_Sing_Price; ?></td>
	    <td><?php echo "$". $Prod_Updt_Price; ?></td>
	      </tr>
	      
	  
	      <?php } ?>
	      <tr align="right">
	      <td colspan="4"><b> Sub Total:</b>
	     
	     <td><?php echo"$" . $Prods_Total_Price; ?></td>
	      </tr>
	      
	      <tr align="center">
	      
	      <td><input type="submit" name="continue" value="Continue Shopping"/></td>
	      <td><input type="submit" name="Paynow" value="Pay Now"/></td>
	      
	      
	      </tr>	      	      
	      </table>
	   
	   
	   </form>
	   </form>
	   
	   <?php
	   if(isset($_POST['Paynow'])){
	      
$ip_add = getIp();
$sl_price = "select * from cart where ip_add='$ip_add'";
$rn_price = mysqli_query($con,$sl_price);
//$itemnumber = 1;
while($p_p=mysqli_fetch_array($rn_price)){
$pr_id= $p_p['p_id'];
$qt=$p_p['qty'];	
$pr=$Cart_Qry_Res['price'];
if($pr==0)
{
continue;
}
$pr_price = "select * from products where product_id='$pr_id'";
$rn_pro_price=mysqli_query($con,$pr_price);
while($pp_pp = mysqli_fetch_array($rn_pro_price)){
$prod_price= array($pp_pp['product_price']);
$prod_title = $pp_pp['product_title'];
$prod_Qty = $pp_pp['product_quantity'];
$Updt_qty=$prod_Qty - $qt;

$Updt_Qty = "update products set product_quantity='$Updt_qty' where product_id='$pr_id'";
$r_pro_price=mysqli_query($con,$Updt_Qty);

   
	   }
	   }
	   echo "<script>window.open('Confirmation.php','_self')</script>";
	   }
	   ?>
	   
	   <?php

	   if(isset($_POST['continue'])){
	   
	    echo "<script>window.open('index.php','_self')</script>";
	   }
	   
	   
	   ?>
	   
	   
	   
	   </div>
	   </div>
	  
	   
	   		  
</div>

   <div id="footer"> <h2 style="text-align:center;padding-top:30px;">&copy; 2016 by South Asian Handicrafts</h2>
   </div>

  </div>
</div>
</body>
</html>
<?php } ?>