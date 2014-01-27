<?php require_once($this->themeUrl().DIRECTORY_SEPARATOR.'head.php'); ?>
<?php require_once($this->themeUrl().DIRECTORY_SEPARATOR.'header.php'); ?>
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<?php require_once($this->themeUrl().DIRECTORY_SEPARATOR.'menu.php'); ?>
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
		<!--END CONTAINER-->
<?php require_once($this->themeUrl().DIRECTORY_SEPARATOR.'footer.php'); ?>