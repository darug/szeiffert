<?php

class AdminController extends Controller
{
	
	public $layout='//layouts/admin';
	public $orvos;

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{

		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('athelyezendo','index','images','error','huzen'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);

	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	 public function actionAthelyezendo()
	{
		$this->render('admin/athelyezendo');
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$error=$error."--SiteController";
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * images oldal 
	 */
	public function actionImages()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$kep = new Kepek();

		$criteria = new CDbCriteria();

		$criteria -> order = 'id DESC';
		if (isset($_POST['Kepek'])) {$criteria -> compare('szoveg', $_POST['Kepek']['szoveg'], true);
		}
		// ORDER BY `tbl_kepek`.`id` DESC valahogy parameterkent átadandó a következő hívásban
		$kepek = $kep -> findAll($criteria);
		$kp=array($kep,$kepek);
		$this -> render('admin/images',$kp);
		}
	public function actionHuzen($uzen)
	{
		Yii::app()->user->setFlash('error', $uzen);
		$this->redirect(yii::app()->createUrl('admin'));
	}
	
}