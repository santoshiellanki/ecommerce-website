<?php
session_save_path("/home/ellankis1/logs");
session_start();
include("functions/functions.php");
if(!isset($_SESSION['customer_email'])){
echo "<script>window.open('customer_login.php? not_customer = You are not a customer.','_self')</script>";
}
else
{
?>
<!DOCTYPE>
<html>
    <head> 
    
        <title> South Asian Handicrafts </title>
	<link rel="stylesheet" href="styles/style1.css" media="all"> 
	<style>
	.icons{height:30px;width:80px}
	
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
	   
	   <?php
	   if(isset($_GET['edit_account'])){
	   include("edit_account.php");
	   
	   }
	   ?>
	   <?php
	   if(isset($_GET['change_password'])){
	   include("change_password.php");
	   
	   }
	   ?>
	   <?php
	   if(isset($_GET['delete_account'])){
	   include("delete_account.php");
	   
	   }
	   ?>
	   
	   
	   </div>
	   </div>
	  
	  
	   
	   <div id="sidebar">
		   
		   
		   <ul id="cats">
			        <li><a href="MyAccount.php?edit_account">Edit Account</a></li>
			        <li><a href="MyAccount.php?change_password">Change Password</a></li>
			        <li><a href="MyAccount.php?delete_account">Delete Account</a></li>
				   
			   </ul>
			  
			   
			   
		</div>   
	   	
	  
</div>

   <div id="footer"> <h2 style="text-align:center">&copy; 2016 by South Asian Handicrafts</h2>
   </div>

  </div>
</div>

</body>
</html>
 <?php } ?>