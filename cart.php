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
    <style>
    #Stock{color:red;}
    </style>
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
	   <h3>Your Items</h3></p>
	   <div id="products_box">
	   <form action="" method="post" enctype="multipart/form-data">
	     <table align="center" width="700" bgcolor="white">
	      
	      <tr align="center">
	      <th>Remove</th>
	      <th>Product(s)</th>
	      <th>Quantity</th>
	      <th>Price</th>
	      <th>Total Price</th>
	      </tr>
	      
	      
<?php
$Price_Prods_Total=0;
global $con;
$ip = getIp();
$Cart_Qry = "select * from cart where ip_add='$ip'";
$Cart_Qry_Run= mysqli_query($con,$Cart_Qry);
while($Cart_Res=mysqli_fetch_array($Cart_Qry_Run)){
$Product_Id= $Cart_Res['p_id'];
$Prod_Qty=$Cart_Res['qty'];

if(isset($_POST['update_cart']))
{  
$Prod_Qty = $_POST[$Product_Id];
$Qty_Updt_Cart="update cart set qty='$Prod_Qty' WHERE p_id = '$Product_Id'";  
$Qty_Updt_Run=mysqli_query($con, $Qty_Updt_Cart);      
}	

$Pod_Sel_Qry = "select * from products where product_id='$Product_Id'";
$Pod_Sel_Run=mysqli_query($con,$Pod_Sel_Qry);
while($Prod_Sl_Res = mysqli_fetch_array($Pod_Sel_Run)){
$product_price= array($Prod_Sl_Res['product_price']);
$product_title = $Prod_Sl_Res['product_title'];
$product_image = $Prod_Sl_Res['product_image'];
$product_quantity=$Prod_Sl_Res['product_quantity'];
$Qty_Chk=$product_quantity - $Prod_Qty;
if($Qty_Chk>=0)
{
$Product_Sing_Price = $Prod_Sl_Res['product_price'];
}
else
{
$Product_Sing_Price=0;
echo "<h4 id='Stock'>$product_title Out of Stock</h4>";
}

$Qty_Price_Updt=$Product_Sing_Price*$Prod_Qty; 

$up_price = "update cart set price=$Qty_Price_Updt where p_id='$Product_Id'";
$rn_price = mysqli_query($con,$up_price);
    
$Price_Prods_Total += $Qty_Price_Updt;
}	
   	      
	 ?> 
	 <tr align="center">
	 <td><input type="checkbox" name="remove[]" value="<?php echo $Product_Id;?>"/></td>
	 <td><?php echo $product_title; ?><br>
	 <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
	 </td>
	 <td><input type ='text' size="4" name ="<?php echo $Product_Id;?>" value="<?php echo $Prod_Qty;?>"/></td>
	     <td><?php echo "$". $Product_Sing_Price; ?></td>
	    <td><?php echo "$". $Qty_Price_Updt; ?></td>
	      </tr>
	      
	  
	      <?php } ?>
	      <tr align="right">
	      <td colspan="4"><b> Sub Total:</b>
	     
	     <td><?php echo"$" . $Price_Prods_Total; ?></td>
	      </tr>
	      
	      <tr align="center">
	      <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
	      <td><input type="submit" name="continue" value="Continue Shopping"/></td>
	      <td><button><a href="Buy.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
	      
	      </tr>	      	      
	      </table>
	   
	   
	   </form>
	   </form>
	   
	   <?php
	   function updatecart(){
            global $con;
            
	   $ip = getIp();
	  
	    if(isset($_POST['update_cart'])){
	     foreach($_POST['remove'] as $remove_id){
	     
	     $Del_Prods_Cart = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
	     $Del_Cart_Run = mysqli_query($con,$Del_Prods_Cart);
	     if($Del_Cart_Run){
	     echo "<script>window.open('cart.php','_self')</script>";
	     }
	     
	     }
	     }
	     
	    }
	   if(isset($_POST['continue'])){
	   
	    echo "<script>window.open('index.php','_self')</script>";
	   }
	   echo @$up_cart = updatecart();
	   
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