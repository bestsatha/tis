<?php
    include("admin/config/condb.php");
    $type_no = $_POST["type_no"];
    $route_no = $_POST["route_no"];
    $bus_reg = $_POST["bus_reg"];
    $bus_no = $_POST["bus_no"];
    $driver_name = $_POST["driver_name"];
    $license_no = $_POST["license_no"];
    $day = $_POST["day"];
    $timein = $_POST["timein"];
    $timeout = $_POST["timeout"];
    $places1 = $_POST["places1"];
    $places2 = $_POST["places2"];
    $mile1 = $_POST["mile1"];
    $mile2 = $_POST["mile2"];
    $distrance = $_POST["distrance"];
    $hours = $_POST["hours"];


    $sql = "INSERT INTO bookcar (type_no,route_no,bus_reg,bus_no,driver_name,license_no,day,timein,timeout,places1,places2,mile1,mile2,distrance,hours) VALUES ('$type_no','$route_no','$bus_reg','$bus_no','$driver_name','$license_no','$day','$timein','$timeout','$places1','$places2','$mile1','$mile2','$distrance','$hours')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ทำการบันทึกข้อมูลสำเร็จเรียบร้อยแล้ว');";
        echo "window.location = 'bookcar.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'bookcar.php'; ";
        echo "</script>";
    }
    ?>