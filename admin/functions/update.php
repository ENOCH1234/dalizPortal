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

	if (isset($_POST['upd_sub'])){
		$class = data_input($_POST['class']);
		$subject = data_input($_POST['subject']);
		$dept = data_input($_POST['dept']);
		$description = data_input($_POST['description']);
		$get_id = data_input($_POST['get_id']);

		$query2 = ("UPDATE subjects SET subject='$subject', description='$description', class='$class', dept='$dept' WHERE id='$get_id'");

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The subject details has been updated successfully!
			</div>

			<?php }else{ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> There was a problem updating the subject details!
			</div>
			<?php }
	}

	if (isset($_POST['upd_student'])){
		$reg = data_input($_POST['reg']);
		$surname = data_input($_POST['surname']);
		$othernames = data_input($_POST['othernames']);
		$gender = data_input($_POST['gender']);
		$class = data_input($_POST['class']);
		$dept = data_input($_POST['dept']);
		$guardian = data_input($_POST['guardian']);
		$phone = data_input($_POST['phone']);
		$dob = data_input($_POST['dob']);
		$get_id = data_input($_POST['get_id']);

		$query2 = ("UPDATE student SET reg='$reg', surname='$surname', othernames='$othernames', gender='$gender', dob='$dob', class='$class',
		dept='$dept', guardian='$guardian', phone='$phone' WHERE id='$get_id'");

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The student details has been updated successfully!
			</div>

			<?php }else{ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> There was a problem updating the student's details!
			</div>
			<?php }
	}

	if (isset($_POST['upd_teacher'])){
		$name = data_input($_POST['name']);
		$dob = data_input($_POST['dob']);
		$gender = data_input($_POST['gender']);
		$phone = data_input($_POST['phone']);
		$yearjoined = data_input($_POST['yearjoined']);
		$get_id = data_input($_POST['get_id']);

		$query2 = ("UPDATE tutor SET name='$name', dob='$dob', gender='$gender', phone='$phone', yearjoined='$yearjoined' WHERE id='$get_id'");

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The teacher's detail(s) has been updated successfully!
			</div>

			<?php }else{ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> There was a problem updating the teacher's detail(s)!
			</div>
			<?php }
	}

	if (isset($_POST['upd_class'])){
		$oldclass = data_input($_POST['oldclass']);
		$newclass = data_input($_POST['newclass']);

		$query2 = ("UPDATE student SET class='$newclass' WHERE class='$oldclass'");

		if (mysqli_query($connect, $query2)) { ?>

			<div class="alert alert-success">
				<strong>Success!</strong> The students were promoted successfully!
			</div>

			<?php }else{ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> There was an error updating students' class!
			</div>
			<?php }
	}
?>