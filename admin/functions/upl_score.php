<?php
    require_once('../required/connect.php');
    require_once('../required/function.php');

    if (isset($_POST['submit_score'])){
    $score = data_input($_POST['score']);
    $stud_id = data_input($_POST['stud_id']);

    $query2 = "UPDATE assignment_sub SET score='$score', status='1' WHERE id='$stud_id'";
    if (mysqli_query($connect, $query2)) {
        ?>

        <div class="alert alert-success">
            <strong>Success!</strong> The student has been graded successfully!
        </div>

        <?php }else{?>
            <div class="alert alert-danger">
                <strong>Error!</strong> There was a problem in grading the student!
            </div>
        <?php
    } }?>