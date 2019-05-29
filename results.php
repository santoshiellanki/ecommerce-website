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
	   <div id="products_box">
	   <?php
	   if(isset($_GET['search'])){
	   $Search_Prods_Qry = $_GET['user_query'];
	  
	   $get_pro = "select * from products where product_keywords like '%$Search_Prods_Qry%'";
$Prod_Srch_Qry = mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($Prod_Srch_Qry)){

$Prod_Srch_Id = $row_pro['product_id'];
$Prod_Srch_Cat = $row_pro['product_cat'];
$Prod_Srch_Title = $row_pro['product_title'];
$Prod_Srch_Price = $row_pro['product_price'];
$Prod_Srch_Img = $row_pro['product_image'];

echo"
   <div id='single_product'>
   <h3>$Prod_Srch_Title</h3>
   <img src='admin_area/product_images/$Prod_Srch_Img' width='180' height='180'/>
   <p><b> $ $Prod_Srch_Price</b></p>
   <a href='details.php?pro_id=$Prod_Srch_Id' style='float:left;'>Details</a>
   <a href='index.php?pro_id=$Prod_Srch_Id'><button style='float:right'>Add to Cart</button></a>
   </div>
   ";

}
}
?>
	   
	   </div>
	   </div>
	  
	  
	   
	   <div id="sidebar">
		   <div id="sidebar_title">Categories</div>
		   
		   <ul id="cats">
			        <?php getCats();?>
			        
				   
			   </ul>
			   
			   
		</div>   
	   	
	  
</div>

   <div id="footer"> <h2 style="text-align:center;padding-top:30px;">&copy; 2016 by South Asian Handicrafts</h2>
   </div>

  </div>
</div>
</body>
</html>
<?php } ?>