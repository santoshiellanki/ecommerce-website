<!DOCTYPE>
<?php
session_save_path("/home/ellankis1/logs/logs2");
session_start();
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else
{
include("includes/db.php");
if(isset($_GET['edit_pro'])){
 $Get_Prod_Id = $_GET['edit_pro'];
 $Get_Prod_Query ="select * from products where product_id='$Get_Prod_Id'";
$Run_Qry_Pro = mysqli_query($con, $Get_Prod_Query);
$i = 0;
$Prod_Qry_Rtrn=mysqli_fetch_array($Run_Qry_Pro);
$Prod_Id_info = $Prod_Qry_Rtrn['product_id'];
$Prod_Title_Info = $Prod_Qry_Rtrn['product_title'];
$Prod_Img_Info = $Prod_Qry_Rtrn['product_image'];
$prod_Price_Info = $Prod_Qry_Rtrn['product_price'];
$Prod_Desc_Info = $Prod_Qry_Rtrn['product_desc'];
$Prod_Key_Info = $Prod_Qry_Rtrn['product_keywords'];
$Prod_Qty_Info=$Prod_Qry_Rtrn['product_quantity'];
$Prod_Cat_Info = $Prod_Qry_Rtrn['product_cat'];
$Prod_Cat_Qry = "select * from categories where cat_id='$Prod_Cat_Info'";
$Prod_Cat_Run=mysqli_query($con,$Prod_Cat_Qry);
$Prod_Cat_Res=mysqli_fetch_array($Prod_Cat_Run);
$Prod_Cat_Title = $Prod_Cat_Res['cat_title'];


}	
?>
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
				  <td><input type="text" name="product_title" size="60" placeholder="required" value="<?php echo $Prod_Title_Info; ?>"/></td>
			  </tr> 
			  <tr>
				  <td align="right"><b> Product Category:</b></td>
				  <td>
					  <select name="product_cat">
						  <option><?php echo $Prod_Cat_Title; ?></option>
						  <?php
					  	$Cat_Info_Qry = "select * from categories";
					  	$Cat_Info_Run = mysqli_query($con, $Cat_Info_Qry);
					  	while ($Cat_Qry_Ret=mysqli_fetch_array($Cat_Info_Run)){
					  		$cat_id = $Cat_Qry_Ret{'cat_id'};
					  		$cat_title = $Cat_Qry_Ret{'cat_title'};
		
					  		echo "<option value='$cat_id'>$cat_title</option>";	
					  	}	
							
							
						  ?>
					  </select>
					  </td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Image:</b></td>
				  <td><input type="file"  name="product_image"/> <img src="product_images/<?php echo $Prod_Img_Info; ?>" width="60" height="60"/></td>
			  </tr>
<tr>
				  <td align="right"> <b>Product Price:</b></td>
				  <td><input type="text" name="product_price" value="<?php echo $prod_Price_Info; ?>"/></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Description:</b></td>
				  <td><textarea name="product_desc"  cols="20" rows="10"><?php echo $Prod_Desc_Info; ?></textarea></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Keywords:</b></td>
				  <td><input type="text" name="product_keywords" value="<?php echo $Prod_Key_Info; ?>" size="50"/></td>
			  </tr>
			  <tr>
			          <td align="right"><b> Product Quantity:</b></td>
			          <td><input type="text" name="product_quantity" value="<?php echo $Prod_Qty_Info; ?>" /></td>
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
    $update_id = $Prod_Id_info;
     $Prod_Updt_Title =$_POST['product_title'];
     $Prod_Updt_Cat = $_POST['product_cat'];
     $Prod_Updt_Price = $_POST['product_price'];
     $Prod_Updt_Desc = $_POST['product_desc'];
     $Prod_Updt_Key = $_POST['product_keywords'];
     $Prod_Updt_Qnty = $_POST['product_quantity'];
   
    $Prod_Updt_Img = $_FILES['product_image']['name'];
    if($Prod_Updt_Img=="")
    {
    $Prod_Upld_Img=$Prod_Img_Info;
    }
    else
    {
    $Prod_Upld_Img=$Prod_Updt_Img;
    }
    
    $Prod_Img_Tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($Prod_Img_Tmp,"product_images/$Prod_Upld_Img");
   
   $update_product = "update products set product_cat='$Prod_Updt_Cat',product_title='$Prod_Updt_Title',product_price='$Prod_Updt_Price',product_desc='$Prod_Updt_Desc',product_image='$Prod_Upld_Img',product_keywords='$Prod_Updt_Key' ,product_quantity='$Prod_Updt_Qnty' where product_id='$update_id'";
  
  $run_product = mysqli_query($con,$update_product);
   
   if($run_product)
   {
   echo "<script>alert('product has been updated')</script>";
   echo "<script>window.open('index.php?view_products','_self')</script>";
}   

}
?>
<?php } ?>