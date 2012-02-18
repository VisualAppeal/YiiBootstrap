<?php

Yii::import('zii.widgets.CMenu');

class EBootstrapNavigation extends CMenu {
	/* 
	 * Stay at top of the page 
	 */ 
	public $fixed = false;
	
	public $jsFile = null;
	
	public function init() {
		parent::init();
		
		if (isset($this->htmlOptions['class']))
			$this->htmlOptions['class'] = implode(' ', explode(' ', $this->htmlOptions['class'])+array('navbar'));
		else
			$this->htmlOptions['class'] = 'navbar';
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
	}
	
	public function run() {
		parent::run();
	}
	
	public function renderMenu($items) {
		if (count($items)) {
			echo EBootstrap::openTag('div', $this->htmlOptions)."\n";
			$fixed = $this->fixed ? ' navbar-fixed-top' : '';
			echo EBootstrap::openTag('div', array('class' => 'navbar-inner'.$fixed))."\n";
			echo EBootstrap::openTag('div', array('class' => 'container'))."\n";
			$this->renderMenuRecursive($items);
			echo EBootstrap::closeTag('div')."\n";
			echo EBootstrap::closeTag('div')."\n";
			echo EBootstrap::closeTag('div')."\n";
		}
	}
	
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
					$options = array_merge($options, array('class' => 'brand'));
					echo EBootstrap::link($item['label'],$item['url'],$options)."\n";
					break;
				case '{divider}':
					echo EBootstrap::openTag('li', array('class' => 'divider-vertical'))."\n";
					echo EBootstrap::closeTag('li')."\n";
					break;
				default:
					if ($first and (!$sub)) {
						echo EBootstrap::openTag('ul', array('class' => 'nav'))."\n";
						$first = false;
					}
					
					if(isset($item['items']) && count($item['items'])) {
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
		
		            $menu=$this->renderMenuItem($item);
		            if(!empty($template)) {
						echo strtr($template,array('{menu}'=>$menu));
		            }
		            else
						echo $menu;
		
		            if(isset($item['items']) && count($item['items'])) {
		            	$options = isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions;
		            	if (isset($options['class']))
							$options['class'] = implode(' ', explode(' ', $options['class'])+array('dropdown-menu'));
						else
							$options['class'] = 'dropdown-menu';
		            	
						echo "\n".EBootstrap::openTag('ul', $options)."\n";
						$this->renderMenuRecursive($item['items'], true);
						echo EBootstrap::closeTag('ul')."\n";
		            }
					
		            echo EBootstrap::closeTag('li')."\n";
			}
        }
        
        if (!$sub)
	        echo EBootstrap::closeTag('ul')."\n";
    }
}

?>