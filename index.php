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
  <div>
  <h4>ระบบจัดการสำหรับพนักงาน</h4>
  <div class="row">
    <div class="col-md-4">
                    <div class="news-card">
                        <a href="../univliner_pid/index.php"><img class="news-imgcover" width="100%" src="assets/img/16x9.png" alt="">
                            <h5 class="news-header"><a href="../univliner_pid/index.php" style="margin-top: 10%; color:blue;">ระบบจอแสดงข้อมูลสำหรับผู้โดยสาร (PID)</a></h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="news-card">
                        <a href="../univliner_pid/index.php"><img class="news-imgcover" width="100%" src="assets/img/16x9.png" alt="">
                            <h5 class="news-header"><a href="../univliner_pid/index.php" style="margin-top: 10%; color:blue;">ระบบบริการบัตรโดยสาร (Ticket System)</a></h5>
                    </div>
                </div>
                <br><hr><br>
    <h4>ข่าวประชาสัมพันธ์และประกาศ</h4>
    <br>
    <p></p>
    
    <table id="Table2" style="vertical-align: top; width: 100%" border="0">
        <tbody><tr>
            <td style="vertical-align: top">
                <table id="ctl00_ContentPlaceHolderMain_AnnounceUserControl_DataList1" cellspacing="0" border="0" style="width:100%;border-collapse:collapse;">
		<tbody><tr>
			<td>

      </td>
		</tr><tr>

		</tr>
	</tbody></table>
            </td>
        </tr>
    </tbody></table>

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