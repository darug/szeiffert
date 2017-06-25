<?php

class KepekController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';
	public $orvos;
	
	public $module_info = array(
		'name'				=>	'kep',
		'title'				=>	'Kép feltöltés',
		'new'				=>	'kép'
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
		$model=new Kepek;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Kepek']) && $_FILES['fname']['name']>" "){// első menet kép feltöltés ellenőrzés és másolás
			$this->feltolt($model);
			$this->render('create',array('model'=>$model,));
		}
		elseif(isset($_POST['Kepek'])){// második menet: mentés az adatbázisba
			$model->attributes=$_POST['Kepek'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			$model->setIsNewRecord(true);
			if($_POST['Kepek']['masodik']==True){
				if($model->save()){
					Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
					$this->redirect($this->createAbsoluteUrl($this->uniqueid));}
					
				else{
						
						Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');} 
			} 
		}
		// elso inditas:
			$this->module_info['item'] = "Új " . $this->module_info['new'] . " hozzáadása";
			$this->render('create',array('model'=>$model,));
		
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

	if(isset($_POST['Kepek']))
		{
			$model->attributes=$_POST['Kepek'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek. A feltöltött képet a "Képek könyvtár ellenőrzése" modulban lehet megnézni,');
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
						$kepek=new CActiveDataProvider('Kepek');}
					else{
						$kepek=Kepek::model()->search();
					}	
		//$contents = new CActiveDataProvider('Content');
		$this->render('index',array(
			'kepek' => $kepek,
		));
		/*
		$kep = new Kepek();
		$kepek = $kep->findAll('id_orvos=:id_orvos',array(
								':id_orvos'=>$_SESSION['ho']['orvos']));
	
	//	$dataProvider=new CActiveDataProvider($kepek);
	    $dataProvider=$kepek;
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'kepek'=> $kepek
		)); */
	}

	
	/**
	 * actionCreate elso meghivas logikaja
	 */
	public function feltolt($model)
	{
		$burl=Yii::app()->request->baseUrl;
		$ido=Yii::app()->params['orvos']."/";
		$target_path =$_SERVER["DOCUMENT_ROOT"].$burl. "/images/".$ido;
		$target_path = $target_path . basename( $_FILES['fname']['name']);
		$_POST['Kepek']['kep']=$_FILES['fname']['name'];
		$pst=$_POST['Kepek'];
		if(move_uploaded_file($_FILES['fname']['tmp_name'], $target_path)) {
    			$uzenet="A <b>".  basename( $_FILES['fname']['name']). 
   				"</b> fájl sikeresen feltöltésre került! <br>Ellenőrizd a bevitt adatokat, majd kattints a \"Mentés\" gombra!<br>";
				$ft=True;
				Yii::app()->user->setFlash('success', $uzenet);
				}
 		else{
  	  			$uzenet="Fájlfetöltési vagy másolási hiba, próbáld meg újra!<br>".basename( $_FILES['fname']['name'])." ".$target_path." átmeneti név: ".$_FILES['fname']['tmp_name'];
				$ft=False;
				Yii::app()->user->setFlash('error', $uzenet);
				}
		
		$model->attributes=$_POST['Kepek'];
		$model->uzenet=$uzenet;
		$model->ft=$ft;
		return $model;
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kepek the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kepek::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kepek $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kepek-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
