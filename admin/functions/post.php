	<?php
	require_once("../required/function.php");
	
	if (isset($_POST['post'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$topic = data_input($_POST['topic']);
		$note = data_input($_POST['note']);
		$date = data_input($_POST['date']);
		$time = data_input($_POST['time']);
		$teacher = data_input($_POST['teacher']);

		$query2 = "INSERT INTO notes (class, subject, topic, note, tutor_id, date, time)
		VALUE('$class','$subject','$topic','$note','$teacher','$date','$time')";

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
		$teacher = data_input($_POST['teacher']);

		$query2 = "INSERT INTO videos (class, subject, title, vid_link, tutor_id, date, time)
		VALUE('$class','$subject','$title','$vid_link','$teacher','$date','$time')";

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
		$teacher = data_input($_POST['teacher']);

		$query2 = "INSERT INTO assignments (class, subject, topic, assign_content, tutor_id, date, time, sub_date, status)
		VALUE('$class','$subject','$topic','$assign_content','$teacher','$date','$time','$sub_date','1')";

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

	if (isset($_POST['add_sub'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$dept = data_input($_POST['dept']);
		$description = data_input($_POST['description']);

		$query = "SELECT * FROM subjects WHERE subject='$subject' AND class='$class'";
		$result = (mysqli_query($connect, $query));

		if ($result->num_rows == 1){ ?>
			<div class="alert alert-danger">
					<strong>Error!</strong> The subject has been uploaded for this class!
			</div>
		<?php }else{

		$query2 = "INSERT INTO subjects (subject, description, class, dept)
		VALUE('$subject','$description','$class','$dept')";

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The subject was uploaded successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem uploading the subject!
				</div>
			<?php }
	}}

	if (isset($_POST['add_student'])){
		$reg = data_input($_POST['reg']);
		$surname = data_input($_POST['surname']);
		$othernames = data_input($_POST['othernames']);
		$gender = data_input($_POST['gender']);
		$dob = data_input($_POST['dob']);
		$class = data_input($_POST['class']);
		$dept = data_input($_POST['dept']);
		$guardian = data_input($_POST['guardian']);
		$phone = data_input($_POST['phone']);
		$password = data_input($_POST['password']);
		$hashed_password = md5($password);

		// Check if registration number exists
		$query = "SELECT * FROM student WHERE reg='$reg'";
		$result = (mysqli_query($connect, $query));

		if ($result->num_rows == 1){ ?>
			<div class="alert alert-danger">
					<strong>Error!</strong> Registration number colliding. Please, Try Again!
			</div>
		<?php }else{

		$query2 = "INSERT INTO student (reg, surname, othernames, gender, dob, class, dept, guardian, phone, password)
		VALUE('$reg','$surname','$othernames','$gender','$dob','$class','$dept','$guardian','$phone', '$hashed_password')";

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The student was added successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem adding the student!
				</div>
			<?php }
	}}

	if (isset($_POST['add_teacher'])){
		$name = data_input($_POST['name']);
		$username = data_input($_POST['username']);
		$gender = data_input($_POST['gender']);
		$dob = data_input($_POST['dob']);
		$phone = data_input($_POST['phone']);
		$yearjoined = data_input($_POST['yearjoined']);
		$password = data_input($_POST['password']);
		$hashed_password = md5($password);

		// Check if username exists
		$query = "SELECT * FROM tutor WHERE username='$username'";
		$result = (mysqli_query($connect, $query));

		if ($result->num_rows == 1){ ?>
			<div class="alert alert-warning">
					<strong>Error!</strong> Username already exists. Please, Try Again!
			</div>
		<?php }else{

		$query2 = "INSERT INTO tutor (name, phone, username, dob, gender, yearjoined, password)
		VALUE('$name','$phone','$username','$dob','$gender','$yearjoined','$hashed_password')";

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The teacher was added successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem adding the teacher!
				</div>
			<?php }
	}}
?>