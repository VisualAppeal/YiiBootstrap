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

		echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
		
		$links=array();
		if($this->homeLink===null)
			$links[]=CHtml::openTag('li').CHtml::link(Yii::t('zii','Home'),Yii::app()->homeUrl).CHtml::closeTag('li')."\n";
		else if($this->homeLink!==false)
			$links[]=CHtml::openTag('li').$this->homeLink.CHtml::closeTag('li')."\n";
		
		foreach($this->links as $label=>$url) {
			if(is_string($label) || is_array($url))
				$links[]=CHtml::openTag('li').CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url).CHtml::closeTag('li')."\n";
			else
				$links[]=CHtml::openTag('li').'<span>'.($this->encodeLabel ? CHtml::encode($url) : $url).'</span>'.CHtml::closeTag('li')."\n";
		}
		
		echo implode($this->separator,$links);
		echo CHtml::closeTag($this->tagName);
	}
}

?>