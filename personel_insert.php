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

<?php include("menuweb/navbaradmin.php");
include("menuweb/sidebaradmin.php"); ?>

  <main id="main" class="main">

  <?php
    include("admin/config/condb.php");
    $driver_id = $_POST["driver_id"];
    $driver_prefix = $_POST["driver_prefix"];
    $driver_name = $_POST["driver_name"];
    $driver_surname = $_POST["driver_surname"];
    $driver_nickname = $_POST["driver_nickname"];
    $driver_gender = $_POST["driver_gender"];
    $driver_birthday = $_POST["driver_birthday"];
    $driver_age = $_POST["driver_age"];
    $license_no = $_POST["license_no"];
    $pst_id = $_POST["pst_id"];
    $driver_idcard = $_POST["driver_idcard"];
    $license_type = $_POST["license_type"];
    $bloodtype = $_POST["bloodtype"];
    $regional = $_POST["regional"];
    $land = $_POST["land"];
    $national = $_POST["national"];
    $driver_height = $_POST["driver_height"];
    $driver_weight = $_POST["driver_weight"];
    $handicap = $_POST["handicap"];
    $hobby = $_POST["hobby"];
    $address = $_POST["address"];
    $moo = $_POST["moo"];
    $soi = $_POST["soi"];
    $road = $_POST["road"];
    $districts = $_POST["districts"];
    $amphures = $_POST["amphures"];
    $provinces = $_POST["provinces"];
    $driver_phone = $_POST["driver_phone"];
    $driver_email = $_POST["driver_email"];
    $driver_images = $_POST["driver_images"];


    // print $ps_id;
    // echo $ps_name;
    print "รหัส คือ : " . $driver_id . "<br>";
    echo "ชื่อ : " . "<font color='#C61C17 '> " . $driver_prefix . " " . $driver_name . "</font>" . " นามสกุล " . $driver_surname;

    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
    $date1 = date("Ymd_His");
    //ตัวแปรสุ่มตัวเลขเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $upload = $_FILES["driver_images"]; //ตัวแปรที่รับมาจากฟอร์ม


    if ($upload <> '') {
        //โฟลเดอร์ที่เก็บไฟล์
        $path = "image_drivers/";
        //ตัวขื่อกับนามสกุลภาพออกจากกัน
        $type = strrchr($_FILES["driver_images"]["name"], ".");
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = $numrand . $date1 . $type;
        $path_copy = $path . $newname;
        $path_link = "image_drivers/" . $newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES["driver_images"]["tmp_name"], $path_copy);
    }

    $sql = "INSERT INTO tb_driver (driver_id,driver_prefix,driver_name,driver_surname,driver_nickname,driver_gender,driver_birthday,driver_age,license_no,pst_id,driver_idcard,license_type,bloodtype,regional,land,national,driver_height,driver_weight,handicap,hobby,address,moo,soi,road,districts,amphures,provinces,driver_phone,driver_email,driver_images) VALUES ('$driver_id','$driver_prefix','$driver_name','$driver_surname','$driver_nickname','$driver_gender','$driver_birthday','$driver_age','$license_no','$pst_id','$driver_idcard','$license_type','$bloodtype','$regional','$land','$national','$driver_height','$driver_weight','$handicap','$hobby','$address','$moo','$soi','$road','$districts','$amphures','$provinces','$driver_phone','$driver_email','$newname')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ทำการบันทึกข้อมูลสำเร็จเรียบร้อยแล้ว');";
        echo "window.location = 'driver_show.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
    ?>
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