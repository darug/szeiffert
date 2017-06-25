<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';
	public $orvos;

	public $admin;
	public $fadmin;
	public $temp;
	public $module_info = array(
		'name'				=>	'user',
		'title'				=>	'Felhasználó kezelés',
		'new'				=>	'felhasználó'
	);
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
/*	public function accessRules()
	{
		$record=User::model()->findByAttributes(array('username'=>Yii::app()->user->name));
		if($record->authority<=99){$this->admin=true;}
		if($record->authority>=80 && $record->authority<99){$this->fadmin=true;}else{$this->temp="A feltétel nem teljesült";}
		if($record->authority>=80 AND $record->authority<=99){$enable_fadmin='@';} else {$enable_fadmin='XXX';}
		if($record->authority==99){$enable_admin='admin'; $this->admin=true;} else {$enable_admin='xx';}
		return array(
		/*	array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			), */ //13.07.03. oDG
	/*		array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','update'),
				'users'=>array($enable_fadmin),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','index','delete', 'create'),
				'users'=>array($enable_admin),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	} */
	public function accessRules()
	{

		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update',),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','admin','error','create','view','update','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);

	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$record=User::model()->findByAttributes(array('username'=>Yii::app()->user->name));
		if($record->id==$id or $record->username=='admin'){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'fadmin'=>$fadmin,
		));} else {throw new CHttpException(404,'A keresett record Ön számára nem elérhető!');}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->id=$_POST['User']['id'];
			$model->password= crypt($model->password, $this->blowfishSalt());
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->password==$_POST['user']['password2'] && $model->insert()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
				$this->redirect(array('index'));
				
			}
			else{
				$uzen='Hibásan kitöltött űrlap';
				if($model->password==$_POST['user']['password2']){$uzen.='.';}else{$uzen.=', a két jelszó nem egyezik meg!';}
				Yii::app()->user->setFlash('error', $uzen);
				
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			$record=User::model()->findByAttributes(array('username'=>Yii::app()->user->name));
		if($record->id==$id or Yii::app()->user->name=='admin'){
			$hiba=False;
			if(strlen($model->password)<16){if($_POST['User']['password']==$_POST['User']['password2']){$model->password= crypt($model->password, $this->blowfishSalt());
													$hiba=false;}
												else{
													Yii::app()->user->setFlash('error', 'A két jelszó nem egyezik meg!');
													$hiba=true;
												}}
		//	$model->lastmod=time();
			if(!$hiba){if($model->save()){	
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
			//	$this->redirect(array('view','id'=>$model->id));
			}
			else{
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
			}
			//	$this->redirect(array('view','id'=>$model->id));
			}} else {
				throw new CHttpException(404,'A keresett record Ön számára nem elérhető!');	
				}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->name=='admin'){
						$dataProvider=new CActiveDataProvider('User');}
					else{
						$dataProvider=User::model()->search();
					}
		//$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/**
 * Generate a random salt in the crypt(3) standard Blowfish format.
 *
 * @param int $cost Cost parameter from 4 to 31.
 *
 * @throws Exception on invalid cost parameter.
 * @return string A Blowfish hash salt for use in PHP's crypt()
 */
	public function blowfishSalt($cost = 13)
	{
	    if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
	        throw new Exception("cost parameter must be between 4 and 31");
	    }
	    $rand = array();
	    for ($i = 0; $i < 8; $i += 1) {
	        $rand[] = pack('S', mt_rand(0, 0xffff));
	    }
	    $rand[] = substr(microtime(), 2, 6);
	    $rand = sha1(implode('', $rand), true);
	    $salt = '$2a$' . sprintf('%02d', $cost) . '$';
	    $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
	    return $salt;
	}
	
	
}
