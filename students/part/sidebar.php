<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="pull-left image">
										<img src="<?php if(!empty($profile_image)){
											echo "../profile-images/$profile_image";
										}else{
											echo "../assets/img/logo-2.png";
										}?>" class="img-circle user-img-circle"
											alt="User Image" />
									</div>
									<div class="pull-left info">
										<p> <?php echo $surname.' '.$othernames; ?></p>
										<a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
												Online</span></a>
									</div>
								</div>
							</li>
							<li class="nav-item start">
								<a href="./" class="nav-link">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="notes" class="nav-link nav-toggle"> <i class="material-icons">book</i>
									<span class="title">My Notes</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="videos" class="nav-link nav-toggle"> <i class="material-icons">movie</i>
									<span class="title">Video Lectures</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="assignments" class="nav-link nav-toggle"> <i class="material-icons">school</i>
									<span class="title">My Assignments</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Term Results</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<?php echo "<a href='results?session=20/21' class='nav-link'>" ?> <span class="title">2020/2021</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="profile-picture" class="nav-link nav-toggle"> <i class="material-icons">person</i>
									<span class="title">Update Profile Picture</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="../required/logout" class="nav-link nav-toggle"> <i class="fa fa-sign-out"></i>
									<span class="title">Log Out</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>