<?php
session_start();
include('admin/config/condb.php');
$driver_id = $_SESSION['driver_id'];
$level = $_SESSION['level'];
if($level!='user'){
Header("Location: logout.php");
}
//query member login
$queryemp = "SELECT * FROM tb_driver a, tb_position b WHERE a.pst_id=b.pst_id  ORDER BY a.pst_id";
$resultm = mysqli_query($conn, $queryemp) or die ("Error in query: $queryemp " . mysqli_error($conn));
$rowm = mysqli_fetch_array($resultm);
//เวลาปัจจุบัน
$timenow = date('H:i:s');
$datenow = date('Y-m-d');
//เวลาที่บันทึก
$queryworkio = "SELECT MAX(workdate) as lastdate, workin, workout FROM tbl_work_io WHERE driver_id=$driver_id AND workdate='$datenow' ";

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "menuadmin";?>
<?php $menu = "menuuser";?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>แบบทะเบียนประวัติพนักงาน - UnivLiner TIS</title>
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
  <link href="assets/vendor/quill/quill.sdriver_idw.css" rel="stylesheet">
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
  <script>
$(document).ready(function() {
  $('#date').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '01/01/2010',
    endDate: '12/31/2020',
    todayBtn: 'linked',
    todayHighlight: true,
    autoclose: true
  });
});
  </script>
</head>

<body>

<?php include("menuweb/navbaruser.php");
include("menuweb/sidebaruser.php"); ?>

  <main id="main" class="main">
    <center><h3>แบบทะเบียนประวัติพนักงาน</h3></center>
    <br><br>
    <form action="#" method="POST" enctype="multipart/form-data" id="pharmacist_frm">
<div class="row g-3">
<div class="col-md-4">
<img class="" src="./image_drivers/<?= $rowm['driver_images']; ?>" width="130" height="150">
    </div>
    <div class="col-md-4">
        <label for="form-label">ตำแหน่ง</label>
        <input type="text" class="form-control" id="pst_id" name="pst_id" value="<?php echo $rowm['pst_id'];?>" readonly>
    </div>
    <div class="col-md-4">
        <label for="form-label">รหัสพนักงาน</label>
        <input type="text" class="form-control" id="driver_id" name="driver_id" value="<?php echo $rowm['driver_id'];?>" readonly>
        
    </div>
    <div class="col-md-4">
        <label for="form-label">ชนิดใบอนุญาต</label>
        <input type="text" class="form-control" value="<?php echo $rowm['license_type'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">เลขที่ใบอนุญาต</label>
        <input type="text" class="form-control" id="license_no" name="license_no" value="<?php echo $rowm['license_no'];?>" readonly>
    </div>
    <div class="col-md-4">
        
    </div>
    <div class="col-md-4">
        <label for="form-label">คำนำหน้า</label>
        <input type="text" class="form-control" id="driver_prefix" name="driver_prefix" value="<?php echo $rowm['driver_prefix'];?>" readonly>
    </div>
    <div class="col-md-4">
        <label for="form-label">ชื่อ</label>
        <input type="text" class="form-control" id="driver_name" name="driver_name" value="<?php echo $rowm['driver_name'];?>" readonly>
    </div>

    <div class="col-md-4">
        <label for="form-label">นามสกุล</label>
        <input type="text" class="form-control" id="driver_surname" name="driver_surname" value="<?php echo $rowm['driver_surname'];?>" readonly>
    </div>
    <div class="col-md-4">
        <label for="form-label">ชื่อเล่น</label>
        <input type="text" class="form-control" id="driver_nickname" name="driver_nickname" value="<?php echo $rowm['driver_nickname'];?>" readonly>
    </div>
    <div class="col-md-4">
        <label for="form-label">เพศ</label>
        <input type="text" class="form-control" id="driver_gender" name="driver_gender" value="<?php echo $rowm['driver_gender'];?>" readonly>
    </div>
    <div class="col-md-4">
        <label for="form-label">หมายเลขบัตรประชาชน</label>
        <input type="text" class="form-control" id="driver_idcard" name="driver_idcard" value="<?php echo $rowm['driver_idcard'];?>" required>
    </div>
    <div class="col-md-4">
        <label for="form-label">วันเกิด (วัน/เดือน/ปี)</label>
        <input type="text" class="form-control" name="driver_birthday" id="driver_birthday" value="<?php echo $rowm['driver_birthday'];?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">อายุ(ปี)</label>
        <input type="text" class="form-control" id="driver_age" name="driver_age" value="<?php echo $rowm['driver_age'];?>"required>
    </div>
    <div class="col-md-4">
        <label for="form-label">กลุ่มเลือด</label>
        <input type="text" class="form-control" value="<?php echo $rowm['bloodtype'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ศาสนา</label>
        <input type="text" class="form-control" value="<?php echo $rowm['regional'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">เชื้อชาติ</label>
        <input type="text" class="form-control" value="<?php echo $rowm['land'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">สัญชาติ</label>
        <input type="text" class="form-control" value="<?php echo $rowm['national'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ส่วนสูง</label>
        <input type="text" class="form-control" value="<?php echo $rowm['driver_height'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">น้ำหนัก</label>
        <input type="text" class="form-control" value="<?php echo $rowm['driver_weight'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ความพิการ</label>
        <input type="text" class="form-control" value="<?php echo $rowm['handicap'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ความสามารถ/ความสนใจพิเศษ</label>
        <input type="text" class="form-control" value="<?php echo $rowm['hobby'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ที่อยู่บ้านเลขที่</label>
        <input type="text" class="form-control" value="<?php echo $rowm['address'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">หมู่</label>
        <input type="text" class="form-control" value="<?php echo $rowm['moo'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ตรอก/ซอย</label>
        <input type="text" class="form-control" value="<?php echo $rowm['soi'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ถนน</label>
        <input type="text" class="form-control" value="<?php echo $rowm['road'];?>" >
    </div>
    <div class="col-md-4">
    <label for="form-label">เแขวง/ตำบล</label>
<input type="text" class="form-control" value="<?php echo $rowm['districts'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">เขต/อำเภอ</label>
        <input type="text" class="form-control" value="<?php echo $rowm['amphures'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">จังหวัด</label>
        <input type="text" class="form-control" value="<?php echo $rowm['provinces'];?>" >
    </div>
    <div class="col-md-4">
        <label for="form-label">รหัสไปรษณีย์</label>
        <input type="text" class="form-control" value="<?php echo $rowm['postcode'];?>" >
    </div>

    <div class="col-md-4">
        <label for="form-label">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" value="<?php echo $rowm['driver_phone'];?>" >
    </div>

    <div class="col-md-4">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="text" class="form-control" value="<?php echo $rowm['driver_email'];?>" >

    </div>
    <div class="col-md-4">
        <input type="submit" class="form-control btn btn-warning" name="btdriver_idk" id="btdriver_idk" value="ตกลง">


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