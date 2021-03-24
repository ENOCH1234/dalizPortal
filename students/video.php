<?php
    include ("../required/connect.php");
	include ("../required/core.php");
	$get_sub = $_GET['sub'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
	<title>e-Portal Daliz School | Lecture Videos :: <?php echo $get_sub; ?></title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!-- data tables -->
	<link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
		type="text/css" />
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
								<div class="page-title"><?php echo $get_sub; ?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="./">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="videos">Lecture Videos</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"><?php echo $get_sub; ?></li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="card-box">
							<div class="card-head">
								<header>All Video(s) for <?php echo $get_sub; ?></header>
							</div>
							<div class="card-body ">
								<!-- start course list -->
								<div class="row">
									<?php
										require_once "../required/dbconfig.php";
										$pic = array("course1","course2","course3","course4");
										$stmt = $DB_con->prepare("SELECT * from videos WHERE subject='$get_sub' AND class='$class' ORDER BY id DESC");
										$stmt->execute();
										
										if($stmt->rowCount() > 0)
										{
											while($row=$stmt->fetch(PDO::FETCH_ASSOC))
											{
												extract($row);
									?>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/<?php echo $pic[array_rand($pic)]; ?>.jpg"></div>
											<div class="course-box">
												<h4><?php echo $title; ?></h4>
												<div class="text-muted"><span class="m-r-10"><i class="fa fa-calendar"></i> <?php echo $date; ?></span>
													<a class="course-likes m-l-10" href="#"><i class="fa fa-clock-o"></i> <?php echo $time; ?></a>
												</div>
												<p><span><i class="fa fa-user"></i> Teacher: <?php
													$query = ("SELECT name FROM tutor WHERE id='$tutor_id'");
													$result = $connect->query($query);
													$user_data=mysqli_fetch_assoc($result);
													echo $user_data['name'];
												?></span></p>
												<?php echo "<a href='vid_watch?sub=$subject&title=$title'>"?>
												<center><button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info"><i class="fa fa-film"></i> Watch</button></center></a>
											</div>
										</div>
									</div>
									<?php }}else{ ?>
										<h3 class="text-ultra-bold full-width">No Note has been uploaded for <i>"<?php echo $get_sub; ?>"</i> yet. <strong>Please, check back later.</strong></h3>
									<?php } ?>
								</div>
								<!-- End course list -->
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
	  function del(id){
		  //alert(id);
		  $('#btn_del'+id).load("functions/delete_note.php", {
			  like_id:id 
		  }
		  )
		  document.getElementById("btn_del"+id).disabled = true;
      }
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
	<!-- data tables -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/js/pages/table/table_data.js"></script>
</body>
</html>