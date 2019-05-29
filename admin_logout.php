<?php
session_save_path("/home/ellankis1/logs/logs2");
session_start();
session_destroy();

echo"<script>window.open('../Home.php?logged_out= You have logged out.','_self')</script>";



?>