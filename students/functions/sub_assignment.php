	<?php
	require_once("../required/function.php");
	require_once("../required/function.php");
	
	if (isset($_POST['submit'])){
		$subject = data_input($_POST['subject']);
		$topic = data_input($_POST['topic']);
		$date = data_input($_POST['date']);
		$time = data_input($_POST['time']);
		$tutor_id = data_input($_POST['tutor_id']);
		$class = data_input($_POST['class']);
		$stud_reg = data_input($_POST['stud_reg']);
		$answer = data_input($_POST['answer']);

		$query2 = "INSERT INTO assignment_sub (stud_reg, class, tutor_id, subject, topic, answer, date, time)
		VALUE('$stud_reg','$class','$tutor_id','$subject','$topic','$answer','$date','$time')";

		if (mysqli_query($connect, $query2)) { 
			$sub = $subject;
			$top = $topic;
			?>

			<div class="alert alert-success">
				<strong>Success!</strong> The Assignment has been submitted successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem submitting the assignment!
				</div>
			<?php $sub = $subject;
			$top = $topic;
		}
	}
?>