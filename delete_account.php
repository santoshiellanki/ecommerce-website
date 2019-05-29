<?php
session_save_path("/home/ellankis1/logs");
session_start();
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
if(isset($_GET['delete_account'])){
$user = $_SESSION['customer_email'];
//$Del_Acc_Id = $_GET['delete_account'];
$Del_Acc_Inf = "delete from customers where customer_email ='$user'";
$Del_Acc_Qry = mysqli_query($con,$Del_Acc_Inf);
if($Del_Acc_Qry)
{
echo "<script>alert('The Customer has been deleted')</script>";
echo"<script>window.open('Home.php?','_self')</script>";
}
}
?>




