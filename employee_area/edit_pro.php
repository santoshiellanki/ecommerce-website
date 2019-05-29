<?php
session_save_path("/home/ellankis1/logs/logs3");
session_start();
if(!isset($_SESSION['employee_name'])){
echo "<script>window.open('employee_login.php? not_adminstrator = You are not an employee.','_self')</script>";
}
else
{
$con = mysqli_connect("localhost","ellankis1","Santoshi@123","ellankis_DB_Project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}

if(isset($_GET['edit_pro'])){
 $get_id = $_GET['edit_pro'];
 $get_pro ="select * from products where product_id='$get_id'";
$run_pro = mysqli_query($con, $get_pro);
$i = 0;
$row_pro=mysqli_fetch_array($run_pro);
$pro_id = $row_pro['product_id'];
$pro_title = $row_pro['product_title'];
$pro_image = $row_pro['product_image'];
$pro_price = $row_pro['product_price'];
$pro_desc = $row_pro['product_desc'];
$pro_keywords = $row_pro['product_keywords'];
$pro_quantity=$row_pro['product_quantity'];
$pro_cat = $row_pro['product_cat'];
$get_cat = "select * from categories where cat_id='$pro_cat'";
$run_cat=mysqli_query($con,$get_cat);
$row_cat=mysqli_fetch_array($run_cat);
$category_title = $row_cat['cat_title'];


}	
?>
<!DOCTYPE>
<html>
  <head> 
     <title>Update Product</title>
	 
  </head>
  
  <body bgcolor="white">
      <form action="" method="post" enctype="multipart/form-data">
		  
		  <table align="center" width="795" border="2" bgcolor="white">
			  
			  <tr align="center">
				  <td colspan="7"><h2>Edit & Update Product</h2></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Title:</b></td>
				  <td><input type="text" name="product_title" size="60" placeholder="required" value="<?php echo $pro_title; ?>"/></td>
			  </tr> 
			  <tr>
				  <td align="right"><b> Product Category:</b></td>
				  <td>
					  <select name="product_cat">
						  <option><?php echo $category_title; ?></option>
						  <?php
					  	$get_cats = "select * from categories";
					  	$run_cats = mysqli_query($con, $get_cats);
					  	while ($row_cats=mysqli_fetch_array($run_cats)){
					  		$cat_id = $row_cats{'cat_id'};
					  		$cat_title = $row_cats{'cat_title'};
		
					  		echo "<option value='$cat_id'>$cat_title</option>";	
					  	}	
							
							
						  ?>
					  </select>
					  </td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Image:</b></td>
				  <td><input type="file" name="product_image"/> <img src="../admin_area/product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td
			  </tr>
<tr>
				  <td align="right"> <b>Product Price:</b></td>
				  <td><input type="text" name="product_price" value="<?php echo $pro_price; ?>"/></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Description:</b></td>
				  <td><textarea name="product_desc"  cols="20" rows="10"><?php echo $pro_desc; ?></textarea></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Keywords:</b></td>
				  <td><input type="text" name="product_keywords" value="<?php echo $pro_keywords; ?>" size="50"/></td>
			  </tr>
			  <tr>
			          <td align="right"><b> Product Quantity:</b></td>
			          <td><input type="text" name="product_quantity" value="<?php echo $pro_quantity; ?>" /></td>
			  </tr>
			  <tr align="center">
				  <td colspan="7"><input type="submit" name="update_product" value="Update Product"/></td>
			  </tr>
		  </table>
		  
		  
		 
	  </form>
	    </body> 
</html> 
<?php

    if(isset($_POST['update_product'])){
    $update_id = $pro_id;
     $product_title =$_POST['product_title'];
     $product_cat = $_POST['product_cat'];
     $product_price = $_POST['product_price'];
     $product_desc = $_POST['product_desc'];
     $product_keywords = $_POST['product_keywords'];
     $product_quantity = $_POST['product_quantity'];
   
    $product_image = $_FILES['product_image']['name'];
    if($product_image=="")
    {
    $product_image1=$pro_image;
    }
    else
    {
    $product_image1=$product_image;
    }
    
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($product_image_tmp,"product_images/$product_image");
   
   $update_product = "update products set product_cat='$product_cat',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image1',product_keywords='$product_keywords' ,product_quantity='$product_quantity' where product_id='$update_id'";
  
  $run_product = mysqli_query($con,$update_product);
   
   if($run_product)
   {
   echo "<script>alert('product has been updated')</script>";
   echo "<script>window.open('index.php?view_products','_self')</script>";
}   

}
?>
<?php } ?>