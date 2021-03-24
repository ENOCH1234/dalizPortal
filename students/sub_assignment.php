	<?php
	
	$newanswer = false;
	if (isset($_POST['answer'])){
		require_once("../required/function.php");
		require_once("../required/function.php");

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
			echo "The Assignment has been submitted successfully".$newanswer;
		 }else{
			echo "There was a problem submitting the assignment!".$newanswer;
		}}
?>