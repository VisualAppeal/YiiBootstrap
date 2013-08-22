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
	 *
	 * @access public
	 * @var mixed
	 */
	public $cssFile = false;
	
	/**
	 * Replace the default css with the bootstrap equivalent 
	 */
	const CSS_SELECTED_PAGE = 'active';
	const CSS_HIDDEN_PAGE = 'disabled';
	
	/**
	 * Init the widget
	 *
	 * @access public
	 * @return void
	 */
	public function init() {
		$this->htmlOptions['class'] = 'pagination';
		parent::init();
	}
	
	/**
	 * Create a pager button.
	 *
	 * @param string $label
	 * @param string $page
	 * @param string $class
	 * @param boolean $hidden
	 * @param boolean $selected
	 *
	 * @access protected
	 * @return string
	 */
	protected function createPageButton($label,$page,$class,$hidden,$selected) {
		if($hidden || $selected)
			$class.=' '.($hidden ? self::CSS_HIDDEN_PAGE : self::CSS_SELECTED_PAGE);
		
		if (!$hidden)
			return '<li class="'.$class.'">'.EBootstrap::link($label,$this->createPageUrl($page)).'</li>';
		else
			return '<li class="'.$class.'">'.EBootstrap::link($label,'').'</li>';
	}
}

?>