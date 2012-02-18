<?php 

Yii::import('zii.widgets.CMenu');

class EBootstrapSidebar extends CMenu {
	public $headerCssClass = 'nav-header';
	
	/**
	 * Initializes the menu widget.
	 * This method mainly normalizes the {@link items} property.
	 * If this method is overridden, make sure the parent implementation is invoked.
	 */
	public function init()
	{
		EBootstrap::mergeClass($this->htmlOptions, array('nav', 'nav-list'));
		parent::init();
	}
	
	/**
	 * Recursively renders the menu items.
	 * @param array $items the menu items to be rendered recursively
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
				if ($header and (isset($item['items'])))
					$class[]=$this->headerCssClass;
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
					//echo "\n".EBootstrap::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
					$this->renderMenuRecursive($item['items'], false);
					//echo EBootstrap::closeTag('ul')."\n";
				}
				
				echo "\n";
			}
		}
	}
	
	/**
	 * Renders the content of a menu item.
	 * Note that the container and the sub-menus are not rendered here.
	 * @param array $item the menu item to be rendered. Please see {@link items} on what data might be in the item.
	 * @return string
	 * @since 1.1.6
	 */
	protected function renderMenuItem($item)
	{
		$icon = (isset($item['icon']) and !empty($item['icon'])) ? '<i class="'.$item['icon'].'"></i> ' : '';
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