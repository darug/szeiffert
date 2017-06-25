<?php
/**
 * KorzetAdminController
 * @class KorzetAdminController
 * 
 */
 
 /**
 * @brief admin/KorzetAdmin => korzet tábla (utca lista) karbantartás
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * - index(), amely az id_orvos egyedi record tartalmat listázza (admin esetében a teljes tartalmat!)
 * - update($id), amely az adott rekord tartalmat módosíthatja
 * - create(), amely új rekord tartalmat hoz létre 
 * - delete($id), amely az adott rekord tartalmat törli 
 * 
 **/
class KorzetAdminController extends Controller
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
		'name'				=>	'körzet',
		'title'				=>	'Körzetek',
		'new'				=>	'körzet'
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
		
		
		$temp=array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','update','create','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	//	Korzet::model()->temp=$temp; //hibakereséshez
		return $temp;
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
		$model=new Korzet;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$orvos=Orvos::model()->findByPk(Yii::app()->params['orvos']);
		$id_rendelo=$orvos->id_rendelo;
		if(isset($_POST['Korzet']))
		{
			$model->attributes=$_POST['Korzet'];
			//Need fix: somehow the isNewRecord attribute switching to false, need manual set to true
			$model->setIsNewRecord(true);
			$model->lastmod=date('Y-m-d H:i:s',time());
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
			'id_rendelo'=>$id_rendelo,
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
		$orvos=Orvos::model()->findByPk(Yii::app()->params['orvos']);
		$id_rendelo=$orvos->id_rendelo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Korzet']))
		{
			$model->attributes=$_POST['Korzet'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
				$this->redirect(array('index'));
				
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}

		}

		$this->module_info['item'] = $model->id . " szerkesztése";

		$this->render('update',array(
			'model'=>$model,
			'id_rendelo'=>$id_rendelo,
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
						$dataProvider=new CActiveDataProvider('Korzet');}
					else{
						$dataProvider=Korzet::model()->search();
					}
		//$dataProvider=new CActiveDataProvider('Korzet');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Korzet('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Korzet']))
			$model->attributes=$_GET['Korzet'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Korzet the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Korzet::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'A keresett tartalom nem található.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Korzet $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='korzet-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
