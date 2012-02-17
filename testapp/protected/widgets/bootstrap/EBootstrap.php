<?php 

class EBootstrap extends CHtml {
	/*
	 * Merges the classes (i.e. htmlOptions) and another array of classes
	 */
	public static function mergeClass(array &$option, array $add) {
		if (isset($option['class']) and (!empty($option['class']))) {
			foreach ($add as $k => $v) {
				$option['class'] .= ' '.$v;
			}
		}
		else
			$option['class'] = implode(' ', $add);
	
	}
	
	/*
	 * Outputs an inline label
	 *
	 */
	public static function ilabel($label, $type='', $htmlOptions=array()) {
		$classes = array('label');
		if (!empty($type))
			$classes[] = 'label-'.$type;
		
		self::mergeClass($htmlOptions, $classes);
		echo CHtml::tag('span', $htmlOptions, $label);
	}
	
	/*
	 * Outputs an inline-button
	 */
	public static function ibutton($text, $url = '#', $type = '', $size = '', $disabled = false, $icon = '', $iconWhite = false, $htmlOptions = array()) {
		$class = array('btn');
		
		if (!empty($size))
			$class[] = 'btn-'.$size;
		
		if (!empty($type))
			$class[] = 'btn-'.$type;
		
		if ($disabled)
			$class[] = 'disabled';
		
		if (!empty($icon))
			$text = self::icon($icon, $iconWhite).' '.$text;
		
		self::mergeClass($htmlOptions, $class);
		echo self::link($text, $url, $htmlOptions)."\n";
	}
	
	/*
	 * Returns an icon
	 */
	public static function icon($icon, $white = false) {
		$return = '<i class="icon-'.$icon;
		if ($white)
			$return .= ' icon-white';
		return $return.'"></i>';
	}
}

?>