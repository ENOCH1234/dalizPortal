	<?php
	require_once("../required/function.php");
	
	if (isset($_POST['post'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$topic = data_input($_POST['topic']);
		$note = data_input($_POST['note']);
		$date = data_input($_POST['date']);
		$time = data_input($_POST['time']);

		$query2 = "INSERT INTO notes (class, subject, topic, note, tutor_id, date, time)
		VALUE('$class','$subject','$topic','$note','$user_id','$date','$time')";

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The class note has been uploaded successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem uploading the class note!
				</div>
			<?php }
	}

	if (isset($_POST['upl_vid'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$title = data_input($_POST['title']);
		$vid_link = data_input($_POST['vid_link']);
		$date = data_input($_POST['date']);
		$time = data_input($_POST['time']);

		$query2 = "INSERT INTO videos (class, subject, title, vid_link, tutor_id, date, time)
		VALUE('$class','$subject','$title','$vid_link','$user_id','$date','$time')";

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The video was uploaded successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem uploading the video!
				</div>
			<?php }
	}

	if (isset($_POST['upl_as'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$topic = data_input($_POST['topic']);
		$assign_content = data_input($_POST['assign_content']);
		$sub_date = data_input($_POST['sub_date']);
		$date = data_input($_POST['date']);
		$time = data_input($_POST['time']);

		$query2 = "INSERT INTO assignments (class, subject, topic, assign_content, tutor_id, date, time, sub_date, status)
		VALUE('$class','$subject','$topic','$assign_content','$user_id','$date','$time','$sub_date','1')";

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The assignment was uploaded successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem uploading the assignment!
				</div>
			<?php }
	}
?>