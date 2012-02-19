<?php 

class EBootstrapCode extends EBootstrapWidget {
	public $language = '';
	public $content = '';
	public $lineNumbers = false;
	
	public $htmlOptions = array();
	
	public $cssFile = null;
	public $jsFile = null;
	
	public $jsPosition = CClientScript::POS_READY;
	
	public function init() {
		parent::init();

		if (empty($this->content))
			ob_start();
		
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/google-code-prettify/prettify.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		if (is_null($this->cssFile)) {
			$cssFile = dirname(__FILE__).'/js/google-code-prettify/prettify.css';
			$this->cssFile = Yii::app()->getAssetManager()->publish($cssFile);
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		}
		
		Yii::app()->clientScript->RegisterScript('ebootstrapcode-prettify.'.$this->getId(), '
			prettyPrint();
		', $this->jsPosition);
	}
	
	public function run() {
		parent::run();
		
		if (empty($this->content)) {
			$content = ob_get_contents();
			$content = str_replace('&gt;', '>', $content);
			$content = str_replace('&lt;', '<', $content);
			ob_end_clean();
		}
		else {
			$content = $this->content;
		}
		
		EBootstrap::mergeClass($this->htmlOptions, array('prettyprint'));
		if (!empty($this->language))
			EBootstrap::mergeClass($this->htmlOptions, array('lang-'.$this->language));
		if ($this->lineNumbers)
			EBootstrap::mergeClass($this->htmlOptions, array('linenums'));
		
		echo CHtml::openTag('pre', $this->htmlOptions);

		echo htmlspecialchars($content);
		
		echo CHtml::closeTag('pre');
	}
}

?>