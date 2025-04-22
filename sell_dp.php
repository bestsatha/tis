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
        <center>
            <h3>ระบบขายบัตรโดยสารรายวัน</h3>
        </center>
        <form action="mp_insert.php" method="POST" enctype="multipart/form-data" name="mp_frm" id="mp_frm">

            <div class="row g-3">
            <div class="col-md-4">
        <h5>วัน เดือน ปี ที่ออกบัตร</h5>
        <input type="text" class="form-control" id="mp_datesell" name="mp_datesell" value="<?php echo date('d/m/Y');?>" placeholder="">  
    </div>
                <div class="col-md-4">
                <h4>ชื่อ </h4>
                    <input type="text" class="form-control" id="mp_name" name="mp_name" placeholder="กรุณาป้อนชื่อ" required>
                </div>
                <div class="col-md-4">
                <h4>นามสกุล </h4>
                    <input type="text" class="form-control" id="mp_surname" name="mp_surname" placeholder="กรุณาป้อนนามสกุล" required>
                </div>
                <h4>วัน เดือน ปี</h4>
        <input type="text" class="form-control" id="day" name="day" value="<?php echo date('d/m/Y');?>" placeholder="">
    </div>

                <div class="col-md-4">
                                <h4>ชื่อผู้ขายตั๋ว</h4>
                                <input type="text" class="form-control" id="mp_sell" name="mp_sell" placeholder="ชื่อพนักงาน" value="<?php echo $rowm['driver_name']. ' '.$rowm['driver_surname'].' ('.$rowm['driver_nickname'].')';?>"  readonly>
                            </div>

                <div class="col-md-4">


                </div>
                <div class="col-md-4">
                    <input type="submit" class="form-control btn btn-warning" name="btnok" id="btnok" value="ยืนยันการจอง">


                </div>


            </div>



        </form>
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