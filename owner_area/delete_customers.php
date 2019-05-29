<?php
session_save_path("/home/ellankis1/logs/logs1");
session_start();
var_dump($_SESSION['owner_name']);
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
if(isset($_GET['delete_customers'])){
$Del_Cust_Id = $_GET['delete_customers'];

$Del_Cust_Info = "delete from customers where customer_id ='$Del_Cust_Id'";
$Del_Cust_Qry = mysqli_query($con,$Del_Cust_Info);
if($Del_Cust_Qry)
{
echo "<script>alert('The Customer has been deleted')</script>";
echo"<script>window.open('index.php?view_customers','_self')</script>";
}
}
?>
<? } ?>