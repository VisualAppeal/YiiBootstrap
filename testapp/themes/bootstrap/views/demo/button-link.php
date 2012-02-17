<h3>Different Action Types</h3>
<p>
	<?php echo EBootstrap::ibutton('Default', '#'); ?> 
	<?php echo EBootstrap::ibutton('Primary', '#', 'primary'); ?> 
	<?php echo EBootstrap::ibutton('Info', '#', 'info'); ?> 
	<?php echo EBootstrap::ibutton('Success', '#', 'success'); ?> 
	<?php echo EBootstrap::ibutton('Warning', '#', 'warning'); ?> 
	<?php echo EBootstrap::ibutton('Danger', '#', 'danger'); ?> 
	<?php echo EBootstrap::ibutton('Inverse', '#', 'inverse'); ?> 
</p>

<h3>Sizes</h3>
<p>
	<?php echo EBootstrap::ibutton('Primary Large', '#', 'primary', 'large'); ?> 
	<?php echo EBootstrap::ibutton('Primary', '#', 'primary'); ?>
	<?php echo EBootstrap::ibutton('Primary Small', '#', 'primary', 'small'); ?>
</p>

<h3>Disabled</h3>
<p>
	<?php echo EBootstrap::ibutton('Disabled', '#', 'primary', '', true); ?>
	<?php echo EBootstrap::ibutton('Disabled', '#', '', '', true); ?>
</p>

<h3>Icons</h3>
<p>
	<?php echo EBootstrap::ibutton('Refresh', '#', '', '', false, 'refresh'); ?>
	<?php echo EBootstrap::ibutton('Checkout', '#', 'success', '', false, 'shopping-cart', true); ?>
	<?php echo EBootstrap::ibutton('Refresh', '#', 'danger', '', false, 'trash', true); ?>
</p>