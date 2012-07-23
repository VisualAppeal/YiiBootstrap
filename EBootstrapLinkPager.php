<?php 

/**
 * Bootstrap pager
 * http://twitter.github.com/bootstrap/components.html#pagination
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.yiiwidgets
 */
class EBootstrapLinkPager extends CLinkPager {
	/**
	 * Do not include the default style
	 *
	 * If it's set unequal false the css file specified will be included
	 */
	public $cssFile = false;
	
	/**
	 * Replace the default css with the bootstrap equivalent 
	 */
	const CSS_SELECTED_PAGE = 'active';
	const CSS_HIDDEN_PAGE = 'disabled';
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
	}
	
	/**
	 * Create a pager button
	 */
	protected function createPageButton($label,$page,$class,$hidden,$selected) {
	    if($hidden || $selected)
	        $class.=' '.($hidden ? self::CSS_HIDDEN_PAGE : self::CSS_SELECTED_PAGE);
	    return '<li class="'.$class.'">'.CHtml::link($label,$this->createPageUrl($page)).'</li>';
	}
}

?>