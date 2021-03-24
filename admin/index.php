<?php
    require_once "../required/connect.php";
    require_once "../required/core.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Our vision is to develop the TOTAL CHILD in body, mind and soul." />
	<meta name="author" content="DalizSchools" />
	<title>e-Portal Daliz School | Admin Login</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/plugins/iconic/css/material-design-iconic-font.min.css">
    <link href="../fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
    <link rel="stylesheet" href="../assets/css/pages/extra_pages.css">
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="../assets/css/material_style.css">
    <!-- Theme Styles -->
	<link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
	<!-- favicon -->
	<link rel="shortcut icon" href="../assets/img/favicon.png" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
            <div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<span class="login100-form-logo">
						<img alt="" src="../assets/img/logo.png">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Admin Login
                    </span>
                    <!-- Include Login function -->
                    <?php include ('log_func.php') ?>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="admin_log">
							Login
						</button>
					</div>
					
				</form>
			</div>
		</div>
    </div>
	<!-- start js include path -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/popper/popper.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pages/extra-pages/pages.js"></script>
    <script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Common js-->
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/layout.js"></script>
    <script src="../assets/js/theme-color.js"></script>
    <!-- Material -->
    <script src="../assets/plugins/material/material.min.js"></script>
    <!-- end js include path -->
</body>
</html>