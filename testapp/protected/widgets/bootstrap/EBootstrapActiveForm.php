<?php

class EBootstrapActiveForm extends CActiveForm {
	/*
	 * Default: Vertical
	 */
	public $horizontal = false;
	
	/*
	 * Error message css class
	 */
	public $errorMessageCssClass = 'help-inline';
	
	public function init() {
		if ($this->horizontal)
			EBootstrap::mergeClass($this->htmlOptions, array('form-horizontal'));
		
		parent::init();
	}
	
	public function run() {
		parent::run();
	}
	
	public function beginControlGroup($model, $attribute) {
		$option = array();
		$option['class'] = 'control-group';
		$error = $model->getError($attribute);
		if (!empty($error))
			EBootstrap::mergeClass($option, array('error'));
		
		echo CHtml::openTag('div', array('class' => $option['class']));
	}
	
	public function endControlGroup() {
		echo CHtml::closeTag('div');
	}
	
	public function beginControls() {
		echo CHtml::openTag('div', array('class' => 'controls'));
	}
	
	public function endControls() {
		echo CHtml::closeTag('div');
	}
	
	public function beginActions() {
		echo CHtml::openTag('div', array('class' => 'form-actions'));
	}
	
	public function endActions() {
		echo CHtml::closeTag('div');
	}
	
	public function errorSummary($model,$header=null,$footer=null,$htmlOptions=array()) {
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
			$header = CHtml::tag('h4', array('class' => 'alert-heading'), $header)."\n";
			
			if(!isset($htmlOptions['class']))
				$htmlOptions['class']=CHtml::$errorSummaryCss;
			
			EBootstrap::mergeClass($htmlOptions, array('alert', 'alert-error', 'alert-block'));
			
			return CHtml::tag('div',$htmlOptions,$header."\n<ul>\n$content</ul>".$footer);
		}
		else
			return '';

	}
	
	public function helpBlock($help) {
		echo CHtml::openTag('p', array('class' => 'help-block'));
		echo $help;
		echo CHtml::closeTag('p');
	}
	
	public function submitButton($label, $htmlOptions = array()) {
		EBootstrap::mergeClass($htmlOptions, array('btn', 'btn-primary'));
		echo CHtml::submitButton($label, $htmlOptions);
	}
}

?>