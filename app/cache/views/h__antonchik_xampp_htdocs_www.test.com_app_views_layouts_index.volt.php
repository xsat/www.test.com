<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->partial('partials/head'); ?>
	</head>
	<body>
		<div class="container main">
			<?php echo $this->partial('partials/header'); ?>
			<div class="col-md-3 no_padding">
				<?php echo $this->partial('partials/menu/front'); ?>
			</div>
			<div class="col-md-9 no_padding">
				<?php echo $this->getContent(); ?>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<span class="copy">
					Copyright © <?php echo date('Y'); ?> <a href="/">Харків загін</a>. Всі права захищені.
				</span>
			</div>
		</div>
		<?php echo $this->assets->outputJs(); ?>
	</body>
</html>