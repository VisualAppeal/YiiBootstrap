<?php 

/**
 * Render a syntaxhighlighted code
 *
 * Write the code to highlight between beginWidget and endWidget or pass it as 'content' parameter
 * This widget includes the google code prettify library http://code.google.com/p/google-code-prettify/
 * http://google-code-prettify.googlecode.com/svn/trunk/README.html
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets
 */
class EBootstrapCode extends EBootstrapWidget {
	/**
	 * Language for syntaxhighliting
	 */
	public $language = '';
	
	/**
	 * If content is empty the code between beginWidget and endWidget is cached
	 */
	public $content = '';
	
	/**
	 * Enable line numbers
	 */
	public $lineNumbers = false;
	
	/**
	 * The css file for styling the code
	 *
	 * If its set to false, no file will be included
	 */
	public $cssFile = null;
	
	/**
	 * The JS file for highlighting the code
	 *
	 * If its set to false, no file will be included
	 */
	public $jsFile = null;
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();

		if (empty($this->content))
			ob_start();
		
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/google-code-prettify/prettify.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		elseif ($this->jsFile !== false) {
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		
		if (is_null($this->cssFile)) {
			$cssFile = dirname(__FILE__).'/js/google-code-prettify/prettify.css';
			$this->cssFile = Yii::app()->getAssetManager()->publish($cssFile);
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		}
		elseif ($this->cssFile !== false) {
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		}
		
		Yii::app()->clientScript->RegisterScript('ebootstrapcode-prettify.'.$this->getId(), 'prettyPrint();', CClientScript::POS_READY);
	}
	
	/**
	 * Render the widget
	 */
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
		
		EBootstrap::mergeClass($this->htmlOptions, array('prettyprint', 'well'));
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