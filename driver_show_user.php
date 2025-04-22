<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>รายชื่อพนักงานตามกลุ่มและตำแหน่ง - UnivLiner TIS</title>
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
  <center><h3>รายชื่อพนักงานทั้งหมด</h3></center>
  <table id="example3" class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row" class="info">
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รหัสพนักงาน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อเล่น</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ตำแหน่ง</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 50%;">สถานะการทำงาน</th>
                <!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 8%;">รูปประจำตัว</th> -->
                <!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 2%;">แก้ไข</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 2%;">ลบ</th> -->
            </tr>

            
<?php
    for($i=1;$i<=1;$i++){
  ?>
  <?php
            $sql = "SELECT * FROM tb_driver a, tb_position b WHERE a.pst_id=b.pst_id  AND (status='กำลังปฏิบัติงาน') ORDER BY a.pst_id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {

            ?>
        <tbody>
            <tr>
                <td><?php echo $i++?></td>
                <td><?php print $row['driver_id']; ?> </td>
                <td><?php echo $row['driver_prefix'] . '' . $row['driver_name'] . ' ' . $row['driver_surname']; ?> </td>
                <td> <?php echo $row['driver_nickname']; ?></td>
                <td> <?php echo $row['pst_name']; ?></td>
                <td> <?php echo $row['status']; ?></td>
                <!-- <td><img class="img-rounded" src="image_drivers/<?= $row['driver_images']; ?>" width="100" height="120"> </td> -->

                <!-- <td><a class="btn btn-warning btn-flat btn-sm" href="driverfrm_edit.php?act=edit&ps_id=<?php echo $row['driver_id']; ?>">
                        แก้ไข
                    </a> </td>

                <td> <a class="btn btn-success" href="driver_del.php?ps_id=<?= $row['driver_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
                        ลบ
                   </a></td> -->
           </tr> 
           <?php } } ?>
            
        </tbody>
        </thead>
    </table>

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