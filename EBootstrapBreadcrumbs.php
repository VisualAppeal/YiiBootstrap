<?php 

Yii::import('zii.widgets.CBreadcrumbs');

/**
 * Wrapper class for CBreadcrumbs
 * Apply bootstrap style to the breadcrumbs
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.9
 * @package bootstrap.yiiwidgets
 */
class EBootstrapBreadcrumbs extends CBreadcrumbs {
	/**
	 * Separator for the items
	 */
	public $separator = ' <span class="divider">/</span>';
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('breadcrumb'));
	}
	
	/**
	 * Render the breadcrumbs
	 */
	public function run() {
		if(empty($this->links))
			return;

		echo EBootstrap::openTag('ul', $this->htmlOptions)."\n";
		
		$links=array();
		if($this->homeLink===null)
			$links[]=EBootstrap::openTag('li').EBootstrap::link(Yii::t('zii','Home'),Yii::app()->homeUrl);
		else if($this->homeLink!==false)
			$links[]=EBootstrap::openTag('li').$this->homeLink;
		
		$count = count($this->links);
		
		if ($count > 0) {
			$links[] = $this->separator.EBootstrap::closeTag('li')."\n";
			
			$i = 0;
			foreach($this->links as $label=>$url) {
				$i++;
				
				if(is_string($label) || is_array($url))
					$links[]=EBootstrap::openTag('li').EBootstrap::link($this->encodeLabel ? EBootstrap::encode($label) : $label, $url);
				else
					$links[]=EBootstrap::openTag('li').'<span>'.($this->encodeLabel ? EBootstrap::encode($url) : $url).'</span>';
				
				if ($i < $count) {
					$links[] = $this->separator;
				}
				$links[] = EBootstrap::closeTag('li')."\n";
			}
		}
		else {
			$links[] = EBootstrap::closeTag('li')."\n";
		}
		
		echo implode($links);

		echo EBootstrap::closeTag('ul');
	}
}

?>