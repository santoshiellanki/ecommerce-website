<?php
session_save_path("/home/ellankis1/logs/logs3");
session_start();
if(!isset($_SESSION['employee_name'])){
echo "<script>window.open('employee_login.php? not_employee = You are not an emyployee.','_self'</script>";
}
else
{
?>
<!DOCTYPE>
<html>
 <head>
  <title> This is Employee Panel</title>
  <style>
  .insert{height:100px;width:150px;background-color:"#F4F6F8"}
  .main_wrapper{padding-left:400px;padding-top:20px;}
  #manage{padding-top:8px;padding-right:200px}
  .insert.hover{text-decoration:underline;}
  #logout{padding-top:10px;padding-left:1000px}
  </style>
  
 </head>
 
 <body>
  <div id="logout"><a href="employee_logout.php?">Employee Logout</a></div>
 <h2 id="manage" style="text-align:center;">Manage Content</h2>
 <div class="main_wrapper">
 
 <div id="header"></div>
 <div id="right"> 

 <a href="index.php?insert_product"><Button class="insert">Insert New Product</Button></a>
 <a href="index.php?view_products"><Button class="insert">View Products</Button></a> 
 <a href="index.php?view_orders"><Button class="insert">View Orders</Button></a> 
 </div>

 
 <div id="left">
 <?php
 if(isset($_GET['insert_product'])){
 include("insert_product.php");
 }
 if(isset($_GET['view_products'])){
 include("view_products.php");
 }
 if(isset($_GET['edit_pro'])){
 include("edit_pro.php");
 }
 if(isset($_GET['view_orders'])){
 include("view_orders.php");
 }
 ?>
 
  </div>
 
 </body> 
 </html>
<?php } ?>