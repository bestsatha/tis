<?php
session_start();
if(isset($_POST['username'])){
include("admin/config/condb.php");
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * FROM tb_driver WHERE username='".$username. "' AND password='".$password."' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_array($result);
$_SESSION["driver_id"]=$row["driver_id"];
$_SESSION["driver_prefix"]=$row["driver_prefix"];
$_SESSION["driver_name"]=$row["driver_name"];
$_SESSION["driver_surname"]=$row["driver_surname"];
$_SESSION["position"]=$row["position"];
$_SESSION["driver_images"]=$row["driver_images"];
$_SESSION["username"]=$row["username"];
$_SESSION["password"]=$row["password"];
$_SESSION["level"]=$row["level"];
}
if($_SESSION['level']=="admin"){
    Header("Location:menuadmin.php");
}
if($_SESSION['level']=="user"){
    Header("Location:menuuser.php");   
} else {
    echo"<script>";
    echo"alert(\"ชื่อผู้ใช้งาน หรือรหัสไม่ถูกต้อง\")";
    echo "window.history.back()";
    Header("Location:login.php");
    echo"</script>";
}
}else{
    Header("Location:login.php");
}
?>