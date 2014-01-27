	<!-- BEGIN BODY -->
	<body class="page-header-fixed">
		<!-- BEGIN HEADER -->
		<div class="header navbar navbar-inverse navbar-fixed-top">
			<!-- BEGIN TOP NAVIGATION BAR -->
			<div class="header-inner">
				<!-- BEGIN LOGO -->
				<a class="navbar-brand" href="index.html">
				<img src="/<?php echo $this->themeUrl(); ?>img/logo.png" alt="logo" class="img-responsive"/>
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<img src="/<?php echo $this->themeUrl(); ?>img/menu-toggler.png" alt=""/>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" src="/<?php echo $this->themeUrl(); ?>img/avatar1_small.jpg"/>
						<span class="username">
							<?php echo $this->system->user->firstname . ' ' . $this->system->user->lastname; ?>
						</span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="/settings"><i class="fa fa-user"></i> Mijn Profiel</a>
							</li>
							<li>
								<a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Volledig scherm</a>
							</li>
							<li>
								<a href="/logout"><i class="fa fa-key"></i> Uitloggen</a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END TOP NAVIGATION BAR -->
		</div>
		<!-- END HEADER -->
		<div class="clearfix">
		</div>