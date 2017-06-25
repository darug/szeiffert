<?php
/**
 * @class FelvilagositAdminController
 * @file admin/FelvilagositController.php
 * @class FelvilagositAdminController
 * 
 */
 
 /**
 * @brief admin/Felvilagosit => Felvlagosit tábla karbantartás
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * - index(), amely az id_orvos egyedi record tartalmat listázza (admin esetében a teljes tartalmat!)
 * - view($id), amely az adott rekord tartalmat módosíthatja
 * - create(), amely új rekord tartalmat hoz létre 
 * - delete($id), amely az adott rekord tartalmat törli (csak a saját rekordok!) 
 * <b>Az ovábbiak csak az admin számára elérhetők:</b>
 * - admin, amely az összes rekor listázását, módoítását és törlését lehetóvé teszi  
 * - delete($id) bármely tartalmat! 
 * 
 **/

class FelvilagositAdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';
	public $orvos;

	public $module_info = array(
		'name'				=>	'felvilágosítás',
		'title'				=>	'Felvilágosítások',
		'new'				=>	'felvilágosítás'
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Felvilagosit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Felvilagosit']))
		{
			$model->attributes=$_POST['Felvilagosit'];
			//Need fix: somehow the isNewRecord attribute switching to false, need manual set to true
			$model->lastmod=date('Y-m-d H:i:s',time());
			$model->setIsNewRecord(true);
			
			if($model->save()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
				$this->redirect($this->createAbsoluteUrl($this->uniqueid));
				
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}

		}

		$this->module_info['item'] = "Új " . $this->module_info['new'] . " hozzáadása";

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

		if(isset($_POST['Felvilagosit']))
		{
			$model->attributes=$_POST['Felvilagosit'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
				$this->redirect(array('index'));
				
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}

		}

		$this->module_info['item'] ="id= ". $model->id . " szerkesztése";

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
		if(!isset($_GET['ajax'])){
			
			Yii::app()->user->setFlash('success', 'Sikeres törlés.');
			$this->redirect($this->createAbsoluteUrl($this->uniqueid));
			
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->name=='admin'){
						$dataProvider=new CActiveDataProvider('Felvilagosit');}
					else{
						$dataProvider=Felvilagosit::model()->search();
					}	
		//$dataProvider=new CActiveDataProvider('Felvilagosit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Felvilagosit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Felvilagosit']))
			$model->attributes=$_GET['Felvilagosit'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Felvilagosit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Felvilagosit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Felvilagosit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='felvilagosit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
