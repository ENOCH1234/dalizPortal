<?php
    include ("../required/connect.php");
	include ("../required/core.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
	<title>e-Portal Daliz School | Upload Term Result</title>
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
	<link href="../assets/plugins/summernote/summernote.css" rel="stylesheet">
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
								<div class="page-title">Upload Term Result</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Term Results</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Upload Term Result</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Result Upload</header>
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
								<?php include ('functions/result_func.php') ?>
								<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
								<div class="card-body row">
								<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" name="class" type="text" id="list1" value="" readonly
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
											<input class="mdl-textfield__input" name="subject" type="text" id="list2" value="" readonly
												tabIndex="-1" required>
											<label for="list2" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list2" class="mdl-textfield__label">Choose Subject</label>
											<ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<?php
													$sql="SELECT DISTINCT `subject` FROM subjects";
													$result = mysqli_query($connect,$sql);
													while($row = mysqli_fetch_assoc($result)) {
														$subject = $row['subject'];
														echo "<li class='mdl-menu__item' data-val='$subject'>$subject</li>";
													} ?>
											</ul>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" name="teacher" type="text" id="list222" value="" readonly
												tabIndex="-1" required>
											<label for="list222" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list222" class="mdl-textfield__label">Choose Teacher</label>
											<ul data-mdl-for="list222" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<?php
													$sql="SELECT name, id FROM tutor";
													$result = mysqli_query($connect,$sql);
													while($row = mysqli_fetch_assoc($result)) {
														$id = $row['id'];
														$name = $row['name'];
														echo "<li class='mdl-menu__item' data-val='$name'>$id - $name</li>";
													} ?>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" name="session1" type="text" id="list3" value="" readonly
												tabIndex="-1" required>
											<label for="list3" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list3" class="mdl-textfield__label">Choose Session</label>
											<ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<li class="mdl-menu__item" data-val="2020/2021">2020/2021</li>
												<li class="mdl-menu__item" data-val="2021/2022">2021/2022</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" name="term1" type="text" id="list4" value="" readonly
												tabIndex="-1" required>
											<label for="list4" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list4" class="mdl-textfield__label">Choose Term</label>
											<ul data-mdl-for="list4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<li class="mdl-menu__item" data-val="1">First Term</li>
												<li class="mdl-menu__item" data-val="2">Second Term</li>
												<li class="mdl-menu__item" data-val="3">Third Term</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<label class="control-label col-md-3">Result <span style="color: red;"><strong>in Excel Format</strong></span>
										</label>
										<input class="mdl-textfield__input" type="file" 
										name="file" id="file" accept=".xls,.xlsx" required>
									</div>
									<!-- <?php
									function datr(){
									$time = time();
									$actual_time =date('d M, Y', $time);
									echo $actual_time;	
									}

									function tim(){
									$time = time();
									$actual_time =date('H:i:s', $time);
									echo $actual_time;
									} ?> -->
									<input type="hidden" name="date" value="<?php echo datr()?>">
									<input type="hidden" name="time" value="<?php echo tim()?>">
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" name="import"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Upload Result</button>
									</div>
								</div>
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
	<!-- summernote -->
	<script src="../assets/plugins/summernote/summernote.js"></script>
	<script src="../assets/js/pages/summernote/summernote-data.js"></script>
	<!-- end js include path -->
</body>
</html>