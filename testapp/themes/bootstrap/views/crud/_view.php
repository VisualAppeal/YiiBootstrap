<?php 
$this->widget('EBootstrapListViewItem', array(
	'data' => $data,
	'attributes'=>array(
		array(
			'name' => 'title',
			'type' => 'html',
			'cssClass' => 'bootstrap-list-view-item-title',
			'value' => EBootstrap::link(EBootstrap::encode($data->title), array('crud/view','id'=>$data->id))
		),
		'date_created',
		'date_updated',
	),
));
?>