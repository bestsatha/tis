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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลบุคคล</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@700&family=Prompt:wght@100;400;500&display=swap');

        * {
            font-family: 'IBM Plex Sans Thai Looped', sans-serif;
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>

    <?php
    include("admin/config/condb.php");
    // $mp_no = $_POST["mp_no"];
    $day_trip = $_POST["day_trip"];
    $line = $_POST["line"];
    $bus_id = $_POST["bus_id"];
    $seat_no = $_POST["seat_no"];
    $dep_id = $_POST["dep_id"];
    $arr_id = $_POST["arr_id"];
    $time = $_POST["time"];
    $fare = $_POST["fare"];
    $discount = $_POST["discount"];
    $name = $_POST["name"];
    $driver_id = $_POST["driver_id"];

    $sql = "INSERT INTO ticket (day_trip,line,bus_id,seat_no,dep_id,arr_id,time,fare,discount,name,driver_id)VALUES ('$day_trip','$line','$bus_id','$seat_no','$dep_id','$arr_id','$time','$fare','$discount','$name','$driver_id')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'ticketlist.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'sell_sjt.php'; ";
        echo "</script>";
    }

require __DIR__ . "/vendor/autoload.php";
use Dompdf\Dompdf;
use Dompdf\Options;

$html = '<center><img src="logo1.png" width="50"></center>';
$html .= '<center><h3 style="color:black;"> Bus Service to Kalasin University </h3></center>';
$html .= "วันที่เดินทาง : $day_trip";
$html .= "วันที่เดินทาง : $line";
$html .= "วันที่เดินทาง : $bus_id";
$html .= "วันที่เดินทาง : $seat_no";
$html .= "วันที่เดินทาง : $dep_id";
$html .= "วันที่เดินทาง : $arr_id";
$html .= "วันที่เดินทาง : $time";
$html .= "วันที่เดินทาง : $fare";
$html .= "วันที่เดินทาง : $discount";
$html .= "วันที่เดินทาง : $name";
$html .= "วันที่เดินทาง : $driver_id";

$options = new Options;
$options->setChroot(__DIR__);

$dompdf = new Dompdf;($options);
$dompdf->setPaper("A6","portrait");
$dompdf->loadHtmlFile("sell_sjt.php");

$dompdf->loadHtml ("$html");
$dompdf->render();
$dompdf->addInfo("Title","An Example PDF");
$dompdf->stream("ticket.pdf",["Attachment" => 0]);


?>
</body>

</html>