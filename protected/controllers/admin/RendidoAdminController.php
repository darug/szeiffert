<?php
/**
 * admin/RendidoAdminController
 * @class RendidoAdminController
 * 
 */
 
 /**
 * @brief admin/RenidoAdmin => Rendido (rendelési idő) tábla karbantartás
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * - index(), amely az id_orvos egyedi record tartalmat listázza (admin esetében a teljes tartalmat!)
 * - update($id), amely az adott rekord tartalmat módosíthatja
 * - create(), amely új rekord tartalmat hoz létre 
 * - delete($id), amely az adott rekord tartalmat törli 
 * 
 **/
class RendidoAdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/admin';
	public $orvos;
	
	public $module_info = array(
		'name'				=>	'Rendido',
		'title'				=>	'Rendelési idő',
	//	'new'				=>	'rendelési idő'
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
		$model=new Rendido;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rendido']))
		{
			$model->attributes=$_POST['Rendido'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
			//	$this->redirect($this->createAbsoluteUrl($this->uniqueid));
				$this->redirect('index');
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

		if(isset($_POST['Rendido']))
		{
			$model->attributes=$_POST['Rendido'];
		/*	echo "<pre>";
			echo var_dump($_POST['Rendido']);
			echo "</pre>";
			exit; */
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
					//	$dataProvider=new CActiveDataProvider('Rendido');}
					$dataProvider=Rendido::model()->search();}
					else{
						$dataProvider=Rendido::model()->search();
					}
		//$dataProvider=new CActiveDataProvider('Rendido');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rendido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rendido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Rendido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rendido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
