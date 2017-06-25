<?php

class AuthenticationController extends Controller
{
	
	public $layout='//layouts/admin-login';
	public $orvos;
	public function actionLogin()
	{
		$model=new User('login');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='User')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $errorCode=$model->login()){
				
				Yii::app()->user->setFlash('success', 'Sikeres bejelentkezés.');
				$rec=User::model()->find('username=:username',array(':username'=>Yii::app()->user->name));
				$_SESSION['ho']['orvos']=$rec->id_orvos;
				$this->redirect(Yii::app()->getBaseUrl(true) ."/".$_SESSION['ho']['orvos']. '/admin/admin/index');
			
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibás felhasználói név vagy jelszó. ');
				
			}
		}
		
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		
		Yii::app()->user->logout();
/* 2013.12.16. kilepes nem sikeres!	*/
//		Yii::app()->session->open();
		Yii::app()->user->setFlash('success', 'Sikeres kijelentkezés.');
		$this->redirect(Yii::app()->getBaseUrl(true) ."/".Yii::app()->params['orvos']. '/admin/authentication/login');
	}

}