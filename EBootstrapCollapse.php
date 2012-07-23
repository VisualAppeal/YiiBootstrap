<?php 

/**
 * Creates an collapse sender
 * This widget creates an element which can be used to toggle a collapse item
 * http://twitter.github.com/bootstrap/javascript.html#collapse
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package widgets.bootstrap
 */
class EBootstrapCollapse extends EBootstrapWidget {
	/**
	 * Html element of the sender
	 *
	 * Examples: a, input, span, div, h3...
	 *
	 */
	public $sender = 'a';
	
	/**
	 * Default value
	 *
	 * The value is rendered between the sender tags
	 * Example: <a>$value</a>
	 */
	public $value = 'Toggle';
	
	/**
	 * Value if the sender is clicked
	 * 
	 * The value is rendered between the sender tags. If it's set to false there will be no change.
	 * Example: <a>$value</a>
	 */
	public $valueToggle = false;
	
	/**
	 * Selector of the target
	 *
	 * Examples: '#myElement', '.elements'
	 */
	public $target = '';
	
	/**
	 * Selector of the parent element
	 *
	 * If it's unequal false, an accordion functionallity will be applied to the child elements
	 */
	public $parent = false;
	
	/**
	 * JS file of the collapse plugin
	 *
	 * If its set to false, no file will be included
	 */
	public $jsFile = null;
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		if (!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();

		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		elseif ($this->jsFile !== false) {
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		
		if ($this->valueToggle !== false) {
			switch ($this->sender) {
				case 'img':
				case 'input':
					$jsFunction = 'val';
					break;
				default:
					$jsFunction = 'html';
			}
		
			Yii::app()->clientScript->registerScript('ebootstrap-collapse-'.$this->getId(), '
				$("'.$this->target.'").on("show", function() {
					$("#'.$this->htmlOptions['id'].'").'.$jsFunction.'("'.$this->valueToggle.'");
				});
				$("'.$this->target.'").on("hide", function() {
					$("#'.$this->htmlOptions['id'].'").'.$jsFunction.'("'.$this->value.'");;
				});
			', CClientScript::POS_READY);
		}
	}
	
	/**
	 * Execute the widget
	 */
	public function run() {
		$this->htmlOptions['data-toggle'] = 'collapse';
		$this->htmlOptions['data-target'] = $this->target;
		
		if ($this->parent !== false)
			$this->htmlOptions['data-parent'] = $this->parent;
		
		echo EBootstrap::tag($this->sender, $this->htmlOptions, $this->value);
	}
}

?>