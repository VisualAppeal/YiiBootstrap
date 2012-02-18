<?php 

class EBootstrapListViewItem extends CWidget {
	public $data = null;
	public $items = array();
	
	public $htmlOptions = array();
	
	public $cssFile = null;
	
	public function init() {
		parent::init();
		
		if (is_null($this->cssFile)) {
			$cssFile = dirname(__FILE__).'/css/bootstrap.css';
			$this->cssFile = Yii::app()->getAssetManager()->publish($cssFile);
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		}
	}
	
	public function run() {
		parent::run();
		
		if (count($this->items) and (!is_null($this->data))) {
			EBootstrap::mergeClass($this->htmlOptions, array('bootstrap-list-view-item'));
			echo EBootstrap::openTag('div', $this->htmlOptions)."\n";

			$this->renderItems($this->items, $this->data);
			
			echo EBootstrap::closeTag('div')."\n";
		}
	}
	
	private function renderItems($items, $data) {
		foreach ($items as $attribute => $options) {
			if (isset($data->$attribute)) {
				if (!isset($options['type'])) {
					$options['type'] = '';
				}
				
				if (isset($options['title']))
					echo EBootstrap::openTag('div', array('class' => 'bootstrap-list-view-item-title'));
				else
					echo EBootstrap::openTag('div', array('class' => 'bootstrap-list-view-item-content'));
				
				if (!isset($options['title']))
					echo EBootstrap::tag('span', array('class' => 'bootstrap-list-view-item-attribute'), EBootstrap::encode($data->getAttributeLabel($attribute))).": \n";
				
				if (isset($options['link']) and (!empty($options['link']))) {
					$linkOptions = isset($options['link']['htmlOptions']) ? $options['link']['htmlOptions'] : array();
					$linkOptions['href'] = isset($options['link']['url']) ? $options['link']['url'] : '#';
					$linkOptions['title'] = isset($options['link']['title']) ? $options['link']['title'] : '';
					echo EBootstrap::openTag('a', $linkOptions);
				}
				
				echo EBootstrap::openTag('span', array('class' => 'bootstrap-list-view-item-value'));
				switch ($options['type']) {
					case 'date':
						if (!isset($options['format']) or empty($options['format']))
							$options['format'] = 'yyyy-MM-dd';
						
						echo Yii::app()->dateFormatter->format($options['format'], $data->$attribute);
						break;
					default:
						echo EBootstrap::encode($data->$attribute);
				}
				echo EBootstrap::closeTag('span');

				if (isset($options['link']) and (!empty($options['link'])))
					echo EBootstrap::closeTag('a');
				
				if (isset($options['title']))
					echo EBootstrap::closeTag('div')."\n";
				else
					echo EBootstrap::closeTag('div')."\n";
			}
		}
	}
}

?>