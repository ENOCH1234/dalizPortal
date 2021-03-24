<?php
    include ("../required/connect.php");
	include ("../required/core.php");
	$get_sub = $_GET['sub'];
	$get_top = $_GET['topic'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
	<title>e-Portal Daliz School | My Notes :: <?php echo $get_sub; ?> - <?php echo $get_top; ?></title>
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
	<script src="jquery-3.5.1.min"></script>
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
								<div class="page-title"><?php echo $get_top; ?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="./">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="notes">My Notes</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="sub_note?sub=<?php echo $get_sub?>"><?php echo $get_sub; ?></a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"><?php echo $get_top; ?></li>
							</ol>
						</div>
					</div>
					<div class="row">
					<div class="col-md-12 col-sm-12">
							<div class="panel tab-border card-box">
								<header class="panel-heading panel-heading-gray custom-tab ">
									<ul class="nav nav-tabs">
										<li class="nav-item"><a href="#home" data-toggle="tab" class="active"><i class="fa fa-book"></i> Content</a>
										</li>
										<li class="nav-item"><a href="#assignment" data-toggle="tab"><i class="fa fa-edit"></i> Assignment</a>
									</ul>
								</header>

								<?php
								$query = ("SELECT * FROM notes WHERE subject='$get_sub' AND topic='$get_top'");
								$result = $connect->query($query);
								$course_data=mysqli_fetch_assoc($result);
								$note = $course_data['note'];
								$date = $course_data['date'];
								$time = $course_data['time'];
								$tutor_id = $course_data['tutor_id'];

								// Get tutor details
								$query = ("SELECT name FROM tutor WHERE id='$tutor_id'");
								$result = $connect->query($query);
								$user_data=mysqli_fetch_assoc($result);
								$name = $user_data['name'];
								?>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane active" id="home">
											<?php 
											echo "<p><i class='fa fa-user'></i> <b>Teacher:</b> $name </p>";
											echo "<p><i class='fa fa-calendar'></i> <b>Upload Date:</b> $date by $time </p>";
											echo "<hr>";
											echo html_entity_decode($note); ?>
										</div>
										<div class="tab-pane" id="assignment">
											<!-- Get Assignment Content -->
										<?php
											$query = ("SELECT * FROM assignments WHERE subject='$get_sub' AND topic='$get_top'");
											$result = $connect->query($query);
											$course_data=mysqli_fetch_assoc($result);
											if ($result->num_rows == 1) {
												$content = $course_data['assign_content'];
												$sub_date = $course_data['sub_date'];
												$status = $course_data['status'];
												$tutor_id = $course_data['tutor_id'];

												// Get Assignment from db if already submitted
												$query1 = ("SELECT * FROM assignment_sub WHERE subject='$get_sub' AND topic='$get_top' AND stud_reg='$user_id'");
												$result1 = $connect->query($query1);
												if ($result1->num_rows == 1) {
													$sub_sta = "<span class='tstSuccess btn btn-success'>You have submitted</span>";
												}else{
													$sub_sta = "<span class='tstWarning btn btn-warning'>Not Yet Submitted</span>";
												}

												// Check if assignment is set to visible or hidden by tutor
												if ($status == 1){
												echo "<p><i class='fa fa-calendar'></i> <b>Submission Date:</b> $sub_date </p>";
												echo "<p><i class='fa fa-check'></i> <b>Submission Status:</b> $sub_sta </p>";
												echo "<hr>";
												echo html_entity_decode($content);
												echo "<hr>";

												// Check if user have submitted... else echo submission form
												if ($result1->num_rows == 0) {
													?>
												<form id="assign_submit">
													<div class="card-body row">
														<div class="col-md-12 col-sm-12" id="answer-group" class="form-group">
															<!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																<input class="mdl-textfield__input" name="answer" type="text" tabIndex="-1">
																<label class="mdl-textfield__label">Answer</label>
															</div> -->
															<textarea name="answer" id="formsummernote" cols="30" rows="10" required>
																<h3 style="text-align: center;">
																	<a href="#"	style="background-color: rgb(255, 255, 255); line-height: 1.428571429;">Put Answer Content Here!</a>
																</h3>
															</textarea>
														</div>
														<?php

														// Get date and time
														function datr(){
														$time = time();
														$actual_time =date('d M, Y', $time);
														echo $actual_time;	
														}

														function tim(){
														$time = time();
														$actual_time =date('H:i:s', $time);
														echo $actual_time;
														} ?>

														<!-- Echo hidden form objects -->
														<input type="hidden" name="date" value="<?php echo datr()?>" required>
														<input type="hidden" name="time" value="<?php echo tim()?>" required>
														<input type="hidden" name="tutor_id" value="<?php echo $tutor_id ?>" required>
														<input type="hidden" name="subject" value="<?php echo $get_sub ?>" required>
														<input type="hidden" name="topic" value="<?php echo $get_top ?>" required>
														<input type="hidden" name="stud_reg" value="<?php echo $user_id ?>" required>
														<input type="hidden" name="class" value="<?php echo $class ?>" required>
														
														<div class="col-lg-12 p-t-20 text-center">
															<input type="submit" name="submit"
																class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" value="Submit Assignment"></input>
														</div>
													</div>
												</form>

												<?php }}else if ($status == 0){ ?>
													<!-- Echo assignment submission closed -->
													<p>Submission for has been closed on <i><strong><?php echo $sub_date; ?></strong></i></p>
												<?php }}else{ ?>
													<!-- Assignment has not been uploaded -->
												<p>No assignment has been given for <i>"<?php echo $get_top; ?>"</i> yet. <strong>Please, check back later.</strong></p>
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
		$('#assign_submit').submit(function(event) {
		
		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
		
		$('.form-group').removeClass('has-error'); // remove the error class
		$('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
		var formData = {
			'answer': $('textarea[name=answer]').val(),
			'date': $('input[name=date]').val(),
			'time': $('input[name=time]').val(),
			'stud_reg': $('input[name=stud_reg]').val(),
			'tutor_id': $('input[name=tutor_id]').val(),
			'subject': $('input[name=subject]').val(),
			'topic': $('input[name=topic]').val(),
			'class': $('input[name=class]').val()
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
				if (data.errors.answer) {
					$('#answer-group').addClass('has-error'); // add the error class to show red input
					$('#answer-group').append('<div class="help-block">' + data.errors.answer + '</div>'); // add the actual error message under our input
				}

				} else {
				// ALL GOOD! just show the success message!
				$('#assign_submit').html('<div class="alert alert-success">' + data.message + '</div>');
				}

			})
			
			// using the fail promise callback
			.fail(function(data) {
				//Server failed to respond - Show an error message
				$('#assign_submit').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
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