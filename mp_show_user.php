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

  <title>ตรวจสอบรหัสบัตรโดยสารรายเดือน - UnivLiner TIS</title>
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
  <table id="example3" class="table table-bordered table-hover">
        <thead>
            <tr role="row" class="info">
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รหัสบัตรโดยสาร</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อ-สกุล</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ประเภท</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เดือน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ปี</th>
            </tr>
            </thead>
            <?php
    for($i=1;$i<=1;$i++){
  ?>
            <?php
                        $perpage = 15;
                        if (isset($_GET['page'])) {
                          $page = $_GET['page'];
                        } else {
                          $page = 1;
                        }
                        $start = ($page - 1) * $perpage;
            $sql = "SELECT * FROM monthlypass ORDER BY mp_no limit {$start} , {$perpage}";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {

            ?>

        <tbody>
            <tr>
            <td><?php echo $i++?></td>
                <td> <?php print $row['mp_no']; ?> </td>
                <td> <?php echo $row['mp_name'] . ' ' . $row['mp_surname']; ?> </td>
                <td> <?php echo $row['mp_type']; ?></td>
                <td> <?php echo $row['mp_month']; ?></td>
                <td> <?php echo $row['mp_year']; ?></td>
            <?php }} ?>
            </tr>
        </tbody>
        
    </table>
    <?php
 $sql2 = "select * from monthlypass ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
 <ul class="pagination">
 <li>
 <a href="mp_show_user.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="mp_show_user.php?page=<?php echo $i; ?>">&nbsp;<?php echo $i; ?></a></li>
 <?php } ?>
 &nbsp;<li>
 <a href="mp_show_user.php?page=<?php echo $total_page;?>" aria-label="Next">
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