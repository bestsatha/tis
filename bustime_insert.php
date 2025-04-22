<?php
    include("admin/config/condb.php");
    $bus_no = $_POST["bus_no"];
    $driver_name = $_POST["driver_name"];
    $day = $_POST["day"];
    $time = $_POST["time"];
    $stop_name = $_POST["stop_name"];
    $mile = $_POST["mile"];


    $sql = "INSERT INTO bustime (bus_no,driver_name,day,time,stop_name,mile) VALUES ('$bus_no','$driver_name','$day','$time','$stop_name','$mile')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ทำการบันทึกข้อมูลสำเร็จเรียบร้อยแล้ว');";
        echo "window.location = 'bustime.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'bustime.php'; ";
        echo "</script>";
    }
    ?>