<?php
/**
 * admin/ContentAdminController
 * @class ContentAdminController
 * 
 */
 
 /**
 * @brief admin/ContentAdmin => Content tábla karbantartás
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * - index(), amely az id_orvos egyedi record tartalmat listázza (admin esetében a teljes tartalmat!)
 * - update($id), amely az adott rekord tartalmat módosíthatja
 * - create(), amely új rekord tartalmat hoz létre 
 * - delete($id), amely az adott rekord tartalmat törli 
 * - content($name), amely az adott $id_orvos-hoz tartozó egyedi mező tartalmat jeleníti meg.
 * 
 * <b>Az továbbiak csak az admin számára elérhetők:</b>
 * - allupdate($id), amely az adott rekordtól az azonos name rekordok tartalmát az első tartalmára módosítja 
 * - delele($id), amely bármely rekordot töröl! 
 * 
 **/

class ContentAdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin'; /**< @var $layout az oldal kinézetét meghatározó fájl */
	public $llink;
	public $orvos;
	public $kerlist;
	
/*	public function __construct(){
		$this->initLlink();
	}
	
	public function initLlink(){
		if(Yii::app()->params['orvos'] > 0){
			$this->llink=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos']."/admin/";} 
		else {
			$this->llink=Yii::app()->request->baseUrl."/admin/";}
	} */
	/**
	 * @var array $module_info{name,title,new}
	 */
	public $module_info = array(
		'name'				=>	'content',
		'title'				=>	'Tartalmak',
		'new'				=>	'tartalom'
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
			array('allow', /// allow authenticated user to perform this: index,update,create,delete,errer,content
				'actions'=>array('index','update','create','delete','error','content'),
				'users'=>array('@'),
			),
			array('allow', /// allow authenticated user to perform this: ua + allupdate
				'actions'=>array('index','update','allupdate','create','delete','error','content'),
				'users'=>array('admin'),
			),
			array('deny',  /// deny all not login users
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
		$model=new Content;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
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
		
		$this->render($this->llink.'create',array(
			'model'=>$model,
		));
	}

/**
	 * updates the contents.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id); 

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				if($_POST['Content']['orvos'] > ""){
					$this->llink=/*Yii::app()->request->baseUrl."/".$_POST['Content']['orvos'].*/"/admin/contentAdmin/";} 
					else { $this->llink="";} 			
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.'.$_POST['Content']['orvos']);
				$this->redirect($this->createAbsoluteUrl($this->uniqueid));
		/*	$this->render($this->llink);
			exit; */
				
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}
			
		}
		
		$this->module_info['item'] = $model->title . " szerkesztése";
	
		$this->render($this->llink.'update',array(
			'model'=>$model,
		));
	}


/**
 * Allupdates all contents where the name is equal in the content table.
 * az első tartalmat megnyitja és az átírandó rész keresésének kezdetét \<!--start--\>megjegyzéssel kell kezdeni.
 * amennyiben a keresett rész változatlan marad, akkor ezt \<!--stop--\> megjegyzéssel kell jelölni.
 *  Ha a keresett rész törlendő, akkor \<!--del--\> megjegyzést kell használni.
 * A módosítandó szövegrészt \<!--stop--\> megjegyzéssel kell lezárni.
 * A program megkeresi a változatlan részt, eltárolja és eltárolja a változó részt.
 * A tartalom adott részét kcseréli a megmaradó+új rszre.
 * A törlött részek \<!-- törlött rész del--\> megjegyzésbe záródnak, így az eredeti szöveg visszaíállítható!
 * Figyelem a fenti megjegyzéseket a \<p\> (és egyéb) tagok közékell beszúrni!
 * Az egyes update jellemzőit (id, módosítási szám) a contentlog.txt file-ba menti
 * A fenti módszer miatt az eredeti tartalom kézzel visszaállítható!  
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionAllupdate($id)
	{
		$model=$this->loadModel($id); 
		$uzenet="";
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	if(isset($_POST['Content']['mehet']) && $_POST['Content']['mehet']=="0"){
		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				if($_POST['Content']['orvos'] > ""){
					$this->llink=/*Yii::app()->request->baseUrl."/".$_POST['Content']['orvos'].*/"/admin/contentAdmin/";} 
					else { $this->llink="";} 			
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.'.$_POST['Content']['orvos']);
			//	$this->redirect($this->createAbsoluteUrl($this->uniqueid));
		/*	$this->render($this->llink);
			exit; */
				
			}
			else{
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
			}
			
		}
	} else {
		if($_POST['Content']['mehet']=="1"){//Yii::app()->user->setFlash('success', "itt kell a csoportos update-t megcsinálni!");
	//Felépítem a kereső array-t, amelyben soronként 3 elem van: első a keresendő szöveg a módisításig,
	//											második a kivendő elem (ez lehet 0 hosszú is!),
	//											harmadik a beszúrandó elem.
			$szov=$_POST['Content']['content'];
			$szovrem=$szov;
			$n=0; // szzövegben keresés aktuális pozicíója
			$m=0; // kerlist array sorszáma
			$log="";
			$log.=date("Y-m-d H:i:s")." referencia record id: ".$_POST['Content']['id']." orvos id: ".$_POST['Content']['id_orvos']."<br>";
			while(strpos($szov, "<!--start-->",$n)>0):
				$start=strpos($szov, "<!--start-->",$n)+12; //kereső rész kezdet
				$length=strpos($szov, "<!--stop-->",$n)-$start;
				$keres=substr($szov,$start,$length);
				$uzenet.="[$m] ".$keres;
				$log.="[$m] <--keres-->".$keres;
				$n=$start+$length+11;	//kereső rész vége, kivágott rész következik
				
				$start=strpos($szov, "<!--start--",$n)+11;
				$length=strpos($szov, "del-->",$n)-$start;
				$kivag=substr($szov,$start,$length);
				$uzenet.='<--kivág-->'.$kivag;
				$log.='<--kivág-->'.$kivag;
				$n=$start+$length+6;	//kereső rész vége, beszurott rész következik
				
				$start=strpos($szov, "<!--start-->",$n)+12; 
				$length=strpos($szov, "<!--ins-->",$n)-$start;
				$beszur=substr($szov,$start,$length);
				$uzenet.='<--beszúr-->'.$beszur.'<br>';
				$log.='<--beszúr-->'.$beszur.'<br>';
				$n=$start+$length+10;	//kereső rész vége, kivágott rész következik
				// bhozzáadás kerlistához:
				$kerlist[]=array('keres'=>$keres,'kivag'=>$kivag,'beszur'=>$beszur);
				$m++;
			endwhile;	
			//$uzenet.='<br>'.var_dump($kerlist);
			$_SESSION['kerlist']=$kerlist;
			$_SESSION['log']=$log;
			$uzenet.=$id;
			$uzenet.='<p class="green"><B>Ha a lista tökéletes, akkor 2-est vigyen be!</B></p>';
		}
		elseif($_POST['Content']['mehet']=="2"){
				Yii::app()->user->setFlash('success', "2. futás ága!");
				$newcont= new Content;
				$id=2;//!!
				$rec=$newcont->findAll('id>=:id AND name=:name AND id_orvos>=:id_orvos',array(
															':id'=>$id,
															'name'=>'home',
															':id_orvos'=>1));	
				$uzenet.='Módosítandó rekordok száma: '.count($rec).'<br>';
				$r0=0; 
				$log=$_SESSION['log'];
				foreach($rec as $key=>$value){  //recordok feldolgozása
					$log.=date("Y-m-d H:i:s").' id= '.$value['id'].' Orvos_id= '.$value['id_orvos'].'<br>';
					$uzenet.='id: '.$value['id'].' Orvos_id: '.$value['id_orvos'].'<br>';
					$szov=$value['content'];
					$szovcount=strlen($szov);
					$uzenet.=$szov." $szovcount<br>";
 					$szovuj='';
					$n=0;$m=0;
					foreach($_SESSION['kerlist'] as $key1=>$value1){ ///szöveg módosítása
						$m++;
						$uzenet.='<font color="blue">'.$m.' szövegelem művelet [keres: '.$value1['keres'].']: </font>';
						$hiba='';
						if($start0=strpos($szov, $value1['keres'],$n)){
							$n0=$start0+strlen($value1['keres']);
						} else {$hiba.='<font color="red"> Hiba: keresett részt nem találta!</font> ';
								$log.="[$key1]".$hiba.'<br>';}
						if(strpos($szov, '<!--start--',$n0)){
								$hiba.='<font color="red"> Hiba: Ez a rész már javításra került!</font> ';
								$log.="[$key1]".$hiba.'<br>';}	
							elseif($start1=strpos($szov, $value1['kivag'],$n0)){
							$n1=$start1+strlen($value1['kivag']);
						} else {$hiba.='<font color="red"> Hiba: Kivágandó részt nem találta!</font> ';$log.="[$key1]".$hiba.'<br>';}
						if($hiba==''){ // szöveg kiegészítés, mentés, naplózás és üzenet
						/*	$szovment=substr($szov, $n, $n0-1).'<!--start-->'.$value1['keres'].'<!--stop--><!--start--'.$value1['kivag'].
							'del--><!--start-->'.$value1['beszur'].'<!--ins-->'; */
							$szovuj.=substr($szov, $n, $start0-$n);
							$szovment='<!--start-->'.$value1['keres'].'<!--stop--><!--start--'.$value1['kivag'].
							'del--><!--start-->'.$value1['beszur'].'<!--ins-->';
							$uzenet.=$szovment.'<br>';
							$szovuj.=$szovment;
							$log.="[$key1] végrehajtva<br>";
							$n=$n1;	
						} else { $uzenet.=$hiba.'<br>';
							//	$uzenet.='<br>'.$szov;
								//break;
						}
					}
					//ide jön a maradék átmásolása a szövmentbe, mentés és naplózás
					$szovuj.=substr($szov, $n, $szovcount);
					$uzenet.='======= az új tartalom:<br>'.$szovuj.'<br>========<br>';
					//$uzenet.="<pre>log==<br>$log<br></pre>";

					$r0++;
					//* tesztelés miatt berakva: */ if($r0>1){break;};
					$recsave=$newcont->findByPk($value['id']);
					$recsave->content=$szovuj;
					if($recsave->save()){
						$uzenet.='<p class="green">Mentés sikerült!</p>';
						$log.='<font color="green">Mentés sikerült!</font><br>';
					} else {
						$uzenet.='<p class="red"><B>Mentés NEM sikerült!!!</b></p>';
						$log.='<font color="red"><B>Mentés NEM sikerült!!!</b></font><br>';
					}
				} //foraech recordok feldolgozásának vége
				//file_put_contents('tartalek\log\content_mod_log.html', $log, FILE_APPEND);
				
			
				if(file_put_contents('protected/data/content_mod_log.html', $log, FILE_APPEND)){
					$uzenet.='<p class="green"><B>A log fájl mentése sikerült!!!</b></p>';
				}else{
					$uzenet.='<p class="red"><B>A log fájl mentése NEM sikerült!!!</b></p>';
				};
			/*	$Clog= new CFileLogRoute();
				$Clog->setLogPath('tartalek\log');
				$Clog->setLogFile('content_mod_log.html');
				$Clog->processLogs($log); */
	
		}else
			
		{Yii::app()->user->setFlash('success', "első futás ága!");}
		$uzenet=$uzenet.='<p class="green"><B>A minta record módosításának a szabályai:<br>
							&laquo;!--start--&raquo;...&laquo;!--stop--&raquo; tagok közé tegye be a keresendő szöveget,<br>
							&laquo;!--start--   del--&raquo; tagok közé tegye be a tőrlendő szöveget,<br>
							&laquo;!--start--&raquo;...&laquo;!--ins--&raquo; tagok közé tegye be a beszúrandó szöveget.<br>
							</B></p>';
	}
		
		$this->module_info['item'] = $model->title . " szerkesztése";
	
		$this->render($this->llink.'allupdate',array(
			'model'=>$model,
			'uzenet'=>$uzenet,
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
/*		if(Yii::app()->user->name=='admin'){
						$contents=new CActiveDataProvider('Content');}
					else{
						$contents=new CActiveDataProvider('Content');
					}	
		//$contents = new CActiveDataProvider('Content');
		$this->render('index',array(
			'contents' => $contents,
		)); */
		/*if(Yii::app()->user->name=='admin'){
						$model=new Content();}
					else{
*/						
						$model=Content::model()->search();
	//				}
		//$model=new Content('search');
	//	$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Content']))
			$model->attributes=$_GET['Content'];
	//	echo '<pre>'.print_r($_GET['Content']).'</pre>';exit;
		/*	if(Yii::app()->user->name=='admin'){}
					else{
						$model->id_orvos=Yii::app()->params['orvos'];
					}  */
		$this->render('index',array(
			'model'=>$model,
		));
		
	}
	/**
	 * actoin Content a kulső index action-nak felel meg, de csak id_orvos=0 tartalmat jeleníti meg!
	 */
	 	public function actionContent()
	{
		$llink[]=explode( '/',$_SERVER["REQUEST_URI"]);
		$name =substr($_SERVER["REQUEST_URI"],-9,-1);
		$this->getContent($name);		
	}
	/**
	 * action Home a 'home' oldalra ugrik
	 */
	public function actionHome(){
		
		$this->getContent('home');
		
	}
	
	public function getContent($name){
		
		$content = Content::model()->find(array(
		    'condition'=>'name=:name',
		    'params'=>array(':name'=>$name)
		));
		if($content === NULL) throw new CHttpException(404, "A keresett tartalom nem található: <pre>".substr($_SERVER["REQUEST_URI"],-9,-1)."</pre>");
		if($name='lepesrol'){
			$kap= new Kapcsolat;
			$_POST['config']['telefon']=$kap->config('telefon');
			$_POST['config']['cim']=$kap->cim();
			$_POST['lepesrol'][count]=1;	
			if(isset($_POST['config'])){}
			
		}
		$this->render('content', array('content' => $content));
		
	}
	 
	/**
	 * Hiba esetén
	 */
	 public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$error=$error." az eredeti cím feloldása nem sikerült vagy a content adattábla nem tartalmazza a keresett adatot!";
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Content the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Content::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Content $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
