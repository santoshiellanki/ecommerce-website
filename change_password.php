<?php
session_save_path("/home/ellankis1/logs");
session_start();
?>
<h2 style="text-align:center;">Change Your Password</h2>
<form action="" method="post">
 <b> Enter Current Password:</b><input type="password" name="current_password"><br>
<b> Enter New Password:</b><input type="password" name="new_password"><br>
 <b>Enter New Password again:</b><input type="password" name="new_password_again">
<input type="submit" name="change_password" value="change password"/>
</form>
<?php
include("includes/db.php");
if(isset($_POST['change_password']))
{
$user = $_SESSION['customer_email'];

 $current_password = $_POST['current_password'];
 $current_password = md5($current_password);
 $new_password = $_POST['new_password'];
 $new_password = md5($new_password);
 $new_again = $_POST['new_password_again'];
  $new_again = md5($new_again);
 $sel_password = "select * from customers where customer_pass='$current_password' AND customer_email='$user'";
$run_password = mysqli_query($con,$sel_password);
 $check_password = mysqli_num_rows($run_password);
 if($check_password ==0)
 {
 echo "<script>alert('Your current password is wrong')</script>";
 exit();
 }
 if($new_password =! $new_again){
 
 echo "<script>alert('New Password donot match')</script>";
 exit();
 }
 else
 {
 $update_password = "update customers set customer_pass='$new_again'where customer_email='$user'";
 echo $update_password;
 $run_update = mysqli_query($con,$update_password);
 echo "<script>alert('Your password was updated sucessfully')</script>";
 }
}
?>