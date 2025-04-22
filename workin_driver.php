<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ระบบลงเวลาทำงานประจำวัน - UnivLiner TIS</title>
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
<?php
session_start();
// echo '<pre>';
        // print_r($_SESSION);
// echo '</pre>';
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
<body>

<?php include("menuweb/navbaruser.php");
include("menuweb/sidebaruser.php"); ?>

  <main id="main" class="main">
    <div class="container">
      <div class="row">
        <div class="col col-sm-12">
          <h3  class="jumbotron" align="center">ระบบลงเวลาทำงานประจำวัน</h3>
        </div>
      </div>

      <div class="row">
        <!-- <div class="col col-sm-4" style="align-items: center;">
          <img src="image_drivers/<?php echo $rowm['driver_images'];?>" width='70%'>
        </div>  -->

        <div class="col col-sm-12">
          <h4> ลงเวลาเข้า-ออกงาน <?php echo date('d/m/Y');?></h4>
          <form action="save_workin.php"  method="post" class="form-horizontal">
            <div class="form-group row">
              <div class="col col-sm-12">
                <label for="driver_id">รหัสพนักงาน</label>
                <input type="text" class="form-control"   name="driver_id"   placeholder="รหัสพนักงาน"   value="<?php echo $rowm['driver_id'];?>"  readonly>
              <br>
                <label for="driver_id">ชื่อพนักงาน</label>
                <input type="text" class="form-control"   name="driver_name"   placeholder="รหัสพนักงาน"   value="<?php echo$rowm['driver_prefix'].$rowm['driver_name']. ' '.$rowm['driver_surname'];?>"  readonly>
              
              <br>
                <label for="driver_id">เวลาที่บันทึก</label>
                <?php if(isset($rowio['workin'])){ ?>
                <input type="text" class="form-control"   name="workin"   value="<?php echo $rowio['workin'];?>"  >
                <?php }else{ ?>
                <input type="text" class="form-control"   name="workin"   value="<?php echo date('H:i:s');?>"  readonly>
                <?php  } ?>

                <!-- <label for="driver_id">เวลาออกงาน</label>
                <?php
                if($timenow > '14:00:00'){
                if(isset($rowio['workout'])){ ?>
                <input type="text" class="form-control"   name="workout"  value="<?php echo $rowio['workout'];?>"  >
                <?php }else{ ?>
                <input type="text" class="form-control"   name="workout"  value="<?php echo date('H:i:s');?>"  readonly>
                <?php
                } //if(isset($rowio['workout'])){
                }else{  //if($timenow > '11:00:00'){
                echo '<br><font color="red"> หลัง 14.00 น. </font>';
                } ?> -->
              <br>
                <div class="col-md-4">
                    <h5>เลือกการเข้างาน/เลิกงาน</h5>
                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                        <option value="เข้างาน">เข้างาน</option>
                        <option value="เลิกงาน">เลิกงาน</option>
                    </select>
                </div>

                <br><div class="col col-sm-12">
                <button type="submit" class="btn btn-primary btn-lg btn-block">บันทึก</button>
              </div>
      </div>
      <div class="row">
      <div class="col col-sm-12">
      <br> <hr><br>    
        <h5><b>ลงเวลาเข้าออก</b></h5>
        <br>
    <table id="example3" class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row" class="info">
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รหัสพนักงาน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อพนักงาน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เวลาที่บันทึก</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">เข้างาน/เลิกงาน</th>
            </tr>
            <?php
    for($i=1;$i<=1;$i++){
  ?>
            <?php
            $perpage = 10;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            $start = ($page - 1) * $perpage;
            $sql = "SELECT * FROM work_io ORDER BY workdate, workin DESC limit {$start} , {$perpage}";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {

            ?>

        <tbody>
            <tr>
            <td><?php echo $i++?></td>
                <td> <?php print $row['workdate']; ?> </td>
                <td> <?php echo $row['driver_id']; ?> </td>
                <td> <?php echo $row['driver_name']; ?> </td>
                <td> <?php echo $row['workin']; ?></td>
                <td> <?php echo $row['status']; ?></td>
            <?php }} ?>
            </tr>
        </tbody>
        </thead>
    </table>
    <?php
 $sql2 = "select * from work_io ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
  <ul class="pagination">
    <li>
      <a href="workin_driver.php?page=1" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<=$total_page;$i++){ ?>
    <li><a href="workin_driver.php?page=<?php echo $i; ?>">&nbsp;<?php echo $i; ?></a></li>
    <?php } ?>
    &nbsp;
    <li>
      <a href="workin_driver.php?page=<?php echo $total_page;?>" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
 </nav>
    </div>
      </div>
    </div>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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