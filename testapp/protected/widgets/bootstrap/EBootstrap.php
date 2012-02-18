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
	 * Return an inline label
	 *
	 */
	public static function ilabel($label, $type='', $htmlOptions=array()) {
		$classes = array('label');
		if (!empty($type))
			$classes[] = 'label-'.$type;
		
		self::mergeClass($htmlOptions, $classes);
		return EBootstrap::tag('span', $htmlOptions, $label);
	}
	
	/*
	 * Return an inline-button
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
		return self::link($text, $url, $htmlOptions)."\n";
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
	
	/* IMAGES */
	
	/*
	 * Returns an custom thumbnail link
	 *
	 * http://placehold.it/
	 */
	public static function thumbnailSrc($w, $h = null, $bgColor = 'ccc', $tColor = '333', $text = null, $format = 'png') {
		$src = 'http://placehold.it/'.$w;
		if (!is_null($h))
			$src .= 'x'.$h;
		$src .= '/'.$bgColor.'/'.$tColor.'.'.$format;
		if (!is_null($text))
			$src .= '&text=' . urlencode($text);
		
		return $src;
	}
	
	/*
	 * Returns an custom thumbnail
	 *
	 * http://placehold.it/
	 */
	public static function thumbnailLink($url, $src, $alt = '', $htmlOptions = array()) {
		$html = '';
		
		$htmlOptions['href'] = $url;
		self::mergeClass($htmlOptions, array('thumbnail'));
		$html .= EBootstrap::openTag('a', $htmlOptions);
		$html .= EBootstrap::tag('img', array('src' => $src, 'alt' => $alt));
		$html .= EBootstrap::closeTag('a');
		
		return $html;
	}
	
	/*
	 * Returns image with 
	 */
	public static function imageCaption($src, $alt='', $caption = '', $body = '', $actions = array(), $htmlOptions=array()) {
		$html = '';
		
		self::mergeClass($htmlOptions, array('thumbnail'));
		$html .= self::openTag('div', $htmlOptions)."\n";
				
		$htmlOptions = array();
		$htmlOptions['src']=$src;
		$htmlOptions['alt']=$alt;
		$html .= self::tag('img',$htmlOptions)."\n";
		
		if (!empty($caption) or !empty($body) or !empty($actions)) {
			$html .= self::openTag('div', array('class' => 'caption'));
			
			if (!empty($caption))
				$html .= self::tag('h5', array(), $caption)."\n";
			if (!empty($body))
				$html .= self::tag('p', array(), $body)."\n";
			if (!empty($actions)) {
				$html .= self::openTag('p');
				foreach ($actions as $button) {
					$html .= $button." \n";
				}
				$html .= self::closeTag('p')."\n";
			}
			
			$html .= self::closeTag('div');
		}
    	
    	$html .= self::closeTag('div')."\n";
    	
    	return $html;
	}
}

?>