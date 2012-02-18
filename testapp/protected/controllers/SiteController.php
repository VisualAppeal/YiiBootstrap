<?php

class SiteController extends Controller
{
	public $layout = '//layouts/column1';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	/*
	 * Create Alerts
	 */
	public function actionAlert($id = 0) {
		switch ($id) {
			case 1:
				Yii::app()->user->setFlash('warning', '<strong>Some Warning</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam!');
				break;
			case 2:
				Yii::app()->user->setFlash('error', '<strong>Attention</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam!');
				break;
			case 3:
				Yii::app()->user->setFlash('success', '<strong>Congrats</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam!');
				break;
			case 4:
				Yii::app()->user->setFlash('info', '<strong>Hello</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.');
				break;
			case 5:
				Yii::app()->user->setFlash('block-warning', '<h4 class="alert-heading">Some Warning</h4><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum!</p><p>'.EBootstrap::ibutton('Primary', '#', 'warning').' '.EBootstrap::ibutton('Default', '#').'</p>');
				break;
			case 6:
				Yii::app()->user->setFlash('block-error', '<h4 class="alert-heading">Attention</h4><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum!</p><p>'.EBootstrap::ibutton('Primary', '#', 'danger').' '.EBootstrap::ibutton('Default', '#').'</p>');
				break;
			case 7:
				Yii::app()->user->setFlash('block-success', '<h4 class="alert-heading">Yeappii</h4><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum!</p><p>'.EBootstrap::ibutton('Primary', '#', 'success').' '.EBootstrap::ibutton('Default', '#').'</p>');
				break;
			case 8:
				Yii::app()->user->setFlash('block-info', '<h4 class="alert-heading">Notice</h4><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum!</p><p>'.EBootstrap::ibutton('Primary', '#', 'info').' '.EBootstrap::ibutton('Default', '#').'</p>');
				break;
		}
		
		$this->render('alert');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}