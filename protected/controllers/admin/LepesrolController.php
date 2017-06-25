<?php

class LepesrolController extends Controller
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
				'actions'=>array('lep1','lep2','lep3','lep4','lep5','lep6','lep7','lep8','lep9','lep10','lep11','lep12','error'),
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
	/**
	 * Elso lepes 
	 */
	 public function actionLep1()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre bevezető oldal";
		$_POST['lepesrol']['count']=0;
		$this->render('lep1', array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	
	public function actionLep2()
	{
		//ide kell bemásolni a admin/ContentController actionLepesrol melevő kódját és továbbb kell fejleszteni
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=1;
		$this->render('lep2',array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	/**
	 * Harmadik lepes 
	 */
	 public function actionLep3()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=2;
			$kap= new Kapcsolat;
			$list=array('telefonszam','irszam','varos','cim','email_oldal');		
			if(isset($_POST['config']['submit'])){
				//ide jon foreach-csel a  mentes 
				foreach($list as $value){
					$record=$kap->config_id($value);
					$record->value=$_POST['config'][$value];
					if($record->save()){ $ok=true; } else { $ok=false; }
				}
				
				if($ok){
					Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek, frissítse a "Kapcsolat" oldalt, ha az adatok hibátlanok, lépjen a következő lépésre');
				$this->redirect('lep3',array('bUrl'=>$bUrl));
				} else {
					Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				}
			} else {
				foreach($list as $value){$_POST['config'][$value]=$kap->config($value);}
			}
		$this->render('lep3',array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	/**
	 * Negyedik lepes 
	 */
	 public function actionLep4()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$rec=Content::model()->find('name=:name AND id_orvos=:id_orvos', array(
												':name'=>'bemutatkozas',
												':id_orvos'=>$_SESSION['ho']['orvos']));
		$id=$rec->id;										
		$_POST['lepesrol']['count']=3;
		$this->render('lep4',array('title'=>$title,
									'bUrl'=>$bUrl,
									'id'=>$id));
	}
	/**
	 * Otodik lepes 
	 */
	 public function actionLep5()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$rec=Content::model()->find('name=:name AND id_orvos=:id_orvos', array(
												':name'=>'home',
												':id_orvos'=>$_SESSION['ho']['orvos']));
		$id=$rec->id;		
		$_POST['lepesrol']['count']=4;
		$this->render('lep5',array('title'=>$title,
									'bUrl'=>$bUrl,
									'id'=>$id));
	}
	/**
	 * Hatodik lepes 
	 */
	 public function actionLep6()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$rec=Content::model()->find('name=:name AND id_orvos=:id_orvos', array(
												':name'=>'rendido',
												':id_orvos'=>$_SESSION['ho']['orvos']));
		$id=$rec->id;		
		$_POST['lepesrol']['count']=5;
		$this->render('lep6',array('title'=>$title,
									'bUrl'=>$bUrl,
									'id'=>$id));
	}
	/**
	 * Hetedik lepes 
	 */
	 public function actionLep7()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=6;
		$this->render('lep7',array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	/**
	 * Nyolcadik lepes 
	 */
	 public function actionLep8()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=7;
		$this->render('lep8',array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	/**
	 * Kilencedik lepes 
	 */
	 public function actionLep9()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=8;
		$this->render('lep9',array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	/**
	 * Tizedik lepes 
	 */
	 public function actionLep10()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=9;
		$this->render('lep10',array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	/**
	 * Tizenegydik lepes 
	 */
	 public function actionLep11()
	{
		 $model=new Orvosform1;
    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='orvosform1-orvosform1-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['Orvosform1']))
    {
        $model->attributes=$_POST['Orvosform1'];
        if($model->save())
        {Yii::app()->user->setFlash('success', 'Köszönjük, a válaszai mentésre kerültek, kérjük a "Tovább a következő oldalra" gombra kattintson!');
			//	$this->redirect($this->createAbsoluteUrl($this->uniqueid));
				
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}
    }
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=10;
		$this->render('lep11',array('title'=>$title,
									'bUrl'=>$bUrl,
									'model'=>$model));
	}
	public function actionLep12()
	{
		$bUrl=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/lepesrol/";
		$title="Lépésről - lépésre";
		$_POST['lepesrol']['count']=11;
		$this->render('lep12',array('title'=>$title,
									'bUrl'=>$bUrl));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$error=$error."--LepesrolController";
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
	
}