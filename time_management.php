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
            <h3>ระบบลงชื่อทำงานประจำวัน</h3>
        </center>
        <form action="timescan_insert.php" method="POST" enctype="multipart/form-data" name="mp_frm" id="mp_frm">
            <div class="row">
                <div class="col-md-4">
                    <h5>วัน เดือน ปี</h5>
                    <td bgcolor="#FFFFFF">
                        วัน
                        <select name="date">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        เดือน
                        <select name="month">
                            <option value="มกราคม">มกราคม</option>
                            <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                            <option value="มีนาคม">มีนาคม</option>
                            <option value="เมษายน">เมษายน</option>
                            <option value="พฤษภาคม">พฤษภาคม</option>
                            <option value="มิถุนายน">มิถุนายน</option>
                            <option value="กรกฎาคม">กรกฎาคม</option>
                            <option value="สิงหาคม">สิงหาคม</option>
                            <option value="กันยายน">กันยายน</option>
                            <option value="ตุลาคม">ตุลาคม </option>
                            <option value="พฤศจิกายน">พฤศจิกายน </option>
                            <option value="ธันวาคม">ธันวาคม </option>
                        </select>

                        ปี <input size=4 type=text name="year" maxlength=4>
                    </td>
                </div>
                <div class="col-md-4">
                    <h5>สาย</h5>
                    <select class="form-select" aria-label="Default select example" name="route_no" id="route_no">
                        <option value=""><-- เลือกเส้นทาง --></option>
                        <?php
                        include('admin/config/condb.php');
                        $query = "select * From routes order by route_id" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["route_id"]; ?>"><?= $row["route_no"] . " " . $row["depart"] . " - " . $row["arrival"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h5>ชื่อ-สกุล</h5>
                    <select class="form-select" aria-label="Default select example" name="driver_id" id="driver_id">
                        <option value=""><-- เลือกพนักงาน --></option>
                        <?php
                        include('admin/config/condb.php');
                        $query = "select * From tb_driver where status='กำลังปฏิบัติงาน' order by driver_id" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["driver_id"]; ?>"><?= $row["driver_prefix"] . "" . $row["driver_name"] . " " . $row["driver_surname"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <h5>หมายเลขข้างรถ</h5>
                    <select class="form-select" aria-label="Default select example" name="bus_no" id="bus_no">
                        <option value=""><-- เลือกหมายเลขข้างรถ --></option>
                        <?php
                        include('admin/config/condb.php');
                        $query = "select * From tb_bus order by bus_id" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["bus_id"]; ?>"><?= $row["bus_no"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5>เวลาทำงาน</h5>
                    <input type="text" class="form-control" id="in" name="in" placeholder="">
                </div>
                <div class="col-md-4">
                    <h5>เวลาเลิกงาน</h5>
                    <input type="text" class="form-control" id="out" name="out" placeholder="">
                </div>
                <div class="col-md-4">
                    <h5>รวมชั่วโมงการทำงาน (ชม.)</h5>
                    <input type="text" class="form-control" id="hours" name="hours" placeholder="">
                </div>
            </div>
            <div class="col-md-4">
                <input type="submit" class="form-control btn btn-warning" name="btnok" id="btnok" value="บันทึกเวลาทำงาน">
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