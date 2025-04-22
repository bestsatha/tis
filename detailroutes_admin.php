<?php
session_start();
include('admin/config/condb.php');
$driver_id = $_SESSION['driver_id'];
$level = $_SESSION['level'];
if($level!='admin'){
Header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>รายละเอียดเส้นทางเดินรถ - UnivLiner TIS</title>
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

    <?php include("menuweb/navbaradmin.php");
    include("menuweb/sidebaradmin.php"); ?>

    <main id="main" class="main">
    <center>
            <h3><b>รายละเอียดเส้นทางเดินรถ</b></h3>
        </center>
        <div class="card card-content">
            <div class="card-bodyC">
            <h3><center>
                    <br><b>สายที่ 2 โรงเรียนโคกกลางราษฎร์พัฒนา - บ้านท่าลำดวน </b>
                </center></h3>
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

                </div>
                <div id="content_html" class="detail-content">
                    <p style="text-align: center;"><strong><span style="font-size: 20px;"><span style="color: #000000;">เส้นทางเดินรถโดยสารประจำทาง</span></span></strong></p>
                    <p style="text-align: center;"><strong><span style="font-size: 20px;"><span style="color: #000000;">หมวด 1 สายที่ 2 โรงเรียนโคกกลางราษฎร์พัฒนา - บ้านท่าลำดวน</span></span></strong></p>
                    <ul>
                        <li><strong><u>ชื่อผู้ประกอบการ</u>:&nbsp;</strong>บริษัท ยูนีฟว์ อินคอร์เปอเรชั่น จำกัด<strong>&nbsp; &nbsp; &nbsp; </strong>&nbsp;</span></span></li>
                        <li><strong><u>เลขที่ใบอนุญาต</u>:&nbsp;</strong>กส.2/2562<strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></span></span></li>
                        <li><strong>วันเริ่มต้นประกอบการ</strong></u><strong>:&nbsp;</strong>16 ธันวาคม 2567<strong> &nbsp;</strong></span></span></li>
                        <li><strong>วันสิ้นสุดประกอบการ</strong></u><strong>:&nbsp;</strong>16 ธันวาคม 2574<strong> &nbsp;&nbsp;</strong></span></span></li>
                    </ul>
                    <p>&nbsp;</p>
                    <ul>
                        <li><strong><u>รายละเอียดเส้นทาง</u></strong></li>
                    </ul>
                    <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><u>เที่ยวไป</u> เริ่มต้นจากสถานที่จอดรถโดยสารประจําทางโรงเรียนโคกกลางราษฎร์พัฒนา ไปตาม
ทางหลวงชนบท กส. 2043 ผ่านบ้านโคกกลาง ถึงบ้านกุดอ้อ แยกขวาไปตามถนนสงเปลือย ผ่านบ้านสงเปลือย แยกขวาไปตามทางหลวงชนบท ผ่านโรงเรียนพณิชยการกาฬสินธุ์ แยกซ้าย
ไปตามถนน สว.ประศักดิ์ แยกซ้ายไปตามทางหลวงแผ่นดินหมายเลข 214 ผ่านศูนย์การศึกษานอกโรงเรียน วิทยาลัยนาฏศิลป์กาฬสินธุ์ แยกขวาไปตามทางหลวงแผ่นดินหมายเลข 12 เลี่ยงเมือง (ถนนเลี่ยงเมืองทุ่งมน) ผ่านองค์การบริหารส่วนจังหวัดกาฬสินธุ์
สํานักงานสาธารณสุขจังหวัดกาฬสินธุ์ สํานักงานพาณิชย์จังหวัดกาฬสินธุ์ สํานักงานขนส่งจังหวัดกาฬสินธุ์ แยกซ้ายไปตามถนนทุ่งศรีเมือง ผ่านโรงเรียนทุ่งศรีเมืองประชาวิทย์ ถึงสํานักงานป่าไม้
จังหวัดกาฬสินธุ์ ไปตามถนนกาฬสินธุ์ ผ่านตลาดสดเทศบาลเมืองกาฬสินธุ์ สถานีตํารวจภูธรอําเภอเมืองกาฬสินธุ์ แยกซ้ายไปตามถนนชัยสุนทร แยกซ้ายไปตามถนนสุรินทร์ ผ่านสํานักงานอัยการจังหวัดกาฬสินธุ์
ถึงโรงเรียนกาฬสินธุ์พิทยาสรรพ์ แยกขวาไปตามถนนอรรถเปศล ผ่านวิทยาลัยเทคนิคกาฬสินธุ์ โรงเรียนมืองกาฬสินธุ์ แยกขวาไปตามถนนภิรมย์ ผ่านโรงเรียนอนุกูลนารี โรงเรียนอนุบาลกาฬสินธุ์
โรงเรียนกาฬสินธุ์พิทยาสัย แยกซ้ายไปตามถนนสิทธิเดช แยกขวาไปตามถนนประดิษฐ์ ผ่านสถานีขนส่งผู้โดยสารจังหวัดกาฬสินธุ์ แยกขวาไปตามถนนแก่งสําโรง ถึงศาลเจ้าพ่อหลักเมือง แยกขวาไปตาม
ถนนกาฬสินธุ์ ผ่านโรงเรียนเทศบาล 1 โรงพยาบาลกาฬสินธุ์ ศาลากลางจังหวัดกาฬสินธุ์ สํานักงานที่ดินจังหวัดกาฬสินธุ์ ถึงสํานักงานสหกรณ์จังหวัดกาฬสินธุ์ แยกซ้ายไปตามถนนชัยสุนทร ผ่านห้างกาฬสินธุ์พลาซ่า แยกขวาไปตามถนนอนรรฆนาค แยกซ้ายไปตามถนนแก่งดอนกลาง 
ไปตามทางหลวงชนบท กส. 3022 ผ่านบ้านหนองบัว โรงเรียนหนองบัวราษฎร์นิยม ถึงบ้านกุดลาย แยกขวาไปตามถนนชลประทาน ไปสุดเส้นทาง ณ สถานที่จอดรถโดยสารประจําทางบ้านท่าลําดวน

<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<u>เที่ยวกลับ</u> เริ่มต้นจากสถานที่จอดรถโดยสารประจําทางบ้านท่าลําดวน ไปตามเส้นทางเดิม
ถึงวัดใต้โพธิ์ค้ํา แยกซ้ายไปตามทางหลวงแผ่นดินหมายเลข 12 (ถนนถีนานนท์) แยกขวาไปตามถนนผ้าขาว แยกซ้ายไปตามถนนประดิษฐ์ แล้วไปตามเส้นทางเดิม ไปสุดเส้นทาง ณ สถานที่จอดรถ
โดยสารประจําทางโรงเรียนโคกกลางราษฎร์พัฒนา</p>
                    <ul>
                        <li><u><strong>แผนที่สังเขป</strong></u></li>
                    </ul>
                    <p><img alt="" src="assets/img/Map2_Clear.png" width="100%"></span></span></p>
                    <p>&nbsp;</p>
                    <ul>
                        <li><strong><u>ตารางเดินรถ</u></strong></li>
                    </ul>
                    <p style="text-align: center;"><img alt="" src="assets/img/timetable2.png" width="100%"></span></span></p>
                    <ul>
                        <li><strong><u>ตารางค่าโดยสาร</u></strong></li>
                    </ul>
                    <p><strong>&nbsp; &nbsp; &nbsp; &nbsp;สำหรับการเดินรถช่วงสนามกีฬากลางจังหวัดกาฬสินธุ์ - หน่วยวิทยบริการวิทยาลัยสงฆ์ขอนแก่น มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย
                        <br>&nbsp; &nbsp; &nbsp; &nbsp;*รถมาตรฐาน 2 (รถโดยสารปรับอากาศชั้น 2)
                    </span></span></strong></p>
                    <p><strong><img alt="" src="assets/img/fare2.PNG" width="100%"></span></span></strong></p>
                    <p><strong>&nbsp; &nbsp; &nbsp; &nbsp;สำหรับการเดินรถโรงเรียนโคกกลางราษฎร์พัฒนา - บ้านท่าลำดวน และสำหรับการเดินรถช่วง สนามกีฬากลางจังหวัดกาฬสินธุ์ - หน่วยวิทยบริการวิทยาลัยสงฆ์ขอนแก่น มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย
                    <br>&nbsp; &nbsp; &nbsp; &nbsp;*รถมาตรฐาน 3 (รถโดยสารธรรมดา)</span></span></strong></p>
                    <p><img alt="" src="assets/img/fare2_nonac.PNG" width="100%"></p>
                </div>

                </div>
                <h3><center>
                    <br><b>สายที่ 1411 แยกบ้านฮ่องฮี - มหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน)</b>
                </center></h3>
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

                </div>
                <div id="content_html" class="detail-content">
                    <p style="text-align: center;"><strong><span style="font-size: 20px;"><span style="color: #000000;">เส้นทางเดินรถโดยสารประจำทาง</span></span></strong></p>
                    <p style="text-align: center;"><strong><span style="font-size: 20px;"><span style="color: #000000;">หมวด 4 สายที่ 1411 มหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน) - แยกบ้านฮ่องฮี</span></span></strong></p>
                    <ul>
                        <li><strong><u>ชื่อผู้ประกอบการ</u>:&nbsp;</strong>บริษัท ยูนีฟว์ อินคอร์เปอเรชั่น จำกัด<strong>&nbsp; &nbsp; &nbsp; </strong>&nbsp;</span></span></li>
                        <li><strong><u>เลขที่ใบอนุญาต</u>:&nbsp;</strong>กส.2/2562<strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></span></span></li>
                        <li><strong>วันเริ่มต้นประกอบการ</strong></u><strong>:&nbsp;</strong>13 กุมภาพันธ์ 2562<strong> &nbsp;</strong></span></span></li>
                        <li><strong>วันสิ้นสุดประกอบการ</strong></u><strong>:&nbsp;</strong>12 กุมภาพันธ์ 2569<strong> &nbsp;&nbsp;</strong></span></span></li>
                    </ul>
                    <p>&nbsp;</p>
                    <ul>
                        <li><strong><u>รายละเอียดเส้นทาง</u></strong></li>
                    </ul>
                    <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>เริ่มต้นจากแยกบ้านฮ่องฮี ไปตามทางหลวงแผ่นดินหมายเลข 12 (ถนนศรีจันทร์) ถึงอำเภอยางตลาด แยกซ้ายไปตามทางหลวงแผ่นดินหมายเลข 12 (ถนนถีนานนท์) ผ่านสถานีขนส่งผู้โดยสารจังหวัดกาฬสินธุ์ บ้านหามแหโพนทอง บ้านนาจารย์ บ้านคําโพน บ้านหนองผ้าอ้อม ถึงทางแยกหมวดทางหลวงสมเด็จ แยกขวาไปตามทางหลวงชนบท กส.2067 ผ่านบ้านหนองหญ้าปล้อง ถึงบ้านหนองโดนพัฒนา แยกขวาไปตามทางหลวงชนบท กส.2067 ไปสุดเส้นทาง ณ สถานที่จอดรถโดยสารมหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน)
                    <br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<u>เส้นทางตัดช่วงสถานีขนส่งผู้โดยสารจังหวัดกาฬสินธุ์ - มหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน)</u> เริ่มต้นจากสถานีขนส่งผู้โดยสารจังหวัดกาฬสินธุ์ ไปตามทางหลวงแผ่นดินหมายเลข 12 (ถนนถีนานนท์) ผ่านบ้านหามแหโพนทอง บ้านนาจารย์ บ้านคําโพน บ้านหนองผ้าอ้อม ถึงอําเภอสมเด็จ แยกขวาไปตามทางหลวงแผ่นดินหมายเลข 12 แยกขวาไปตามทางหลวงชนบท (อบจ. กส. ๓๐๖๑) ผ่านบ้านหนองหญ้าปล้อง ไปสุดเส้นทาง ณ สถานที่จอดรถโดยสารประจําทางมหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน)
                </p>
                    <ul>
                        <li><u><strong>แผนที่สังเขป</strong></u></li>
                    </ul>
                    <p><img alt="" src="assets/img/Map1411_Clear.png" width="100%"></span></span></p>
                    <p>&nbsp;</p>
                    <ul>
                        <li><strong><u>ตารางเดินรถ</u></strong></li>
                    </ul>
                    <p style="text-align: center;"><img alt="" src="assets/img/timetable1411.png" width="100%"></span></span></p>
                    <ul>
                        <li><strong><u>ตารางค่าโดยสาร</u></strong></li>
                    </ul>
                    <p><strong>&nbsp; &nbsp; &nbsp; &nbsp;สำหรับการเดินรถแยกบ้านฮ่องฮี - มหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน) และตัดช่วงสถานีขนส่งผู้โดยสารจังหวัดกาฬสินธุ์ - มหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน)
                        <br>&nbsp; &nbsp; &nbsp; &nbsp;*รถมาตรฐาน 2 (รถโดยสารปรับอากาศชั้น 2)
                    </span></span></strong></p>
                    <p><strong><img alt="" src="assets/img/fare1411.PNG" width="100%"></span></span></strong></p>
                    <p><strong>&nbsp; &nbsp; &nbsp; &nbsp;สำหรับการเดินรถตัดช่วงสถานีขนส่งผู้โดยสารจังหวัดกาฬสินธุ์ - มหาวิทยาลัยกาฬสินธุ์ (พื้นที่นามน)
                    <br>&nbsp; &nbsp; &nbsp; &nbsp;*รถมาตรฐาน 3 (รถโดยสารธรรมดา)</span></span></strong></p>
                    <p><img alt="" src="assets/img/fare1411nac.PNG" width="100%"></p>
                </div>

                </div>
            </div>
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