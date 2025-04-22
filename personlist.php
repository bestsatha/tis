<?php
include("admin/config/condb.php"); // เชื่อมต่อฐานข้อมูล
$query = "SELECT driver_id,driver_prefix,driver_name,driver_surname,pst_name FROM tb_driver,tb_position WHERE tb_driver.pst_id=tb_position.pst_id ORDER BY tb_driver.driver_id;" or die("Error:" . mysqli_error($conn));
$result = mysqli_query($conn, $query);
// echo $query;
// exit();
?>
<table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
        <tr role="row" class="info">
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ลำดับ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รหัสพนักงาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อ-สกุล</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ตำแหน่ง</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) /*$i = 1; */ { ?>
            <tr>
                <td>
                    <?php strlen("") ?>
                </td>
                <td>
                    <?php echo $row['driver_id']; ?>
                </td>
                <td>
                    <?php echo $row['driver_prefix'] . '' .$row['driver_name'] . ' ' . $row['driver_surname']; ?>
                </td>
                <td>
                    <?php echo $row['pst_name']; ?>
                </td>
                <td>
                    <a class="btn btn-warning btn-flat btn-sm" href="position_edit.php?act=edit&pst_id=<?php echo $row['pst_name']; ?>">
                        แก้ไข
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger btn-flat btn-sm" href="position_del.php?pst_id=<?= $row['pst_name']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
                        ลบ
                    </a>
                </td>
            <?php } ?>
            </tr>
    </tbody>
</table>