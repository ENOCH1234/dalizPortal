	<?php
	require_once("../required/function.php");
	
	if (isset($_POST['upd_note'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$topic = data_input($_POST['topic']);
		$note = data_input($_POST['note']);
		$get_id = data_input($_POST['get_id']);

		$query2 = ("UPDATE notes SET class='$class', subject='$subject', topic='$topic', note='$note' WHERE id='$get_id'");

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The class note has been updated successfully!
			</div>

			<?php }else{ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> There was a problem updating the class note!
			</div>
			<?php }
	}

	if (isset($_POST['upd_vid'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$title = data_input($_POST['title']);
		$vid_link = data_input($_POST['vid_link']);
		$get_id = data_input($_POST['get_id']);

		$query2 = ("UPDATE videos SET class='$class', subject='$subject', title='$title', vid_link='$vid_link' WHERE id='$get_id'");

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The video has been updated successfully!
			</div>

			<?php }else{ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> There was a problem updating the class video!
			</div>
			<?php }
	}

	if (isset($_POST['upd_assign'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$topic = data_input($_POST['topic']);
		$assign_content = data_input($_POST['assign_content']);
		$sub_date = data_input($_POST['sub_date']);
		$get_id = data_input($_POST['get_id']);

		$query2 = ("UPDATE assignments SET class='$class', subject='$subject', topic='$topic', assign_content='$assign_content', sub_date='$sub_date' WHERE id='$get_id'");

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The assignment has been updated successfully!
			</div>

			<?php }else{ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> There was a problem updating the assignment!
			</div>
			<?php }
	}
?>