<?php 

Yii::import('zii.widgets.CMenu');

/**
 * Render a sidebar
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets
 */
class EBootstrapSidebar extends CMenu {
	/**
	 * Init the widget
	 */
	public function init()
	{
		echo EBootstrap::openTag('div', array('class' => 'well sidebar-nav'));
		
		EBootstrap::mergeClass($this->htmlOptions, array('nav', 'nav-list'));
		parent::init();
	}
	
	public function run() {
		parent::run();
		
		echo EBootstrap::closeTag('div');
	}
	
	/**
	 * Recursively renders the menu items.
	 *
	 * @param array $items the menu items to be rendered recursively
	 * @param bool $header Helper variable to identify the header elements
	 */
	protected function renderMenuRecursive($items, $header = true) {
		$count=0;
		$n=count($items);
		foreach($items as $item) {
			if (isset($item['access']) and (!empty($item['access'])))
				$prove = true;
			else
				$prove = false;
			
			if (($prove and Yii::app()->user->checkAccess($item['access'])) or (!$prove)) {
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
				if (($header and (isset($item['items']))) or (isset($item['header']) and ($item['header'] == true)))
					$class[]='nav-header';
				if($class!==array()) {
					if(empty($options['class']))
						$options['class']=implode(' ',$class);
					else
						$options['class'].=' '.implode(' ',$class);
				}
	
				echo EBootstrap::openTag('li', $options);
	
				$menu=$this->renderMenuItem($item);
				if(isset($this->itemTemplate) || isset($item['template'])) {
					$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
					echo strtr($template,array('{menu}'=>$menu));
				}
				else
					echo $menu;
	
				echo EBootstrap::closeTag('li');
	
				if(isset($item['items']) && count($item['items'])) {
					$this->renderMenuRecursive($item['items'], false);
				}
				
				echo "\n";
			}
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