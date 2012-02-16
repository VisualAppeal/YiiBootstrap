<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/main.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/bootstrap/bootstrap-dropdown.js'); ?>
</head>

<body>

	<header>
		<?php $this->widget('EBootstrapNavigation',array(
			'items'=>array(
				array('label'=>CHtml::encode(Yii::app()->name), 'url'=>array('/'), 'template' => '{brand}'),
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('template' => '{divider}'),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Menu', 'url'=>'#', 'items' => array(
					array('label'=>'Item #1', 'url'=>'#'),
					array('label'=>'Item #2', 'url'=>'#'),
					array('label'=>'Item #3', 'url'=>'#'),
				)),
			),
			'fixed' => true,
		)); ?>
	</header>

	<div class="container" id="content">
	
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('EBootstrapBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?>
		<?php endif?>
	
		<?php echo $content; ?>
	
	</div>
	
	<footer class="container">
		<?php echo Yii::powered(); ?>
	</footer>

</body>
</html>
