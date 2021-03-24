<?php include_once('processForm.php');
      include_once('../../required/connect.php');
      include_once('../../required/core.php');
      if (loggedin()){
        $user_id = $_SESSION['user_id'];
      }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Upload Profile Picture</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
  <!-- favicon -->
	<link rel="shortcut icon" href="../../assets/img/favicon.png" />
  <link href="../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <a href="../"><i class="fa fa-arrow-left"></i> Go Back</a>
        <!-- <a href="profiles.php">View all profiles</a> -->
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update Image</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update Image</h4>
              </div>
              <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          <!-- <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control"></textarea>
          </div> -->
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script src="script.js"></script>