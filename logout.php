<?php
session_start();
session_unset();
session_destroy();
echo "Logged out";
header("location:php/index.php");
?>
