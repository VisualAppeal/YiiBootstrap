<?php

/**
 * Wrapper class for CActiveForm
 * Apply bootstrap style to the form
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 1.0.0
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
	 * Class for the wrapper around the input.
	 *
	 * @access public
	 * @var string
	 */
	public $controlClass = 'col-lg-8';

	/**
	 * Class for the wrapper around the label.
	 *
	 * @access public
	 * @var string
	 */
	public $controlLabelClass = 'col-lg-4';
	
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
	 * Class for the form group wrapper which wrappes the buttons
	 *
	 * @access public
	 * @var string
	 */
	public $actionOffsetClass = 'col-lg-offset-4 col-lg-8';
	
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
	 * Begins a form group.
	 *
	 * Into the form group belongs the label, the input and the error.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 *
	 * @access public
	 * @return string
	 */
	public function beginControlGroup($model, $attribute, $options = array()) {
		$option = array();
		$option['class'] = 'form-group';
		$error = $model->getError($attribute);
		if (!empty($error))
			EBootstrap::mergeClass($option, array('has-error'));

		EBootstrap::mergeClass($options, $option);
		
		return EBootstrap::openTag('div', $options);
	}
	
	/**
	 * End of the form group.
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
		if ($this->horizontal)
			return EBootstrap::openTag('div', array('class' => $this->controlClass));
	}
	
	/**
	 * End of the controls.
	 *
	 * @access public
	 * @return string
	 */
	public function endControls() {
		if ($this->horizontal)
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
		$output = EBootstrap::openTag('div', array('class' => 'form-group'));
		if ($this->horizontal)
			$output .= EBootstrap::openTag('div', array('class' => $this->actionOffsetClass));

		return $output;
	}
	
	/**
	 * End form actions.
	 *
	 * @access public
	 * @return string
	 */
	public function endActions() {
		$output = EBootstrap::closeTag('div');
		if ($this->horizontal)
			$output .= EBootstrap::closeTag('div');

		return $output;
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
			EBootstrap::mergeClass($htmlOptions, array('control-label', $this->controlLabelClass));
		else
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
			EBootstrap::mergeClass($htmlOptions, array('control-label', $this->controlLabelClass));
		else
			EBootstrap::mergeClass($htmlOptions, array('control-label'));
		
		return EBootstrap::activeLabelEx($model,$attribute,$htmlOptions);
	}

	/**
	 * Returns an text input field.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function textField($model,$attribute,$htmlOptions=array())
	{
		return EBootstrap::activeTextField($model,$attribute,$htmlOptions);
	}

	/**
	 * Returns an textarea.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function textArea($model,$attribute,$htmlOptions=array())
	{
		return EBootstrap::activeTextArea($model,$attribute,$htmlOptions);
	}

	/**
	 * Returns an password input field.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions
	 *
	 * @access public
	 * @return string
	 */
	public function passwordField($model,$attribute,$htmlOptions=array())
	{
		return EBootstrap::activePasswordField($model,$attribute,$htmlOptions);
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
	 * Renders a dropdown list for a model attribute.
	 *
	 * @param CModel $model the data model
	 * @param string $attribute the attribute
	 * @param array $data data for generating the list options (value=>display)
	 * @param array $htmlOptions additional HTML attributes.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public function dropDownList($model,$attribute,$data,$htmlOptions=array())
	{
		return EBootstrap::activeDropDownList($model,$attribute,$data,$htmlOptions);
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
		EBootstrap::mergeClass($htmlOptions, array('form-control'));
		$html = $this->_beginBootstrapGroup($model, $attribute);
		$html .= $this->textField($model, $attribute, $htmlOptions);
		$html .= $this->_endBootstrapGroup($model, $attribute);

		return $html;
	}

	/**
	 * Create a textarea with a control group.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions HTML options for the textarea
	 *
	 * @since 0.5
	 * @access public
	 * @return string html
	 */
	public function bootstrapTextArea($model, $attribute, $htmlOptions = array()) {
		EBootstrap::mergeClass($htmlOptions, array('form-control'));
		$html = $this->_beginBootstrapGroup($model, $attribute);
		$html .= $this->textArea($model, $attribute, $htmlOptions);
		$html .= $this->_endBootstrapGroup($model, $attribute);

		return $html;
	}

	/**
	 * Create a checkbox with a control group.
	 *
	 * @param CModel $model The model
	 * @param string $attribute The attribute
	 * @param array $htmlOptions HTML options for the checkbox
	 *
	 * @since 0.5
	 * @access public
	 * @return string html
	 */
	public function bootstrapCheckBox($model, $attribute, $htmlOptions = array()) {
		$html = $this->_beginBootstrapGroup($model, $attribute);
		$html .= $this->checkBox($model, $attribute, $htmlOptions);
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
		EBootstrap::mergeClass($htmlOptions, array('form-control'));
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