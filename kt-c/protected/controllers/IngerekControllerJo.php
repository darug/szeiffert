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
				'actions'=>array('meres', 'meres2','meres3','meres4'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update,admin','delete','teszt','ingkorr','atrak','lista'),
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
 * actionAtrak BVSC adatainak beÄ‚Â©pÄ‚Â­tÄ‚Â©se a meglÄ‚Â©vÄąâ€ adatbÄ‚Ë‡zisba
 */
	public function actionAtrak(){
			$user= new User;
			$datasum= new DataSum;
			$this->render('atrak',array(
			'user'=>$user,
			'datasum'=>$datasum,
			));
	}
 
/**
	 * meres3 meres utani rÄ‚Â©szletes  eredmeny kijelzese
	 */ /* */
	public function actionMeres3(){
//------------- szÄ‚Â©t vÄ‚Ë‡lasztÄ‚Ë‡s $user->mestyp alapjÄ‚Ë‡n
		$id = $_GET['id'];
		$data_sum=new DataSum();
		$ds=$data_sum->findByPk($id);
		if($ds===null)
			throw new CHttpException(404,'A keresett eredmÄ‚Â©ny nem talÄ‚Ë‡lhatÄ‚Ĺ‚!'); //Ok mÄąÂ±kÄ‚Â¶dik!
		$id_user=Yii::app()->user->getId();
		if($id_user>0 && $id_user!= $ds->id_user)
			throw new CHttpException(403,'Ä‚â€“n nem a sajÄ‚Ë‡t eredmÄ‚Â©nyÄ‚Â©t prÄ‚Ĺ‚bÄ‚Ë‡lta megnÄ‚Â©zni, ehhez nincs jogosultsÄ‚Ë‡ga!!!');
		if($id_user==0 && $id_user!= $ds->id_user)
			$id_user= $ds->id_user;
		$users= new User;
		$user=$users->findByPk($id_user);
		$nev=$user->veznev." ".$user->kernev;
		$m_szam=count($data_sum->findAll('id_user=:id_user AND mertyp=:mertyp', array(
									':id_user'=>$id_user,
									':mertyp'=>1))); 
		if($user->mesnum==$m_szam){
			$meres_szam=$user->mesnum;
			$link_enable=TRUE;} 
		else {
			$meres_szam=$m_szam;
			$link_enable=FALSE;}
		$kar_szam=$user->inger_szelesseg;
		$ing_szam=$_SESSION['ktc']['inger_szam'];//$user->inger_szam;
		$mer_ido=$user->mestime;
		$szun_ido=$user->pausetime;
		$mestyp=$ds->mertyp;
		$data_sor= new DataSor();
		$dsor=$data_sor->findAll('id_data_sum=:id_data_sum', array(':id_data_sum'=>$ds->id));
		$dscount=count($dsor)."<br>";
		$sor=array();
//		echo $dsor[0]['id']." ".$dsor[0]['inger_typ']." ".$dsor[0]['m_time']." ";
//		echo $dsor[1]["id"];
//		echo "<br>";
		$inger=new Ingerek();
		$ing=$inger->findAll('inger_hossz=:inger_hossz',array(':inger_hossz'=>$user->inger_szelesseg));
//------------------ezt kell Ä‚Ë‡talakÄ‚Â­tani!!!--------------	
		$inger_szam=$ds->inger_szam;
		$inger_start=$ds->inger_start;
		$inger_lepes=$ds->inger_lepes;
		if($inger_start>=125){$inger_start=$inger_start; $inger_lepes=-4*$inger_lepes;}else{$inger_lepes=4*$inger_lepes;}
		$this->inger_lepes=$inger_lepes;
	//	$_SESSION['ktc']['inger_start']=$inger_start;
	//	$_SESSION['ktc']['inger_lepes']=$inger_lepes;
//		$ing=$model->findAll('inger_hossz=:inger_hossz',array(':inger_hossz'=>$user->inger_szelesseg));
/*		$n=0;
		$ujing=array();
		$_SESSION['ktc']['inger_szam']=$user->inger_szam;
		// TODO: temp, tÄ‚Â¶rÄ‚Â¶lni ,mert csak teszthet van berakva!!!!!
	
//		$_SESSION['ktc']['inger_szam']=4;
	*/
	$n=0;	
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
//--------------------------------------------------------------------
		for($i=0;$i<$dscount;$i++){
			$sor[]=array($ujing[$i]['inger'],$dsor[$i]['inger_typ'],$dsor[$i]['m_time'],$dsor[$i]['cf'],$dsor[$i]['ff']);
		}
//	print_r($sor); exit;
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
		if($tcorr < $H1) $ertekel="igen jÄ‚Ĺ‚"; 
		if($H1<=$tcorr && $tcorr<$H2){$ertekel="jÄ‚Ĺ‚";}
		if($H2<=$tcorr && $tcorr<$H3){$ertekel="kÄ‚Â¶zepes";}
		if($H3<=$tcorr && $tcorr<$H4){$ertekel="gyenge";}
		if($H4<=$tcorr){$ertekel="elÄ‚Â©gtelen";}
		$error_percent=100*($cf+$ff)/$ing_szam; 
		
		if(($cf+$ff)>0.3*$inger_szam)$ertekel="<b>A nagy hibaarÄ‚Ë‡ny miatt ( $error_percent %) nem Ä‚Â©rtÄ‚Â©kelhetÄąâ€!</b>";
		$mini=$user->mini;
		$maxi=$user->maxi;
		$atl=$user->atlag;
		$d_t=$ds->lastmod;
		if($tcorr>0){$percent=intval(100*$atl/$tcorr);} else { $percent=0; }	
		$this->render('meres3',array(
			'nev'=>$nev,
			'meres_szam'=>$user->mesnum,
			'dscount'=>$dscount,
			'sor'=>$sor,
			'kar_szam'=>$kar_szam,
			'ing_szam'=>$ing_szam,
			'mer_ido'=>$mer_ido,
			'szun_ido'=>$szun_ido,
			'meres_typ'=>$ds->mertyp,
			'mestyp'=>$mestyp,
			'd_t'=>$d_t,
			'ri'=>$ds->ri,
			'szoras'=>$ds->szoras,
			'tcorr'=>$ds->tcorr,
			'cf'=>$ds->cf,
			'ff'=>$ds->ff,
			'ertekel'=>$ertekel,
			'mini'=>$user->mini,
			'maxi'=>$user->maxi,
			'atl'=>$user->atlag,
			'percent'=>$percent,
			'link_enable'=>$link_enable,
			'id'=>$id,
		));
} 
	/**
	 * meres2 meres utani osszegzo eredmeny kijelzes
	 */
	public function actionMeres2(){
//------------- szÄ‚Â©t vÄ‚Ë‡lasztÄ‚Ë‡s $user->mestyp alapjÄ‚Ë‡n
		$id = $_GET['id'];
		$data_sum=new DataSum();
		$ds=$data_sum->findByPk($id);
		if($ds===null)
			throw new CHttpException(404,'A keresett eredmÄ‚Â©ny nem talÄ‚Ë‡lhatÄ‚Ĺ‚!'); //Ok mÄąÂ±kÄ‚Â¶dik!
		$id_user=Yii::app()->user->getId();
		if($id_user>0 && $id_user!= $ds->id_user)
			throw new CHttpException(403,'Ä‚â€“n nem a sajÄ‚Ë‡t eredmÄ‚Â©nyÄ‚Â©t prÄ‚Ĺ‚bÄ‚Ë‡lta megnÄ‚Â©zni, ehhez nincs jogosultsÄ‚Ë‡ga!!!');
		if($id_user==0 && $id_user!= $ds->id_user)
			$id_user= $ds->id_user;
		$users= new User;
		$user=$users->findByPk($id_user);
		$nev=$user->veznev." ".$user->kernev;
		$m_szam=count($data_sum->findAll('id_user=:id_user AND mertyp=:mertyp', array(
									':id_user'=>$id_user,
									':mertyp'=>1))); 
		if($user->mesnum==$m_szam){
			$meres_szam=$user->mesnum;
			$link_enable=TRUE;} 
		else {
			$meres_szam=$m_szam;
			$link_enable=FALSE;}
		$kar_szam=$user->inger_szelesseg;
		$ing_szam=$_SESSION['ktc']['inger_szam'];//$user->inger_szam;
		$mer_ido=$ds->mestime;
		$szun_ido=$user->pausetime;
		$mestyp=$ds->mertyp;
		if(!$mestyp){$meres_typ="tanulÄ‚Ĺ‚ / gyakorlÄ‚Ĺ‚";
						$mestyp=0;} 
		else {$meres_typ="valÄ‚Ĺ‚di";
				$mestyp=1;
				User::model()->updateByPk($id_user,array('mestyp'=>0));} //beÄ‚Ë‡llÄ‚Â­tjuk a tanulÄ‚Ĺ‚ mÄ‚Â©rÄ‚Â©st, mert csak az lehet a kÄ‚Â¶vetkezÄąâ€ mÄ‚Â©rÄ‚Â©s tipusa!											}
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
		if($tcorr < $H1) $ertekel="igen jÄ‚Ĺ‚"; 
		if($H1<=$tcorr && $tcorr<$H2){$ertekel="jÄ‚Ĺ‚";}
		if($H2<=$tcorr && $tcorr<$H3){$ertekel="kÄ‚Â¶zepes";}
		if($H3<=$tcorr && $tcorr<$H4){$ertekel="gyenge";}
		if($H4<=$tcorr){$ertekel="elÄ‚Â©gtelen";}
		$error_percent=100*($cf+$ff)/$ing_szam; 
		if(($cf+$ff)>0.3*$ing_szam)$ertekel="<b>A nagy hibaarÄ‚Ë‡ny miatt ( $error_percent %) nem Ä‚Â©rtÄ‚Â©kelhetÄąâ€!</b>";
		$mini=$user->mini;
		$maxi=$user->maxi;
		$atl=$user->atlag;
		if($tcorr>0){$percent=intval(100*$atl/$tcorr);} else { $percent=0; }
	//	if(!$mestyp && $ds->id_eredm<0){ $ds->delete($id); }
		$this->render('meres2',array(
			'nev'=>$nev,
			'meres_szam'=>$meres_szam,
			'kar_szam'=>$kar_szam,
			'ing_szam'=>$ing_szam,
			'mer_ido'=>$mer_ido,
			'szun_ido'=>$szun_ido,
			'meres_typ'=>$meres_typ,
			'mestyp'=>$mestyp,
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
			'link_enable'=>$link_enable,
			'id'=>$id,
		));
	}
/**
	 * Creates a new meres.
	 * If creation is successful, the browser will be redirected to the 'thank' page.
	 */
	public function actionMeres()
	{
		
		$teszt=0; //teszt alatt csak 4 db inger lesz!! tesztelÄ‚Â©s utÄ‚Ë‡n 0-ra Ä‚Ë‡llÄ‚Â­tandÄ‚Ĺ‚!
		$msz=4;	 //tezt mÄ‚Â©rÄ‚Â©s sorÄ‚Ë‡n az ingewrek szÄ‚Ë‡ma
		$atl0=4; // ha a mÄ‚Â©rsszÄ‚Ë‡ = vagy nagyobb megjelenik az Ä‚Ë‡tlag eredmÄ‚Â©ny Ä‚Â©s a szÄ‚Ë‡zalÄ‚Â©kos teljesÄ‚Â­tmÄ‚Â©ny
		$id_user=Yii::app()->user->getId();
		if(isset($_REQUEST['mestyp'])){
			User::model()->updateByPk($id_user,array('mestyp'=>$_REQUEST['mestyp']));
		}
		$model=new Ingerek;
	
	//???	if(isset($_REQUEST['mestyp'])){User::model()->updateByPk($id_user,array('mestyp'=>$_REQUEST['mestyp']));}
		$users= new User;
		$user=$users->findByPk($id_user);
		$this->id_user=$user->id; 
		
		$mestyp=$user->mestyp;
		
		if(isset($_REQUEST['ered']))
		{
			$eredmenyek = $_REQUEST['ered'];
/*------------------teszteles -------------------------------- 
			$handle = fopen("c:/temp/ajaxtest.txt", "a");
			
				$i=1;
				$cf=0;
				$ff=0;
				$sumtime=0;
				$timenum=0;
				$temp="";
				foreach($eredmenyek as $key1=>$value1){
							$temp.=" sorszam: ".$key1;
							$temp.=" inger: ".$value1['i'];
							$temp.=" ido: ".$value1['t'];
							$temp.=" inger_typ: ".$value1['p'];
							$temp.=" timenum: ".$timenum++;
							
						if($value1['p'] && $value1['t']==0){//$data_sor->cf=1;
																	$temp.=" cf:".$cf++;}
						if(!$value1['p'] && $value1['t']>0){//$data_sor->ff=1;
																	$temp.=" ff: ".$ff++;}
					$temp.=" i: ".$i++."\n";
					}
					$temp.=" kesz:".$_REQUEST['kesz']."\n";	
			$temp.=date("Y.m.d H:i:s",time())."-----------------------\n";
			fwrite($handle, $temp);
			fclose($handle);

//------------------teszteles vege -------------------------------- */

			if($mestyp){ // valÄ‚Ĺ‚di mÄ‚Â©rÄ‚Â©s (52 vagy 100 az ingerszÄ‚Ë‡m!)
//			$eredmenyek = $_REQUEST['eredmenyek'];
			//mentÄ‚Â©s
			$data_sum= new DataSum;
	//		echo "kovetkezo sor<br>"; exit;
			$data_sum->id_user=$id_user;
			$data_sum->inger_szelesseg=$user->inger_szelesseg;
			$data_sum->inger_start=$_SESSION['ktc']['inger_start'];
			$data_sum->inger_lepes=$_SESSION['ktc']['inger_lepes'];
			$data_sum->inger_szam=$_SESSION['ktc']['inger_szam'];
			$data_sum->mertyp=$mestyp;
			$data_sum->mestime=$user->mestime;
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
						$data_sor->inger_typ=$value1['p'];
						$data_sor->m_time=$value1['t'];
						if($value1['p'] && $value1['t']>0){
							$data_sor->cf=0;
							$sumtime=$sumtime+$value1['t'];
							$timenum++;}
						if($value1['p'] && $value1['t']==0){$data_sor->cf=1;$cf++;}
						if(!$value1['p'] && $value1['t']==0){$data_sor->ff=0;}
						if(!$value1['p'] && $value1['t']>0){$data_sor->ff=1;$ff++;}
						if($data_sor->insert()){/*echo "$i Sikeres data_sor kiÄ‚Â­rÄ‚Ë‡s<br>"*/;} else {/*echo $data_sor->error." $i hiba<br>"*/;}
						$i++;
					}	
				$szoras2=0;
				$ri=intval($sumtime/$timenum);
				foreach($eredmenyek as $key1=>$value1){
						if($value1['p'] && $value1['t']>0){
							$szoras2=$szoras2+pow($value1['t']-$ri,2);
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

			} //if($data_sum->insert())
			 else {/*echo "hiba"*/;}
			if($user->mesnum==$atl0){
				$mini=$tcorr;
				$maxi=$tcorr;
				if(User::model()->updateByPk($id_user,array('mini'=>$mini,'maxi'=>$maxi,'atlag'=>$tcorr))){/*echo "<br>mesnum=4 mentes sikerult!"*/;};	
			}
			if($user->mesnum>$atl0){
				if($tcorr>300){
					$mini=min($user->mini,$tcorr);
					$maxi=max($user->maxi,$tcorr);
					$atlag=intval(0.95*$user->atlag + 0.05*$tcorr);
					$mestime=intval(0.05*$tcorr + 0.95*$user->mestime);
					if(User::model()->updateByPk($id_user,array('mini'=>$mini,
																'maxi'=>$maxi,
																'atlag'=>$atlag,
																'mestime'=>$mestime)));
					}			
				}
			if($mestyp) { User::model()->updateByPk($id_user,array('mesnum'=>$user->mesnum+1,)); }	
			$ds=$data_sum->findall('id_user=:id_user',array(':id_user'=>$id_user));
		
				foreach($ds as $key=>$value){$lastid=$value['id'];
					}
			$id = $lastid;
			} // if($mestyp){ // valÄ‚Ĺ‚di mÄ‚Â©rÄ‚Â©s (52 vagy 100 az ingerszÄ‚Ë‡m!)
			 else { // tanulo meres feldolgozas -------------------------------------------------------------------------------------
			//--------------------------------- DataSum kitoltendÄąâ€, de a mÄ‚Â©rÄ‚Â©s2.ben feldolgozÄ‚Ë‡ds utÄ‚Ë‡n tÄ‚Â¶rlendÄąâ€!
			// DataSar-t nem kell kitÄ‚Â¶lteni
//			$eredmenyek = $_REQUEST['ered'];
			//mentÄ‚Â©s
			$data_sum= new DataSum;
	//		echo "kovetkezo sor<br>"; exit;
			$data_sum->id_user=$id_user;
			$data_sum->inger_szelesseg=$user->inger_szelesseg;
			$data_sum->inger_start=$_SESSION['ktc']['inger_start'];
			$data_sum->inger_lepes=$_SESSION['ktc']['inger_lepes'];
			$data_sum->inger_szam=$_SESSION['ktc']['inger_szam'];
			$data_sum->mertyp=$mestyp;
			$data_sum->mestime=$user->mestime;
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
						if($value1['p'] && $value1['t']>0){
							$sumtime=$sumtime+$value1['t'];
							$timenum++;}
						if($value1['p'] && $value1['t']==0){//$data_sor->cf=1;
																		$cf++;}
						if(!$value1['p'] && $value1['t']>0){//$data_sor->ff=1;
																		$ff++;}
						$i++;
					}	
				$szoras2=0;
				$ri=intval($sumtime/$timenum);
				foreach($eredmenyek as $key1=>$value1){
						if($value1['p'] && $value1['t']>0){
							$szoras2=$szoras2+pow($value1['t']-$ri,2);
							}
					}
				$szoras=intval(sqrt($szoras2/$timenum));
			//	$dsor=$data_sor->find('id_data_sum=:id_data_sum',array(':id_data_sum'=>$lastid));
				$id_eredm=-1;
				$tcorr=$ri+intval($ri*($cf+$ff)/$_SESSION['ktc']['inger_szam']);
				
				DataSum::model()->updateByPk($lastid,array('ri'=>$ri,
															'szoras'=>$szoras,
															'cf'=>$cf,
															'ff'=>$ff,
															'id_eredm'=>$id_eredm,
															'tcorr'=>$tcorr,
															));	

			} else {/*echo "hiba";*/}
				
			$ds=$data_sum->findall('id_user=:id_user',array(':id_user'=>$id_user));
		
				foreach($ds as $key=>$value){$lastid=$value['id'];
					}
			$id = $lastid;
//---------------------------------------------------		adatbazis alapjan OK				
				
			}// tanulo meres feldolgozas  vÄ‚Â©ge-----------------------------------
			// Ä‚Â¶sszeÄ‚Ë‡llÄ‚Â­tjuk az URL-t, ahol az eredmÄ‚Â©nyek elÄ‚Â©rhetÄąâ€k
			$url = Yii::app()->request->baseUrl."/index.php/ingerek/meres2?id=".$id;		
			$json = array(
				"url" => $url
			);
			
			header('Content-type: application/json');
			echo json_encode($json);
			exit();
		} // if(isset($_REQUEST['ered']))
		
		if($mestyp){$meres_typ="ValÄ‚Ĺ‚di";
						$inger_szam=$user->inger_szam;} 
		else { $meres_typ="TanulÄ‚Ĺ‚ / gyakorlÄ‚Ĺ‚";
						$inger_szam=20;
						$user->inger_szam=20;}
		if($teszt){$inger_szam=$msz; $user->inger_szam=$msz;} // teszt eseten csak 4 db inger lesz!!!
		$_SESSION['ktc']['ingerszam']=$inger_szam;
		$inger_start= intval(mt_rand(0,249)); // Ä‚Â­gy biztosan kezdÄ‚Â©sre esik
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
		// TODO: temp, tÄ‚Â¶rÄ‚Â¶lni ,mert csak teszthet van berakva!!!!!
	
//		$_SESSION['ktc']['inger_szam']=4;
		
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
//!!! ez mÄ‚Â©g Ä‚Ë‡tÄ‚Â­rÄ‚Ë‡sra vÄ‚Ë‡r!!----------------------------------------
		
//!!--------------------eddig------------------------------------
		$mestime=$user->mestime;
		$pausetime=$user->pausetime;
		$clientvariables=array(
			'mestime'=>$mestime,
			'ujing'=>$ujing,
			'pausetime'=>$pausetime,
			'baseurl'=>Yii::app()->request->baseUrl,
		);
		
		$this->render('meres',array(
			'clientvariables' => json_encode($clientvariables),
			'inger_hossz'=>$user->inger_szelesseg,
			'inger_szam'=>$inger_szam,
			'user'=>$user,
			'inger_start'=>$inger_start,
			'inger_lepes'=>$inger_lepes, //ebbÄąâ€l most nincs kihasznÄ‚Ë‡lva semmi , az inger star nagysÄ‚Ë‡ga hatÄ‚Ë‡rozza meg az irÄ‚Ë‡nyt!
			'mestyp'=>$mestyp,
			'meres_typ'=>$meres_typ,
			'mer_typ_bool'=>$mestyp,
			'meres_szam'=>$user->mesnum,
			'kijel_ido'=>$user->mestime,
		));
	}


/**
 * Meres4 Grafikus eredmÄ‚Â©ny kijelzÄąâ€ program
 */
 	public function	actionMeres4()
 	{
 	
		$data_sum=new DataSum();
		$id_user=Yii::app()->user->getId();
		$users= new User;
		$user=$users->findByPk($id_user);
		$nev=$user->veznev." ".$user->kernev;
 		$cim="$nev mÄ‚Â©rÄ‚Â©seinek diagramja";
/*		$series="[{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6,8.2]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5, 3.0]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,0.5]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8,5.2]
        }, {
            name: 'Budapest',
            data: [4.9, 5.2, 6.7, 9.5, 12.9, 15.2, 19.0, 20.6, 16.2, 14.3, 9.6, 5.8, 4.2]
           },]";	*/
        $ds=$data_sum->findAll('id_user=:id_user AND inger_szelesseg=:inger_szelesseg AND mertyp=:mertyp', array(
									':id_user'=>$user->id,
									':inger_szelesseg'=>$user->inger_szelesseg,
									':mertyp'=>1));
		$ds_count=count($ds);
	//	echo print_r($ds[0]['ri']);exit;
	
		$series="[";
	/**/	$series.="{\nname: \"Inger kijelzÄ‚Â©si idÄąâ€\",\ndata: [";
		for($i=0;$i<$ds_count;$i++){
			$series.=$ds[$i]['mestime'].'.0, ';
		}	/* */
		$series.="]},{\nname: \"ReakciÄ‚Ĺ‚idÄąâ€\",\ndata: [";
		for($i=0;$i<$ds_count;$i++){
			$series.=$ds[$i]['ri'].'.0, ';
		} 
		$series.="]},{\nname: \"KorrigÄ‚Ë‡lt reakciÄ‚Ĺ‚idÄąâ€\",\ndata: [";
		for($i=0;$i<$ds_count;$i++){
			$series.=$ds[$i]['tcorr'].'.0, ';
		}
		$series.="]},{\nname: \"SzÄ‚Ĺ‚rÄ‚Ë‡s\",\ndata: [";
		for($i=0;$i<$ds_count;$i++){
			$series.=$ds[$i]['szoras'].'.0, ';
		}
		$series.="]},{\nname: \"JÄ‚Ĺ‚ inger hibaszÄ‚Ë‡m\",\ndata: [";
		for($i=0;$i<$ds_count;$i++){
			$series.=$ds[$i]['cf'].'.0, ';
		}
		$series.="]},{\nname: \"HibÄ‚Ë‡s inger hibaszÄ‚Ë‡m\",\ndata: [";
		for($i=0;$i<$ds_count;$i++){
			$series.=$ds[$i]['ff'].'.0, ';
		}

		$series.="]\n}]";
	//	echo $series;exit;
		//ez az utolsÄ‚Ĺ‚
		   
 		$this->render('meres4',array(
 							'cim'=>$cim,
							'series'=>$series));
 	}

 /**
 * Teszt action a nem mÄąÂ±kÄ‚Â¶dÄąâ€ programrÄ‚Â©szek szÄ‚Ë‡mÄ‚Ë‡ra!!!!
 * most mÄ‚Â©rÄ‚Â©s exit elÄ‚Â¶tti rÄ‚Â©szt vizsgÄ‚Ë‡lom -- OK--mÄ‚Ë‡s cÄ‚Â©lra felhasznÄ‚Ë‡lhatÄ‚Ĺ‚
 */	
 	public function actionTeszt(){
 		$atl0=4;
		$model=new Ingerek;
		$id_user=Yii::app()->user->getId();
		$users= new User;
		$user=$users->findByPk($id_user);
		$this->id_user=$user->id;
		echo "user modelek megnyitva!";
		//ide jÄ‚Â¶n a tesztelÄ‚Â©shez szÄ‚Ä˝ksÄ‚Â©ges beÄ‚Ë‡llÄ‚Â­tÄ‚Ë‡sok
		$tcorr=987;
		echo "<br>Beallitasok megtortentek!";
		// ide jÄ‚Â¶n a
		echo "<br>user->mesdnum: ".$user->mesnum;
		if($user->mesnum>$atl0 && $tcorr>300){
				$mini=min($user->mini,$tcorr);
				$maxi=max($user->maxi,$tcorr);
				$atlag=intval(0.95*$user->atlag + 0.05*$tcorr);
				$mestime=intval(0.05*$tcorr + 0.95*$user->mestime);
				echo "<br>mini: $mini maxi: $maxi mestime: $mestime <br>";
			//	if(User::model()->updateByPk($id_user,array('mini'=>$mini,'maxi'=>$maxi,'atlag'=>$atlag,'mestime'=>$mestime))){echo "<br>mesnum>4 mentÄ‚Â©s sikerÄ‚Ä˝lt!!!";};
			}
		
		echo "<br>A vizsgalt resz lefutott!!"; 
 	}
	/**
	 * Ingerek korrigÄ‚Ë‡lÄ‚Ë‡sa
	 */
	public function actionIngkorr()
	{
		$model=new Ingerek;
		$this->render('ingkorr',array(
			'model'=>$model,
		));
	}
	/**
	 * csoportok időszakba eső eredményeinek listázása
	 * kérdőivet kell kitölteni, az alapján haározza meg a csoportot, az időintervallumot és a rendezési elveket
	 * a megadott adatok alapján készül a lista
	 */
	 public function aktionLista()
	 {
	 	$user=new User();	
		$list=null;
	 	if(isset($_REQUEST['ered']))
		{
			$ered = $_REQUEST['ered'];
			echo $ered['name'];
			exit;
			}
		$this->render('lista',array('user'=>$user,'list'=>$list,));
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
