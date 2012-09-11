<?php 

/**
 * Wrapper class for CHtml
 * EBootstrap adds some bootstrap elements to CHtml
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.4.4
 * @package bootstrap
 */
class EBootstrap extends CHtml {
	/**
	 * Merges the classes (i.e. htmlOptions) and another array of classes
	 *
	 * @param array $option Classes to modify
	 * @param array $add Classes to add
	 */
	public static function mergeClass(array &$option, array $add)
	{
		if (isset($option['class']) and (!empty($option['class']))) {
			foreach ($add as $k => $v) {
				$option['class'] .= ' '.$v;
			}
		}
		else
			$option['class'] = implode(' ', $add);
	}
	
	/**
	 * Merges a class string (i.e. cssClassName) with an array of classes
	 *
	 * @param string $class Classes string
	 * @param array $add Classes to add
	 */
	public static function mergeClassString(&$class, array $add)
	{
		if (!empty($class))
			$class .= ' ';
		$class .= implode(' ', $add);
	}
	
	/**
	 * Register the build in js file
	 *
	 * @param integer $position
	 *
	 * @access public
	 * @return ClientScript
	 */
	public static function registerJs($position=NULL)
	{
		$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
		$js = Yii::app()->assetManager->publish($jsFile);
		return Yii::app()->clientScript->registerScriptFile($js, $position);
	}
	
	/**
	 * Returns an inline label
	 *
	 * @param string $label Label
	 * @param string $type success|warning|important|info. Leave empty for default
	 * @param array $htmlOptions
	 */
	public static function ilabel($label, $type='', $htmlOptions=array())
	{
		$classes = array('label');
		if (!empty($type))
			$classes[] = 'label-'.$type;
		
		self::mergeClass($htmlOptions, $classes);
		return EBootstrap::tag('span', $htmlOptions, $label);
	}
	
	/**
	 * Returns an link-button
	 *
	 * http://twitter.github.com/bootstrap/base-css.html#buttons
	 *
	 * @param string $text Label of the button
	 * @param string $url Url
	 * @param string $type primary|info|success|warning|danger|inverse. Leave empty for default
	 * @param string $size large|small|mini. Leave empty for default
	 * @param bool $disabled Default: false
	 * @param string $icon http://twitter.github.com/bootstrap/base-css.html#icons (e.g. 'shopping-cart', 'user', 'ok', etc.)
	 * @param bool $iconWhite Invert the icon color. Default: false
	 * @param array $htmlOptions
	 * @param bool $block Block element
	 */
	public static function ibutton($text, $url = '#', $type = '', $size = '', $disabled = false, $icon = '', $iconWhite = false, $htmlOptions = array(), $block = false) {
		return new EBootstrapButton($text, $url, $type, $size, $disabled, $icon, $iconWhite, $htmlOptions, 'a', $block);
	}
	
	/**
	 * Returns a group of buttons
	 *
	 * http://twitter.github.com/bootstrap/components.html#buttonGroups
	 *
	 * @param array $buttons Array of buttons. You can create them with the help of EBootstrap::ibutton();
	 * @param array $htmlOptions
	 */
	public static function buttonGroup($buttons, $htmlOptions = array()) {
		$html = '';
		
		if (is_array($buttons) and (count($buttons))) {
			self::mergeClass($htmlOptions, array('btn-group'));
			$html .= self::openTag('div', $htmlOptions)."\n";
			foreach ($buttons as $button) {
				$html .= $button."\n";
			}
			$html .= self::closeTag('div')."\n";
		}
		
		return $html;
	}
	
	/**
	 * Returns a toolbar with button groups
	 *
	 * http://twitter.github.com/bootstrap/components.html#buttonGroups
	 *
	 * @param array $buttonGroups Array of button groups. You can create them with the help of EBootstrap::buttonGroup();
	 * @param array $htmlOptions
	 */
	public static function buttonToolbar($buttonGroups, $htmlOptions = array()) {
		$html = '';
		
		if (is_array($buttonGroups) and (count($buttonGroups))) {
			self::mergeClass($htmlOptions, array('btn-toolbar'));
			$html .= self::openTag('div', $htmlOptions)."\n";
			foreach ($buttonGroups as $group) {
				$html .= $group."\n";
			}
			$html .= self::closeTag('div')."\n";
		}
		
		return $html;
	}
	
	/**
	 * Returns a toolbar with button groups
	 *
	 * @param EBootstrapButton $button You can create the button with the help of EBootstrap::ibutton();
	 * @param array $submenu Array of submenu items. Available options are text, url and htmlOptions
	 * @param bool $split If split is set to true, the carret ist next to the button and both elements can be clicked separately 
	 * @param array $htmlOptions
	 */
	public static function buttonDropdown(EBootstrapButton $button, $submenuItems = array(), $split = false, $htmlOptions = array()) {
		$html = '';
		
		self::mergeClass($htmlOptions, array('btn-group'));
		$html .= self::openTag('div', $htmlOptions);
		
		$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
		$js = Yii::app()->assetManager->publish($jsFile);
		Yii::app()->clientScript->registerScriptFile($js);
		
		if (!$split) {
			$button->htmlOptions['data-toggle'] = "dropdown";
			$button->url = "#";
			$button->text .= ' <span class="caret"></span>';
			self::mergeClass($button->htmlOptions, array('dropdown-toggle'));
		
			$html .= $button."\n";
		}
		else {
			$carret = new EBootstrapButton('<span class="caret"></span>', '#');
			$carret->htmlOptions['data-toggle'] = "dropdown";
			$carret->type = $button->type;
			self::mergeClass($carret->htmlOptions, array('btn', 'dropdown-toggle'));
			
			$html .= $button."\n";
			$html .= $carret."\n";
		}
		
		if (is_array($submenuItems) and (count($submenuItems))) {
			$html .= self::openTag('ul', array('class' => 'dropdown-menu'))."\n";
			foreach ($submenuItems as $item) {
				if (isset($item['submenu'])) {
					$html .= self::openTag('li', array('class' => 'dropdown-submenu'))."\n";
					$html .= self::tag('a', array('tabindex' => -1, 'href' => $item['url']), $item['text']);
					$html .= self::openTag('ul', array('class' => 'dropdown-menu'))."\n";
					foreach ($item['submenu'] as $subSubMenuItem) {
						$html .= self::openTag('li')."\n";
						$itemOptions = isset($subSubMenuItem['htmlOptions']) ? $subSubMenuItem['htmlOptions'] : array();
						$html .= self::link($subSubMenuItem['text'], $subSubMenuItem['url'], $itemOptions)."\n";
						$html .= self::closeTag('li')."\n";
					}
					$html .= self::closeTag('ul')."\n";
				}
				else {
					$html .= self::openTag('li')."\n";
					
					if (isset($item['icon']))
						$html .= self::icon($item['icon']) . ' ';
					
					$itemOptions = isset($item['htmlOptions']) ? $item['htmlOptions'] : array();
					$html .= self::link($item['text'], $item['url'], $itemOptions)."\n";
					
					$html .= self::closeTag('li')."\n";
				}
			}
			$html .= self::closeTag('ul')."\n";
		}
		
		$html .= self::closeTag('div')."\n";
		
		return $html;
	}
	
	/**
	 * Returns an icon
	 *
	 * http://twitter.github.com/bootstrap/base-css.html#icons
	 *
	 * @param string $icon e.g. 'shopping-cart', 'user', 'ok', etc.
	 * @param bool $iconWhite Invert the icon color. Default: false
	 * @param array $htmlOptions HTML options
	 */
	public static function icon($icon, $iconWhite = false, $htmlOptions = array()) {
		$classes = array('icon-' . $icon);
		if ($iconWhite)
			$classes[] = 'icon-white';
		
		EBootstrap::mergeClass($htmlOptions, $classes);
		
		$return = '<i class="' . $htmlOptions['class'] . '"';
		
		if (isset($htmlOptions['id']))
			$return .= ' id="' . $htmlOptions['id'] . '"';

		return $return.'></i>';
	}
	
	/** IMAGES */
	
	/**
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
	
	/**
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
	
	/**
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
				$html .= self::openTag('p')."\n";
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
	
	/**
	 * Render an input field with a prepended text or icon
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $prepend The text or icon to prepend
	 * @param array $htmlOptions
	 */
	public static function activeTextFieldPrepend($model,$attribute,$prepend,$htmlOptions=array()) {
       	$html = self::openTag('div', array('class' => 'input-prepend'))."\n";
       	$html .= self::tag('span', array('class' => 'add-on'), $prepend);
       
       	self::resolveNameID($model,$attribute,$htmlOptions);
    	self::clientChange('change',$htmlOptions);
    	$html .= self::activeInputField('text',$model,$attribute,$htmlOptions)."\n";
    	
    	$html .= self::closeTag('div')."\n";
    	
    	return $html;
	}
	
	/**
	 * Render an input field with a appended text or icon
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $append The text or icon to append
	 * @param array $htmlOptions
	 */
	public static function activeTextFieldAppend($model,$attribute,$prepend,$htmlOptions=array()) {
       	$html = self::openTag('div', array('class' => 'input-append'))."\n";
       
       	self::resolveNameID($model,$attribute,$htmlOptions);
    	self::clientChange('change',$htmlOptions);
    	$html .= self::activeInputField('text',$model,$attribute,$htmlOptions);
    	
    	$html .= self::tag('span', array('class' => 'add-on'), $prepend)."\n";
    	
    	$html .= self::closeTag('div')."\n";
    	
    	return $html;
	}
	
	/**
	 * Render a password field with a prepended text or icon
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $prepend The text or icon to prepend
	 * @param array $htmlOptions
	 */
	public static function activePasswordFieldPrepend($model,$attribute,$prepend,$htmlOptions=array()) {
       	$html = self::openTag('div', array('class' => 'input-prepend'))."\n";
       	$html .= self::tag('span', array('class' => 'add-on'), $prepend);
       
       	self::resolveNameID($model,$attribute,$htmlOptions);
    	self::clientChange('change',$htmlOptions);
    	$html .= self::activeInputField('password',$model,$attribute,$htmlOptions)."\n";
    	
    	$html .= self::closeTag('div')."\n";
    	
    	return $html;
	}
	
	/**
	 * Render a password field with a appended text or icon
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $append The text or icon to append
	 * @param array $htmlOptions
	 */
	public static function activePasswordFieldAppend($model,$attribute,$prepend,$htmlOptions=array()) {
       	$html = self::openTag('div', array('class' => 'input-append'))."\n";
       
       	self::resolveNameID($model,$attribute,$htmlOptions);
    	self::clientChange('change',$htmlOptions);
    	$html .= self::activeInputField('password',$model,$attribute,$htmlOptions);
    	
    	$html .= self::tag('span', array('class' => 'add-on'), $prepend)."\n";
    	
    	$html .= self::closeTag('div')."\n";
    	
    	return $html;
	}
	
	/**
	 * Render a bootstrap search field with rounded corners
	 *
	 * @param string $name The name
	 * @param string $value Predefined value
	 * @param array $htmlOptions HTML options
	 */
	public static function searchField($name,$value='',$htmlOptions=array()) {
		self::mergeClass($htmlOptions, array('search-query'));
		return self::textField($name, $value, $htmlOptions);
	}
		
	/**
	 * Render a submit button
	 *
	 * http://twitter.github.com/bootstrap/base-css.html#buttons
	 *
	 * @param string $text Label of the button
	 * @param string $type primary|info|success|warning|danger|inverse. Leave empty for default
	 * @param string $size large|small|mini. Leave empty for default
	 * @param bool $disabled Default: false
	 * @param string $icon http://twitter.github.com/bootstrap/base-css.html#icons (e.g. 'shopping-cart', 'user', 'ok', etc.)
	 * @param bool $iconWhite Invert the icon color. Default: false
	 * @param array $htmlOptions
	 * @param bool $block Block element button
	 */
	public static function submitButton($label = 'submit', $type = 'primary', $size = '', $disabled = false, $icon = '', $iconWhite = false, $htmlOptions = array(), $block = false) {
		$htmlOptions['type']='submit';
    	return new EBootstrapButton($label, '', $type, $size, $disabled, $icon, $iconWhite, $htmlOptions, 'button', $block);
	}
	
	/**
	 * Error summary
	 *
	 * Apply bootstrap style to the error summary
	 *
	 * @param CModel $model
	 * @param string $header
	 * @param string $footer
	 * @param array $htmlOptions
	 */
	public static function errorSummary($model,$header=null,$footer=null,$htmlOptions=array()) {
		$content='';
		if(!is_array($model))
			$model=array($model);
		if(isset($htmlOptions['firstError']))
		{
			$firstError=$htmlOptions['firstError'];
			unset($htmlOptions['firstError']);
		}
		else
			$firstError=false;
		foreach($model as $m)
		{
			foreach($m->getErrors() as $errors)
			{
				foreach($errors as $error)
				{
					if($error!='')
						$content.="<li>$error</li>\n";
					if($firstError)
						break;
				}
			}
		}
		if($content!=='')
		{
			if($header===null)
				$header=Yii::t('yii','Please fix the following input errors:');
			$header = EBootstrap::tag('h4', array('class' => 'alert-heading'), $header)."\n";
			
			if(!isset($htmlOptions['class']))
				$htmlOptions['class']=EBootstrap::$errorSummaryCss;
			
			EBootstrap::mergeClass($htmlOptions, array('alert', 'alert-error', 'alert-block'));
			
			return EBootstrap::tag('div',$htmlOptions,$header."\n<ul>\n$content</ul>".$footer);
		}
		else
			return '';
	}
}

EBootstrap::$afterRequiredLabel = ' <span class="required">' . Yii::t('Site', '(Required)') . '</span>';

?>