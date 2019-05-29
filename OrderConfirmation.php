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

  
   <div class="content_wrapper"> 
	   <div id="content_area">
	   
	   <?php $ip=getIp(); ?>
	   <h3> Your order Details</h3>
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
$total=0;
global $con;
$ip = getIp();
$sel_price = "select * from cart where ip_add='$ip'";
$run_price = mysqli_query($con,$sel_price);
//$itemnumber = 1;
while($p_price=mysqli_fetch_array($run_price)){
$pro_id= $p_price['p_id'];
$qty=$p_price['qty'];	
$price=$p_price['price'];
if($price==0)
{
continue;
}
$pro_price = "select * from products where product_id='$pro_id'";
$run_pro_price=mysqli_query($con,$pro_price);
while($pp_price = mysqli_fetch_array($run_pro_price)){
$product_price= array($pp_price['product_price']);
$product_title = $pp_price['product_title'];
$product_image = $pp_price['product_image'];
$single_price = $pp_price['product_price'];
$values=$single_price*$qty; 
    
$total += $values;
}	
   	      
	 ?> 
	 <tr align="center">
	 
	 <td><?php echo $product_title; ?><br>
	 <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
	 </td>
	 <td><?php echo $qty;?></td>
	     <td><?php echo "$". $single_price; ?></td>
	    <td><?php echo "$". $values; ?></td>
	      </tr>
	      
	  
	      <?php } ?>
	      <tr align="right">
	      <td colspan="4"><b> Sub Total:</b>
	     
	     <td><?php echo"$" . $total; ?></td>
	      </tr>
	      <?php
global $con;
$ip = getIp();
$Cart_Del_Qry = "delete from cart where ip_add='$ip'";
$Cart_Del_Run = mysqli_query($con,$Cart_Del_Qry);
?>
	      
	      <tr align="center">
	      
	      <td><input type="submit" name="continue" value="Continue Shopping"/></td>
	      
	      
	      
	      </tr>	      	      
	      </table>
	   
	   
	   </form>
	   </form>
	   

	   <?php

	   if(isset($_POST['continue'])){
	   
	    echo "<script>window.open('index.php','_self')</script>";
	   }
	   
	   
	   ?>
	   
	   
	   
	   </div>
	   <div id="Msg">
	   <h4>Thank You For Shopping With Us!</h4>
	   </div>
	   </div>
	  

   <div id="footer"> <h2 style="text-align:center;padding-top:30px;">&copy; 2016 by South Asian Handicrafts</h2>
   </div>

  </div>
</div>
</body>
</html>
<?php } ?>