<div class="row">

	<div class="col-md-6">
		<?php echo modules::run('adminlte/widget/box_open', 'Shortcuts'); ?>
			<?php if ($this->ion_auth->in_group(array('staff', 'admin'))) : ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-book', 'Manage Ledger', 'ledger'); ?>
			<?php endif; ?>
			<?php if ($this->ion_auth->in_group(array('admin'))) : ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-gear', 'Set Defaults', 'defaults'); ?>
			<?php endif; ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', 'My Account', 'panel/account'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', 'Logout', 'panel/logout'); ?>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>

	<?php if (isset($count) && $count) : ?>
	<div class="col-md-6">
		<?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
	</div>
	<?php endif; ?>
	
</div>
