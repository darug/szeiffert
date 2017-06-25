<?php

class Content0Controller extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/admin';
	public $llink;
	public $orvos;
	public $kerlist;
	
	public $module_info = array(
		'name'				=>	'Content0',
		'title'				=>	'Content0',
		'new'				=>	'Content0'
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
				'actions'=>array('index','update','create','delete','allupdate'),
				'users'=>array('admin'),
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
		$model=new Content0;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Content0']))
		{
			$model->attributes=$_POST['Content0'];
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

		if(isset($_POST['Content0']))
		{
			$model->attributes=$_POST['Content0'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				
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
		$dataProvider=new CActiveDataProvider('Content0');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


/**
	 * Allupdates all contents where the name is equal in the content table and szak_megnevezes == in the orvos table.
 	* Az összes tartalmat újragenerálja, miközben a rekord id nem változik!
 	* Ez a rutin szolgál a az összes "gyári" tartalom újraírására
 *  másik lehetséges megfoldás a content/allupdate futtatása  
    * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionAllupdate($id)
	{
		$model=$this->loadModel($id); 
		$uzenet="";
		$this->llink='';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	if(isset($_POST['Content0']['mehet']) && $_POST['Content0']['mehet']=="0"){
		if(isset($_POST['Content0']))
		{
			$model->attributes=$_POST['Content0'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				if($_POST['Content0']['orvos'] > ""){
					$this->llink=/*Yii::app()->request->baseUrl."/".$_POST['Content0']['orvos'].*/"/admin/content0/";} 
					else { $this->llink="";} 			
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.'.$_POST['Content0']['orvos']);
			//	$this->redirect($this->createAbsoluteUrl($this->uniqueid));
		/*	$this->render($this->llink);
			exit; */
				
			}
			else{
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
			}
			
		}
	} else {
		if($_POST['Content0']['mehet']=="1"){//Yii::app()->user->setFlash('success', "itt kell a módosítandó rekordokat megkeresni!");
	//A rekordszamok kerlist array-ba kerülnekt, id, id_orvos, orvosnév, szak_megnevezes 
	//	amelyet az $uzenetben küldünkel 
	//											harmadik a beszúrandó elem.
			$kername=$_POST['Content0']['name'];
			$szak_megnevezes=$_POST['Content0']['szak_megnevezes'];
			$uzenet.="$id. =content0 id / Szak: $szak_megnevezes / keresési mezőtartalom: $kername /  ";
			$n=0; // szzövegben keresés aktuális pozicíója
			$m=0; // kerlist array sorszáma
			/*$log="";
			$log.=date("Y-m-d H:i:s")." referencia record id: ".$_POST['Content0']['id']." orvos id: ".$_POST['Content0']['id_orvos']."<br>"; */
			$newcont= new Content;
			$neworvos= new Orvos;
			$rec=$newcont->findAll('name=:name',array('name'=>$kername));		
			$uzenet.=count($rec).' = keresési találatok száma<br>';
			foreach($rec as $key=>$value){
				$id_content0=$value['id'];
				$id_orvos=$value['id_orvos'];
					$x=0;
					if($recorvos=$neworvos->findByPk($id_orvos)){$uzenet.=$recorvos->id." id ";
						//	$üzenet.=var_dump($recorvos)."!!--><br>";
						/*	foreach ($recorvos as $key1 => $value1) {
								$uzenet.=/*$value1." * -- ";
							}	/**/
					//	$uzenet.=$recorvos->name;
					//		if($id_orvos>2){break;}
							$x++;
						}else{$uzenet.="Nem talált rekord: ";}
					if($recorvos->orvos_megnev==$szak_megnevezes){
						$orvosnev=$recorvos->name;
						$szak=$recorvos->orvos_megnev;
						$kerlist[]=array($id_content0,$id_orvos,$orvosnev,$szak_megnevezes);
						$uzenet.="id: $id_content0, id_orvos: $id_orvos; $orvosnev $szak_megnevezes <br>";
						$n++;
					} else $uzenet.="Nem egyezik: $id_orvos / $orvosnev / $recorvos->orvos_megnev =? $szak_megnevezes <br>";
			}
			$_SESSION['kerlist']=$kerlist;
			$_SESSION['log']=$log;
			$_SESSION['Content0']=$_POST['Content0'];
			$uzenet.='<br>';
			$uzenet.="$n = tényleges találatok száma<br>";
			$uzenet.='<p class="red"><B>Ha a lista tökéletes, akkor 2-est vigyen be, a rekerdok felülírása ekkor történik meg!</B></p>';
				$uzenet.="<br>======= Utolsó rekord content tartalom: ================<br>".$_SESSION['Content0']['content']."<br>-------------------<br>";
			//$uzenet.=var_dump($kerlist);
		}
		elseif($_POST['Content0']['mehet']=="2"){
				Yii::app()->user->setFlash('success', "2. futás ága!");
			/*	$newcont= new Content;
				$id=2;//!!
				$rec=$newcont->findAll('id>=:id AND name=:name AND id_orvos>=:id_orvos',array(
															':id'=>$id,
															'name'=>'home',
															':id_orvos'=>1));	
				$uzenet.='Módosítandó rekordok száma: '.count($rec).'<br>'; */
				$r0=0; 
				$kerlist=$_SESSION['kerlist'];
		//		var_dump($kerlist);
				$log=$_SESSION['log'];
				$newcont= new Content;
				$neworvos= new Orvos;
				$log="<B>Módosítás oka: ".$_POST['Content0']['ok']."</B><br>";
				foreach ($kerlist as $key => $value) {
						if($content=$newcont->findByPk($value[0])){$uzenet.=$value[0]." id-t megtalálta <br>";
							//	$content->name=$rec->name; 
								$content->title=strtr($_SESSION['Content0']['title'],array('$orvosnev'=>$value[2],'$szak_megnevezes'=>$value[3])); //változó adatainak behelyettesítése
								$content->descrption=strtr($_SESSION['Content0']['descrption'],array('$orvosnev'=>$value[2],'$id_orvos'=>$value[1],'$szak_megnevezes'=>$value[3]));
				 				$content->content=strtr($_SESSION['Content0']['content'],array('$orvosnev'=>$value[2],'$id_orvos'=>$value[1],'$szak_megnevezes'=>$value[3]));
								$content->noindex=$_SESSION['Content0']['noindex'];
								$content->is_active=$_SESSION['Content0']['is_activ'];
								$content->contact_finish=$_SESSION['Content0']['contact_finish'];
								$content->url=$_SESSION['Content0']['url'];
								$content->lastmod=date('Y-m-d H:i:s',time());
								
								//Az alább következő mentést csak szigorú ellenőrzés után szabad kikommentezni!!!
								
							if($content->save()){
									 $uzenet.= "<p class=\"green\">Content táblába irás sikerült! ".$rec->name."</p>";
									 $log.=date('Y-m-d H:i:s',time())." Content id: ".$value[0]." orvos id: ".$value[1].
											" Név: ".$value[2]." Szak: ".$value['3']."<font color='green'> &nbsp;&nbsp;&nbsp;Rekord kiírása sikerült</font><br>";
							} else{
									$uzenet.= "<p class=\"red\">Content táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($content->getErrors()) . "</p>";
									$log.=date('Y-m-d H:i:s',time())." Content id: ".$value[0]." orvos id: ".$value[1].
											" Név: ".$value[2]." Szak: ".$value['3']."<font color='red'> &nbsp;&nbsp;&nbsp;Rekord kiírása NEM sikerült!</font><br>";
							}
							//	} else {$uzenet.=$rec->name.' bejegyzes kimaradt!  '.$szak_megnevezes.'<br>';}//$szak_megnevezes */
									
									} else {$uzenet.=$value[0]." id-t nem találta <br>";}
				}
				$log.="----------------------------<br>";
				$uzenet.="========= LOG ==========<br>$log-----------------------<br>";
			//	$uzenet.="<br>======= Minta tartalom: ================<br>".$_SESSION['Content0']['lastmod']."<br>-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<br>";
//noindex ellenőrzés jön!!!
		//		$uzenet.="<br>======= Utolsó rekord lastmod tartalom: ================<br>".$content->lastmod."<br>-------------------<br>";
		//		file_put_contents('tartalek\log\content_mod_log.html', $log, FILE_APPEND);
				
			
				if(file_put_contents('protected/data/content0_mod_log.html', $log, FILE_APPEND)){
					$uzenet.='<p class="green"><B>A log fájl mentése sikerült!!!</b></p>';
				}else{
					$uzenet.='<p class="red"><B>A log fájl mentése NEM sikerült!!!</b></p>';
				};
			/*	$Clog= new CFileLogRoute();
				$Clog->setLogPath('tartalek\log');
				$Clog->setLogFile('content_mod_log.html');
				$Clog->processLogs($log); */
	
		}else
			
		{Yii::app()->user->setFlash('success', "nulladik futás ága!");
		$uzenet=$uzenet.='<p class="green"><B>A Ellenőrizd a mezők tartalmát és írj 1-et az utolsó mezőbe, ha mehet a módosítás! Itt ne írj át semmit, azt a update-ban teheted meg.<br>
							
							</B></p>';}
	}
		
		$this->module_info['item'] = $model->title . " szerkesztése";
	
		$this->render($this->llink.'allupdate',array(
			'model'=>$model,
			'uzenet'=>$uzenet,
		));
	}



	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Content0 the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Content0::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Content0 $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='content0-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
