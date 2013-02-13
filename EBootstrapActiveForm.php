<?php

/**
 * Wrapper class for CActiveForm
 * Apply bootstrap style to the form
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.5.0
 * @package bootstrap.yiiwidgets
 */
class EBootstrapActiveForm extends CActiveForm {
	/**
	 * Display a horizontal form
	 *
	 * Default: false
	 *
	 * @access public
	 * @var boolean
	 */
	public $horizontal = false;
	
	/**
	 * Error message css class
	 *
	 * Default: help-inline
	 *
	 * @access public
	 * @var string
	 */
	public $errorMessageCssClass = 'help-inline';
	
	/**
	 * If it's set to false the EBootstrap css file will be included (specially for ajax validation errors)
	 * If it's set null no css file will be included
	 *
	 * @since 0.4.4
	 * @access public
	 * @var string|boolean
	 */
	public $cssFile = false;
	
	/**
	 * Init the widget .
	 *
	 * @access public
	 * @return void
	 */
	public function init() {
		if ($this->horizontal)
			EBootstrap::mergeClass($this->htmlOptions, array('form-horizontal'));
		
		if ($this->cssFile === false) {
			$cssFile = dirname(__FILE__).'/css/bootstrap.css';
			$this->cssFile = Yii::app()->getAssetManager()->publish($cssFile);
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		}
		
		parent::init();
	}
	
	/**
	 * Execute the widget.
	 *
	 * @access public
	 * @return void
	 */
	public function run() {
		parent::run();
	}
	
	/**
	 * Begins a control group.
	 *
	 * Into the control group belongs the label, the input and the error.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 *
	 * @access public
	 * @return string
	 */
	public function beginControlGroup($model, $attribute, $options = array()) {
		$option = array();
		$option['class'] = 'control-group';
		$error = $model->getError($attribute);
		if (!empty($error))
			EBootstrap::mergeClass($option, array('error'));

		EBootstrap::mergeClass($options, $option);
		
		return EBootstrap::openTag('div', $options);
	}
	
	/**
	 * End of the control group.
	 *
	 * @access public
	 * @return string
	 */
	public function endControlGroup() {
		return EBootstrap::closeTag('div');
	}
	
	/**
	 * Beginning of the controls (inputs).
	 *
	 * @access public
	 * @return string
	 */
	public function beginControls() {
		return EBootstrap::openTag('div', array('class' => 'controls'));
	}
	
	/**
	 * End of the controls.
	 *
	 * @access public
	 * @return string
	 */
	public function endControls() {
		return EBootstrap::closeTag('div');
	}
	
	/**
	 * Beginning of the form actions.
	 *
	 * Into the action sections belong all buttons like the submit or abort button.
	 *
	 * @access public
	 * @return string
	 */
	public function beginActions() {
		return EBootstrap::openTag('div', array('class' => 'form-actions'));
	}
	
	/**
	 * End form actions.
	 *
	 * @access public
	 * @return string
	 */
	public function endActions() {
		return EBootstrap::closeTag('div');
	}
	
	/**
	 * Get the form error summary.
	 *
	 * Apply bootstrap style to the error summary
	 *
	 * @param CModel $model
	 * @param string $header
	 * @param string $footer
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function errorSummary($model,$header=null,$footer=null,$htmlOptions=array()) {
		return EBootstrap::errorSummary($model, $header, $footer, $htmlOptions);
	}
	
	/**
	 * Returns a HTML label.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function label($model,$attribute,$htmlOptions=array()) {
		if ($this->horizontal)
			EBootstrap::mergeClass($htmlOptions, array('control-label'));
		
		return EBootstrap::activeLabel($model,$attribute,$htmlOptions);
	}
	
	/**
	 * Returns an advanced HTML label.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function labelEx($model,$attribute,$htmlOptions=array()) {
		if ($this->horizontal)
			EBootstrap::mergeClass($htmlOptions, array('control-label'));
		
		return EBootstrap::activeLabelEx($model,$attribute,$htmlOptions);
	}
	
	/**
	 * Render an input field with a prepended text or icon.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $prepend The text or icon to prepend
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function textFieldPrepend($model,$attribute,$prepend,$htmlOptions=array()) {
		return EBootstrap::activeTextFieldPrepend($model, $attribute, $prepend, $htmlOptions);
	}
	
	/**
	 * Render an input field with a appended text or icon.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $append The text or icon to append
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function textFieldAppend($model,$attribute,$append,$htmlOptions=array()) {
		return EBootstrap::activeTextFieldAppend($model, $attribute, $append, $htmlOptions);
	}
	
	/**
	 * Render a password field with a prepended text or icon.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $prepend The text or icon to prepend
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function passwordFieldPrepend($model,$attribute,$prepend,$htmlOptions=array()) {
		return EBootstrap::activePasswordFieldPrepend($model, $attribute, $prepend, $htmlOptions);
	}
	
	/**
	 * Render a password field with a appended text or icon.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param string $append The text or icon to append
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function passwordFieldAppend($model,$attribute,$append,$htmlOptions=array()) {
		return EBootstrap::activePasswordFieldAppend($model, $attribute, $append, $htmlOptions);
	}
	
	/**
	 * Returns a help block.
	 *
	 * Help block can be used to improve the usabilty of a form.
	 *
	 * @param string $help Help message
	 *
	 * @access public
	 * @return string
	 */
	public function helpBlock($help) {
		$html = EBootstrap::openTag('p', array('class' => 'help-block'));
		$html .= $help;
		$html .= EBootstrap::closeTag('p');
		
		return $html;
	}
	
	/**
	 * Returns a inline help.
	 *
	 * Help inline is displayed right next to the input field (where the error should be displayed).
	 *
	 * @param string $help Help message
	 *
	 * @since 0.4.4
	 * @access public
	 * @return string
	 */
	public function helpInline($help) {
		$html = EBootstrap::openTag('span', array('class' => 'help-inline'));
		$html .= $help;
		$html .= EBootstrap::closeTag('span');
		
		return $html;
	}

	/**
	 * Begin a bootstrap form group.
	 *
	 * @since 0.5.0
	 * @access private
	 * @return string
	 */
	private function _beginBootstrapGroup($model, $attribute) {
		$html = $this->beginControlGroup($model, $attribute);
		$html .= $this->labelEx($model, $attribute);
		$html .= $this->beginControls($model, $attribute);

		return $html;
	}

	/**
	 * End a bootstrap form group.
	 *
	 * @since 0.5.0
	 * @access private
	 * @return string
	 */
	private function _endBootstrapGroup($model, $attribute) {
		$html = $this->error($model, $attribute);
		$html .= $this->endControls($model, $attribute);
		$html .= $this->endControlGroup($model, $attribute);

		return $html;
	}

	/**
	 * Create a textfield with a control group.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions HTML options for the text field
	 *
	 * @since 0.5
	 * @access public
	 * @return string html
	 */
	public function bootstrapTextField($model, $attribute, $htmlOptions = array()) {
		$html = $this->_beginBootstrapGroup($model, $attribute);
		$html .= $this->textField($model, $attribute, $htmlOptions);
		$html .= $this->_endBootstrapGroup($model, $attribute);

		return $html;
	}

	/**
	 * Create a textfield with a control group.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions HTML options for the text field
	 *
	 * @since 0.5
	 * @access public
	 * @return string html
	 */
	public function bootstrapPasswordField($model, $attribute, $htmlOptions = array()) {
		$html = $this->_beginBootstrapGroup($model, $attribute);
		$html .= $this->passwordField($model, $attribute, $htmlOptions);
		$html .= $this->_endBootstrapGroup($model, $attribute);

		return $html;
	}
	
	/**
	 * Render a submit buttom.
	 *
	 * @param string $label Label
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return EBootstrapButton
	 */
	public function submitButton($label, $htmlOptions = array()) {
		EBootstrap::mergeClass($htmlOptions, array('btn', 'btn-primary'));
		return EBootstrap::submitButton($label, null, null, null, null, null, $htmlOptions);
	}
}

?>