<?php 

class EBootstrapCode extends CWidget {
	public function init() {
		parent::init();
		
		ob_start();
	}
	
	public function run() {
		parent::run();
		
		$content = ob_get_contents();
		ob_end_flush();
		
		echo CHtml::openTag('pre');
		echo htmlspecialchars($content);
		echo CHtml::closeTag('pre');
	}
}

?>