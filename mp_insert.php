   <?php
    include("admin/config/condb.php");
    // $mp_no = $_POST["mp_no"];
    $mp_name = $_POST["mp_name"];
    $mp_surname = $_POST["mp_surname"];
    $mp_type = $_POST["mp_type"];
    $mp_month = $_POST["mp_month"];
    $mp_year = $_POST["mp_year"];
    $mp_school = $_POST["mp_school"];
    $mp_sell = $_POST["mp_sell"];
    $mp_datesell = $_POST["mp_datesell"];

    $sql = "INSERT INTO monthlypass (mp_name,mp_surname,mp_type,mp_month,mp_year,mp_school,mp_sell,mp_datesell) 
    VALUES ('$mp_name','$mp_surname','$mp_type','$mp_month','$mp_year','$mp_school','$mp_sell','$mp_datesell')";
    $result = mysqli_query($conn, $sql) or die("Error in query หรือจัดการข้อมูลไม่ได้ : $sql ");
    mysqli_close($conn);

    //ถ้าสำเร็จให้ขึ้นอะไร
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'sell_mp.php';";
        echo "</script>";
    } else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! การบันทึกข้อมูลไม่สำเร็จกรุณาตรวจสอบมีข้อผิดพลาด');";
        echo "window.location = 'sell_mp.php'; ";
        echo "</script>";
    }
    ?>