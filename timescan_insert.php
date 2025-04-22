<?php
    include("admin/config/condb.php");
    $date = $_POST["date"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $route_no = $_POST["route_no"];
    $driver_id = $_POST["driver_id"];
    $bus_no = $_POST["bus_no"];
    $in = $_POST["in"];
    $out = $_POST["out"];
    $hours = $_POST["hours"];


    $sql = "INSERT INTO timescan (date,month,year,route_no,driver_id,bus_no,in,out,hours) VALUES ('$date','$month','$year','$route_no','$driver_id','$bus_no','$in','$out','$hours')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ทำการบันทึกข้อมูลสำเร็จเรียบร้อยแล้ว');";
        echo "window.location = 'time_management.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'time_management.php'; ";
        echo "</script>";
    }
    ?>