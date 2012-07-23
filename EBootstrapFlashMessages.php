<?php 

/**
 * Render all flash messages with EBootstrapAlert
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.yiiwidgets
 */
class EBootstrapFlashMessages extends EBootstrapWidget {
	
	/**
	 * Init the widget
	 */	
	public function init() {
		parent::init();
	}
	
	/**
	 * Render the flash messages
	 */
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