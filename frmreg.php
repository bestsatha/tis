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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php include("menuweb/navbar.php");
include("menuweb/sidebar.php"); ?>

  <main id="main" class="main">
  <div class="container mt-3">
        <h1>
            <div class="text-center"> จัดการข้อมูลบุคคล </div>
        </h1>
        <form action="driver_insert.php" method="POST" enctype="multipart/form-data" name="driver_frm" id="driver_frm">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="form-label">รหัสประจำตัว</label>
                    <input type="text" class="form-control" id="driver_id" name="driver_id" placeholder="กรุณาป้อนเลขบัตรที่ใช้อ้างอิง" required>
                </div>
                <div class="col-md-4">
                    <input class="form-check-input" type="radio" name="driver_prefix" id="driver_prefix" value="นาย" checked> นาย
                    <input class="form-check-input" type="radio" name="driver_prefix" id="driver_prefix" value="นางสาว"> นางสาว
                    <input class="form-check-input" type="radio" name="driver_prefix" id="driver_prefix" value="นาง"> นาง
                    <input class="form-check-input" type="radio" name="driver_prefix" id="driver_prefix" value=""> อื่นๆ
                    <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="กรุณาป้อนชื่อ" required>
                </div>
                <div class="col-md-4">
                    <label for="form-label">นามสกุล</label>
                    <input type="text" class="form-control" id="driver_surname" name="driver_surname" placeholder="กรุณาป้อนนามสกุล" required>
                </div>
                <div class="col-md-4">
                    <label for="form-label">ชื่อเล่น</label>
                    <input type="text" class="form-control" id="driver_nickname" name="driver_nickname" placeholder="">
                </div>
                <div class="col-md-4">
                <label for="form-label">เพศ</label>
                    <select class="form-select" aria-label="Default select example" name="driver_gender" id="driver_gender">
                        <option selected>-</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="form-label">วันเกิด</label>
                    <input type="text" class="form-control" id="driver_birthday" name="driver_birthday" placeholder="ระบุแบบเต็ม เช่น 23 มิถุนายน 2556">
                </div>
                <div class="col-md-4">
                    <label for="form-label">อายุ</label>
                    <input type="text" class="form-control" id="driver_age" name="driver_age" placeholder="">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text"> ที่อยู่ </span>
                    <textarea class="form-control" name="ps_address" id="ps_address" rows="4"></textarea>
                </div>
                <div class="col-md-4">
                    <select class="form-select" aria-label="Default select example" name="position" id="position">
                        <option selected>อาชีพ</option>
                        <option value="หัวหน้างานเดินรถโดยสาร">หัวหน้างานเดินรถโดยสาร</option>
                        <option value="พนักงานขับรถโดยสาร">พนักงานขับรถโดยสาร</option>
                        <option value="ผู้จัดการความปลอดภัยด้านการขนส่งทางถนน">ผู้จัดการความปลอดภัยด้านการขนส่งทางถนน (TSM)</option>
                    </select>
                </div>
                    <span class="input-group-text">หมายเลขโทรศัพท์</span>
                    <input type="text" class="form-control" id="ps_phone" name="ps_phone" placeholder="กรุณาป้อนเบอร์โทร" required>
                </div>
                <div class="col-md-4">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="ps_email" name="ps_email" placeholder="name@example.com">
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input class="form-control" type="file" name="driver_images" id="driver_images" multiple>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="submit" class="form-control btn btn-warning" name="btnok" id="btnok" value="ตกลง">
                </div>
            </div>
        </form>
    </div>
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