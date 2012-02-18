<?php 

class EBootstrapLinkPager extends CLinkPager {
	public $cssFile = false;
	
	const CSS_SELECTED_PAGE = 'active';
	const CSS_HIDDEN_PAGE = 'disabled';
	
	public function init() {
		parent::init();
	}
	
	protected function createPageButton($label,$page,$class,$hidden,$selected) {
	    if($hidden || $selected)
	        $class.=' '.($hidden ? self::CSS_HIDDEN_PAGE : self::CSS_SELECTED_PAGE);
	    return '<li class="'.$class.'">'.CHtml::link($label,$this->createPageUrl($page)).'</li>';
	}
}

?>