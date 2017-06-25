<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	if(Yii::app()->user->name=='admin'){$l_out='//layouts/column2';} else {$l_out='//layouts/main';}

	public $layout='//layouts/column2';	
	public $admin;
	public $fadmin="";
	public $temp;
	public $update="Felhasználó módosítása";
	public $list="Felhasználók listázása";
	public $view="Felhasználó megnézése";
	public $delete="Felhasználó törlése";
	public $manage="Felhasználók kezelése";
	public $create="új felhasználó létrehozása";
	
/*		public function __construct(){
		
		$this->setLayout();
		
	}

		
	/**
	 * layout kiolvasása az orvos táblábol
	 */
/* */	public function setLayout(){
    //  if(Yii::app()->user->name=='admin'){$lay='//layouts/column2';} else {$lay='//layouts/main';}
	//  $this->layout = $lay;	
	 }
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'view' and 'update' actions
				'actions'=>array('update', 'view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','create','view','update'),
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
		if($record->id==$id or $record->authority==99){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'fadmin'=>User::model()->username,
		));} else {throw new CHttpException(404,'A keresett rekord az Ön számára nem elérhető!');}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$uzen="";
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password= crypt($model->password, $this->blowfishSalt());
			$model->lastmod=date("Y-m-d H:i:s", time());
		/*	if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));*/
		if(strlen($model->password)<15){
		if($model->password==$_POST['user']['password2'] && $model->insert()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
				$this->redirect(array('view','id'=>$model->id,));
				
			}
			else{
				$uzen='Hibásan kitöltött űrlap';
				if($model->password==$_POST['user']['password2']){$uzen.='.';}else{$uzen.=', a két jelszó nem egyezik meg!';}
				Yii::app()->user->setFlash('error', $uzen);
				
			}
		} else {
			if($model->save()){$uzen="Sikeres mentés!";} else {$uzen="<span=red>A mentés nem sikerült!!!</span>";}
		}
				
		}

		$this->render('create',array(
			'model'=>$model,
			'uzen'=>$uzen
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
		$hiba="";
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$record=User::model()->findByAttributes(array('username'=>Yii::app()->user->name));
			if($record->id==$id or $record->authority==99){
				if(strlen($model->password)<16){
					if( $model->password==$_POST['User']['password2']){
						$model->password= crypt($model->password, $this->blowfishSalt());}
					else {$hiba="Adatbaviteli hiba: a két jelszó nem egyezik meg!!";}
				}
				date_default_timezone_set("Europe/Budapest");
				$model->lastmod=date("Y-m-d H:i:s", time());
				if($hiba==""){	
					if($model->save()){
						Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
						$this->redirect(array('view','id'=>$model->id,));
					} else {Yii::app()->user->setFlash('error', "Sikeretelen mentés!!!");}
				} else {Yii::app()->user->setFlash('error', $hiba);}
			}//if($record->id==$id or $record->authority==99)
			else {
				throw new CHttpException(404,'A keresett recordaz Ön számára nem elérhető! '.$hiba);	
				}
		}//if(isset($_POST['User']))
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
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
