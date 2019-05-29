<?php
session_save_path("/home/ellankis1/logs/logs2");
session_start();
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else
{
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}

 
 if(isset($_GET['delete_pro'])){
 
 $Del_Pro_Id = $_GET['delete_pro'];
 $Del_Pro_Inf = "delete from products where product_id='$Del_Pro_Id'";
 $Del_Pro_Qry = mysqli_query($con,$Del_Pro_Inf);
  if($Del_Pro_Qry)
  {
  echo "<script>alert('A product has been deleted')</script>";
  echo "<script>window.open('index.php?view_products','_self')</script>";
  }
 
 
 
 }

?>
<?php } ?>