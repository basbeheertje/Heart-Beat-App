			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<div class="page-sidebar navbar-collapse collapse">
					<!-- BEGIN SIDEBAR MENU -->
					<ul class="page-sidebar-menu">
						<li class="sidebar-toggler-wrapper">
							<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
							<div class="sidebar-toggler hidden-phone">
							</div>
							<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
						</li>
						<!--<li class="sidebar-search-wrapper">
							<form class="sidebar-search" action="/search" method="POST">
								<div class="form-container">
									<div class="input-box">
										<a href="javascript:;" class="remove"></a>
										<input type="text" placeholder="Zoek..."/>
										<input type="button" class="submit" value=" "/>
									</div>
								</div>
							</form>
						</li>-->
						<li class="<?php if($this->system->currentpage == 'dashboard'){ ?>start active <?php } ?>">
							<a href="/">
								<i class="fa fa-home"></i>
								<span class="title">
									Dashboard
								</span>
								<?php if($this->system->currentpage == 'dashboard'){ ?><span class="selected"></span><?php } ?>
							</a>
						</li>
						<li class="<?php if($this->system->currentpage == 'periodiek'){ ?>start active <?php } ?>">
							<a href="/dashboard/periodiek">
								<i class="fa fa-calendar"></i>
								<span class="title">
									Periodiek
								</span>
								<?php if($this->system->currentpage == 'periodiek'){ ?><span class="selected"></span><?php } ?>
							</a>
						</li>
						<li class="<?php if($this->system->currentpage == 'alerts'){ ?>start active <?php } ?>">
							<a href="/settings/alerts">
								<i class="fa fa-bell"></i>
								<span class="title">
									Alerts
								</span>
								<?php if($this->system->currentpage == 'alerts'){ ?><span class="selected"></span><?php } ?>
							</a>
						</li>
						<li class="<?php if($this->system->currentpage == 'shares'){ ?>start active <?php } ?>">
							<a href="/settings/shares">
								<i class="fa fa-user"></i>
								<span class="title">
									Shares
								</span>
								<?php if($this->system->currentpage == 'shares'){ ?><span class="selected"></span><?php } ?>
							</a>
						</li>
					</ul>
					<!-- END SIDEBAR MENU -->
				</div>
			</div>
			<!-- END SIDEBAR -->