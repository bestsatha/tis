<?php
session_start();
include('admin/config/condb.php');
$driver_id = $_SESSION['driver_id'];
$level = $_SESSION['level'];
if($level!='admin'){
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

<?php include("menuweb/navbaradmin.php");
include("menuweb/sidebaradmin.php"); ?>

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
        <select class="form-select" aria-label="Default select example" name="license_type" id="license_type">
            <option value="ไม่มี">-ไม่มี-</option>
            <option value="ใบอนุญาตขับรถสาธารณะ ชนิดที่ 2 (ทุกประเภท)">ใบอนุญาตขับรถสาธารณะ ชนิดที่ 2 (ทุกประเภท)</option>
            <option value="ใบอนุญาตขับรถสาธารณะ ชนิดที่ 3 (รถพ่วงและรถกึ่งพ่วง)">ใบอนุญาตขับรถสาธารณะ ชนิดที่ 3 (รถพ่วงและรถกึ่งพ่วง)</option>
            <option value="ใบอนุญาตขับรถสาธารณะ ชนิดที่ 4 (รถบรรทุกวัตถุอันตราย)">ใบอนุญาตขับรถสาธารณะ ชนิดที่ 4 (รถบรรทุกวัตถุอันตราย)</option>
            <option value="ใบอนุญาตเป็นพนักงานเก็บค่าโดยสาร">ใบอนุญาตเป็นพนักงานเก็บค่าโดยสาร</option>
            <option value="ใบอนุญาตเป็นผู้บริการ">ใบอนุญาตเป็นผู้บริการ</option>
        </select>
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
        <input type="text" class="form-control" id="driver_idcard" name="driver_idcard" placeholder="" required>
    </div>
    <div class="col-md-4">
        <h5>วันเกิด (วัน/เดือน/ปี)</h5>
        <input type="date" class="form-control" name="driver_birthday" id="driver_birthday">
    </div>
    <div class="col-md-4">
        <label for="form-label">อายุ(ปี)</label>
        <input type="text" class="form-control" id="driver_age" name="driver_age" required>
    </div>
    <div class="col-md-4">
        <label for="form-label">กลุ่มเลือด</label>
        <select class="form-select" aria-label="Default select example" name="bloodtype" id="bloodtype">
							<option value="-1">-เลือก-</option>
							<option value="A">A</option>
							<option value="AB">AB</option>
							<option value="B">B</option>
							<option value="O">O</option>

						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">ศาสนา</label>
        <select class="form-select" aria-label="Default select example" name="regional" id="regional">
							<option value="-1">-- กรุณาเลือก --</option>
							<option value="พุทธ">พุทธ</option>
							<option value="อิสลาม">อิสลาม</option>
							<option value="คริสต์">คริสต์</option>
							<option value="พราหมณ์-ฮินดู">พราหมณ์-ฮินดู</option>
							<option value="ซิกข์">ซิกข์</option>
							<option value="เชน">เชน</option>
							<option value="เต๋า">เต๋า</option>

						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">เชื้อชาติ</label>
        <select class="form-select" aria-label="Default select example" name="land" id="land">
							<option value="-1">-- กรุณาเลือก --</option>
							<option value="ไทย">ไทย</option>
							<option value="กัมพูชา">กัมพูชา</option>
							<option value="ลาว">ลาว</option>
							<option value="เวียดนาม">เวียดนาม</option>
							<option value="มาเลเซีย">มาเลเซีย</option>
							<option value="พม่า">พม่า</option>
							<option value="ฟิลิปปินส์">ฟิลิปปินส์</option>
							<option value="จีน">จีน</option>
						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">สัญชาติ</label>
        <select class="form-select" aria-label="Default select example" name="national" id="national">
                            <option value="-1">-- กรุณาเลือก --</option>
							<option value="ไทย">ไทย</option>
							<option value="กัมพูชา">กัมพูชา</option>
							<option value="ลาว">ลาว</option>
							<option value="เวียดนาม">เวียดนาม</option>
							<option value="มาเลเซีย">มาเลเซีย</option>
							<option value="พม่า">พม่า</option>
							<option value="ฟิลิปปินส์">ฟิลิปปินส์</option>
							<option value="จีน">จีน</option>
						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">ส่วนสูง</label>
        <input type="text" class="form-control" id="driver_height" name="driver_height" placeholder="" required>
    </div>
    <div class="col-md-4">
        <label for="form-label">น้ำหนัก</label>
        <input type="text" class="form-control" id="driver_weight" name="driver_weight" placeholder="" required>
    </div>
    <div class="col-md-4">
        <label for="form-label">ความพิการ</label>
        <select class="form-select" aria-label="Default select example" name="handicap" id="handicap">
							<option value="-1">-- กรุณาเลือก --</option>
							<option value="ไม่พิการ">ไม่พิการ</option>
							<option value="ความบกพร่องทางการเห็น">ความบกพร่องทางการเห็น</option>
							<option value="ความบกพร่องทางการได้ยิน">ความบกพร่องทางการได้ยิน</option>
							<option value="ความบกพร่องทางร่างกายหรือสุขภาพ">ความบกพร่องทางร่างกายหรือสุขภาพ</option>
							<option value="มีปัญหาทางการเรียนรู้">มีปัญหาทางการเรียนรู้</option>
							<option value="ความบกพร่องทางการพูดและภาษา">ความบกพร่องทางการพูดและภาษา</option>
							<option value="มีปัญหาทางพฤติกรรม หรืออารมณ์">มีปัญหาทางพฤติกรรม หรืออารมณ์</option>
							<option value="ออทิสติก">ออทิสติก</option>
							<option value="พิการซ้อน">พิการซ้อน</option>
							<option value="ความบกพร่องทางสติปัญญา">ความบกพร่องทางสติปัญญา</option>

						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">ความสามารถ/ความสนใจพิเศษ</label>
        <input type="text" class="form-control" id="hobby" name="hobby" placeholder=""  >
    </div>
    <div class="col-md-4">
        <label for="form-label">ที่อยู่บ้านเลขที่</label>
        <input type="text" class="form-control" id="address" name="address" placeholder=""  required>
    </div>
    <div class="col-md-4">
        <label for="form-label">หมู่</label>
        <input type="text" class="form-control" id="moo" name="moo" placeholder="" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ตรอก/ซอย</label>
        <input type="text" class="form-control" id="soi" name="soi" placeholder="" >
    </div>
    <div class="col-md-4">
        <label for="form-label">ถนน</label>
        <input type="text" class="form-control" id="road" name="road" placeholder=""  >
    </div>
    <div class="col-md-4">
        <label for="form-label">แขวง/ตำบล</label>
                <select class="form-select" aria-label="Default select example" name="districts" id="districts">
                        <option value=""><-- เลือกแขวง/ตำบล --></option>
                        <?php
                        include('config/condb.php');
                        $query = "select * From districts order by id" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["name_th"]; ?>"><?= $row["id"] . " - " . $row["name_th"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
    </div>
    <div class="col-md-4">
        <label for="form-label">เขต/อำเภอ</label>
        <select class="form-select" aria-label="Default select example" name="amphures" id="amphures">
                        <option value=""><-- เลือกเขต/อำเภอ --></option>
                        <?php
                        include('config/condb.php');
                        $query = "select * From amphures order by code" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["name_th"]; ?>"><?= $row["code"] . " - " . $row["name_th"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
    </div>
    <div class="col-md-4">
        <label for="form-label">จังหวัด</label>
        <select class="form-select" aria-label="Default select example" name="provinces" id="provinces">
                        <option value=""><-- เลือกจังหวัด --></option>
                        <?php
                        include('config/condb.php');
                        $query = "select * From provinces order by code" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["name_th"]; ?>"><?= $row["code"] . " - " . $row["name_th"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
    </div>

    <div class="col-md-4">
        <label for="form-label">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="กรุณาป้อนเบอร์โทร"  required>
    </div>

    <div class="col-md-4">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="driver_email" name="driver_email" placeholder="name@example.com"  required>

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