<?php 

class EBootstrapFlashMessages extends CWidget {	
	public $htmlOptions = array();
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		parent::run();
		
		$flashMessages = Yii::app()->user->getFlashes();
		
		if (is_array($flashMessages) and count($flashMessages)) {
		echo EBootstrap::openTag('div', $this->htmlOptions);
			foreach ($flashMessages as $key => $message) {
				if (substr($key, 0, 5) == 'block') {
					$block = true;
					$key = substr($key, 6);
				}
				else
					$block = false;
				
				$this->widget('EBootstrapAlert', array(
					'type' => $key,
					'message' => $message,
					'block' => $block,
				));
			}
		echo EBootstrap::closeTag('div');
		}
	}
}

?>