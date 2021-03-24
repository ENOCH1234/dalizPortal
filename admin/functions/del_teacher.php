<?php
 require '../../required/connect.php';

	$likeid = $_POST['like_id'];

		$sql3 = "DELETE FROM tutor WHERE id='$likeid'";
		if ($connect->query($sql3) === TRUE) {
		echo '<i class="fa fa-check"></i> Teacher Deleted!';
	} else {
		echo 'Error!!! <i class="fa fa-times"></i>';
	}
?>