<?php 

Yii::import('zii.widgets.CBreadcrumbs');

class EBootstrapBreadcrumbs extends CBreadcrumbs {
	public $tagName = 'ul';
	
	public $htmlOptions=array('class'=>'breadcrumb');
	
	public $separator=' <span class="divider">/</span>';
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		if(empty($this->links))
			return;

		echo EBootstrap::openTag($this->tagName,$this->htmlOptions)."\n";
		
		$links=array();
		if($this->homeLink===null)
			$links[]=EBootstrap::openTag('li').EBootstrap::link(Yii::t('zii','Home'),Yii::app()->homeUrl).EBootstrap::closeTag('li')."\n";
		else if($this->homeLink!==false)
			$links[]=EBootstrap::openTag('li').$this->homeLink.EBootstrap::closeTag('li')."\n";
		
		foreach($this->links as $label=>$url) {
			if(is_string($label) || is_array($url))
				$links[]=EBootstrap::openTag('li').EBootstrap::link($this->encodeLabel ? EBootstrap::encode($label) : $label, $url).EBootstrap::closeTag('li')."\n";
			else
				$links[]=EBootstrap::openTag('li').'<span>'.($this->encodeLabel ? EBootstrap::encode($url) : $url).'</span>'.EBootstrap::closeTag('li')."\n";
		}
		
		echo implode($this->separator,$links);
		echo EBootstrap::closeTag($this->tagName);
	}
}

?>