<?php 

class EBootstrapButton {
	public $text;
	public $url;
	public $type;
	public $size;
	public $disabled;
	
	public $icon;
	public $iconWhite;
	
	public $htmlOptions;
	
	public function __construct($text, $url = '#', $type = '', $size = '', $disabled = false, $icon = '', $iconWhite = false, $htmlOptions = array()) {
		$this->text = $text;
		$this->url = $url;
		$this->type = $type;
		$this->size = $size;
		$this->disabled = $disabled;
		$this->icon = $icon;
		$this->iconWhite = $iconWhite;
		$this->htmlOptions = $htmlOptions;
		
		$class = array('btn');
		
		EBootstrap::mergeClass($this->htmlOptions, $class);
	}
	
	public function __tostring() {
		$class = array();
		
		if (!empty($this->size))
			$class[] = 'btn-'.$this->size;
		
		if (!empty($this->type))
			$class[] = 'btn-'.$this->type;
		
		if ($this->disabled)
			$class[] = 'disabled';
		
		if (!empty($this->icon))
			$this->text = EBootstrap::icon($this->icon, $this->iconWhite).' '.$this->text;
		
		EBootstrap::mergeClass($this->htmlOptions, $class);
		
		return EBootstrap::link($this->text, $this->url, $this->htmlOptions)."\n";
	}
}

?>