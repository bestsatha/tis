<meta charset="utf-8">
<?php 
if(isset($_SESSION['driver_name'])) {
} else {
echo "<script>";
echo "window.location='login.php'";
echo "</script>";
exit();
};
?>