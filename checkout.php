<?php
session_save_path("/home/ellankis1/logs");
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
		
		<link rel="stylesheet" href="styles/style.css" media="all"> 
    </head>
<body>

  <div class="main_wrapper">
     <div class="header_wrapper"> 
       <img id="image2"src="shopping-in-rajasthan.jpg" width="1000" height="500"/> 
	 
	</div> 
    <div class="menubar"> 
		<ul id="menu">
			<li><a href="#">Home</a></li>
			<li><a href="#"> MyAccount</a></li>
			<li><a href="#">Signup</a></li>
			<li><a href="#">ShoppingCart</a></li>
			<li><a href="#">Contactus</a></li>
		</ul>
	
	<div id="form">
		<form method="get" action:"results.php" enctype="multipart/form-data">
			<input type="text" name="user_query" placeholder="Search a Product"/>
			<input type="submit" name="search" value="Search"/>
		</form>
		
	</div>
	</div>

  
   <div class="content_wrapper"> 
	   <div id="content_area">
	   <?php cart(); ?>
	   <div id="shopping_cart">
	    <span style="float:right"; font-size:18px; padding:6px;line-height:30px;>
	    Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> - Total Price:<?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to cart</a>
	    
	    
	    </span>
	   </div>
	   <?php $ip=getIp(); ?>
	   <div id="products_box">
	   
	   
	    <?php
	    if(!isset($_SESSION['customer_email'])){
	     include("customer_login.php");
	    
	    }
	    else
	    {
	    include("payment.php");
	    
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