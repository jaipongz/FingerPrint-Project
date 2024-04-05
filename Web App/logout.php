<?php
session_start();
unset ( $_SESSION['UserID'] );
unset ( $_SESSION['Status'] );
session_destroy();
header("location:index.php");
?>