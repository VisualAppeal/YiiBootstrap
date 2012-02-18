<?php 

class EBootstrapCarousel extends CWidget {
	public $items = array();
	public $controlPrev = "&lsaquo;";
	public $controlNext = "&rsaquo;";
	
	public $interval = 2000;
	
	public $htmlOptions = array();
	
	public $jsFile = null;
	
	public function init() {
		parent::init();
		
		if (!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		
		if ($this->interval !== false) {
			$js = '$("#'.$this->htmlOptions['id'].'").carousel({
				interval: '.$this->interval.',
			});';
		}
		else {
			$js = '$("#'.$this->htmlOptions['id'].'").carousel();';
		}
		
		Yii::app()->clientScript->registerScript('ebootstrap-carousel-'.$this->htmlOptions['id'], $js, CClientScript::POS_READY);
	}
	
	public function run() {
		parent::run();
		
		if (is_array($this->items) and count($this->items)) {
			
			EBootstrap::mergeClass($this->htmlOptions, array('carousel'));
			echo EBootstrap::openTag('div', $this->htmlOptions)."\n";
			echo EBootstrap::openTag('div', array('class' => 'carousel-inner'))."\n";
			
			foreach ($this->items as $item) {
				$itemOptions = isset($item['htmlOptions']) ? $item['htmlOptions'] : array();
				EBootstrap::mergeClass($itemOptions, array('item'));
				if (isset($item['active']) and ($item['active'] == true))
					EBootstrap::mergeClass($itemOptions, array('active'));
				
				echo EBootstrap::openTag('div', $itemOptions)."\n";
				
				if (!isset($item['alt']))
					$item['alt'] = isset($item['caption']) ? $item['caption'] : '';
				
				echo EBootstrap::image($item['src'], $item['alt'], array())."\n";
				
				if ((isset($item['caption']) and !empty($item['caption'])) or (isset($item['body']) and !empty($item['body']))) {
					echo EBootstrap::openTag('div', array('class' => 'carousel-caption'));
					
					if (isset($item['caption']) and !empty($item['caption']))
						echo EBootstrap::tag('h4', array(), $item['caption'])."\n";
					
					if (isset($item['body']) and !empty($item['body']))
						echo EBootstrap::tag('p', array(), $item['body'])."\n";
						
					echo EBootstrap::closeTag('div');
				}
				
				echo EBootstrap::closeTag('div')."\n";
			}
			
			echo EBootstrap::closeTag('div')."\n";
			
			echo EBootstrap::link($this->controlPrev, '#'.$this->htmlOptions['id'], array('data-slide' => 'prev', 'class' => 'left carousel-control'))."\n";
			echo EBootstrap::link($this->controlNext, '#'.$this->htmlOptions['id'], array('data-slide' => 'next', 'class' => 'right carousel-control'))."\n";
			
			echo EBootstrap::closeTag('div')."\n";
		}
	}
}

?>