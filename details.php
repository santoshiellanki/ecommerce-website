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
	   
	   <div id="products_box">	   
<?php
if(isset($_GET['pro_id'])){
$Prod_Inf_Id = $_GET['pro_id'];
	   
$Prod_Inf_Qry="select * from products where product_id='$Prod_Inf_Id'";
$Prod_Inf_Run = mysqli_query($con,$Prod_Inf_Qry);
while($Prod_Inf_Res=mysqli_fetch_array($Prod_Inf_Run)){

$Pro_Sel_Id = $Prod_Inf_Res['product_id'];
$Pro_Sel_Title = $Prod_Inf_Res['product_title'];
$Pro_Sel_Price = $Prod_Inf_Res['product_price'];
$Pro_Sel_Img = $Prod_Inf_Res['product_image'];
$Pro_Sel_Desc = $Prod_Inf_Res['product_desc'];

echo"
   <div id='single_product'>
   <h3>$Pro_Sel_Title</h3>
   <img src='admin_area/product_images/$Pro_Sel_Img' width='400' height='300'/>
   <p><b> $ $Pro_Sel_Price</b></p>
   <p>$Pro_Sel_Desc</p>
   <a href='index.php?pro_id=$Pro_Sel_Id' style='float:left;'>Go Back</a>
   <a href='index.php?pro_id=$Pro_Sel_Id'><button style='float:right'>Add to Cart</button></a>
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
</body>
</html>
<?php } ?>