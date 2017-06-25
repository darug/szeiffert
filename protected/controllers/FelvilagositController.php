<?php
/**
 * FelvilagositController
 * @file FelvilagositController.php
 * @class FelvilagositController
 * 
 */
 
 /**
 * @brief Felvilagosit => tájékoztató tartalmak vezérlője
 * 
 * A következő action-ok végrehajthatók:
 * <ul>
 * <li> view($id) az adott $id tartalmat jjeleníti meg
 * <li> index() amely az id_orvos-hoz tartozó felvilágosító tartalmak rövid leírását küldi a browserre </li>
 * <li> paci() amely az id_orvos=200 esetében a paciens kérdőívet küldi a browserre </li>
 * <li> pacistat() amely a kérdőív statisztikáját jeleníti meg </li>
 * </ul> 
 **/
class FelvilagositController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
	public $layout='//layouts/main';
	public $id_orvos;
	public $name_orvos;
	public $id_rendelo;
	
	
/**/ public function __construct($id,$module=null){

		parent::__construct($id,$module);

		$this->setLayout();
	
	} /**/
		
	/**
	 * @brief layout kiolvasása az orvos táblábol
	 */
/**/	public function setLayout(){
      $orvos= new Orvos;
	  $rec=$orvos->findByPk(Yii::app()->params['orvos']);
	  $lay="//layouts/".$rec->layout;
	  if($rec){	  $this->layout = $lay; }
	  $this->id_orvos=$rec->id;
	  $this->name_orvos=$rec->name;
	  $this->id_rendelo=$rec->id_rendelo; 
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','paci','pacistat'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','setindex2'),
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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Felvilagosit']))
		{
			$model->attributes=$_POST['Felvilagosit'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * @brief Lists all models.
	 */
	public function actionIndex()
	{
	/*	$rawData=Felvilagosit::model()->findAll('id_orvos=:id_orvos', array(':id_orvos'=>Yii::app()->params['orvos']));
		$dataProvider=new CArrayDataProvider($rawData); jó működik!!! */
	/*	$dataProvider=new CActiveDataProvider('Felvilagosit', array(
    			'criteria'=>array(
        		'condition'=>'id_orvos=:id_orvos',
        		'params' => array (':id_orvos' => Yii::app()->params['orvos']),
    		),		
		)); //második kísérlet, ez is működik! */
		$orvos=new Orvos();
		$orv=$orvos->findByPk(Yii::app()->params['orvos']);
		$dname=$orv->dname;
		$dataProvider=Felvilagosit::model()->search(); // első kisérlet
	//	$dataProvider=new CActiveDataProvider('Felvilagosit'); eredeti
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'dname'=>$dname,
		));
	}

    /**
	 * @brief Kérdőiv építő, még nem működik!!.
	 * @todo: Kérdőív építő még nem működik, nem sűrgős javítandó 
	 */
	public function actionSetindex2()
	{
		$this->render('config/setindex2');
	}
    /**
     * @brief Paciens Kérdőiv.
	 */
	public function actionPaci()
	{
		$rendelo= new Rendelo;	
		$rec=$rendelo->findByPk($this->id_rendelo);
		$this->render('paci',array('name'=>$this->name_orvos,
									'rend_irsz'=>$rec->irszam,
									'rend_var'=>$rec->varos,
									'rend_cim'=>$rec->cim));
	}

   /**
     * @brief Paciens Kérdőiv statisztika.
	 */
	public function actionPacistat()
	{
		Yii::app()->params['cont_name']="stat";
		$this->render('pacistat');
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
/** @} */