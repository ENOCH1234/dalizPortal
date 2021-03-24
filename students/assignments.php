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
	<title>e-Portal Daliz School | All Assignments</title>
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
								<div class="page-title">All Asignments</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="./">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Assignments</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Assignments</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-box">
								<div class="card-head">
									<header>My Assignments</header>
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
													<!-- <th> Class </th> -->
													<th> Subject </th>
													<th> Topic </th>
													<th> Teacher </th>
													<th> Upload Date </th>
													<th> Submission Deadline </th>
													<th> Submission Status </th>
													<th> Score </th>
													<th> Action </th>
												</tr>
											</thead>
											<tbody>
												<?php
													require_once "../required/dbconfig.php";
													$no = 1;
													if($class=="Primary 1" || "Primary 2" || "Primary 3" || "Primary 4" || "Primary 5" || "JSS 1" || "JSS 2" || "JSS 3"){
														$stmt = $DB_con->prepare("SELECT * from assignments WHERE class='$class' ORDER BY id DESC");
													}elseif($class=="SSS 1" || "SSS 2" || "SSS 3"){
														$query = "SELECT * from subjects WHERE class='$class' AND dept='$dept'";
														$result = mysqli_query($connect,$query);
														$sub_data = mysqli_fetch_assoc($result);
														$subject = $sub_data['subject'];
														$stmt = $DB_con->prepare("SELECT * from assignments WHERE class='$class' AND subject='$subject' ORDER BY id DESC");
													}
													$stmt->execute();
													
													if($stmt->rowCount() > 0)
													{
														while($row=$stmt->fetch(PDO::FETCH_ASSOC))
														{
															extract($row);

															// Get Assignment from db if already submitted
															$query1 = ("SELECT * FROM assignment_sub WHERE subject='$subject' AND topic='$topic' AND stud_reg='$user_id'");
															$result1 = $connect->query($query1);
															$assign_data=mysqli_fetch_assoc($result1);
															if ($result1->num_rows == 1) {
																$score = $assign_data['score'];
																$sub_sta = "<span class='label label-sm label-success'><i class='fa fa-check'></i> You have submitted</span>";
															}else{
																$sub_sta = "<span class='label label-sm label-warning'><i class='fa fa-times'></i> Not Yet Submitted</span>";
																$score = "You have to submit answer first";
															}

															// Get teacher details
															$query = ("SELECT name FROM tutor WHERE id='$tutor_id'");
															$result = $connect->query($query);
															$user_data=mysqli_fetch_assoc($result);
															$teacher = $user_data['name'];
													?>

												<tr class="odd gradeX">
													<td class="left"><?php echo $no ?></td>
													<!-- <td><?php echo $class ?></td> -->
													<td class="left"><?php echo $subject ?></td>
													<td><?php echo $topic ?></td>
													<td><?php echo $teacher ?></td>
													<td class="left"><?php echo $date.' by '.$time ?></td>
													<td class="left"><?php echo "<span class='label label-sm label-danger'><i class='fa fa-calendar'></i> $sub_date</span>" ?></td>
													<td class="left"><?php echo $sub_sta ?></td>
													<td class="left"><?php echo $score ?></td>
													<td>
														<?php echo"<a href='note?sub=$subject&topic=$topic#assignment'" ?>
														<button class="btn btn-primary btn-xs" title="View and Submit Assignment">
															<i class="fa fa-eye"></i> View
														</button></a>
													</td>
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
		  $('#btn_del'+id).load("functions/delete_assign.php", {
			  like_id:id 
		  }
		  )
		  document.getElementById("btn_del"+id).disabled = true;
		  document.getElementById("btn_hide"+id).disabled = true;
		  document.getElementById("btn_show"+id).disabled = true;
	  }
	  
	  function hide(id){
		  //alert(id);
		  $('#btn_hide'+id).load("functions/hide_assign.php", {
			  like_id:id 
		  }
		  )
	  }
	  
	  function show(id){
		  //alert(id);
		  $('#btn_show'+id).load("functions/show_assign.php", {
			  like_id:id 
		  }
		  )
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