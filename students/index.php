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
	<title>e-Portal Daliz School | My Dashboard</title>
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
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="./">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-topline-purple">
                                <div class="card-head">
                                    <header>Welcome, <?php echo $surname.' '.$othernames.'!'; ?> <span class="label label-sm label-success" style="font-size: large;"><?php echo $reg; ?></span></header>
                                    <div class="tools">
                                        <!-- <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a> -->
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <p><strong>Current Class: </strong><?php echo $class.' '.$dept; ?></p>
                                    <p><strong>Gender: </strong><?php echo $gender; ?></p>
                                    <p><strong>Date of Birth: </strong><?php echo $dob; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
									
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="card-head">
                                    <header>Latest</header>
                                </div>
                                <div class="card-body ">
                                    <div class="mdl-tabs mdl-js-tabs">
                                        <div class="mdl-tabs__tab-bar tab-left-side">
                                            <a href="#tab4-panel" class="mdl-tabs__tab tabs_three is-active">Assignments</a>
                                            <a href="#tab5-panel" class="mdl-tabs__tab tabs_three">Notes</a>
                                            <a href="#tab6-panel" class="mdl-tabs__tab tabs_three">Videos</a>
                                        </div>
                                        <div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
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
                                                        <?php
                                                            require_once "../required/dbconfig.php";
                                                            $no = 1;
                                                            if($class=="Primary 1" || "Primary 2" || "Primary 3" || "Primary 4" || "Primary 5" || "JSS 1" || "JSS 2" || "JSS 3"){
                                                                $stmt = $DB_con->prepare("SELECT * from assignments WHERE class='$class' ORDER BY id DESC LIMIT 10");
                                                            }elseif($class=="SSS 1" || "SSS 2" || "SSS 3"){
                                                                $query = "SELECT * from subjects WHERE class='$class' AND dept='$dept'";
                                                                $result = mysqli_query($connect,$query);
                                                                $sub_data = mysqli_fetch_assoc($result);
                                                                $subject = $sub_data['subject'];
                                                                $stmt = $DB_con->prepare("SELECT * from assignments WHERE class='$class' AND subject='$subject' ORDER BY id DESC LIMIT 10");
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
                                            <div class="text-center">
                                                <a href="assignments"><button class="btn btn-outline-primary btn-round btn-sm">Load
													More</button></a>
                                            </div>
                                        </div>
                                        <div class="mdl-tabs__panel p-t-20" id="tab5-panel">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th> S/N </th>
                                                            <!-- <th> Class </th> -->
                                                            <th> Subject </th>
                                                            <th> Topic </th>
                                                            <th> Teacher </th>
                                                            <th> Upload Date </th>
                                                            <th> Action </th>
                                                        </tr>
                                                        <?php
                                                            require_once "../required/dbconfig.php";
                                                            $no = 1;
                                                            if($class=="Primary 1" || "Primary 2" || "Primary 3" || "Primary 4" || "Primary 5" || "JSS 1" || "JSS 2" || "JSS 3"){
                                                                $stmt = $DB_con->prepare("SELECT * from notes WHERE class='$class' ORDER BY id DESC LIMIT 10");
                                                            }elseif($class=="SSS 1" || "SSS 2" || "SSS 3"){
                                                                $query = "SELECT * from subjects WHERE class='$class' AND dept='$dept'";
                                                                $result = mysqli_query($connect,$query);
                                                                $sub_data = mysqli_fetch_assoc($result);
                                                                $subject = $sub_data['subject'];
                                                                $stmt = $DB_con->prepare("SELECT * from notes WHERE class='$class' AND subject='$subject' ORDER BY id DESC LIMIT 10");
                                                            }
                                                            $stmt->execute();
                                                            
                                                            if($stmt->rowCount() > 0)
                                                            {
                                                                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                                    extract($row);

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
                                                            <td>
                                                                <?php echo"<a href='note?sub=$subject&topic=$topic'" ?>
                                                                <button class="btn btn-primary btn-xs" title="Read Note">
                                                                    <i class="fa fa-eye"></i> Read
                                                                </button></a>
                                                            </td>
                                                        </tr>
                                                            <?php $no++; }} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                            <a href="notes"><button class="btn btn-outline-primary btn-round btn-sm">Load
													More</button></a>
                                            </div>
                                        </div>
                                        <div class="mdl-tabs__panel p-t-20" id="tab6-panel">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th> S/N </th>
                                                            <!-- <th> Class </th> -->
                                                            <th> Subject </th>
                                                            <th> Title </th>
                                                            <th> Teacher </th>
                                                            <th> Upload Date </th>
                                                            <th> Action </th>
                                                        </tr>
                                                        <?php
                                                            require_once "../required/dbconfig.php";
                                                            $no = 1;
                                                            if($class=="Primary 1" || "Primary 2" || "Primary 3" || "Primary 4" || "Primary 5" || "JSS 1" || "JSS 2" || "JSS 3"){
                                                                $stmt = $DB_con->prepare("SELECT * from videos WHERE class='$class' ORDER BY id DESC LIMIT 10");
                                                            }elseif($class=="SSS 1" || "SSS 2" || "SSS 3"){
                                                                $query = "SELECT * from subjects WHERE class='$class' AND dept='$dept'";
                                                                $result = mysqli_query($connect,$query);
                                                                $sub_data = mysqli_fetch_assoc($result);
                                                                $subject = $sub_data['subject'];
                                                                $stmt = $DB_con->prepare("SELECT * from videos WHERE class='$class' AND subject='$subject' ORDER BY id DESC LIMIT 10");
                                                            }
                                                            $stmt->execute();
                                                            
                                                            if($stmt->rowCount() > 0)
                                                            {
                                                                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                                    extract($row);

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
                                                            <td><?php echo $title ?></td>
                                                            <td><?php echo $teacher ?></td>
                                                            <td class="left"><?php echo $date.' by '.$time ?></td>
                                                            <td>
                                                                <?php echo"<a href='vid_watch?sub=$subject&title=$title'" ?>
                                                                <button class="btn btn-primary btn-xs" title="View Video">
                                                                    <i class="fa fa-camera"></i> Watch
                                                                </button></a>
                                                            </td>
                                                        </tr>
                                                            <?php $no++; }} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                            <a href="videos"><button class="btn btn-outline-primary btn-round btn-sm">See
													More</button></a>
                                            </div>
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
	<!-- chart js -->
	<script src="../assets/plugins/chart-js/Chart.bundle.js"></script>
	<script src="../assets/plugins/chart-js/utils.js"></script>
	<script src="../assets/js/pages/chart/chartjs/home-data3.js"></script>
	<script src="../assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="../assets/js/pages/sparkline/sparkline-data.js"></script>
	<!-- end js include path -->
</body>
</html>