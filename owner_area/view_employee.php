<?php
session_save_path("/home/ellankis1/logs/logs1");
session_start();
if(!isset($_SESSION['owner_name'])){
echo "<script>window.open('owner_login.php? not_owner = You are not an owner.','_self')</script>";
}
else
{
?>

<table width="795" align="center" bgcolor="white">

<tr align="center">
<td colspan="6"><h2>Employees</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Name</th>
<th>Email</th>
<th>Employee Contact</th>
<th>Delete</th>
</tr>
<?php
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
$Emp_Inf_Qry ="select * from employee";
$Emp_Inf_Run = mysqli_query($con, $Emp_Inf_Qry);
$i = 0;
while($Emp_Qry_Res=mysqli_fetch_array($Emp_Inf_Run)){
$Emp_Inf_Id = $Emp_Qry_Res['employee_id'];
$Emp_Inf_Name = $Emp_Qry_Res['employee_name'];
$Emp_Inf_Email = $Emp_Qry_Res['employee_email'];
$Emp_Inf_Cont = $Emp_Qry_Res['employee_contact'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $Emp_Inf_Name;?></td>
<td><?php echo $Emp_Inf_Email;?></td>
<td><?php echo $Emp_Inf_Cont;?></td>
<td><a href="delete_employee.php?delete_employee=<?php echo $Emp_Inf_Id; ?>">Delete</a></td>

</tr>

<?php } ?>
</table>
<?php } ?>