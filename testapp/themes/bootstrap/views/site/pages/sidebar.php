<?php
$this->pageTitle=Yii::app()->name . ' - Sidebar';
$this->breadcrumbs=array(
	'Sidebar',
);
$this->layout = '//layouts/column2';
?>

<div class="page-header">
	<h1>Sidebar</h1>
</div>

<?php $this->beginWidget('EBootstrapCode'); ?>
$this->widget('EBootstrapSidebar', array(
	'items'=> array(
		array(
			'label' => Yii::t('Admin', 'Administration'), 'url' => $this->createUrl('/admin/'), 'icon' => 'home',
		),
		array(
			'label' => 'User', 'items' => array(
				array('label' => 'Manage', 'url' => '#', 'icon' => 'user'),
				array('label' => 'Groups', 'url' => '#', 'icon' => 'th'),
			),
		),
		array(
			'label' => 'Top Secret', 'access' => 'admin', 'items' => array(
				array('label' => 'Can you see?', 'url' => '#', 'icon' => 'lock'),
			),
		),
		array(
			'label' => 'Finances', 'items' => array(
				array('label' => 'Statistic', 'url' => '#', 'icon' => 'signal'),
				array('label' => 'Billing', 'url' => '#', 'icon' => 'shopping-cart'),
				array('label' => 'Voucher', 'url' => '#', 'icon' => 'tag'),
			),
		),
	),
));
<?php $this->endWidget(); ?>