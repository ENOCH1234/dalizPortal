<?php
    include ("../required/connect.php");
	include ("../required/core.php");
	$get_id = $_GET['id'];
	$query = ("SELECT * FROM assignment_sub WHERE id='$get_id'");
	$result = mysqli_query($connect, $query);
	$assign_data = mysqli_fetch_assoc($result);
	// Fetch Assignment Content
	$subject = $assign_data['subject'];
	$stud_reg = $assign_data['stud_reg'];
	$topic = $assign_data['topic'];
	$class = $assign_data['class'];
	$answer = $assign_data['answer'];
	$date_submit = $assign_data['date'];
	$time_submit = $assign_data['time'];
	$mark_status = $assign_data['status'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
	<title>e-Portal Daliz School | Grade Assignment - <?php echo $topic; ?></title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!-- data tables -->
	<link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
		type="text/css" />
		<link href="../assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!--bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../assets/css/material_style.css">
	<!-- Theme Styles -->
	<link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- For Submission -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
	<!-- favicon -->
	<link rel="shortcut icon" href="../assets/img/favicon.png" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
        <?php
            include ("part/header.php");
            ?>
		<!-- end header -->
		<!-- start color quick setting -->
		<?php
            include ("part/setting.php");
            ?>
		<!-- end color quick setting -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php
            include ("part/sidebar.php");
            ?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Grade Assignment: <?php echo $topic; ?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="./">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="assignments">Assignments</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="grade_assignment?<?php echo "id=1"; ?>">Grade Assignment</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Grade Student</li>
							</ol>
						</div>
					</div>
					<div class="row">
					<div class="col-md-12 col-sm-12">
							<div class="panel tab-border card-box">
								<header class="panel-heading panel-heading-gray custom-tab ">
									<ul class="nav nav-tabs">
										<li class="nav-item"><a href="#home" data-toggle="tab" class="active"><i class="fa fa-book"></i> Assignment Question</a>
										</li>
										<li class="nav-item"><a href="#assignment" data-toggle="tab"><i class="fa fa-edit"></i> Student Answer</a>
									</ul>
								</header>

								<?php
								$query = ("SELECT * FROM assignments WHERE topic='$topic'");
								$result = $connect->query($query);
								$course_data=mysqli_fetch_assoc($result);
								// Fetch Assignment Content
								$assign_content = $course_data['assign_content'];
								$date = $course_data['date'];
								$time = $course_data['time'];
								$sub_date = $course_data['sub_date'];
								?>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane active" id="home">
											<?php 
											echo "<p><i class='fa fa-calendar'></i> <b>Upload Date:</b> $date by $time </p>";
											echo "<p><i class='fa fa-calendar'></i> <b>Submission Deadline:</b> $sub_date</p>";
											echo "<hr>";
											echo html_entity_decode($assign_content); ?>
										</div>
										<?php include ('functions/upl_score.php') ?>
										<div class="tab-pane" id="assignment">
										<?php
											// Fetch Student Details
											$query = ("SELECT * FROM student WHERE id='$stud_reg'");
											$result = mysqli_query($connect,$query);
											$student_data = mysqli_fetch_assoc($result);
											$surname = $student_data['surname'];
											$othernames = $student_data['othernames'];

											echo "<p><i class='fa fa-user'></i> <b>Student Name:</b> $surname $othernames </p>";
											echo "<p><i class='fa fa-calendar'></i> <b>Submission Date:</b> $date_submit by $time_submit </p>";
											echo "<hr>";
											echo html_entity_decode($answer);
											echo "<hr>";

											// Check if student was graded
											if($mark_status=='1'){
												// Display Student Graded
												echo "<center><span class='tstSuccess btn btn-success'>Student Has Been Graded</span></center>";
												}else{
												?>
											
											<!-- The form to save student score -->
											<form id="submit_score">
												<div class="card-body row">
													<div class="col-md-12 col-sm-12" id="score-group" class="form-group">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
															<input class="mdl-textfield__input" type="number" maxlength="2" name="score" id="txtPrice" required>
															<label class="mdl-textfield__label">Score</label>
														</div>
													</div>
													<!-- Echo hidden form element -->
													<input type="hidden" name="stud_id" value="<?php echo $get_id ?>" required>
													
													<div class="col-lg-12 p-t-20 text-center">
														<button type="submit" name="submit_score"
															class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Grade Student</button>
													</div>
												</div>
											</form>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			<?php
            include ("part/chat.php");
            ?>
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php
            include ("part/footer.php");
            ?>
		<!-- end footer -->
	</div>
	<script>
		$(document).ready(function() {

		// process the form
		$('#submit_score').submit(function(event) {
		
		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
		
		$('.form-group').removeClass('has-error'); // remove the error class
		$('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
		var formData = {
			'score': $('input[name=score]').val(),
			'stud_id': $('input[name=stud_id]').val(),
		};

		// process the form
		$.ajax({
			type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url         : 'submission.php', // the url where we want to POST
			data        : formData, // our data object
			dataType    : 'json', // what type of data do we expect back from the server
			encode          : true
		})
			// using the done promise callback
			.done(function(data) {

				// log data to the console so we can see
				console.log(data);

				// here we will handle errors and validation messages
				if ( ! data.success) {

				// handle errors for answer ---------------
				if (data.errors.score) {
					$('#score-group').addClass('has-error'); // add the error class to show red input
					$('#score-group').append('<div class="help-block">' + data.errors.score + '</div>'); // add the actual error message under our input
				}

				} else {
				// ALL GOOD! just show the success message!
				$('#submit_score').html('<div class="alert alert-success">' + data.message + '</div>');
				}

			})
			
			// using the fail promise callback
			.fail(function(data) {
				//Server failed to respond - Show an error message
				$('#submit_score').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
			});
		});
		});
	</script>
	<!-- start js include path -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/popper/popper.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Common js-->
	<script src="../assets/js/app.js"></script>
	<script src="../assets/js/layout.js"></script>
	<script src="../assets/js/theme-color.js"></script>
	<!-- material -->
	<script src="../assets/plugins/material/material.min.js"></script>
	<!-- summernote -->
	<script src="../assets/plugins/summernote/summernote.js"></script>
	<script src="../assets/js/pages/summernote/summernote-data.js"></script>
</body>
	</html>