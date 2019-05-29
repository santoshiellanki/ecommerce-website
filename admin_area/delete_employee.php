<?php
session_save_path("/home/ellankis1/logs/logs2");
session_start();
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else
{

if(isset($_GET['delete_employee'])){
$Del_Emp_Id = $_GET['delete_employee'];
$Del_Emp_Inf = "delete from employee where employee_id ='$Del_Emp_Id'";
$Del_Emp_Qry = mysqli_query($con,$Del_Emp_Inf);
if($Del_Emp_Qry)
{
echo "<script>alert('The Employee has been deleted')</script>";
echo"<script>window.open('index.php?view_employee','_self')</script>";
}
}
?>
<?php }?>





