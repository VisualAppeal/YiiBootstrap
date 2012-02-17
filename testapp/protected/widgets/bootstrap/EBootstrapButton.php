<?php 

class EBootstrapButton extends CWidget {
	public $text = '';
	public $url = '#';
	public $type = '';
	public $size = '';
	
	public $icon = '';
	public $iconWhite = false;
	
	public $disabled = false;
	public $htmlOptions = array();
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		parent::run();
		
		$class = array('btn');
		
		if (!empty($this->size))
			$class[] = 'btn-'.$this->size;
		
		if (!empty($this->type))
			$class[] = 'btn-'.$this->type;
		
		if ($this->disabled)
			$class[] = 'disabled';
		
		if (!empty($this->icon))
			$this->text = EBootstrapIcon::icon($this->icon, $this->iconWhite).' '.$this->text;
		
		EBootstrapTools::mergeClass($this->htmlOptions, $class);
		
		echo CHtml::link($this->text, $this->url, $this->htmlOptions)."\n";
	}
}

?>