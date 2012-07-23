<?php 

/**
 * Render the bootstrap image carousel
 * http://twitter.github.com/bootstrap/javascript.html#carousel
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.5
 * @package bootstrap.widgets
 */
class EBootstrapCarousel extends EBootstrapWidget {
	/**
	 * Array of images
	 *
	 * Each item can have the following options:
	 * @param bool $active Only one item should be active. This will be the first the user can see
	 * @param string $src Image src
	 * @param string $alt Alternative text for the image
	 * @param string $caption Image caption
	 * @param string $body Text which will be rendered below the caption
	 * @param array $htmlOptions
	 */
	public $items = array();
	
	/**
	 * Label for the previous control
	 */
	public $controlPrev = "&lsaquo;";
	
	/**
	 * Label for the next control
	 */
	public $controlNext = "&rsaquo;";
	
	/**
	 * Interval for the next image to appear
	 */
	public $interval = 5000;
	
	/**
	 * Unfinit cycle
	 */
	public $infinite = false;
	
	/**
	 * JS File to slide the images
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
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		
		$jsId = 'carousel_'.$this->htmlOptions['id'];
		$js = '';
		
		if ($this->interval !== false) {
			$js .= $jsId.' = $("#'.$this->htmlOptions['id'].'").carousel({
				interval: '.$this->interval.',
			});';
		}
		else {
			$this->interval = 5000;
			$js .= $jsId.' $("#'.$this->htmlOptions['id'].'").carousel();';
		}
		
		if ($this->infinite) {
			$js .= '			
			'.$jsId.'.bind("slide", function() {
				if ($("#'.$this->htmlOptions['id'].' .carousel-inner .item:last-child").hasClass("next")) {
					setTimeout("'.$jsId.'.carousel(0)", '.$this->interval.');
				}
			});';
		}
		
		Yii::app()->clientScript->registerScript('ebootstrap-carousel-'.$this->htmlOptions['id'], $js, CClientScript::POS_READY);
	}
	
	/**
	 * Render the carousel
	 */
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
				
				if (isset($item['href']))
					echo EBootstrap::openTag('a', array('href' => $item['href']));
				
				echo EBootstrap::image($item['src'], $item['alt'], array())."\n";
				
				if ((isset($item['caption']) and !empty($item['caption'])) or (isset($item['body']) and !empty($item['body']))) {
					echo EBootstrap::openTag('div', array('class' => 'carousel-caption'));
					
					if (isset($item['caption']) and !empty($item['caption']))
						echo EBootstrap::tag('h4', array(), $item['caption'])."\n";
					
					if (isset($item['body']) and !empty($item['body']))
						echo EBootstrap::tag('p', array(), $item['body'])."\n";
						
					echo EBootstrap::closeTag('div');
				}
				
				if (isset($item['href']))
					echo EBootstrap::closeTag('a');
				
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