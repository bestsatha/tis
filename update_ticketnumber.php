<?php
session_start();
include('admin/config/condb.php');
$driver_id = $_SESSION['driver_id'];
$level = $_SESSION['level'];
if($level!='user'){
Header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UnivLiner TIS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <?php include("admin/config/condb.php"); ?>
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php include("menuweb/navbaruser.php");
include("menuweb/sidebaruser.php"); ?>

  <main id="main" class="main">
  <?php include("admin/config/condb.php"); ?>
    <center><h3>อัพเดตเลขตั๋วโดยสาร</h3></center>
    <h4>ตั๋วโดยสารเที่ยวเดียว (แบบพิมพ์)</h4>
    <h5>เลขล่าสุดคือ : <?php  $sql = "SELECT * FROM ticket ORDER BY ticket_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result))
            echo $row['ticket_id'];?></h5>
    <h4>ตั๋วโดยสารเที่ยวเดียว (แบบเขียน)</h4>
    <h5>เลขล่าสุดคือ : <?php  $sql = "SELECT * FROM ticketpaper ORDER BY tp_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result))
            echo $row['tp_id'];?></h5>
                <h4>บัตรโดยสารรายวัน</h4>
    <h5>เลขล่าสุดคือ : 13XXXXXX</h5>
                <h4>บัตรโดยสารรายสัปดาห์</h4>
    <h5>เลขล่าสุดคือ : 14XXXXXX</h5>
    <h4>บัตรโดยสารรายเดือน</h4>
    <h5>เลขล่าสุดคือ : <?php  $sql = "SELECT * FROM monthlypass ORDER BY mp_no DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result))
            echo $row['mp_no'];?>   </h5>
  </main><!-- End #main --> 
<?php include("menuweb/footer.php"); ?>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>