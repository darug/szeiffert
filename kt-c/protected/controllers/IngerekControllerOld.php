<?php

class IngerekController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';
	private $inger_szelesseg;
	private $inger_start;
	private $inger_lepes;
	private $inger_szam;
	private $id_user;

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','meres', 'meres2','teszt'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new Ingerek;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ingerek']))
		{
			$model->attributes=$_POST['Ingerek'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	/**
	 * meres2 meres utani osszegzo eredmeny kijelzes
	 */
	public function actionMeres2(){

		$id = $_GET['id'];
		$data_sum=new DataSum();
		$ds=$data_sum->findByPk($id);
//		echo $ds->id_user; exit;
		$users= new User;
		$user=$users->findByPk($ds->id_user);
		$nev=$user->veznev." ".$user->kernev;
		$meres_szam=$user->mesnum;
		$kar_szam=$user->inger_szelesseg;
		$ing_szam=$user->inger_szam;
		$mer_ido=$user->mestime;
		$szun_ido=$user->pausetime;
		$d_t=$ds->lastmod;
		$ri=$ds->ri;
		$szoras=$ds->szoras; 
		$tcorr=$ds->tcorr;
		$cf=$ds->cf;
		$ff=$ds->ff;
		switch($kar_szam){
			case 1:
   	   		  	$H1 =350;
       			$H2 =400;
       			$H3 =470;
       			$H4 =600;
       			$H5 =700;
       			break;
			case 2:
       			$H1 =550;
       			$H2 =600;
       			$H3 =700;
       			$H4 =800;
       			$H5 =900;
       			break;
			case 4:
       			$H1 =620;
       			$H2 =900;
       			$H3 =1050;
       			$H4 =1300;
       			$H5 =1400;
       			break;
			case 6:
       			$H1 =800;
       			$H2 =1100;
       			$H3 =1300;
       			$H4 =1650;
       			$H5 =1800;
       			break;
			case 8:
       			$H1 =1100;
       			$H2 =1350;
       			$H3 =1600;
       			$H4 =1900;
       			$H5 =2100;
       			break;
		}
		if($tcorr < $H1) $ertekel="igen jó"; 
		if($H1<=$tcorr && $tcorr<$H2){$ertekel="jó";}
		if($H2<=$tcorr && $tcorr<$H3){$ertekel="közepes";}
		if($H3<=$tcorr && $tcorr<$H4){$ertekel="gyenge";}
		if($H4<=$tcorr){$ertekel="elégtelen";} 
		$mini=$user->mini;
		$maxi=$user->maxi;
		$atl=$user->atlag;
		$percent=intval(100*$atl/$tcorr);
		
		$this->render('meres2',array(
			'nev'=>$nev,
			'meres_szam'=>$meres_szam,
			'kar_szam'=>$kar_szam,
			'ing_szam'=>$ing_szam,
			'mer_ido'=>$mer_ido,
			'szun_ido'=>$szun_ido,
			'd_t'=>$d_t,
			'ri'=>$ri,
			'szoras'=>$szoras,
			'tcorr'=>$tcorr,
			'cf'=>$cf,
			'ff'=>$ff,
			'ertekel'=>$ertekel,
			'mini'=>$mini,
			'maxi'=>$maxi,
			'atl'=>$atl,
			'percent'=>$percent,
		));
	}
/**
 * Teszt action a nem működő programrészek számára!!!!
 * most mérés exit el9tti részt vizsgálom
 */	
 	public function actionTeszt(){
 		$atl0=4;
		$model=new Ingerek;
		$id_user=Yii::app()->user->getId();
		$users= new User;
		$user=$users->findByPk($id_user);
		$this->id_user=$user->id;
		echo "user modelek megnyitva!";
		//ide jön a teszteléshez szükséges beállítások
		$tcorr=987;
		echo "<br>Beallitasok megtortentek!";
		// ide jön a
		echo "<br>user->mesdnum: ".$user->mesnum;
		if($user->mesnum>$atl0){
				$mini=min($user->mini,$tcorr);
				$maxi=max($user->maxi,$tcorr);
				$atlag=intval(0.95*$user->atlag + 0.05*$tcorr);
				$mestime=intval(0.05*$tcorr + 0.95*$user->mestime);
				echo "<br>mini: $mini maxi: $maxi mestime: $mestime <br>";
			//	if(User::model()->updateByPk($id_user,array('mini'=>$mini,'maxi'=>$maxi,'atlag'=>$atlag,'mestime'=>$mestime))){echo "<br>mesnum>4 mentés sikerült!!!";};
			}
		
		echo "<br>A vizsgalt resz lefutott!!"; 
 	}
/**
	 * Creates a new meres.
	 * If creation is successful, the browser will be redirected to the 'thank' page.
	 */
	public function actionMeres()
	{
		
		$atl0=4;
		$model=new Ingerek;
		$id_user=Yii::app()->user->getId();
		$users= new User;
		$user=$users->findByPk($id_user);
		$this->id_user=$user->id;
		if(isset($_REQUEST['eredmenyek']))
		{
			
			$eredmenyek = $_REQUEST['eredmenyek'];
			//mentés
			$data_sum= new DataSum;
	//		echo "kovetkezo sor<br>"; exit;
			$data_sum->id_user=$id_user;
			$data_sum->inger_szelesseg=$user->inger_szelesseg;
			$data_sum->inger_start=$_SESSION['ktc']['inger_start'];
			$data_sum->inger_lepes=$_SESSION['ktc']['inger_lepes'];
			$data_sum->inger_szam=$_SESSION['ktc']['inger_szam'];
			if($data_sum->insert()){//echo "sikeres kiiras!!";
				$ds=$data_sum->findall('id_user=:id_user',array(':id_user'=>$id_user));
		
				foreach($ds as $key=>$value){$lastid=$value['id'];
					}

				$i=1;
				$cf=0;
				$ff=0;
				$sumtime=0;
				$timenum=0;
				foreach($eredmenyek as $key1=>$value1){
						$data_sor= new DataSor;
						$data_sor->id_data_sum=$lastid;
						$data_sor->inger_typ=$value1['inger_typ'];
						$data_sor->m_time=$value1['ido'];
						if($value1['inger_typ'] && $value1['ido']>0){
							$data_sor->cf=0;
							$sumtime=$sumtime+$value1['ido'];
							$timenum++;}
						if($value1['inger_typ'] && $value1['ido']==0){$data_sor->cf=1;$cf++;}
						if(!$value1['inger_typ'] && $value1['ido']==0){$data_sor->ff=0;}
						if(!$value1['inger_typ'] && $value1['ido']>0){$data_sor->ff=1;$ff++;}
						if($data_sor->insert()){/*echo "$i Sikeres data_sor kiírás<br>"*/;} else {/*echo $data_sor->error." $i hiba<br>"*/;}
						$i++;
					}	
				$szoras2=0;
				$ri=intval($sumtime/$timenum);
				foreach($eredmenyek as $key1=>$value1){
						if($value1['inger_typ'] && $value1['ido']>0){
							$szoras2=$szoras2+pow($value1['ido']-$ri,2);
							}
					}
				$szoras=intval(sqrt($szoras2/$timenum));
				$dsor=$data_sor->find('id_data_sum=:id_data_sum',array(':id_data_sum'=>$lastid));
				$id_eredm=$dsor->id;
				$tcorr=$ri+intval($ri*($cf+$ff)/$_SESSION['ktc']['inger_szam']);
				
				DataSum::model()->updateByPk($lastid,array('ri'=>$ri,
															'szoras'=>$szoras,
															'cf'=>$cf,
															'ff'=>$ff,
															'id_eredm'=>$id_eredm,
															'tcorr'=>$tcorr,
															));	

			} else {/*echo "hiba"*/;}
			if($user->mesnum==$atl0){
				$mini=$tcorr;
				$maxi=$tcorr;
				if(User::model()->updateByPk($id_user,array('mini'=>$mini,'maxi'=>$maxi,'atlag'=>$tcorr))){/*echo "<br>mesnum=4 mentes sikerult!"*/;};	
			}
			if($user->mesnum>$atl0){
				$mini=min($user->mini,$tcorr);
				$maxi=max($user->maxi,$tcorr);
				$atlag=intval(0.95*$user->atlag + 0.05*$tcorr);
				$mestime=intval(0.05*$tcorr + 0.95*$user->mestime);
				if(User::model()->updateByPk($id_user,array('mini'=>$mini,'maxi'=>$maxi,'atlag'=>$atlag,'mestime'=>$mestime))){/*echo "<br>mesnum>4 mentés sikerült!!!"*/;};
			}

			if(User::model()->updateByPk($id_user,array('mesnum'=>$user->mesnum+1,))){/*echo "<br> User->mesnum noveles sikerult!!!!"*/;}else{/*echo "<br><b> User->mesnum noveles nem sikerult!!!!"*/;}	
			$ds=$data_sum->findall('id_user=:id_user',array(':id_user'=>$id_user));
		
				foreach($ds as $key=>$value){$lastid=$value['id'];
					}
			$id = $lastid;
		
			// összeállítjuk az URL-t, ahol az eredmények elérhetők
		//	exit;
			$url = "http://localhost/dds-yii/kt-c/index.php/ingerek/meres2?id=".$id;		
			
			$json = array(
				"url" => $url
			);
			
			header('Content-type: application/json');
			echo json_encode($json);
			exit();
		}
	
		
		$inger_start= intval(mt_rand(0,249)); // így biztosan kezdésre esik
		$this->inger_start=$inger_start;
		$inger_lepes= intval(mt_rand(1,4)); //
		 
		 if($inger_start>=125){$inger_start=$inger_start; $inger_lepes=-4*$inger_lepes;}else{$inger_lepes=4*$inger_lepes;}
		// echo $inger_start."   ".$inger_lepes; exit;
		$this->inger_lepes=$inger_lepes;
		$_SESSION['ktc']['inger_start']=$inger_start;
		$_SESSION['ktc']['inger_lepes']=$inger_lepes;
		$ing=$model->findAll('inger_hossz=:inger_hossz',array(':inger_hossz'=>$user->inger_szelesseg));
		$n=0;
		$ujing=array();
		$_SESSION['ktc']['inger_szam']=$user->inger_szam;
		// TODO: temp, törölni ,mert csak teszthet van berakva!!!!!
		$user->inger_szam = 4;
		$_SESSION['ktc']['inger_szam']=4;
		
	if($inger_start<125){	
		for($i=$inger_start;$i<$inger_start+$user->inger_szam/4;$i++){
			for($j=$i*4;$j<=$i*4+3;$j++){
	
				$ujing[$n]['inger']=$ing[$j]['inger'];
				$ujing[$n]['inger_typ']=$ing[$j]['inger_typ'];
				$n++;
			}

		}	 
	} else {
		for($i=$inger_start;$i>$inger_start-$user->inger_szam/4;$i--){
			for($j=$i*4+3;$j>=$i*4;$j--){

				$ujing[$n]['inger']=$ing[$j]['inger'];
				$ujing[$n]['inger_typ']=$ing[$j]['inger_typ'];
				$n++;
			}

		}
	}
//	echo "<pre>".var_dump($ujing)."</pre>";
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
//!!! ez még átírásra vár!!----------------------------------------
		
//!!--------------------eddig------------------------------------
		$mestime=$user->mestime;
		$pausetime=$user->pausetime;
		$clientvariables=array(
			'mestime'=>$mestime,
			'ujing'=>$ujing,
			'pausetime'=>$pausetime
		);
		
		$this->render('meres',array(
			'clientvariables' => json_encode($clientvariables),
			'inger_hossz'=>$user->inger_szelesseg,
			'inger_szam'=>$user->inger_szam,
			'user'=>$user,
			'inger_start'=>$inger_start,
			'inger_lepes'=>$inger_lepes, //ebből most nincs kihasználva semmi , az inger star nagysága határozza meg az irányt!
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

		if(isset($_POST['Ingerek']))
		{
			$model->attributes=$_POST['Ingerek'];
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ingerek');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ingerek('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ingerek']))
			$model->attributes=$_GET['Ingerek'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ingerek the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ingerek::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ingerek $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ingerek-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
