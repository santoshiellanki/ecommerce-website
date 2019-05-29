<?php

session_save_path("/home/ellankis1/logs");
session_start();

session_destroy();

echo"<script>window.open('Home.php?','_self')</script>";





?>