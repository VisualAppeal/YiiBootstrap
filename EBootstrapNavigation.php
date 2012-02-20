<?php

Yii::import('zii.widgets.CMenu');

/*
 * Render a navigation-bar
 * http://twitter.github.com/bootstrap/components.html#navbar
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets
 */
class EBootstrapNavigation extends CMenu {
	/* 
	 * Stay at top of the page 
	 */ 
	public $fixed = false;
	
	/*
	 * Javascript file to hide the alert.
	 *
	 * If its set to false, no file will be included
	 */
	public $jsFile = null;
	
	/*
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('navbar'));
		
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
	
	/*
	 * Render the menu
	 */
	public function renderMenu($items) {
		if (count($items)) {			
			echo EBootstrap::openTag('div', $this->htmlOptions)."\n";
			
			$innerOptions = array('class' => 'navbar-inner');
			if ($this->fixed)
				EBootstrap::mergeClass($innerOptions, array('navbar-fixed-top'));
			echo EBootstrap::openTag('div', $innerOptions)."\n";
			
			echo EBootstrap::openTag('div', array('class' => 'container'))."\n";
			
			$this->renderMenuRecursive($items);
			
			echo EBootstrap::closeTag('div')."\n";
			
			echo EBootstrap::closeTag('div')."\n";
			
			echo EBootstrap::closeTag('div')."\n";
		}
	}
	
	/*
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
					echo EBootstrap::tag('li', array('class' => 'divider-vertical'))."\n";
					break;
				default:
					$listOptions = array('class' => 'nav');
					
					if (isset($item['align']) and ($item['align'] == 'right')) {
						//Allign navigation right
						EBootstrap::mergeClass($listOptions, array('pull-right'));
						
						echo EBootstrap::closeTag('ul');
						
						echo EBootstrap::openTag('ul', $listOptions)."\n";
						
						$this->renderMenuRecursive($item['items'], true);
						
						echo EBootstrap::closeTag('ul');
						continue;
					}
					elseif ($first and (!$sub)) {
						echo EBootstrap::openTag('ul', $listOptions)."\n";
						$first = false;
					}
					
					//Create dropdown
					if ((isset($item['dropdown'])) and ($item['dropdown'] == true)) {
						if (isset($options['class']))
							$options['class'] = implode(' ', explode(' ', $options['class'])+array('dropdown'));
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

						echo "\n".EBootstrap::openTag('ul', $options)."\n";
						
						$this->renderMenuRecursive($item['items'], true);
						
						if (!isset($options['align']))
							echo EBootstrap::closeTag('ul')."\n";
						elseif ($options['align'] == 'right')
							echo EBootstrap::closeTag('div')."\n";
		            }
					
		            echo EBootstrap::closeTag('li')."\n";
			}
        }
        
        if (!$sub)
	        echo EBootstrap::closeTag('ul')."\n";
    }
}

?>