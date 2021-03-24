<?php
    include ("../required/connect.php");
	include ("../required/core.php");
	$get_id = $_GET['id'];
	// if (!isset($get_id)){
	// 	header('Location: notes');
	// }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
	<title>e-Portal Daliz School | Edit Subject</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
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
	<!-- dropzone -->
	<link href="../assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="../assets/plugins/flatpicker/css/flatpickr.min.css" />
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
								<div class="page-title">Edit Subject</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href=dashboard>Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><i class="fa fa-book"></i>&nbsp;<a class="parent-item" href="#">Subjects</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="subjects">All Subjects</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Subject</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Subject Details</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<?php include ('functions/update.php') ?>
								<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
									<?php
										$query = ("SELECT * FROM subjects WHERE id='$get_id'");
										$result = mysqli_query($connect,$query);
										while($row = mysqli_fetch_assoc($result)) {
											$class = $row['class'];
											$subject = $row['subject'];
											$dept = $row['dept'];
											$description = $row['description'];
									?>
									<div class="card-body row">
										<div class="col-lg-6 p-t-20">
											<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<input class="mdl-textfield__input" name="class" type="text" id="list1" value="<?php echo $class;?>" readonly
													tabIndex="-1" required>
												<label for="list1" class="pull-right margin-0">
													<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
												</label>
												<label for="list1" class="mdl-textfield__label">Choose Class</label>
												<ul data-mdl-for="list1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
													<li class="mdl-menu__item" data-val="Primary 1">Primary 1</li>
													<li class="mdl-menu__item" data-val="Primary 2">Primary 2</li>
													<li class="mdl-menu__item" data-val="Primary 3">Primary 3</li>
													<li class="mdl-menu__item" data-val="Primary 4">Primary 4</li>
													<li class="mdl-menu__item" data-val="Primary 5">Primary 5</li>
													<li class="mdl-menu__item" data-val="JSS 1">JSS 1</li>
													<li class="mdl-menu__item" data-val="JSS 2">JSS 2</li>
													<li class="mdl-menu__item" data-val="JSS 3">JSS 3</li>
													<li class="mdl-menu__item" data-val="SSS 1">SSS 1</li>
													<li class="mdl-menu__item" data-val="SSS 2">SSS 2</li>
													<li class="mdl-menu__item" data-val="SSS 3">SSS 3</li>
												</ul>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<input class="mdl-textfield__input" name="dept" type="text" id="list2" value="<?php echo $dept;?>" readonly
													tabIndex="-1">
												<label for="list2" class="pull-right margin-0">
													<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
												</label>
												<label for="list2" class="mdl-textfield__label">Choose Department <span style="color: red; font-size: 10px;"><strong>(For Senior Students)</strong></span></label>
												<ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
													<li class="mdl-menu__item" data-val="Arts">Arts</li>
													<li class="mdl-menu__item" data-val="Science">Science</li>
													<li class="mdl-menu__item" data-val="Commercial">Commercial</li>
												</ul>
											</div>
										</div>
										<div class="col-lg-12 p-t-20">
											<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<input class="mdl-textfield__input" name="subject" type="text" id="list222" value="<?php echo $subject;?>"
													tabIndex="-1" required>
												<label for="list222" class="mdl-textfield__label">Subject Title</label>
											</div>
										</div>
										<div class="col-lg-12 p-t-20">
											<div class="mdl-textfield mdl-js-textfield txt-full-width">
												<textarea class="mdl-textfield__input" name="description" rows="4" id="text7" required><?php echo $description;?></textarea>
												<label class="mdl-textfield__label" for="text7">Short Description</label>
											</div>
										</div>
										<div class="col-lg-12 p-t-20 text-center">
											<button type="submit" name="upd_sub"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										</div>
									</div>
									<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
								</form>
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
		<?php }
		// }
		 ?>
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
	<script src="../assets/js/pages/material-select/getmdl-select.js"></script>
	<script src="../assets/plugins/flatpicker/js/flatpicker.min.js"></script>
	<script src="../assets/js/pages/date-time/date-time.init.js"></script>
	<!-- dropzone -->
	<script src="../assets/plugins/dropzone/dropzone.js"></script>
	<script src="../assets/plugins/dropzone/dropzone-call.js"></script>
	<!-- chart js -->
	<script src="../assets/plugins/chart-js/Chart.bundle.js"></script>
	<script src="../assets/plugins/chart-js/utils.js"></script>
	<script src="../assets/js/pages/chart/chartjs/home-data3.js"></script>
	<script src="../assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="../assets/js/pages/sparkline/sparkline-data.js"></script>
	<!-- end js include path -->
</body>
</html>