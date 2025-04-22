   <?php
    include("admin/config/condb.php");
    // $mp_no = $_POST["mp_no"];
    $tp_id = $_POST["tp_id"];
    $driver_id = $_POST["driver_id"];

    $sql = "INSERT INTO ticketpaper (tp_id,driver_id) VALUES ('$tp_id','$driver_id')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'rep_tp.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'rep_tp.php'; ";
        echo "</script>";
    }
    ?>