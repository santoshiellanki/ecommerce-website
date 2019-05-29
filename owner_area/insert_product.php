<?php
session_save_path("/home/ellankis1/logs/logs1");
session_start();
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
?>
<!DOCTYPE>
<html>
  <head> 
     <title>Inserting Product</title>
	 
  </head>
  
  <body bgcolor="white">
      <form action="insert_product.php" method="post" enctype="multipart/form-data">
		  
		  <table align="center" width="795" border="2" bgcolor="white">
			  
			  <tr align="center">
				  <td colspan="7"><h2>Insert Products Here</h2></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Title:</b></td>
				  <td><input type="text" name="product_title" size="60" placeholder="required" required/></td>
			  </tr> 
			  <tr>
				  <td align="right"><b> Product Category:</b></td>
				  <td>
					  <select name="product_cat">
						  <option>Select a Category</option>
						  <?php
					  	$Cat_Inf_Qry = "select * from categories";
					  	$Cat_Inf_Run = mysqli_query($con, $Cat_Inf_Qry);
					  	while ($Cat_Inf_Reslt=mysqli_fetch_array($Cat_Inf_Run)){
					  		$cat_id = $Cat_Inf_Reslt{'cat_id'};
					  		$cat_title = $Cat_Inf_Reslt{'cat_title'};
		
					  		echo "<option value='$cat_id'>$cat_title</option>";	
					  	}	
							
							
						  ?>
					  </select>
					  </td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Image:</b></td>
				  <td><input type="file" name="product_image"/></td>
			  </tr>
			  <tr>
				  <td align="right"> <b>Product Price:</b></td>
				  <td><input type="text" name="product_price"  placeholder="required"/></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Description:</b></td>
				  <td><textarea name="product_desc"  cols="20" rows="10"></textarea></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Keywords:</b></td>
				  <td><input type="text" name="product_keywords"  placeholder="required" size="50"/></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Quantity:</b></td>
				  <td><input type="text" name="product_quantity"  placeholder="required" size="50"/></td>
			  </tr>
			  <tr align="center">
				  <td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			  </tr>
		  </table>
		  
		  
		 
	  </form>
	    </body> 
</html> 
<?php

    if(isset($_POST['insert_post'])){
     $Prod_Ins_Title =$_POST['product_title'];
     $Prod_Ins_Cat = $_POST['product_cat'];
     $Prod_Ins_Price = $_POST['product_price'];
     $Prod_Ins_Desc = $_POST['product_desc'];
     $Prod_Ins_Key = $_POST['product_keywords'];
     $Prod_Ins_Qty = $_POST['product_quantity'];
    
    $Prod_Ins_Img = $_FILES['product_image']['name'];
    $Prod_Ins_Img_Tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($Prod_Ins_Img_Tmp,"product_images/$Prod_Ins_Img");
   $insert_product ="insert into products  (product_cat,product_title,product_price,product_desc,product_image,product_keywords,product_quantity)
   values('$Prod_Ins_Cat','$Prod_Ins_Title','$Prod_Ins_Price','$Prod_Ins_Desc','$Prod_Ins_Img','$Prod_Ins_Key','$Prod_Ins_Qty')";
  
  $insert_pro = mysqli_query($con,$insert_product);
   
   if($insert_pro)
   {
   echo "<script>alert('product has been inserted')</script>";
   echo "<script>window.open('index.php?insert_product.php','_self')</script>";
}   

}
?>
<?php } ?>

  	 