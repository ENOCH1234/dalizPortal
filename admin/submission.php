<?php
require_once("../required/core.php");
require_once("../required/function.php");

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($_POST['score']))
    $errors['score'] = 'Score is required.';

// return a response ===========================================================

// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {

    // if there are no errors process our form, then return a message
    $score = data_input($_POST['score']);
    $stud_id = data_input($_POST['stud_id']);

    $query2 = "UPDATE assignment_sub SET score='$score', status='1' WHERE id='$stud_id'";

    if (mysqli_query($connect, $query2)) { 
    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Assignment Graded Succesfully. Kindly Reload this page (ctrl+r) to see changes!';
}}

// return all our data to an AJAX call
echo json_encode($data);