<?php
  $msg = "";
  $msg_class = "";
  // $conn = mysqli_connect("localhost", "root", "", "img-upload");
  require_once("../../required/connect.php");
  require_once("../../required/core.php");
  if (loggedin()){
    $user_id = $_SESSION['user_id'];
  }
  if (isset($_POST['save_profile'])) {
    // for the database
    // $bio = stripslashes($_POST['bio']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "../../profile-images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "UPDATE admin SET profile_image='$profileImageName' WHERE id='$user_id'";
        if(mysqli_query($connect, $sql)){
          $msg = "Image uploaded and saved <a href='../dashboard'><strong>GO BACK</strong></a>";
          $msg_class = "alert-success";
          header('Location: ../dashboard');
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }
?>