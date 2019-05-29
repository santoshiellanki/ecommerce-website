<?php

session_save_path("/home/ellankis1/logs/logs1");
session_start();

if(!isset($_SESSION['owner_name'])){
echo "<script>window.open('owner_login.php? not_owner = You are not an owner.','_self')</script>";
}
else
{

$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}

 
 if(isset($_GET['delete_pro'])){
 
 $Prod_Del_Id_id = $_GET['delete_pro'];
 $Prod_Del_Qry = "delete from products where product_id='$Prod_Del_Id_id'";
 $Prod_Del_Run = mysqli_query($con,$Prod_Del_Qry);
  if($Prod_Del_Run)
  {
  echo "<script>alert('A product has been deleted')</script>";
  echo "<script>window.open('index.php?view_products','_self')</script>";
  }
 
 
 
 }

?>
<?php } ?>