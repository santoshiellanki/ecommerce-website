<?php
session_save_path("/home/ellankis1/logs/logs2");
session_start();
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else
{
?>

<table width="795" align="center" bgcolor="white">

<tr align="center">
<td colspan="6"><h2>Customers</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Name</th>
<th>Email</th>
<th>Customer Contact</th>
<th>Delete</th>
</tr>
<?php
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
$Cust_Inf_Qry ="select * from customers";
$Cust_Inf_Run = mysqli_query($con, $Cust_Inf_Qry);
$i = 0;
while($Cust_Qry_Res=mysqli_fetch_array($Cust_Inf_Run)){
$Cust_Inf_Id = $Cust_Qry_Res['customer_id'];
$Cust_Inf_Name = $Cust_Qry_Res['customer_name'];
$Cust_Inf_Email = $Cust_Qry_Res['customer_email'];
$Cust_Inf_Cont = $Cust_Qry_Res['customer_contact'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $Cust_Inf_Name;?></td>
<td><?php echo $Cust_Inf_Email;?></td>
<td><?php echo $Cust_Inf_Cont;?></td>
<td><a href="delete_customers.php?delete_customers=<?php echo $Cust_Inf_Id; ?>">Delete</a></td>

</tr>
<?php } ?>

</table>
<?php } ?>