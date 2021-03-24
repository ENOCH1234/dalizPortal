<?php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($_POST['answer']))
    $errors['answer'] = 'Answer is required.';

// return a response ===========================================================

// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {

    // if there are no errors process our form, then return a message
        require_once('../../required/connect.php');
        require_once('../../required/function.php');
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
             // show a message of success and provide a true success variable
            $data['success'] = true;
            $data['message'] = 'Success! You have submitted your assignment';
			?>

			<div class="alert alert-success">
				<strong>Success!</strong> The Assignment has been submitted successfully!
			</div>

			<?php }else{?>
				<div class="alert alert-danger">
					<strong>Error!</strong> There was a problem submitting the assignment!
				</div>
			<?php
		}
}

// return all our data to an AJAX call
echo json_encode($data);