<?php
    include("admin/config/condb.php");
    $stop_id = $_POST["stop_id"];
    $day = $_POST["day"];
    $route_no = $_POST["route_no"];
    $bus_id = $_POST["bus_id"];
    $driver_name = $_POST["driver_name"];
    $depart = $_POST["depart"];
    $station_staff = $_POST["station_staff"];

    $sql = "INSERT INTO stations (stop_id,day,route_no,bus_id,driver_name,depart,station_staff) 
    VALUES ('$stop_id','$day','$route_no','$bus_id','$driver_name','$depart','$station_staff')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ทำการบันทึกข้อมูลสำเร็จเรียบร้อยแล้ว');";
        echo "window.location = 'stations.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'stations.php'; ";
        echo "</script>";
    }
    ?>