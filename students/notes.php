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
	<title>e-Portal Daliz School | My Notes</title>
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
								<div class="page-title">All Uploaded Notes</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="./">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Class Notes</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Uploaded Notes</li>
							</ol>
						</div>
					</div>
					<div class="state-overview">
                        <div class="row">
							<?php
								require_once "../required/dbconfig.php";
								$colors = array("purple","deepPink-bgcolor","orange","blue-bgcolor","green","red","yellow");
								if($class=="Primary 1" || "Primary 2" || "Primary 3" || "Primary 4" || "Primary 5" || "JSS 1" || "JSS 2" || "JSS 3"){
									$stmt = $DB_con->prepare("SELECT * from subjects WHERE class='$class'");
								}elseif($class=="SSS 1" || "SSS 2" || "SSS 3"){
									$stmt = $DB_con->prepare("SELECT * from subjects WHERE class='$class' AND dept='$dept'");
								}
								$stmt->execute();
								
								if($stmt->rowCount() > 0)
								{
									while($row=$stmt->fetch(PDO::FETCH_ASSOC))
									{
										extract($row);
										
									?>
							
							<div class="col-lg-3 col-sm-6">
								<?php echo "<a href='sub_note?sub=$subject'>"?>
									<div class="overview-panel <?php echo $colors[array_rand($colors)]; ?>">
										<div class="symbol">
											<i class="fa fa-book usr-clr"></i>
										</div>
										<div class="value white">
											<p class="sbold addr-font-h2" data-counter="counterup" data-value="23"><?php echo $subject ?></p>
											<p><?php echo $description ?></p>
										</div>
									</div></a>
							</div>
							
							<?php }} ?>
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