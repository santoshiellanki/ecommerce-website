<?php
session_save_path("/home/ellankis1/logs/logs3");
session_start();
if(!isset($_SESSION['employee_name'])){
echo "<script>window.open('employee_login.php? not_employee = You are not an employee.','_self')</script>";
}
else
{
?>

<table width="795" align="center" bgcolor="white">

<tr align="center">
<td colspan="6"><h2>Orders</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>ip</th>
<th>Prod_id</th>
<th>Email</th>
<th>First_Name</th>
<th>Last_Name</th>
<th>Address_Line_1</th>
<th>Address_Line_2</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Prooduct_Title</th>
<th>Quantity</th>
<th>Price</th>
</tr>
<?php
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
$Order_Inf_Qry ="select * from Orders";
$Order_Inf_Run = mysqli_query($con, $Order_Inf_Qry);
$i = 0;
while($Order_Inf_Rel=mysqli_fetch_array($Order_Inf_Run)){
$Order_Inf_ip = $Order_Inf_Rel['Ip'];
$Order_Inf_prodid = $Order_Inf_Rel['Prod_id'];
$Order_Inf_Email = $Order_Inf_Rel['Email'];
$Order_Inf_Firstname = $Order_Inf_Rel['First_Name'];
$Order_Inf_Lastname = $Order_Inf_Rel['Last_Name'];
$Order_Inf_addressline1 = $Order_Inf_Rel['Address_Line_1'];
$Order_Inf_addressline2 = $Order_Inf_Rel['Address_Line_2'];
$Order_Inf_City = $Order_Inf_Rel['City'];
$Order_Inf_State = $Order_Inf_Rel['State'];
$Order_Inf_Zip = $Order_Inf_Rel['Zip'];
$Order_Inf_Producttitle = $Prod_Inf_Rel['Product_Title'];
$Order_Inf_Quantity = $Order_Inf_Rel['Quantity'];
$Order_Inf_Price = $Order_Inf_Rel['Price'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $Order_Inf_ip;?></td>
<td><?php echo $Order_Inf_prodid;?></td>
<td><?php echo $Order_Inf_Email;?></td>
<td><?php echo $Order_Inf_Firstname;?></td>
<td><?php echo $Order_Inf_Lastname;?></td>
<td><?php echo $Order_Inf_addressline1;?></td>
<td><?php echo $Order_Inf_addressline2;?></td>
<td><?php echo $Order_Inf_City;?></td>
<td><?php echo $Order_Inf_State;?></td>
<td><?php echo $Order_Inf_Zip;?></td>
<td><?php echo $Order_Inf_Producttitle;?></td>
<td><?php echo $Order_Inf_Quantity;?></td>
<td><?php echo "$".$Order_Inf_Price;?></td>

</tr>
<?php } ?>

</table>
<?php } ?>