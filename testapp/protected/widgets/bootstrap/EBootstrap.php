<?php 

/*
 * Wrapper class for CHtml
 * EBootstrap adds some bootstrap elements to CHtml
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap
 */
class EBootstrap extends CHtml {
	/*
	 * Merges the classes (i.e. htmlOptions) and another array of classes
	 *
	 * @param array $option Classes to modify
	 * @param array $add Classes to add
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
	 * Merges a class string (i.e. cssClassName) with an array of classes
	 *
	 * @param string $class Classes string
	 * @param array $add Classes to add
	 */
	public static function mergeClassString(&$class, array $add) {
		if (!empty($class))
			$class .= ' ';
		$class .= implode(' ', $add);
	}
	
	/*
	 * Returns an inline label
	 *
	 * @param string $label Label
	 * @param string $type success|warning|important|info. Leave empty for default
	 * @param array $htmlOptions
	 */
	public static function ilabel($label, $type='', $htmlOptions=array()) {
		$classes = array('label');
		if (!empty($type))
			$classes[] = 'label-'.$type;
		
		self::mergeClass($htmlOptions, $classes);
		return EBootstrap::tag('span', $htmlOptions, $label);
	}
	
	/*
	 * Returns an link-button
	 *
	 * @param string $text Label of the button
	 * @param string $url Url
	 * @param string $type primary|info|success|warning|danger|inverse. Leave empty for default
	 * @param string $size large|small|mini. Leave empty for default
	 * @param bool $disabled Default: false
	 * @param string $icon http://twitter.github.com/bootstrap/base-css.html#icons (e.g. 'shopping-cart', 'user', 'ok', etc.)
	 * @param bool $iconWhite Invert the icon color. Default: false
	 * @param array $htmlOptions
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
	 *
	 * @param string $icon http://twitter.github.com/bootstrap/base-css.html#icons (e.g. 'shopping-cart', 'user', 'ok', etc.)
	 * @param bool $iconWhite Invert the icon color. Default: false
	 */
	public static function icon($icon, $iconWhite = false) {
		$return = '<i class="icon-'.$icon;
		if ($white)
			$return .= ' icon-white';
		return $return.'"></i>';
	}
	
	/* IMAGES */
	
	/*
	 * Returns an custom thumbnail src
	 *
	 * http://placehold.it/
	 *
	 * @param int $w Width
	 * @param int $h Height Default: $w
	 * @param string $bgColor Background color
	 * @param string $tColor Text color
	 * @param string $text Text to display on the image
	 * @param string $format png|gif|jpg Default: png
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
	 * Returns an image link
	 *
	 * @param string $url Url
	 * @param string $src Image src
	 * @param string $alt Alternative text
	 * @param array $htmlOptions
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
	 * Returns an image with a caption
	 *
	 * @param string $src Image src
	 * @param string $alt Alternative text
	 * @param string $caption Image caption
	 * @param string $body Text below the caption
	 * @param array $actions Array with actions which will be rendered below the body. All items has to be HTML
	 * @param array $htmlOptions
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