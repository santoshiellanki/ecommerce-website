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
<td colspan="6"><h2>Administrator</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Name</th>
<th>Email</th>
<th>Administrator Contact</th>
<th>Delete</th>
</tr>
<?php
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
$Admin_Inf_Qry ="select * from administrator";
$Admin_Inf_Run = mysqli_query($con, $Admin_Inf_Qry);
$i = 0;
while($Admin_Qry_Res=mysqli_fetch_array($Admin_Inf_Run)){
$Admin_Inf_Id = $Admin_Qry_Res['admin_id'];
$Admin_Inf_Name = $Admin_Qry_Res['admin_name'];
$Admin_Inf_Email = $Admin_Qry_Res['admin_email'];
$Admin_Inf_Cont = $Admin_Qry_Res['admin_contact'];
$i++;
 
?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $Admin_Inf_Name;?></td>
<td><?php echo $Admin_Inf_Email;?></td>
<td><?php echo $Admin_Inf_Cont;?></td>
<td><a href="delete_admin.php?delete_admin=<?php echo $Admin_Inf_Id; ?>">Delete</a></td>

</tr>
<?php } ?>

</table>
<?php } ?>