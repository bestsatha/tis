<?php
session_start();
include('admin/config/condb.php');
$driver_id = $_SESSION['driver_id'];
$level = $_SESSION['level'];
if($level!='user'){
Header("Location: logout.php");
}
//query member login
$queryemp = "SELECT * FROM tb_driver a, tb_position b WHERE driver_id=$driver_id ";
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

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ระบบขายตั๋วโดยสารเที่ยวเดียว | Single Journey Ticket's Selling - UnivLiner TIS</title>
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
        <div class="contents">
            <h4>
                <center><b>ระบบขายตั๋วโดยสารเที่ยวเดียว | Single Journey Ticket's Selling</b></center>
            </h4>
            <div class="card-body p-2 m-2">
                <h4>
                    <form action="sjt_insert.php" method="POST" enctype="multipart/form-data" name="sjt_frm" id="sjt_frm">

                        <div class="row">
                            <div class="col-md-4">
                                <h5>ต้นทาง</h5>
                                <select class="form-select" aria-label="Default select example" name="dep_id" id="dep_id">
                                <option selected="0"><-- เลือกต้นทาง --></option>
                                    <option value="แยกบ้านฮ่องฮี">แยกบ้านฮ่องฮี</option>
                                    <option value="บขส.กาฬสินธุ์">บขส.กาฬสินธุ์</option>
                                    <option value="ศูนย์ราชการฯ">ศูนย์ราชการฯ</option>
                                    <option value="ม.กาฬสินธุ์ (ในเมือง)">ม.กาฬสินธุ์ (ในเมือง)</option>
                                    <option value="ม.กาฬสินธุ์ (นามน)">ม.กาฬสินธุ์ (นามน)</option>
                                    <option value="ศูนย์วิจัยภูสิงห์">ศูนย์วิจัยภูสิงห์</option>
                                    <option value="เขื่อนลำปาว">เขื่อนลำปาว</option>
                                    <option value="สมเด็จ">สมเด็จ</option>
                                    <option value="สะพานเทพสุดา">สะพานเทพสุดา</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h5>ปลายทาง</h5>
                                <select class="form-select" aria-label="Default select example" name="arr_id" id="arr_id">
                                <option selected="0"><-- เลือกปลายทาง --></option>
                                    <option value="แยกบ้านฮ่องฮี">แยกบ้านฮ่องฮี</option>
                                    <option value="บขส.กาฬสินธุ์">บขส.กาฬสินธุ์</option>
                                    <option value="ศูนย์ราชการฯ">ศูนย์ราชการฯ</option>
                                    <option value="ม.กาฬสินธุ์ (ในเมือง)">ม.กาฬสินธุ์ (ในเมือง)</option>
                                    <option value="ม.กาฬสินธุ์ (นามน)">ม.กาฬสินธุ์ (นามน)</option>
                                    <option value="ศูนย์วิจัยภูสิงห์">ศูนย์วิจัยภูสิงห์</option>
                                    <option value="เขื่อนลำปาว">เขื่อนลำปาว</option>
                                    <option value="สมเด็จ">สมเด็จ</option>
                                    <option value="สะพานเทพสุดา">สะพานเทพสุดา</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <h5>เลือกวันที่เดินทาง</h5>
                                <input type="date" class="form-control" name="day_trip" id="day_trip">  
                        </div>
                        <div class="row">


                            <!-- <div class="col-md-4">
    <h4>ประเภทการจ่ายค่าโดยสาร</h4>
        <select class="form-select" aria-label="Default select example" name="geography_id" id="geography_id">
            <option selected="1">เงินสด</option>
            <option value="2">Credit Card/Debit Card</option>
            <option value="3">QR Code</option>
            <option value="4">บัตรโดยสารรายเดือน</option>
        </select>
    </div> -->

                            <!-- <div class="col-md-4">
    <h4>ราคา</h4>

    </div> -->

                            <div class="col-md-4">
                                <h5>สายที่</h5>
                                <select class="form-select" aria-label="Default select example" name="line" id="line">
                                    <option value=""><-- เลือกสาย--></option>
                                    <?php
                                    include('../tss/admin/config/condb.php');
                                    $query = "select * From routes order by route_id" or die("Error:" . mysqli_error($conn));
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["route_no"]; ?>"><?= $row["depart"]; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <h5>เบอร์รถ</h5>
                                <select class="form-select" aria-label="Default select example" name="bus_id" id="bus_id">
                                    <option value=""><-- เลือกรถ --></option>
                                    <?php
                                    include('../tss/admin/config/condb.php');
                                    $query = "select * From tb_bus order by bus_id" or die("Error:" . mysqli_error($conn));
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["bus_no"]; ?>"><?= $row["bus_no"] . " | " . $row["bus_type"]; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h5>เลขที่นั่ง</h5>
                                <input type="text" class="form-control" id="seat_no" name="seat_no" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h5>รอบเวลา</h5>
                                <select class="form-select" aria-label="Default select example" name="time" id="time">
                                    <option selected="0">เลือกรอบเวลา</option>
                                    <option value="06:00">06:00 | S1(1411) ไป ฮ่องฮี (จ.-ศ.)/ S4 รถเสริม ดอนจาน-บขส.กาฬสินธุ์ (จ.-พฤ.)</option>
                                    <option value="06:20">06:20 | S1(1411) ไป มกส.นามน (จ.-ศ.)</option>
                                    <option value="06:30">06:30 | S5(4600) รถเสริม มกส.นามน-สมเด็จ (จ.-ศ.)</option>
                                    <option value="07:15">07:15 | S3 ไป มกส.นามน (จ.)</option>
                                    <option value="07:25">07:25 | S4 ไป มกส.นามน (จ.)</option>
                                    <option value="07:30">07:30 | S2 ไป มกส.นามน (จ.-ศ.) / S5(4600) รถเสริม สมเด็จ-มกส.นามน (จ.-ศ.)</option>
                                    <option value="07:50">07:50 | S4 รถเสริม ดอนจาน-มกส.นามน (อ.-ศ.)</option>
                                    <option value="08:00">08:00 | S1(1411) ไป ฮ่องฮี/มกส.นามน / S5(4600) ไปสหัสขันธ์-สะพานเทพสุดา (ส.-อา.)</option>
                                    <option value="09:30">09:30 | S3 รถเสริม มกส.นามน-เขื่อนลำปาว</option>
                                    <option value="10:02">10:02 | S2 ไป ฮ่องฮี (จ.-ศ.)</option>
                                    <option value="10:51">10:51 | S1(1411) ไป ฮ่องฮี</option>
                                    <option value="11:26">11:26 | S1(1411) ไป มกส.นามน</option>
                                    <option value="11:40">11:40 | S4 รถเสริม ดอนจาน-บขส.กาฬสินธุ์ (จ.-พฤ.)</option>
                                    <option value="11:45">11:45 | S5(4600) รถเสริม มกส.นามน-สมเด็จ (จ.-ศ.)</option>
                                    <option value="12:45">12:45 | S5(4600) รถเสริม สมเด็จ-มกส.นามน (จ.-ศ.)</option>
                                    <option value="14:30">14:30 | S2 ไป มกส.นามน (จ.-ศ.)</option>
                                    <option value="16:20">16:20 | S3 ไป ฮ่องฮี (ศ.)/S4 รถเสริม ดอนจาน-บขส.กาฬสินธุ์ (จ.-พฤ.)</option>
                                    <option value="16:30">16:30 | S5(4600) ไป มกส.นามน (ส.-อา.)</option>
                                    <option value="16:40">16:40 | S1(1411) ไป ฮ่องฮี/มกส.นามน</option>
                                    <option value="16:40">16:40 | S3 รถเสริม เขื่อนลำปาว-มกส.นามน (ส.-อา.)</option>
                                    <option value="16:50">16:50 | S4 รถเสริม ดอนจาน-บขส.กาฬสินธุ์ (จ.-พฤ.) ไป ฮ่องฮี (ศ.)</option>
                                    <option value="16:55">16:55 | S2 ไป ฮ่องฮี (จ.-ศ.)</option>
                                    <option value="17:00">17:00 | S5 (4600) รถเสริม มกส.นามน-สมเด็จ</option>
                                    <option value="18:30">18:30 | S1(1411) ไป ฮ่องฮี/มกส.นามน / S4 รถเสริม ดอนจาน-มกส.นามน (อ.-พฤ.)</option>
                                    <option value="19:00">19:00 | S5 (4600) รถเสริม สมเด็จ-มกส.นามน</option>
                                    <option value="20:20">20:20 | S1(1411) ไป ฮ่องฮี (จ.-ศ.)</option>
                                    <option value="20:45">20:45 | S1(1411) ไป มกส.นามน (จ.-ศ.)</option>
                                </select>
                                <!-- <input size=5 type=text name="time" maxlength=5> น. -->
                            </div>
                            <div class="col-md-4">
                                <h5>ส่วนลด</h5>
                                <select class="form-select" aria-label="Default select example" name="discount" id="discount">
                                    <option selected=""><-- เลือกส่วนลด --></option>
                                    <option value="ไม่มีส่วนลด">ไม่มีส่วนลด</option>
                                    <option value="QR Code/EMV Card (10%)">QR Code/EMV Card (10%)</option>
                                    <option value="นักศึกษา/นักศึกษา (20%)">นักศึกษา/นักศึกษา (20%)</option>
                                    <option value="นักศึกษา/บุคลากร มกส. (20 บาทตลอดสาย)">นักศึกษา/บุคลากร มกส. (20 บาทตลอดสาย)</option>
                                    <option value="ผู้สูงอายุ (50%)">ผู้สูงอายุ (50%)</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <h5>ชื่อผู้โดยสาร</h5>
                                <input type="text" class="form-control" id="name" name="name" placeholder="กรุณาป้อนชื่อ" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>ชื่อผู้ขายตั๋ว</h5>
                                <input type="text" class="form-control" id="driver_id" name="driver_id" placeholder="ชื่อพนักงาน" value="<?php echo $rowm['driver_name']. ' '.$rowm['driver_surname'].' ('.$rowm['driver_nickname'].')';?>"  readonly>
                            </div>
                            <div class="col-md-4">
                                <h5>รหัสบัตรโดยสารรายเดือน (ถ้ามี)</h5>
                                <input type="text" class="form-control" id="mp_no" name="mp_no" maxlength=9>
                            </div>
                            <div class="col-md-4">
                                <h5>ค่าโดยสาร</h5>
                                <select class="form-select" aria-label="Default select example" name="fare" id="fare">
                                    <option selected="0"><-- เลือกราคา --></option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <br><br><input type="submit" class="form-control btn btn-warning" name="btnok" id="btnok" value="บันทึกตั๋ว">

                        </div>
                        <div class="col-md-4">
                            <br><br><a class="btn btn-warning btn-flat btn-sm" href="printticket.php?ticket_id=<?php echo $row['ticket_id']; ?>">
                        พิมพ์ตั๋ว
                    </a>
                        </div>



                </h4>
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