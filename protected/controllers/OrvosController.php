<?php

class OrvosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/main';
	public $orvos;
	
/**/ public function __construct($id,$module=null){

		parent::__construct($id,$module);

		$this->setLayout();
	
	} /**/

	/**
	 * layout kiolvasása az orvos táblábol
	 */
/**/	public function setLayout(){
      $orvos= new Orvos;
	  $rec=$orvos->findByPk(Yii::app()->params['orvos']);
	  $lay="//layouts/".$rec->layout;
	  if($rec){	  $this->layout = $lay; }
	 
	 } /**/
	
		
	
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
				'actions'=>array('index','keres'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Keres Orvosok listája
	 */
	public function actionKeres()
	{
		$model= new Orvos();
		unset($model->attributes);
		if(isset($_POST['Orvos'])){$model->attributes =$_POST['Orvos'];
									$dataProvider=$model->search0();}

		if($dataProvider===null){$dataProvider=new CActiveDataProvider('Orvos',array('sort'=>(array(
    													'defaultOrder'=>'name'))));}
		
		
		$this->render('keres',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Orvos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Orvos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Orvos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Orvos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='orvos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
