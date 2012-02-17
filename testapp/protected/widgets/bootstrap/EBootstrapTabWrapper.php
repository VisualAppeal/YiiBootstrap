<?php 

class EBootstrapTabWrapper extends CWidget {
	public $position = '';
	
	public function init() {
		parent::init();
		
		if (!empty($this->position)) {
			switch ($this->position) {
				case 'bottom':
					echo CHtml::openTag('div', array('class' => 'tabbable tabs-below'));
					break;
				case 'left':
					echo CHtml::openTag('div', array('class' => 'tabbable tabs-left'));
					break;
				case 'right':
					echo CHtml::openTag('div', array('class' => 'tabbable tabs-right'));
					break;
			}
		}
	}
	
	public function run() {
		parent::run();
		
		if (!empty($this->position)) {
			echo CHtml::closeTag('div');
		}
	}
}


?>