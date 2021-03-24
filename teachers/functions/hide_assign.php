<?php
 require '../../required/connect.php';
 
	$likeid = $_POST['like_id'];

	$sql = "UPDATE assignments SET status='0' WHERE id='$likeid'";

if ($connect->query($sql) === TRUE) {
	echo 'Assignment Hidden <i class="fa fa-check"></i>';
} else {
    echo 'Error <i class="fa fa-times"></i>';
 }

?>