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
  <?php
     if ($_GET["driver_id"] == '') {
        echo "<script type='text/javascript'>";
        echo "alert('Error Contact Admin !!');";
        echo "window.location = 'personel_list.php'; ";
        echo "</script>";
    }
    $driver_id = mysqli_real_escape_string($conn, $_GET['driver_id']);
    $query = "SELECT * FROM tb_driver WHERE driver_id=$driver_id" or die("Error:" . mysqli_error($conn));
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    extract($row);    ?>
</head>

<body>

<?php include("menuweb/navbaradmin.php");
include("menuweb/sidebaradmin.php"); ?>

  <main id="main" class="main">
    <center><h3>แบบทะเบียนประวัติพนักงาน</h3></center>
    <br><br>
    <form action="personel_insert.php" method="POST" enctype="multipart/form-data" id="pharmacist_frm">

<div class="row g-3">
<div class="col-md-4">
<label for="form-label">รูปถ่ายหน้าตรง</label>
        <input class="form-control form-control-lg" id="driver_images" name="driver_images" type="file">
        <input class="form-check-input" type="radio" name="chk_edit_driver_id" id="chk_edit_driver_id" value="0" checked> ไม่ต้องการแก้ไขรูปภาพ
        <input class="form-check-input" type="radio" name="chk_edit_driver_id" id="chk_edit_driver_id" value="1"> ต้องการแก้ไขรูปภาพ
    </div>
    <div class="col-md-4">
        <label for="form-label">ตำแหน่ง</label>
        <select class="form-select" aria-label="Default select example" name="pst_id" id="pst_id">
                        <option value=""><-- เลือกตำแหน่ง --></option>
                        <?php
                        include('config/condb.php');
                        $query = "select * From tb_position order by pst_id" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["pst_id"]; ?>"><?= $row["pst_id"] . " - " . $row["pst_name"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
    </div>
    <div class="col-md-4">
        <label for="form-label">รหัสพนักงาน</label>
        <input type="text" class="form-control" id="driver_id" name="driver_id" value="<?php echo $driver_id; ?>">
        <input type="hidden" name="hd_driver_id" value="<?php echo $driver_id; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">ชนิดใบอนุญาต</label>
        <select class="form-select" aria-label="Default select example" name="license_type" id="license_type">
            <option value="-1">-ไม่มี-</option>
            <option value="1">ใบอนุญาตขับรถสาธารณะ ชนิดที่ 2 (ทุกประเภท)</option>
            <option value="2">ใบอนุญาตขับรถสาธารณะ ชนิดที่ 3 (รถพ่วงและรถกึ่งพ่วง)</option>
            <option value="3">ใบอนุญาตขับรถสาธารณะ ชนิดที่ 4 (รถบรรทุกวัตถุอันตราย)</option>
            <option value="4">ใบอนุญาตเป็นพนักงานเก็บค่าโดยสาร</option>
            <option value="5">ใบอนุญาตเป็นผู้บริการ</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="form-label">เลขที่ใบอนุญาต</label>
        <input type="text" class="form-control" id="license_no" name="license_no" value="<?php echo $license_no; ?>">
    </div>
    <div class="col-md-4">
        
    </div>
    <div class="col-md-4">
        <label for="form-label">Account Name</label>
        <input type="text" class="form-control"  id="username" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">Password</label>
        <input type="text" class="form-control"  id="password" name="password" value="<?php echo $password; ?>">
    </div>
    <div class="col-md-4">
        
        </div>
    <div class="col-md-4">
        <label for="form-label">คำนำหน้า</label>
        <select class="form-select" aria-label="Default select example" name="driver_prefix" id="driver_prefix" value="<?php echo $driver_prefix; ?>">
							<option value=""><?php echo $driver_prefix; ?></option>
							<option value="1">นาย</option>
							<option value="2">นางสาว</option>
                            <option value="3">นาง</option>
						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">ชื่อ</label>
        <input type="text" class="form-control" id="driver_name" name="driver_name" value="<?php echo $driver_name; ?>">
    </div>

    <div class="col-md-4">
        <label for="form-label">นามสกุล</label>
        <input type="text" class="form-control" id="driver_surname" name="driver_surname" value="<?php echo $driver_surname; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">ชื่อเล่น</label>
        <input type="text" class="form-control" id="driver_nickname" name="driver_nickname" value="<?php echo $driver_nickname; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">เพศ</label>
        <select class="form-select" aria-label="Default select example" name="driver_gender" id="driver_gender">
							<option value="-1"><?php echo $driver_gender; ?></option>
							<option value="1">ชาย</option>
							<option value="2">หญิง</option>
						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">หมายเลขบัตรประชาชน</label>
        <input type="text" class="form-control" id="driver_idcard" name="driver_idcard" placeholder="" value="<?php echo $driver_idcard; ?>" required>
    </div>
    <div class="col-md-4">
        <h5>วันเกิด (วัน/เดือน/ปี)</h5>
        <input type="date" class="form-control" name="driver_birthday" id="driver_birthday" value="<?php echo $driver_birthday; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">อายุ(ปี)</label>
        <input type="text" class="form-control" id="driver_age" name="driver_age" value="<?php echo $driver_age; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">กลุ่มเลือด</label>
        <select class="form-select" aria-label="Default select example" name="bloodtype" id="bloodtype">
							<option value="-1"><?php echo $bloodtype; ?></option>
							<option value="A">A</option>
							<option value="AB">AB</option>
							<option value="B">B</option>
							<option value="O">O</option>

						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">ศาสนา</label>
        <select class="form-select" aria-label="Default select example" name="regional" id="regional">
							<option value="-1"><?php echo $regional; ?></option>
							<option value="พุทธ">พุทธ</option>
							<option value="อิสลาม">อิสลาม</option>
							<option value="คริสต์">คริสต์</option>
							<option value="พราหมณ์-ฮินดู">พราหมณ์-ฮินดู</option>
							<option value="ซิกข์">ซิกข์</option>
							<option value="เชน">เชน</option>
							<option value="เต๋า">เต๋า</option>
							<option value="ขงจื๊อ">ขงจื๊อ</option>
							<option value="ชินโต">ชินโต</option>
							<option value="ยิว">ยิว</option>
							<option value="กรีก">กรีก</option>
							<option value="บาไฮ">บาไฮบาไฮ</option>
							<option value="โซโรอัสเตอร์">โซโรอัสเตอร์</option>
							<option value="มาณีกี">มาณีกี</option>

						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">เชื้อชาติ</label>
        <select class="form-select" aria-label="Default select example" name="land" id="land">
							<option value="-1"><?php echo $land; ?></option>
							<option value="ไทย">ไทย</option>
							<option value="กัมพูชา">กัมพูชา</option>
							<option value="ลาว">ลาว</option>
							<option value="เวียดนาม">เวียดนาม</option>
							<option value="มาเลเซีย">มาเลเซีย</option>
							<option value="อินโดนีเซีย">อินโดนีเซีย</option>
							<option value="บรูไน">บรูไน</option>
							<option value="พม่า">พม่า</option>
							<option value="ฟิลิปปินส์">ฟิลิปปินส์</option>
							<option value="สิงคโปร์">สิงคโปร์</option>
							<option value="กานา">กานา</option>
							<option value="จีน">จีน</option>
						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">สัญชาติ</label>
        <select class="form-select" aria-label="Default select example" name="national" id="national">
							<option value="-1"><?php echo $national; ?></option>
							<option value="ไทย">ไทย</option>
							<option value="กัมพูชา">กัมพูชา</option>
							<option value="ลาว">ลาว</option>
							<option value="เวียดนาม">เวียดนาม</option>
							<option value="มาเลเซีย">มาเลเซีย</option>
							<option value="อินโดนีเซีย">อินโดนีเซีย</option>
							<option value="บรูไน">บรูไน</option>
							<option value="พม่า">พม่า</option>
							<option value="ฟิลิปปินส์">ฟิลิปปินส์</option>
							<option value="สิงคโปร์">สิงคโปร์</option>
							<option value="กานา">กานา</option>
							<option value="จีน">จีน</option>
						</select>
    </div>
    <div class="col-md-4">
        <label for="form-label">ส่วนสูง</label>
        <input type="text" class="form-control" id="driver_height" name="driver_height" placeholder="" value="<?php echo $driver_height; ?>" required>
    </div>
    <div class="col-md-4">
        <label for="form-label">น้ำหนัก</label>
        <input type="text" class="form-control" id="driver_weight" name="driver_weight" placeholder="" value="<?php echo $driver_weight; ?>" required>
    </div>
    <div class="col-md-4">
        <label for="form-label">ความพิการ</label>
        <select class="form-select" aria-label="Default select example" name="handicap" id="handicap">
							<option value="-1"><?php echo $handicap; ?></option>
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
        <input type="text" class="form-control" id="hobby" name="hobby" placeholder="" value="<?php echo $hobby; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">ที่อยู่บ้านเลขที่</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo $address; ?>" required>
    </div>
    <div class="col-md-4">
        <label for="form-label">หมู่</label>
        <input type="text" class="form-control" id="moo" name="moo" placeholder="" value="<?php echo $moo; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">ตรอก/ซอย</label>
        <input type="text" class="form-control" id="soi" name="soi" placeholder="" value="<?php echo $soi; ?>">
    </div>
    <div class="col-md-4">
        <label for="form-label">ถนน</label>
        <input type="text" class="form-control" id="road" name="road" placeholder="" value="<?php echo $road; ?>">
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
                            <option value="<?= $row["id"]; ?>"><?= $row["id"] . " - " . $row["name_th"]; ?></option>

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
                            <option value="<?= $row["code"]; ?>"><?= $row["code"] . " - " . $row["name_th"]; ?></option>

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
                            <option value="<?= $row["code"]; ?>"><?= $row["code"] . " - " . $row["name_th"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
    </div>

    <div class="col-md-4">
        <label for="form-label">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="กรุณาป้อนเบอร์โทร" value="<?php echo $driver_phone; ?>" required>
    </div>

    <div class="col-md-4">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="driver_email" name="driver_email" placeholder="name@example.com" value="<?php echo $driver_email; ?>" required>

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