<?php
/**
 * admin/KapcsolatAdminController
 * @class KapcsolatAdminController
 * 
 */
 
 /**
 * @brief admin/KapcsolatAdmin => Kapcsolat tábla (beérkezett üzenetek) karbantartás
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * - index(), amely az id_orvos egyedi record tartalmat listázza (admin esetében a teljes tartalmat!)
 * - update($id), amely az adott rekord tartalmat módosíthatja
 * - create(), amely új rekord tartalmat hoz létre 
 * - delete($id), amely az adott rekord tartalmat törli 
 * 
 **/
class KapcsolatAdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/admin';
	
	public $module_info = array(
		'name'				=>	'Kapcsolat',
		'title'				=>	'Kapcsolat',
		'new'				=>	''
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','update','create','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Kapcsolat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
/**
 * Chapta ellenőrzés miatt a vilidálás kimarad!!!
 */
		if(isset($_POST['Kapcsolat']))
		{
			$model->attributes=$_POST['Kapcsolat'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->insert()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
				$this->redirect($this->createAbsoluteUrl($this->uniqueid));
				
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}
			
		}
		
		$this->module_info['item'] = "";
		
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

		if(isset($_POST['Kapcsolat']))
		{
			$model->attributes=$_POST['Kapcsolat'];
			$model->lastmod=date('Y-m-d H:i:s',time());
/**
 * Chapta ellenőrzés miatt a vilidálás kimarad!!!
 */

			if($model->update()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
				$this->redirect(array('index'));
				
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}

		}

		$this->module_info['item'] = " szerkesztése";

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
			 $dataProvider=new CActiveDataProvider('Kapcsolat');}
		else{
			$dataProvider=Kapcsolat::model()->search();
		}
/*		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
			
		$dataProvider=new CActiveDataProvider('Kapcsolat'); */
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kapcsolat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kapcsolat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kapcsolat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kapcsolat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
