<?php
session_start();
session_destroy();
echo "<script>localStorage.clear();</script>";
echo "<script>window.location.href='signin.php';</script>";
exit();
?>