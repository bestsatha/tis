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
<?php $menu = "menuadmin";?>
<?php $menu = "menuuser";?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ระบบบันทึกการปล่อยรถ - UnivLiner TIS</title>
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
            <h3>ระบบบันทึกการปล่อยรถ</h3>
        </center>
        <form action="stations_insert.php" method="POST" enctype="multipart/form-data" name="mp_frm" id="mp_frm">
        <div class="col-md-4">
        <h5>ชื่อเจ้าหน้าที่สถานีเดินรถ</h5>
        <input type="text" class="form-control" id="station_staff" name="station_staff" placeholder="ชื่อพนักงาน" value="<?php echo $rowm['driver_prefix'].$rowm['driver_name']. ' '.$rowm['driver_surname'];?>"  readonly>
        </div>
        <div class="col-md-4">
                    <h5>ท่าปล่อยรถ</h5>
                    <select class="form-select" aria-label="Default select example" name="stop_id" id="stop_id">
                                    <option value=""><-- เลือกต้นทาง--></option>
                                    <?php
                                    include('admin/config/condb.php');
                                    $query = "select * From tb_busstop order by stop_id" or die("Error:" . mysqli_error($conn));
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["stop_name"]; ?>"><?= $row["stop_name"]; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                </div>
            <div class="row">
            <div class="col-md-4">
        <h5>10. วัน เดือน ปี</h5>
        <input type="text" class="form-control" id="day" name="day" value="<?php echo date('d/m/Y');?>" placeholder="">  
    </div>
                <div class="col-md-4">
                    <h5>สาย</h5>
                    <select class="form-select" aria-label="Default select example" name="route_no" id="route_no">
                        <option value=""><-- เลือกเส้นทาง --></option>
                        <?php
                        include('admin/config/condb.php');
                        $query = "select * From routes order by route_no" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["route_no"]; ?>"><?= $row["route_no"] . " " . $row["depart"] . " - " . $row["arrival"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
            <div class="col-md-6"><h5>7. หมายเลขข้างรถ</h5>
    <select class="form-select" aria-label="Default select example" name="bus_id" id="bus_id">
                        <option value=""><-- เลือกหมายเลขข้างรถ --></option>
                        <?php
                        include('admin/config/condb.php');
                        $query = "select * From tb_bus order by bus_no" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["bus_reg"]; ?>"><?= $row["bus_no"] . " | " . $row["bus_reg"] ; ?></option>

                        <?php
                        }
                        ?>
                    </select></div>
                <div class="col-md-4">
                    <h5>ชื่อ-สกุล พขร.</h5>
                    <select class="form-select" aria-label="Default select example" name="driver_name" id="driver_name">
                        <option value=""><-- เลือกพนักงาน --></option>
                        <?php
                        include('admin/config/condb.php');
                        $query = "select * From tb_driver where (pst_id in (5401,5403)) and status='กำลังปฏิบัติงาน' order by driver_id" or die("Error:" . mysqli_error($conn));
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row["driver_prefix"] . "" . $row["driver_name"] . " " . $row["driver_surname"]; ?>"><?= $row["driver_prefix"] . "" . $row["driver_name"] . " " . $row["driver_surname"]; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                
            </div>
            <div class="col-md-4">
        <h5>11. เวลาที่ถึงหรือออกจากท่ารถ</h5>
                   <?php if(isset($rowio['depart'])){ ?>
                <input type="text" class="form-control"   name="depart" id="depart"   value="<?php echo $rowio['workin'];?>"  disabled>
                <?php }else{ ?>
                <input type="text" class="form-control"   name="depart" id="depart"   value="<?php echo date('H:i:s');?>"  readonly>
                <?php  } ?>
    </div>
            <br><div class="col-md-4">
                <input type="submit" class="form-control btn btn-warning" name="btnok" id="btnok" value="บันทึกเวลาทำงาน">
            </div>
        </form>
        <br> <hr><br>    
        <h5><b>สรุปรายงาน</b></h5>
        <br>
    <table id="example3" class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row" class="info">
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ท่าปล่อยรถ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">สายที่</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">หมายเลขรถ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">พนักงานขับรถ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เวลาที่เข้าสถานี</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อเจ้าหน้าที่สถานีเดินรถ</th>
            </tr>
            <?php
    for($i=1;$i<=1;$i++){
  ?>
            <?php
            $perpage = 30;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            $start = ($page - 1) * $perpage;
            $sql = "SELECT * FROM stations ORDER BY day DESC limit {$start} , {$perpage}";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {

            ?>

        <tbody>
            <tr>
            <td><?php echo $i++?></td>
                <td> <?php print $row['day']; ?> </td>
                <td> <?php echo $row['stop_id']; ?> </td>
                <td> <?php echo $row['route_no']; ?></td>
                <td> <?php echo $row['bus_id']; ?></td>
                <td> <?php echo $row['driver_name']; ?></td>
                <td> <?php echo $row['depart']; ?></td>
                <td> <?php echo $row['station_staff']; ?></td>
                <!-- <td> <a class="btn btn-warning btn-flat btn-sm" href="printticket.php?ticket_id=<?php echo $row['trip_no']; ?>">
                        พิมพ์ใบสมุดประจำรถ
                    </a> </td> -->
            <?php }} ?>
            </tr>
        </tbody>
        </thead>
    </table>
    <?php
 $sql2 = "select * from bookcar ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
  <ul class="pagination">
    <li>
      <a href="bookcar.php?page=1" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<=$total_page;$i++){ ?>
    <li><a href="bookcar.php?page=<?php echo $i; ?>">&nbsp;<?php echo $i; ?></a></li>
    <?php } ?>
    &nbsp;
    <li>
      <a href="bookcar.php?page=<?php echo $total_page;?>" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
 </nav>
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