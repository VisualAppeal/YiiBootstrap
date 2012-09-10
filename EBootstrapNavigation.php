<?php

Yii::import('zii.widgets.CMenu');

/**
 * Render a navigation-bar
 * http://twitter.github.com/bootstrap/components.html#navbar
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.4.4
 * @package bootstrap.widgets
 */
class EBootstrapNavigation extends CMenu {
	private $_ul = 0;
	
	/** 
	 * @var Stay at top of the page 
	 */ 
	public $fixed = false;
	
	/**
	 * @var Responsive navigation bar. Hides on small screens and add a dropdown for the elements
	 */
	public $responsive = false;
	
	/**
	 * @var Set to true to get a dark navigation bar
	 *
	 * @since 0.4.4
	 */
	public $dark = false;
	
	/**
	 * @var Javascript file to hide the alert.
	 * If its set to false, no file will be included
	 */
	public $jsFile = null;
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('navbar'));
		if ($this->dark)
			EBootstrap::mergeClass($this->htmlOptions, array('navbar-inverse'));
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		elseif ($this->jsFile !== false) {
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
	}
	
	public function run() {
		parent::run();
	}
	
	/**
	 * Render the menu
	 */
	public function renderMenu($items) {
		if (count($items)) {			
			if ($this->fixed)
				EBootstrap::mergeClass($this->htmlOptions, array('navbar-fixed-top'));
			echo EBootstrap::openTag('div', $this->htmlOptions)."\n";
			
			$innerOptions = array('class' => 'navbar-inner');

			echo EBootstrap::openTag('div', $innerOptions)."\n";
			
			echo EBootstrap::openTag('div', array('class' => 'container'))."\n";
			
			if ($this->responsive) {
				echo EBootstrap::openTag('a', array('class' => 'btn btn-navbar', 'data-toggle' => 'collapse', 'data-target' => '.nav-collapse'))."\n";
				for ($i = 0; $i < 3; $i++) {
					echo EBootstrap::openTag('span', array('class' => 'icon-bar'));
					echo EBootstrap::closeTag('span')."\n";
				}
				echo EBootstrap::closeTag('a')."\n";
				
				for ($i = 0; $i < count($items); $i++) {
					if (isset($items[$i]['template']) and ($items[$i]['template']) == '{brand}') {
						$options = isset($items[$i]['itemOptions']) ? $items[$i]['itemOptions'] : array();
						EBootstrap::mergeClass($options, array('brand'));
						echo EBootstrap::link($items[$i]['label'],$items[$i]['url'],$options)."\n";
						unset($items[$i]);
						break;
					}
				}
				
				echo EBootstrap::openTag('div', array('class' => 'nav-collapse'))."\n";
			}
			
			$this->renderMenuRecursive($items);
			
			if ($this->responsive) {
				echo EBootstrap::closeTag('div')."\n";
			}
			
			echo EBootstrap::closeTag('div')."\n";
			
			echo EBootstrap::closeTag('div')."\n";
			
			echo EBootstrap::closeTag('div')."\n";
		}
	}
	
	/**
	 * Render the menu items
	 */
	protected function renderMenuRecursive($items, $sub = false) {
        $count=0;
        $first = true;
        $n=count($items);
        foreach($items as $item) {        	
            $count++;
            $options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
            $class=array();
            if($item['active'] && $this->activeCssClass!='')
				$class[]=$this->activeCssClass;
            if($count===1 && $this->firstItemCssClass!==null)
				$class[]=$this->firstItemCssClass;
            if($count===$n && $this->lastItemCssClass!==null)
				$class[]=$this->lastItemCssClass;
            if($this->itemCssClass!==null)
				$class[]=$this->itemCssClass;
            if($class!==array()) {
				if(empty($options['class']))
					$options['class']=implode(' ',$class);
				else
					$options['class'].=' '.implode(' ',$class);
            }
			
			if(isset($this->itemTemplate) || isset($item['template']))
				$template = isset($item['template']) ? $item['template'] : $this->itemTemplate;
			else
				$template = '';
			
			switch ($template) {
				case '{brand}':
					EBootstrap::mergeClass($options, array('brand'));
					echo EBootstrap::link($item['label'],$item['url'],$options)."\n";
					break;
				case '{divider}':
					echo EBootstrap::openTag('li', array('class' => 'divider-vertical'));
					echo EBootstrap::closeTag('li')."\n";
					break;
				case '{search}':
					//Input options
					if (isset($options['input'])) {
						$itemOptions = $options['input'];
						unset($options['input']);
					}
					else
						$itemOptions = array();
					if (isset($itemOptions['name'])) {
						$name = $itemOptions['name'];
						unset($itemOptions['name']);
					}
					else
						$name = 'search';
					if (isset($itemOptions['value'])) {
						$value = $itemOptions['value'];
						unset($itemOptions['value']);
					}
					else
						$value = '';
					$itemHtmlOptions = isset($itemOptions['htmlOptions']) ? $itemOptions['htmlOptions'] : array();
				
					EBootstrap::mergeClass($options, array('navbar-search'));
					echo EBootstrap::openTag('form', $options)."\n";
					echo EBootstrap::searchField($name, $value, $itemHtmlOptions)."\n";
					echo EBootstrap::closeTag('form')."\n";
					
					break;
				default:
					$listOptions = array('class' => 'nav');
					
					if (isset($item['align']) and ($item['align'] == 'right') and (isset($item['items']))) {
						//Allign navigation right
						EBootstrap::mergeClass($listOptions, array('pull-right'));
						
						if ($this->_ul > 0) {
							$this->_ul--;
							echo EBootstrap::closeTag('ul');
						}
						
						$this->_ul++;
						echo EBootstrap::openTag('ul', $listOptions)."\n";
						
						$this->renderMenuRecursive($item['items'], true);
						
						$this->_ul--;
						echo EBootstrap::closeTag('ul');
						continue;
					}
					elseif ($first and (!$sub)) {
						$this->_ul++;
						echo EBootstrap::openTag('ul', $listOptions)."\n";
						$first = false;
					}
					
					//Create dropdown
					if ((isset($item['dropdown'])) and ($item['dropdown'] == true)) {
						if (isset($options['class']))
							$options['class'] = implode(' ', explode(' ', $options['class'])) . ' dropdown';
						else
							$options['class'] = 'dropdown';
						
						$item['linkOptions']['data-toggle'] = 'dropdown';
						
						if (isset($item['linkOptions']['class']))
							$item['linkOptions']['class'] = implode(' ', explode(' ', $item['linkOptions']['class'])+array('dropdown-toggle'));
						else
							$item['linkOptions']['class'] = 'dropdown-toggle';
						
						$item['label'] .= '<b class="caret"></b>';
					}
										
		            echo EBootstrap::openTag('li', $options);
					
					if (isset($item['label'])) {
			            $menu=$this->renderMenuItem($item);
			            if(!empty($template)) {
							echo strtr($template,array('{menu}'=>$menu));
		    	        }
		        	    else
							echo $menu;
					}
		
		            if(isset($item['items']) && count($item['items'])) {
		            	$options = isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions;

		            	if (isset($item['dropdown']) and ($item['dropdown'] == true)) {
		            		EBootstrap::mergeClass($options, array('dropdown-menu'));
							
						}
						else {
							EBootstrap::mergeClass($options, array('nav'));
						}

						$this->_ul++;
						echo "\n".EBootstrap::openTag('ul', $options)."\n";
						
						$this->renderMenuRecursive($item['items'], true);
						
						if (!isset($options['align'])) {
							$this->_ul--;
							echo EBootstrap::closeTag('ul')."\n";
						}
						elseif ($options['align'] == 'right') {
							echo EBootstrap::closeTag('div')."\n";
						}
		            }
					
		            echo EBootstrap::closeTag('li')."\n";
			}
        }
        
        if (!$sub and ($this->_ul > 0)) {
        	$this->_ul--;
	        echo EBootstrap::closeTag('ul')."\n";
	    }
    }
    
    /**
	 * Renders the content of a menu item.
	 *
	 * You can pass an 'icon' as item option as well as a bolean 'iconWhite'
	 */
	protected function renderMenuItem($item)
	{
		if (isset($item['icon']) and !empty($item['icon'])) {
			$icon = '<i class="icon-'.$item['icon'];
			if (isset($item['iconWhite']) and ($item['iconWhite'] == true))
				$icon .= ' icon-white';
			$icon .= '"></i> ';
		}
		else {
			$icon = '';
		}
		if(isset($item['url'])) {
			$label=$this->linkLabelWrapper===null ? $icon.$item['label'] : '<'.$this->linkLabelWrapper.'>'.$icon.$item['label'].'</'.$this->linkLabelWrapper.'>';
			return EBootstrap::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
		}
		else {
			return EBootstrap::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array(), $icon.$item['label']);
		}
	}
}

?>