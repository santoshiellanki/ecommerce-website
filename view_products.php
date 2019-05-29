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
<td colspan="6"><h2>Products</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Title</th>
<th>Image</th>
<th>Price</th>
<th>Quantity</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
$Prod_Inf_Qry ="select * from products";
$Prod_Inf_Run = mysqli_query($con, $Prod_Inf_Qry);
$i = 0;
while($row_pro=mysqli_fetch_array($Prod_Inf_Run)){
$Prod_Inf_Id = $row_pro['product_id'];
$Prod_Inf_Title = $row_pro['product_title'];
$Prod_Inf_Img = $row_pro['product_image'];
$Prod_Inf_Price = $row_pro['product_price'];
$Prod_Inf_Qty = $row_pro['product_quantity'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $Prod_Inf_Title;?></td>
<td><img src="product_images/<?php echo $Prod_Inf_Img;?>"width="60" height="60"/></td>
<td><?php echo "$".$Prod_Inf_Price;?></td>
<td><?php echo $Prod_Inf_Qty;?></td>
<td><a href="index.php?edit_pro=<?php echo $Prod_Inf_Id; ?>">Edit</a></td>
<td><a href="delete_pro.php?delete_pro=<?php echo $Prod_Inf_Id; ?>">Delete</a></td>

</tr>
<?php } ?>

</table>
<?php } ?>