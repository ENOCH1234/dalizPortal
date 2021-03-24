<?php
 require '../../required/connect.php';

	$likeid = $_POST['like_id'];

		$sql3 = "DELETE FROM videos WHERE id='$likeid'";
		if ($connect->query($sql3) === TRUE) {
		echo '<i class="fa fa-check"></i> Video Deleted!';
	} else {
		echo 'Error!!! <i class="fa fa-times"></i>';
	}
?>