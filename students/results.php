<?php
    include ("../required/connect.php");
	include ("../required/core.php");
	$session = $_GET['session'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
	<title>e-Portal Daliz School | My Result - <?php echo $session?> Academic Session</title>
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
								<div class="page-title">My Result For <?php echo $session?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="./">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Term Results</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"><?php echo $session?></li>
							</ol>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card card-box">
								<div class="card-head">
									<header>First Term</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh"
											href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down"
											href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times"
											href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="table-scrollable">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
											id="example4">
											<thead>
												<tr>
													<th> S/N </th>
													<th> Subject </th>
													<th> Test </th>
													<th> Exam </th>
													<th> Total </th>
													<th> Grade </th>
												</tr>
											</thead>
											<tbody>
												<?php
													require_once "../required/dbconfig.php";
													$no = 1;
													$stmt = $DB_con->prepare("SELECT * from results WHERE session='$session' AND term='1' AND reg_no='$user_id'");
													$stmt->execute();
													
													if($stmt->rowCount() > 0)
													{
														while($row=$stmt->fetch(PDO::FETCH_ASSOC))
														{
															extract($row);
													?>
												<tr class="odd gradeX">
													<td><?php echo $no ?></td>
													<td><?php echo $subject ?></td>
													<td class="left"><?php echo $test ?></td>
													<td><?php echo $exam ?></td>
													<td class="left"><?php echo $total ?></td>
													<td class="left"><?php echo $grade ?></td>
												</tr>
													<?php $no++; }} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Second Term</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh"
											href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down"
											href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times"
											href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="table-scrollable">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
											id="example4">
											<thead>
												<tr>
													<th> S/N </th>
													<th> Subject </th>
													<th> Test </th>
													<th> Exam </th>
													<th> Total </th>
													<th> Grade </th>
												</tr>
											</thead>
											<tbody>
												<?php
													require_once "../required/dbconfig.php";
													$no = 1;
													$stmt = $DB_con->prepare("SELECT * from results WHERE session='$session' AND term='2' AND reg_no='$user_id'");
													$stmt->execute();
													
													if($stmt->rowCount() > 0)
													{
														while($row=$stmt->fetch(PDO::FETCH_ASSOC))
														{
															extract($row);
													?>
												<tr class="odd gradeX">
													<td><?php echo $no ?></td>
													<td><?php echo $subject ?></td>
													<td class="left"><?php echo $test ?></td>
													<td><?php echo $exam ?></td>
													<td class="left"><?php echo $total ?></td>
													<td class="left"><?php echo $grade ?></td>
												</tr>
													<?php $no++; }} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Third Term</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh"
											href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down"
											href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times"
											href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="table-scrollable">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
											id="example4">
											<thead>
												<tr>
													<th> S/N </th>
													<th> Subject </th>
													<th> Test </th>
													<th> Exam </th>
													<th> Total </th>
													<th> Grade </th>
												</tr>
											</thead>
											<tbody>
												<?php
													require_once "../required/dbconfig.php";
													$no = 1;
													$stmt = $DB_con->prepare("SELECT * from results WHERE session='$session' AND term='3' AND reg_no='$user_id'");
													$stmt->execute();
													
													if($stmt->rowCount() > 0)
													{
														while($row=$stmt->fetch(PDO::FETCH_ASSOC))
														{
															extract($row);
													?>
												<tr class="odd gradeX">
													<td><?php echo $no ?></td>
													<td><?php echo $subject ?></td>
													<td class="left"><?php echo $test ?></td>
													<td><?php echo $exam ?></td>
													<td class="left"><?php echo $total ?></td>
													<td class="left"><?php echo $grade ?></td>
												</tr>
													<?php $no++; }} ?>
											</tbody>
										</table>
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
	  function del(id){
		  //alert(id);
		  $('#btn_del'+id).load("functions/delete_vid.php", {
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