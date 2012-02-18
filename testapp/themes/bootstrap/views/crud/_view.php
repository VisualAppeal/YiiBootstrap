<?php 
$this->widget('EBootstrapListViewItem', array(
	'data' => $data,
	'items' => array(
		'title' => array(
			'link' => array(
				'url' => $this->createUrl('view', array('id' => $data->id)),
				'title' => $data->title,
			),
			'title' => true,
		),
		'date_created' => array(
			'type' => 'date',
			'format' => 'yyyy-MM-dd hh:mm',
		),
		'date_updated' => array(
			'type' => 'date',
			'format' => 'yyyy-MM-dd hh:mm',
		),
	),
	'htmlOptions' => array(
	),
));
?>