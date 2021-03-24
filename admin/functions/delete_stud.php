<?php
 require '../../required/connect.php';

	$likeid = $_POST['like_id'];

		$sql3 = "DELETE FROM student WHERE id='$likeid'";
		if ($connect->query($sql3) === TRUE) {
		echo '<i class="fa fa-check"></i> Student Deleted Successfully!';
	} else {
		echo 'Error!!! <i class="fa fa-times"></i>';
	}
?>