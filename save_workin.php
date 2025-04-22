<meta charset="utf-8">
<?php 
include("admin/config/condb.php");

//print_r($_POST);

 	//save workin
 	if(isset($_POST["workin"])){

		 	$workdate = date('Y/m/d');
			$driver_id = mysqli_real_escape_string($conn,$_POST["driver_id"]);
			$driver_name = mysqli_real_escape_string($conn,$_POST["driver_name"]);
			$workin = mysqli_real_escape_string($conn,$_POST["workin"]);
			$status = mysqli_real_escape_string($conn,$_POST["status"]);

			$sql = "INSERT INTO work_io
			(workdate, driver_id,driver_name, workin,status)
			VALUES
			('$workdate', '$driver_id','$driver_name', '$workin','$status')";
			$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

					mysqli_close($conn);
					if($result){
					echo "<script type='text/javascript'>";
					echo "alert('บันทึกข้อมูลสำเร็จ');";
					echo "window.location = 'workin_driver.php'; ";
					echo "</script>";
					}else{
					echo "<script type='text/javascript'>";
					echo "alert('Error');";
					echo "window.location = 'workin_driver.php'; ";
					echo "</script>";
					}

		//save workout			
 	}elseif(isset($_POST["workout"])) {

 		// echo $_POST["workout"];

 		// exit;

 			$workdate = date('d/m/y');
 		    $driver_id = mysqli_real_escape_string($conn,$_POST["driver_id"]);
			$driver_name = mysqli_real_escape_string($conn,$_POST["driver_name"]);
			$workout = mysqli_real_escape_string($conn,$_POST["workout"]);
			$status = mysqli_real_escape_string($conn,$_POST["status"]);

			$sql2 = "UPDATE work_io SET 
			workout='$workout'
			WHERE driver_id=$driver_id  AND workdate='$workdate'
			";
			$result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error($conn));

			// echo $sql2;
			// exit;

					mysqli_close($conn);
					if($result2){
					echo "<script type='text/javascript'>";
					echo "alert('บันทึกข้อมูลสำเร็จ');";
					echo "window.location = 'workin_driver.php'; ";
					echo "</script>";
					}else{
					echo "<script type='text/javascript'>";
					echo "alert('Error');";
					echo "window.location = 'workin_driver.php'; ";
					echo "</script>";
					}
 		 
 	} //}elseif (isset(($_POST["workout"])) {
 else{
 			echo "<script type='text/javascript'>";
 			echo "alert('คุณได้บันทึกเวลาเข้า-ออกงานวันนี้เรียบร้อยแล้ว');";
			echo "window.location = 'workin_driver.php'; ";
			echo "</script>";
 }	
?>
