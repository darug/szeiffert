<?php
/**
	 *  class OrvoslAlapadatController
	 *  \brief Honlapok epítése, ellenőrzése, stb.
	 *  /**
	 *  class OrvoslAlapadatController
	 *  \brief Honlapok epítése, ellenőrzése, stb.
	 * 
 * @package OrvosAlapadat
 */ 

class OrvosAlapadatController extends Controller
{
	/**
	 *  class OrvoslAlapadatController
	 *  \brief Honlapok epítése, ellenőrzése, stb.
	 * 
	 *  @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/admin';
	
	public $module_info = array(
		'name'				=>	'OrvosAlapadat',
		'title'				=>	'OrvosAlapadat',
		'new'				=>	'OrvosAlapadat'
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
				'actions'=>array('index','update','create','delete','epit','demoalap'), //átgondolni, hogy minden kerüljön át az admin-ba!!
				'users'=>array('@'),
			),
			array('allow', // allow admin to perform 'epit', 'demoalap' and others actions
				'actions'=>array('epit','demoalap','proba','ellenoriz', 'javit','dbsync','epitContent', 'javitContent'),
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
		$model=new OrvosAlapadat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrvosAlapadat']))
		{
			$model->attributes=$_POST['OrvosAlapadat'];
			
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

		if(isset($_POST['OrvosAlapadat']))
		{
			$model->attributes=$_POST['OrvosAlapadat'];
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
		$dataProvider=new CActiveDataProvider('OrvosAlapadat');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
/**
 * Demo adatbazis tartalmak alaphelyzetbe állítása
 */
 public function actionDemoalap(){
 	// config adatok visszaírása:
 	    $uzenet="config tabla: ";
		$rec=Config::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>0));
		$n=0; $f=0;
		foreach($rec as $row){
			$recupdate=Config::model()->find('id_orvos=:id_orvos AND item=:item',array(':id_orvos'=>12,'item'=>$row->item));
			$recupdate->value=$row->value;
			if($recupdate->update('value')){$n++;} else{$f++;}
		} 
		if($n>0){$uzenet.=$n." record felülírásra került. ";}
		if($f>0){$uzenet.=$f." record sikertelen kiíráa!";}
		$uzenet.="<br>";
	//Content tábla:
		$uzenet.="<p>content tabla: ";
		$mezo=array('title','descrption','content','noindex','contact_finish','url');
		$rec=Content::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>0));
		$n=0; $f=0;
		foreach($rec as $row){
			
			if($row->name != "lepesrol"){
			//	$uzenet.=$row->name."<br>";
			$recupdate=Content::model()->find('id_orvos=:id_orvos AND name=:name',array(':id_orvos'=>12,'name'=>$row->name));
			foreach($mezo as $value){$recupdate->$value=$row->$value;}		
			
			if($recupdate->update('value')){$n++;} else{$f++;}
			}
		}
	//	$recdel=Content::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>12));
		$ndel=Content::model()->deleteAll('id>=:id AND id_orvos=:id_orvos',array(
									':id'=>86,
									':id_orvos'=>12)); 
		if($n>0){$uzenet.=$n." record felülírásra került. ";}
		if($f>0){$uzenet.=$f.'<span class="red"> record sikertelen kiíráa! </span>';}
		if($ndel>0){$uzenet.=$ndel.'<span class="red"> record törlésre került!. </span>';}
		$uzenet.="</p>";
	//Felvilagosit tábla
		$uzenet.="<p>felvilagosit tabla: ";
		$mezo=array('title','link','rovid','hosszu','megjegyzes');
		$rec=Felvilagosit::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>0));
		$n=0; $f=0;
		foreach($rec as $row){
			
			if($row->name != "lepesrol"){
			//	$uzenet.=$row->name."<br>";
			$recupdate=Felvilagosit::model()->find('id_orvos=:id_orvos AND name=:name',array(':id_orvos'=>12,'name'=>$row->name));
			foreach($mezo as $value){$recupdate->$value=$row->$value;}		
			
			if($recupdate->update('value')){$n++;} else{$f++;}
			} 
		
		}
		$ndel=Felvilagosit::model()->deleteAll('id>=:id AND id_orvos=:id_orvos',array(
									':id'=>90,
									':id_orvos'=>12)); 
		 
		if($n>0){$uzenet.=$n." record felülírásra került. ";}
		if($f>0){$uzenet.=$f.'<span class="red"> record sikertelen kiíráa! </span>';}
		if($ndel>0){$uzenet.=$ndel.'<span class="red"> record törlésre került!. </span>';}
		$uzenet.="</p>";
	//Korzet
		$uzenet.="<p>korzet tabla: ";
		$mezo=array('title','irszam','megjegyzes','kezdo_szam_paros','veg_szam_paros','kezdo_szam_paratlan','veg_szam_paratlan','utca','id_rendelo');
		$rec=Korzet::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>0));
		$n=0; $f=0;
		foreach($rec as $row){
			
			if($row->name != "lepesrol"){
			//	$uzenet.=$row->name."<br>";
			$recupdate=Korzet::model()->find('id_orvos=:id_orvos AND name=:name',array(':id_orvos'=>12,'name'=>$row->name));
			foreach($mezo as $value){$recupdate->$value=$row->$value;}		
			
			if($recupdate->update('value')){$n++;} else{$f++;}
			}
		}
		$ndel=Korzet::model()->deleteAll('id>=:id AND id_orvos=:id_orvos',array(
									':id'=>171,
									':id_orvos'=>12)); 
		 
		if($n>0){$uzenet.=$n." record felülírásra került. ";}
		if($f>0){$uzenet.=$f.'<span class="red"> record sikertelen kiíráa! </span>';}
		if($ndel>0){$uzenet.=$ndel.'<span class="red"> record törlésre került!. </span>';}
		$uzenet.="</p>";
	// Rendido
		$uzenet.="<p>rendido tabla: ";
		$mezo=array('title','start','stop','comment');
		$rec=Rendido::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>0));
		$n=0; $f=0;
		foreach($rec as $row){
			
			if($row->name != "lepesrol"){
			//	$uzenet.=$row->name."<br>";
			$recupdate=Rendido::model()->find('id_orvos=:id_orvos AND name=:name',array(':id_orvos'=>12,'name'=>$row->name));
			foreach($mezo as $value){$recupdate->$value=$row->$value;}		
			
			if($recupdate->update('value')){$n++;} else{$f++;}
			}
		} 
		if($n>0){$uzenet.=$n." record felülírásra került. ";}
		if($f>0){$uzenet.=$f." record sikertelen kiíráa!";}
		$uzenet.="</p>";
	//tbl_kepek tabla törlés
		$ndel=Kepek::model()->deleteAll('id>=:id AND id_orvos=:id_orvos',array(
									':id'=>8,
									':id_orvos'=>12));
		if($ndel>0){$uzenet.='Képek adatbázisból: '.$ndel.' <span class="red"> record törlésre került!. </span>';}									
	// images/12/ könyvtár tartalom törlése
			$di=$_SERVER["DOCUMENT_ROOT"];
	//alkonyvtar hozzaadasa:
	//alkönyvtár címe:
	$di.=$burl."/images/12";
	//alkönyvtár link címe:
	$dlink=$_SERVER["HTTP_HOST"].$burl."/images/12";
	if(!$d=dir($di)) {echo "<span class=\"red\"> Nem találja a .$di könyvrárat!</span>" ;} else {
	
	while (false !== ($entry[] = $d->read())) {
   //echo $entry."<br>";
}
	
 foreach($entry as $key => $value){ 
		if(strlen($value)>2 && $value != "admin"){
		$uzenet.=$value.', ';
		unlink($di.'/'.$value);
		}}
 		$uzenet.=' fájlok  törlésre kerültek!';
	}
		$uzenet.="<p class=\"green\">A táblák demotartalmának helyreállítása befejeződött!</p>";		
		$this->render('demoalap',array(
			'uzenet'=>$uzenet,
		));	
 }
/**
 *  \fn public function actionEpitcontent($name)
 *  végigfut a content táblán és létrehozza az orvoshoz tartozó $name mező tartalmat, ha az nem létezik a művelet eredményét az $uzenet változó tartalmazza
 * 	@param varchar $name mező  tartalom, amelyet megvizsgál, hogy az összes orvosnál, hogylétezik és ha nem, akkor a content0 azonos nevű mezőjéből létrehozza.
 * 	továbbfejlesztés: a kitörölt rekord helyére szúrja be, mert a menü különben felborul!
 */
 	public function actionEpitContent($name)
	{
		$uzenet="<h1>Content: ".$name." mező újreépítés</h1>";
		$orvos= new Orvos;
		$content0= new Content0;
		$rec=$content0->find('name=:name',array(':name'=>$name));
		if($orvos_all=$orvos->findAll()){$uzenet.="<br>Rekordszám: ".count($orvos_all);} 
		else {$uzenet.="<br>Orvos lekérdezés hiba";}
		foreach($orvos_all as $key=>$value){
			unset($idr);
			$id_orvos=$value['id'];
			$orvosnev=$value['name'];
			$szak_megnevezes=$value['orvos_megnev'];
			$uzenet.="<br>".$value['id'];
			$content= new Content;
			if($content->find('id_orvos=:id AND name=:name',array(':id'=>$value['id'],':name'=>$name))){$uzenet.=' létezik!';} 
			else {
				$uzenet.=' nem létezik!!! Újat hoz létre:';
	// új rész: a régi id meghatározása ---------------------------------------------
				if($r=$content->find('name=:name AND id_orvos=:id_orvos',array(':name'=>'rendelesiido/rendelesiido','id_orvos'=>$id_orvos))) {
						$idr=$r->id-1;
						if($idr>0 &&  empty($content->findByPk($idr)->id)){ $uzenet.=" id= ".$idr;} // meglévő id-t nem érzékeli mysqli hibát generál!
						else { $uzenet.=" Régi id-t nem sikerült meghatározni!";}
				}
				if(isset($idr)){$content->id=$idr;}
//--------------------------------------------------------------- eddig, OK tesztelve
				$content->name=$rec->name; 
				$content->title=strtr($rec->title,array('$orvosnev'=>$orvosnev,'$szak_megnevezes'=>$szak_megnevezes)); //változó adatainak behelyettesítése
				$content->descrption=strtr($rec->descrption,array('$orvosnev'=>$orvosnev,'$id_orvos'=>$id_orvos,'$szak_megnevezes'=>$szak_megnevezes));
				$content->content=strtr($rec->content,array('$orvosnev'=>$orvosnev,'$id_orvos'=>$id_orvos,'$szak_megnevezes'=>$szak_megnevezes));
				$content->noindex=$rec->noindex;
				$content->is_active=$rec->is_active;
				$content->contact_finish=$rec->contact_finish;
				$content->url=$rec->url;
				$content->id_orvos=$id_orvos;
				$content->szak_megnevezes=$szak_megnevezes;
				$content->lastmod=date('Y-m-d H:i:s',time());
			/*	echo $uzenet; exit; //ha működik ki kell kommentezni!!! */
				if($content->insert()){ $uzenet.= "<p class=\"green\">Content táblába irás sikerült! ".$orvosnev." orvosnál</p>";} 
				else{$uzenet.= "<p class=\"red\">Content táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($content->getErrors()) . "</p>";}		
			}				
		}
		$this->render('epit',array(
			'uzenet'=>$uzenet,
		));
	}
/**
 *  \fn public function actionJavitcontent($name)
 *  A $csere array alapján végigmegy az összes $name mezőn és találat esetén végrehajtja a cserét a művelet eredményét az $uzenet változó tartalmazza
 * 	@param varchar $name mező  tartalom, amelyet megvizsgál, hogy az összes orvosnál
 * 	
 */
 	public function actionJavitContent($name)
	{
		$csere=array('kkk'=>'kk','zet ellen'=>'zetellen','csolat felv'=>'csolatfelv','kattitnva'=>'kattintva','si id'=>'siid');	
		$uzenet="<h1>Content: ".$name." mezők javítása</h1>";
		$content=new Content();
		$cont=$content->findAll('name=:name',array(':name'=>$name));
		foreach ($cont as $key => $value) {
			
			$uzenet.=$value['id']." name: ".$value['name']."<br>";
			$n=0;
			foreach($csere as $key1=>$value1){
				if(strpos($value['content'],$value1)){$uzenet.=$value1." ";$n++;}	
			}
			
		// 	if($n>0){$cont->update(); $uzenet.="$ módosítás mentve";} else {$uzenet.="mentés nem történt!";}
		}
		$this->render('epit',array(
			'uzenet'=>$uzenet,
		));
	}
/**
 *  \fn public function actionEpit($id) 
 * OrvosAlapadat adatbazisbol kiegesziti az adatbázisokat
 *  @param inteeger $id orvos id-je akinek a z adatbázisa és a rendelője és a rendelőbe tartozó társainak adatbázisai felépítendők
 * minden adatbázi művelet előtt megvizsgálásra kerül, hogy van-e már bejegyzés és ha igen figyelmeztető üzenet kerül küldésre,
 * bejegyzés csak akkor történik, ha nincsen az orvoshoz tartozó rekord!
 * Az üzenetek az összes művelet végrehajtása után egy menetben kerülnek kiírásra!
 * Javítás esetén törölni kell az adot tábla adot orvosának összes bejegyzését és újra kell futtatni az orvos építést.
 * @return honlapra kiírandó üzenetek, adatbázisonként az eredmény
 */
	public function actionEpit($id)
	{
		$model=$this->loadModel($id);
		
		///irszam, varos, cim letrehozasa
		$irszam=substr($model->Rendelo,0,4);
		$irsz=intval($irszam/10); // csak Bp-en van értelme!!
		$uzenet.="Irszám: ". $irszam."<br>";
		$x=strpos($model->Rendelo," ",5);
		$varos=substr($model->Rendelo,5,$x-5);
		$uzenet.="Város: ". $varos."<br>";
		$rendelo_teljes=$model->Rendelo;
		$telefon=$model->telefon;
		$cim=substr($model->Rendelo,$x+1,strlen($model->Rendelo));
		$szak_megnevezes=$model->szak_megnevezes;
		$uzenet.="Kiválasztott ".$szak_megnevezes." id: ".$model->id." neve: ".$model->Nev." Szak.: ".$model->szak_megnevezes." rendelője: ".$model->Rendelo."<br>";
		$orvos_szam=OrvosAlapadat::model()->count('Rendelo=:Rendelo',array(':Rendelo'=>$model->Rendelo));
		$uzenet.="Cím: ". $cim."<br>";
		///rendelo tábla létrehozása ----------------------------------------------
		$rendelo=Rendelo::model()->find('cim=:cim',array(':cim'=>$cim));
		if(!$rendelo){// itt folytatódik a mentés
			$uzenet.= " Nem talalja a rendelőt, létrehozza!!!<br>";
			$rendelo=new Rendelo;
			$rendelo->irszam=$irszam;
			$rendelo->varos=$varos;
			$rendelo->cim=$cim;
			$rendelo->rend_nev=$model->Rendelo;
			$rendelo->orvos_szam=$orvos_szam;
			$rendelo->megjegyzes="gépi";
			$rendelo->lastmod=date('Y-m-d H:i:s',time());
			if($rendelo->save()){ $uzenet.= "<p class=\"green\">Rendelo tablaba iras sikerult!</p>";
								$rec=Rendelo::model()->find('rend_nev=:rend_nev',array(
															':rend_nev'=>$model->Rendelo));
								$id_rendelo=$rec->id;} 
			else{
				$uzenet.= "<p class=\"red\">Rendelo tablaba iras nem sikerult!!!!</p>";
				$rendelo=Rendelo::model()->find('cim=:cim',array(':cim'=>$cim));
				$id_rendelo=$rendelo->id;// hibával kéne leállni, ha nincs rendelő id!!!
			}	
		} 
		else {
			$uzenet.= "<p class=\"red\">Ez a rendelő már létezik előbb törölje, ha újra akarja épiteni!!!</p>";
			$id_rendelo=$rendelo->id;
		}
		$uzenet.= "<p class=\"green\">A rendelő id-je: ".$id_rendelo."</p>";
		$cont_rend=False;
		if($rendelo->orvos_szam<$orvos_szam && $orvos_szam>1){ //e-d. hu növér hiba miatt!!
	//	$uzenet.="orvos szám: ".$orvos_szam; echo $uzenet;exit;		
			$rendelo->orvos_szam=$orvos_szam;
		
			if($rendelo->update(array('orvos_szam'))){$uzenet.="<p class=\"green\">Rendelői új orvosszám: $orvos_szam </p>"; }
			$cont_rend=True;
		}
        ///orvosok táblájának irasa --------------------------------------------------
		$recordok=OrvosAlapadat::model()->findAll('rendelo=:Rendelo',array(':Rendelo'=>$model->Rendelo));
		if($recordok){//orvos tablak eloallitasa
		 	$uzenet.="<p class=\"blue\">".count($recordok)."  orvos kerül generálásra</p>";
			$elozo_szak='';
			for($i=0;$i<count($recordok);$i++){ //rendelo osszes orvosan vegigmegy
				$name=$recordok[$i]['Nev'];
				$telefon=$recordok[$i]['telefon'];
				$uzenet.="<p>Orvos neve: ".$name."</p>";
				if($orvos=Orvos::model()->find('name=:name AND id_rendelo=:id_rendelo',
							array(':name'=>$name,':id_rendelo'=>$id_rendelo))){//létezik, csak üzenet
					$uzenet.= "<p class=\"red\">Ez a orvos már létezik előbb törölje, ha újra akarja épiteni!!!</p>";
				}else{//orvos tabla irasa
					$orvos= new Orvos;
					$orvos->name=$recordok[$i]['Nev'];
					$orvos->id_rendelo=$id_rendelo;
/** @test 2016.05.03 iDG  elleőrizendő, különben nem  a jó layout file jeleni meg!!!!  431 - 439 sorok  @code */
					switch ($recordok[$i][dname]) { 
						case 'e-d.hu':
							$orvos->layout="maineu";
							break;
						default:
							$orvos->layout="main";
							break;
					}				
/** @endcode */						
					$orvos->layout="main";
					$orvos->orvos_megnev=$szak_megnevezes;
					$orvos->status='előkészítés';
					$orvos->megjegyzes="gépi";
					$orvos->lastmod=date('Y-m-d H:i:s',time());
					if($orvos->save()){ $uzenet.= "<p class=\"green\">Orvos tablába irás sikerült!</p>";} else{
						$uzenet.= "<p class=\"red\">Orvos tablaba iras nem sikerult, a $name orvosnál!!!!" .($orvos->getErrors()) . "</p>";
					}
					
				}
				
				$id_orvos=$orvos->id;
				$orvosnev=$orvos->name;
				$uzenet.="<p> orvos id: ".$id_orvos." név: ".$orvos->name."Szak: ".$orvos->orvos_megnev." Rendelő id: ".$orvos->id_rendelo."</p>";
				// Orvos táblaba írás vége
				//Most kovetkezik az orvosokhoz tartozó táblák feltöltése: user, config, content, rendido, felvilagosit, uzenet, könyvtár	
			/// user tablaba iras
				$kor=new User;
				$m=2;
				$n=$kor->count('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos));
				$idnum=$kor->count('id>=:id',array(':id'=>0));
				if($n){
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a User táblában bejegyzés( '.$n.' db ), törölje, ha újra akarja építeni</p>';
				}
				else{
					$uzenet.="User új rekord szám: 1<br>";
					//for($j=1;$j<=$m;$j++){
						//if($rec=$k0->findByPk($j)){
							
							$kor->id=$id_orvos;	
							$kor->username="felhadmin".$id_orvos;
							$kor->title="Felhasználói adminisztrátor";
							$kor->password=crypt($kor->username, $this->blowfishSalt());
							$kor->authority=0;
							$kor->rememberMe=1;
							$kor->id_orvos=$id_orvos;
							$kor->id_rendelo=$id_rendelo;
							$kor->lastmod=date('Y-m-d H:i:s',time());
		/*	$uzenet.=$idnum." user id<br>";
			echo $uzenet;exit; */
							if($kor->insert()){ $uzenet.= "<p class=\"green\">User táblába irás sikerült! username: ".$kor->username."</p>";} 
							else{
								$uzenet.= "<p class=\"red\">User táblába irás nem sikerült, a $orvosnev orvosnál!!!!<pre>" .print_r($kor->getErrors()) ."</pre> id= ".$kor->id."</p>";
							} 
									
						//}else $uzenet.="Nem találja a(z) ".$j." rekordot!<br>"; //if $f0->dindByPk	*/
				//	}//for k0
				}//else $kor->count  //end user
			
			///ide jon a config táblába írás:----------------------------------------------------
				$k0= new Config0;
				$kor=new Config;
				$n=$kor->count('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos));
				$m=$k0->count();
				if($n){
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a Config táblában bejegyzés( '.$n.' db ), törölje, ha újra akarja építeni</p>';
				}
				else{
					$uzenet.="Config rekord szám: ".$m."<br>";
					for($j=1;$j<=$m;$j++){
						if($rec=$k0->findByPk($j)){
							$kor=new Config;
							$item=$rec->item;
							$kor->item=$item;
							switch($item) {
								case 'telefonszam':
									$kor->value=$telefon;
									break;
								case 'irszam':
									$kor->value=$irszam;
									break;
								case 'varos':
									$kor->value=$varos;
									break;
								case 'cim':
									$kor->value=$cim;
									break;
								default:
									$kor->value=$k0->value;
									break;
							}
							$kor->type=$rec->type;
							$kor->label=$rec->label;
							$kor->category=$rec->category;
							$kor->id_orvos=$id_orvos;
							$kor->lastmod=date('Y-m-d H:i:s',time());
							if($kor->save()){ $uzenet.= "<p class=\"green\">Config táblába irás sikerült! ".$rec->item."</p>";} 
							else{
								$uzenet.= "<p class=\"red\">Config táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($kor->getErrors()) . "</p>";
							}
									
						}else $uzenet.="Nem találja a(z) ".$j." rekordot!<br>"; //if $f0->dindByPk	*/
					}//for k0
				}//else $kor->count  //end config
				
			    
			    ///content tábla írása:--------------------------------------------------------------------------------				
				$c0= new Content0;
				$content=new Content;
				$n=$content->count('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos));
				if($n){
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a Content táblában bejegyzés( '.$n.' db ), törölje, ha újra akarja építeni</p>';}
				else{
					$uzenet.=$c0->count()." content rekord létrehozása:<br>";
					for($j=1;$j<=$c0->count();$j++){ //nem tartalmaz terület függő részt!
						if($rec=Content0::model()->findByPk($j)){
							$content=new Content;
							//if(($szak_megnevezes=='gyermekorvos')&&($rec->name!='beteghirado'))
							if(1==1)
							{	
								$content->name=$rec->name; 
								$content->title=strtr($rec->title,array('$orvosnev'=>$orvosnev,'$szak_megnevezes'=>$szak_megnevezes)); //változó adatainak behelyettesítése
								$content->descrption=strtr($rec->descrption,array('$orvosnev'=>$orvosnev,'$id_orvos'=>$id_orvos,'$szak_megnevezes'=>$szak_megnevezes));
								$content->content=strtr($rec->content,array('$orvosnev'=>$orvosnev,'$id_orvos'=>$id_orvos,'$szak_megnevezes'=>$szak_megnevezes));
								$content->noindex=$rec->noindex;
								$content->is_active=$rec->is_active;
								$content->contact_finish=$rec->contact_finish;
								$content->url=$rec->url;
								$content->id_orvos=$id_orvos;
								$content->szak_megnevezes=$szak_megnevezes;
								$content->lastmod=date('Y-m-d H:i:s',time());
				//				echo $uzenet; //exit;
								if($content->save()){ $uzenet.= "<p class=\"green\">Content táblába irás sikerült! ".$rec->name."</p>";} else{
									$uzenet.= "<p class=\"red\">Content táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($content->getErrors()) . "</p>";
								}		
							} else {$uzenet.=$rec->name.' bejegyzes kimaradt!  '.$szak_megnevezes.'<br>';}//$szak_megnevezes	
						}else $uzenet.="Nem találja a(z) ".$j." rekordot!<br>";	
					}//for c0
						
				}//else $n
				///content táblába rendelo bejegyzés létrehozása ---------------------------------------------
				$cont_number=Content::model()->count('title=:title',array(':title'=>$model->Rendelo));
				if($cont_number){if($cont_rend){//orvos lista újragenerálása 
					$rend=new Rendelo;
					$elozo_szak='';
					
					$rec=$rend->findByPk($id_rendelo); 
					$tartalom=Content::model()->find('title=:title', array(':title'=>$rec->rend_nev));
					if($szoveg=$tartalom->content){
						$ujszovk=substr($szoveg,0,strpos($szoveg,"<!--K-->")+8);
						$ujszovv=substr($szoveg,strpos($szoveg,"<!--V-->"),strlen($szoveg));
						$tartalom->content=$ujszovk;
						$orv=Orvos::model()->findAll('id_rendelo=:id_rendelo',array(':id_rendelo'=>$id_rendelo));
						for ($j=0; $j <count($orv) ; $j++) {
							if($elozo_szak!='' && $elozo_szak!=$orv[$j]['orvos_megnev']){$tartalom->content.=$elozo_szak.'(ok) és ';} 
								$tartalom->content.='<a href="'.Yii::app()->request->baseUrl.'/'.$orv[$j]['id'].'/home">'
											.$orv[$j]['name'].'</a>  &nbsp;&nbsp;';
											$elozo_szak=$orv[$j]['orvos_megnev'];
						}
						$tartalom->content.=$elozo_szak;
						$tartalom->content.=$ujszovv;
						$tartalom->update(array('content'));		
						$uzenet.="<p class=\"green\">Content rendelő orvos lista újraírva!</p>";
						$cont_rend=False;
					}else{$uzenet.="<p class=\"red\">Nem találta a rendelői tartalma!!</p>";}
					
				}else {
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a Content táblában rendelő bejegyzés ( '.$model->Rendelo.' ), törölje, ha újra akarja építeni</p>';}}
				else{
					if($i==$orvos_szam-1){
					$üzenet.="Ennél a(z) $szak_megnevezes  generálódik a rendelői honlap tartalom<br>";
					$content=new Content;	
					$content->name=$cim;
					$content->title=$model->Rendelo;
					$content->descrption=$szak_megnevezes."i rendelő, ".$irszam;
					$content->content="<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:930px\">
					<tbody>
					<tr>
						<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					</tr>
					</tbody>
					</table>Rendelőnk ... található. Parkolási lehetőség .... <br>A környék betegeit <!--K-->";
					$uzenet.="jelenleg a rendelői orvosszám: ".$orvos_szam."<br>";
					$orv=Orvos::model()->findAll('id_rendelo=:id_rendelo',array(':id_rendelo'=>$id_rendelo));
					for ($j=0; $j <$orvos_szam ; $j++) {
						if($elozo_szak!='' && $elozo_szak!=$orv[$j]['orvos_megnev']){$content->content.=$elozo_szak.'(ok) és ';} 
						$content->content.='<a href="'.Yii::app()->request->baseUrl.'/'.$orv[$j]['id'].'/home">'
											.$orv[$j]['name'].'</a>  &nbsp;&nbsp;';
											$elozo_szak=$orv[$j]['orvos_megnev'];
					}
					$rec=Felvilagosit0::model()->find('name=:name AND irszam=:irszam',array(
																						':name'=>'patika',
																						':irszam'=>$irsz));
					$content->content.=$szak_megnevezes.'<!--V-->(ok) látják el.<br>A legközelebbi gyógyszertár .... címen található.
					A kerület többi patikáját
					<a href="'.$rec->link.'" name="itt" target="_blank"> itt </a> tekintheti meg.
					<p>Ha nem tudja, hogy kihez tartozik, akkor kérjük írja be a lakcímének utca nevét az alábbi keresőbe:</p>';
					$content->noindex=0;
					$content->is_active=0;
					$content->contact_finish="";
					$content->url="";
					$content->id_orvos=$id_orvos;
					if($content->save()){ $uzenet.= "<p class=\"green\">Content táblába irás sikerült! ".$model->Rendelo."</p>";} 
					else{
						$uzenet.= "<p class=\"red\">Content táblába irás nem sikerült, a $orvosnev orvosnál ".$model->Rendelo." title-nél!!!!" 
						.($content->getErrors()) . "</p>";
						}
				} else {{$uzenet.="Nincs rendelői tertalom generálás!<br>";}}
				}
				///rendido tabla:-------------------------------------					
				$rend_name=array('1de','1du','2de','2du','3de','3du','4de','4du','5de','5du','6de','6du','7de','7du');
				$rend_title=array('Hétfő','Hétfő','Kedd','Kedd','Szerda','Szerda','Csütörtök','Csütörtök','Péntek','Péntek','Szombat','Szombat','Vasárnap','Vasárnap');
				$rend_cim=array('hetfo','hetfo','kedd','kedd','szerda','szerda','csutortok','csutortok','pentek','pentek_paratlan');
				$rendido=new Rendido;
				$n=$rendido->count('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos));
				$model=OrvosAlapadat::model()->find('Nev=:Nev AND Rendelo=:Rendelo',array(
								':Nev'=>$orvosnev,
								':Rendelo'=>$rendelo_teljes));// */
				$ret=$this->kibont($model->pentek,5);
				$uzenet.="<p>Redelési idő hétfő ".$model->hetfo." kedd: ".$model->kedd." péntek: ".$ret['comment']."</p>";
				if($n){
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a Rendido táblában bejegyzés( '.$n.' db ), törölje, ha újra akarja építeni</p>';}
				else{
					$szoveg=$model->s_honlap;
					if(isset($szoveg)){ // tanácsadás előfoldolgozás
						$feltetel="((H:|K:|Sz:|Cs:|P:)(.\d.{0,5}-.{0,4}\d.{0,5}(?=,)){0,5})"; 
						//kötetlen számú bejegyzést megtalál, de mindegyiknek ',' kell végződni!!
						preg_match_all($feltetel,$szoveg,$out);
						//eredmény: $out[0] megtalált krészek, $out[1] nap (H:...), $out[2] idő (10-12, stb) 
						unset($rname);
						for($j=0;$j<count($out[0]);$j++){
							$uzenet.="<p class=\"blue\">Tanácsadás: ".$out[0][$j]."</p>";
						}
						//$rend_name=array('1de','1du','2de','2du','3de','3du','4de','4du','5de','5du','6de','6du','7de','7du');
						$rend_nap=array('H:','H:','K:','K:','Sz:','Sz:','Cs:','Cs:','P:','P:');
					for($k=0;$k<10;$k+=2){ //
						for($j=0;$j<count($out[0]);$j++){
							if($rend_nap[$k]==$out[1][$j]){if(intval($out[2][$j])<=12){$rname[$rend_name[$k]]=" Tanácsadás: ".$out[2][$j];}
							else {$rname[$rend_name[$k+1]]=" Tanácsadás: ".$out[2][$j];}}//if($rend_nap)
						}//for($j)
					}//for($k)
				}//if(isset($szoveg))
					for($j=0;$j<14;$j++){
						$rendido= new Rendido;
						$rendido->name=$rend_name[$j];
						$rendido->title=$rend_title[$j];
						$rendido->id_orvos=$id_orvos;
						$rendido->oszlop_ki=False;
						if($j<10){
							$ered=$this->kibont($model->$rend_cim[$j],$j);
							$rendido->start=$ered['start'];
							$rendido->stop=$ered['stop'];
							$rendido->comment=$ered['comment'];
							if($model->szak_megnevezes=="gyermekorvos" && $model->s_honlap>" "){
								if(isset($rname[$rend_name[$j]])){$rendido->comment.=$rname[$rend_name[$j]];} //Tanacsadas beszurasa
							}
							
						}else{
							$rendido->start="";
							$rendido->stop="";
							$rendido->comment="Nincs rendelés";
						}
		//////////				$uzenet.="<pre>".var_dump($rendido)."</pre>";
						if($rendido->save()){ $uzenet.= "<p class=\"green\">Rendidő táblába irás sikerült! ".$rendido->name." ".$renido->start." ".$rendido->stop." ".$rendido->comment."</p>";} 
						else{
								$uzenet.= "<p class=\"red\">Rendido táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($rendido->getErrors()) . "</p>";
						}
						
					}//for 1 -14				
				}//if($n) else			
				///content home0 record építés (összegző adatok) kell a rendido tábla azért került ide!
			//	$c0= new Content0;
				$content=new Content;
				// feltételt a home0-val bővíteni kell!!!!
				$n=$content->count('id_orvos=:id_orvos AND name=:name',array(':id_orvos'=>$id_orvos,':name'=>'home0'));
				if($n){
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a Content táblában home0 bejegyzés, törölje, ha újra akarja építeni</p>';}
				else{//for és azt követő if kihagyandó!!!
				//	for($j=1;$j<=$c0->count();$j++){ //nem tartalmaz terület függő részt!
				//		if($rec=Content0::model()->findByPk($j)){
							$content=new Content;
							$kapcs= new Kapcsolat;
							//if(($szak_megnevezes=='gyermekorvos')&&($rec->name!='beteghirado'))
							if(1==1)
							{	
								$content->name="home0"; 
								$content->title=$orvosnev." ".$szak_megnevezes." összegző oldala ";
								$content->descrption=$szak_megnevezes.", körzeti orvos, ".$szak_megnevezes." rendelő, összegzett adatok";
								//alábbi sor jóval bonyolultabb lesz!!!
								$content->content="Rendelő címe: ".$rendelo_teljes;
								$content->content.="<br>Telefon: ".$kapcs->config('telefonszam');
								$content->noindex=FALSE;
								$content->is_active=False;
								$content->contact_finish="";
								$content->url="";
								$content->id_orvos=$id_orvos;
								$content->szak_megnevezes=$szak_megnevezes;
								$content->lastmod=date('Y-m-d H:i:s',time());
								if($content->save()){ $uzenet.= "<p class=\"green\">Content táblába name=home0 irás sikerült! ".$rec->name."</p>";} else{
									$uzenet.= "<p class=\"red\">Content táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($content->getErrors()) . "</p>";
								}		
							} else {$uzenet.=$rec->name.' bejegyzes kimaradt!  '.$szak_megnevezes.'<br>';}//$szak_megnevezes	
					//	}else $uzenet.="Nem találja a(z) ".$j." rekordot!<br>";	
				//	}//for c0
						
				}//else $n
									
				///Felvilagosit  tábla eljárás hasonló  a Contenthez, de kerületenkét irszam-ra kell szűrni!!---------------------
				$f0= new Felvilagosit0;
				$felvil=new Felvilagosit;
				$n=$felvil->count('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos));
				$m=$f0->count('irszam=:irszam AND szak_megnevezes=:szak_megnevezes', array(':irszam'=>$irsz,
																							':szak_megnevezes'=>$szak_megnevezes));
				if($n){
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a Felvilagosit táblában bejegyzés( '.$n.' db ), törölje, ha újra akarja építeni</p>';}
				else{
					$uzenet.="kerülethez tartozó Felvilagosit rekord szám: ".$m."<br>";
				// Új algoritmus 2014.03.15.-től
				$rec=$f0->findAll('irszam=:irszam AND szak_megnevezes=:szak_megnevezes', array(':irszam'=>$irsz,
																				':szak_megnevezes'=>$szak_megnevezes));	
				$rn=0;
				foreach($rec as $key=>$value){
					$felvill=new Felvilagosit;
					$felvil=new Felvilagosit;	
					$felvil->name=$rec[$rn]['name'];
					$felvil->title=$rec[$rn]['title'];
					$felvil->link=$rec[$rn]['link'];
					$felvil->rovid=$rec[$rn]['rovid'];
					$felvil->hosszu=$rec[$rn]['hosszu'];
					$felvil->megjegyzes=$rec[$rn]['megjegyzes'];
					$felvil->id_orvos=$id_orvos;
					if($felvil->save()){ $uzenet.= "<p class=\"green\">Felvilagosit táblába irás sikerült! ".$rec->name."</p>";}
					else{
								$uzenet.= "<p class=\"red\">Felvilagosit táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($felvil->getErrors()) . "</p>";
							}
					$rn++;
				}	
				/* régi algoritmus 2014.03.15.ig élt 
					for($j=1;$j<=$m;$j++){
						if($rec=$f0->findByPk($j)){
							$felvil=new Felvilagosit;	
							$felvil->name=$rec->name;
							$felvil->title=$rec->title;
							$felvil->link=$rec->link;
							$felvil->rovid=$rec->rovid;
							$felvil->hosszu=$rec->hosszu;
							$felvil->megjegyzes=$rec->megjegyzes;
							$felvil->id_orvos=$id_orvos;
							if($felvil->save()){ $uzenet.= "<p class=\"green\">Felvilagosit táblába irás sikerült! ".$rec->name."</p>";}
							else{
								$uzenet.= "<p class=\"red\">Felvilagosit táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($felvil->getErrors()) . "</p>";
							}		
						}else $uzenet.="Nem találja a(z) ".$j." rekordot!<br>"; //	
					} for $m */
				}//else $n
				
				/// Korzet tabla jon , szűrés nem kell, csak irányítószám behelyettesítés és minta rekordok átmásolása---------------
				$k0= new Korzet0;
				$kor=new Korzet;
				$n=$kor->count('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos));
				$m=$k0->count();
				if($n){
					$uzenet.='<p class="red">Ennek az orvosnak már létezik a Korzet táblában bejegyzés( '.$n.' db ), törölje, ha újra akarja építeni</p>';
				}
				else{
					$uzenet.="Körzet rekord szám: ".$m."<br>";
					for($j=1;$j<=$m;$j++){
						if($rec=$k0->findByPk($j)){
							$kor=new Korzet;	
							$kor->name=$rec->name;
							$kor->title=$rec->title;
							$kor->irszam=$irszam;
							$kor->megjegyzes=$rec->megjegyzes;
							$kor->kezdo_szam_paros=$rec->kezdo_szam_paros;
							$kor->veg_szam_paros=$rec->veg_szam_paros;
							$kor->kezdo_szam_paratlan=$rec->kezdo_szam_paratlan;
							$kor->veg_szam_paratlan=$rec->veg_szam_paratlan;
							$kor->utca=$rec->utca;								
							$kor->id_orvos=$id_orvos;
							$kor->id_rendelo=$id_rendelo;
							if($kor->save()){ $uzenet.= "<p class=\"green\">Korzet táblába irás sikerült! ".$rec->name."</p>";} 
							else{
								$uzenet.= "<p class=\"red\">Korzet táblába irás nem sikerült, a $orvosnev orvosnál!!!!" .($kor->getErrors()) . "</p>";
							}
									
						}else $uzenet.="Nem találja a(z) ".$j." rekordot!<br>"; //if $f0->dindByPk	*/
					}//for k0
				}//else $kor->count
// user és config előre rakva 2015.03.16 DeGe				
				/// images alkönyvtárok létrehozása----------------------------------------------------------------
				$dokidir=$_SERVER['DOCUMENT_ROOT'].substr(Yii::app()->request->baseUrl,1,strlen(Yii::app()->request->baseUrl)).'/images/'.$id_orvos.'/';
				$uzenet.=$dokidir."<br>"; 
				if(is_dir($dokidir)){
					$uzenet.="<p class=\"red\">Ennek az orvosnak már létezik images alkönyvtára!!</p>";
				} else{ //ide jon a létrehozás
					if(mkdir($dokidir)){
						$uzenet.="<p class=\"green\">images alkönyvát létrehozása sikerült!</p>";
					} else {
						$uzenet.="<p class=\"red\">images alkönyvát létrehozása nem sikerült!!!</p>";
					}	
				}// is_dir else */
				
			///ide kell beszúrni az esetleges újabb építéseket-----------------------------------------------				
			} //for
					
		}//if($rekordok)
		else {
			$uzenet.="<p class=\"red\">Nem talált egy orvost sem a rendelőhöz!!!! ".$model->Rendelo."</p>";
		}//else				
/// ide jon  az záró üzenet				
		$uzenet.="<p class=\"green\">A tábla és könyvtár generálás befejeződött!</p>";		
				

		$this->render('epit',array(
			'uzenet'=>$uzenet,
		));
	}//actionEpit
/*************
 * @var actionDBsync
 * szeiffert és haziorvos adatbázisok összahasonlítása: insert és update műveletk
 * segítségével történő szinkronizálásával.
 * A log fájl a ../data/...html-ben található
 * 
***************/	
	public function actionDbsync()
		 {
$t_name="orvos";
$table_name=$t_name;
/**
 * az összes üzenetet tartalmazza
 */
$uzenet="Nincs üzenet<br>";
$req=array();
If (isset($_REQUEST['form'])){
	$req['table_name']=$_REQUEST['table_name'];	
	$t_name=$_REQUEST['table_name'];
	$table_name=$t_name;	
	//print $t_name;
	$uzenet="<p class=green>Az adatbazis muvelet üzenetei:</p>";
	$req['muvelet']=$_REQUEST['muvelet'];
	$uzenet.=" Művelet: ".$req['muvelet'];
	$req['irany']=$_REQUEST['irany'];
	$uzenet.="<br> Irany: ".$_REQUEST['irany'];
	$req['kezd_id']=$_REQUEST['kezd_id'];
	$uzenet.=" Kezdo id: ".$_REQUEST['kezd_id'];
	$req['veg_id']=$_REQUEST['veg_id'];
	$uzenet.=" Veg id: ".$_REQUEST['veg_id'];
	$req['mezo_szam']=$_REQUEST['mezo_szam'];
	$mezo_szam=$_REQUEST['mezo_szam'];
	$req['mezo_szam']=$_REQUEST['mezo_szam'];
	$uzenet.="<br> Mezo szam: ".$mezo_szam;
	$req['mezo_nev']=$_REQUEST['mezo_nev'];
	$uzenet.=" Mezo nev: ".$_REQUEST['mezo_nev']."<br>";

// művelet rányának feldolgozása
	if($_REQUEST['irany']=="szeiffert"){
		$outputdb = new mysqli('localhost', 'szeiffert', 'c2jb978NV969n4A', 'szeiffert');
		if (mysqli_connect_errno()) {$uzenet.="szeiffert megnyitasi hiba: ".mysqli_connect_error()."<br>";} 
		else {$uzenet.="szeiffert outputnak megnyitva<br>";}
	
		$outputdb->set_charset("utf8");
		$inputdb= new mysqli('localhost', 'haziorvos', '2014Ho516', 'haziorvos');
		if (mysqli_connect_errno()) {$uzenet.="haziorvos megnyitasi hiba: ".mysqli_connect_error()."<br>";}
		else {$uzenet.="haziorvos inputnak megnyitva<br>";}
		$inputdb->set_charset("utf8");
		$uzenet.="Cel: szeiffert<br>";
	}
	else {
		if($_REQUEST['irany']=="haziorvos"){
			$inputdb = new mysqli('localhost', 'szeiffert', 'c2jb978NV969n4A', 'szeiffert');
			if (mysqli_connect_errno()) {$uzenet.= "<span class=red>szeiffert megnyitasi hiba: ".mysqli_connect_error()."</span><br>";}
			else {$uzenet.="szeiffert inputnak megnyitva<br>";}
			$inputdb->set_charset("utf8");
			$outputdb= new mysqli('localhost', 'haziorvos', '2014Ho516', 'haziorvos');
			if (mysqli_connect_errno()) {$uzenet.="haziorvos megnyitasi hiba: ".mysqli_connect_error()."<br>";}
			else {$uzenet.="haziorvos outputnak megnyitva<br>";}
			$outputdb->set_charset("utf8");
			$uzenet0="Cel: haziorvos<br>";
		} 
		else {$_SESSION["hiba"]="Nincs irány választva!";}
	}//if($_REQUEST['irany']=="szeiffert") else ág vége
/**
*	beolvasási feltétel meghatározása és eltárolása
*/ 
	$felt="where 1";
	$uzenet.="<br>"; 
	$felt_ok=True;
	//feltétel meghatározása a megadott id-kből
	if (($_REQUEST['kezd_id']==$_REQUEST['veg_id']) && $_REQUEST['kezd_id']>="0")
		{$felt=" WHERE `id`=".$_REQUEST['kezd_id'];} //egy rekord beolvasása
	elseif($_REQUEST['kezd_id']<=$_REQUEST['veg_id'] && $_REQUEST['kezd_id']>="0")
		{$felt=" WHERE `id`>=".$_REQUEST['kezd_id']." AND `id`<=".$_REQUEST['veg_id'];} //több rekord
	elseif(isset($_REQUEST['kezd_id'])&&$_REQUEST['veg_id']=="" && $_REQUEST['kezd_id']>="0")
		{$felt=" WHERE `id`=".$_REQUEST['kezd_id']; $uzenet.="Csak kezd_id van!<br>";}	 
	else {$_SESSION["hiba"]="Hibas id megadas!"; $uzenet.="<span class=red>Hibas id megadas!</span><br>";$felt_ok=false;}

///adat(ok) beolvasása

	$sel="SELECT * FROM ".$t_name." ".$felt;
	$uzenet.="<br> Select tartalma: ".$sel."<br>";
	//print $uzenet;
	if($felt_ok){
		if(!$result=$inputdb->query($sel)){$uzenet.=$inputdb->error." db error<br>";}
		else {/* while ($row = $result->fetch_row()) {
		print "<pre>".var_dump($row)."</pre>";
        foreach ($row as $key=>$value) { $text.=$value.", ";}
        print $text."<br>"; 
    	} */
		};	 
///művelet meghatározása
		//$uzenet.="mezo tartalom<pre>".var_dump($row)."</pre>";
		if($_REQUEST['muvelet']>" "){
			$muvelet=$_REQUEST['muvelet'];
			//$uzenet.="Művelet2: ".$muvelet."<br>";
			switch ($muvelet) {
				case 'insert':
					$nn=0;
				//	print $uzenet;
					while ($row = $result->fetch_row()) {
						$n=0; $text="";
        				foreach ($row as $key=>$value) {
        					if($n!=0){$text.=", '".$value."'";$n++;$uzenet.=$n.", ";} 
        					else {$text.="'".$value."'";$n++; $uzenet.=$n."; ";}}
							$nn=$n;
							$sel="INSERT INTO ".$t_name." VALUES (".$text.")";
							$uzenet.=$sel."<br>\$nn: ".$nn;
							if($outputdb->query($sel))
							{$uzenet.="<br><span class=green>sikeret adatkiírás!</span><br>";} 
							else {$uzenet.="<br><span class=red>adatkiírási hiba: ".$outputdb->error."</span><br>";}		
    				}
					break;
				case 'update':
					$nn=0;
					//print $uzenet;
					while ($row = $result->fetch_row()) {
						//$uzenet.="mezo tartalom<pre>".var_dump($row)."</pre>";
						$n=0; $text="";
        				//foreach ($row as $key=>$value) { if($n!=0){$text.=", '".$value."'";$n++;$uzenet.=$n.", ";} else {$text.="'".$value."'";$n++; $uzenet.=$n."; ";}}
						//$uzenet.="mező tartalom: ".$row[$mezo_szam]."<br>";
        				$nn=$n;
						$sel="UPDATE `".$t_name."` SET ".$_REQUEST['mezo_nev']." =\"".$row[$mezo_szam]."\"".$felt;
						$uzenet.=$sel."<br>";
						if($outputdb->query($sel))
						{$uzenet.="<br><span class=green><b>sikeret adatkiírás!</b></span><br>";} 
						else {$uzenet.="<br><span class=red>adatkiírási hiba: ".$outputdb->error."</span><br>";}
						
    				}
					break;
				default:
					break;
			}//switch
			error_reporting(null);
			if($_SERVER["DOCUMENT_ROOT"][0]=="C")
			{$logfile=$_SERVER["DOCUMENT_ROOT"]."szeiffert/protected/data/dbsyn_log.html";}
			else {$logfile=$_SERVER["DOCUMENT_ROOT"]."/protected/data/dbsyn_log.html";} 
			if(!$fw = fopen($logfile, "a"))
			{$uzenet.="<br><span class=red>log fájl megnyitási hiba! "." ".$_SERVER["DOCUMENT_ROOT"]." ".$_SERVER["SCRIPT_NAME"]
			." ".$_SERVER["DOCUMENT_ROOT"][0]." </span>"; } 
			$uzenet.="<br>logfile: ".$logfile;
			$log="<br>---------------- ".date("Y.m.d H:i:s")." --------\n";
			$log.=$uzenet;
			fwrite($fw,$log);
			fclose($fw);
		}//if($muvelet)
	}//if($felt_ok)	
}//	If (isset($_REQUEST['form']))			
$mysqli_s = new mysqli('localhost', 'szeiffert', 'c2jb978NV969n4A', 'szeiffert');
$mysqli_s->set_charset("utf8");
$result=$mysqli_s->query('SELECT * FROM `'.$t_name.'` WHERE 1');
 $finfo = mysqli_fetch_fields($result);
$n=0;
foreach($finfo as $value){
        $head[$n]=$value->name;
		$n++;
		}
$rend=$result;
						
/**
 * aktualisan következo id
 */
$m=1;
$n=0;
$n=0;
while($value=$rend->fetch_row()){
	$szeiffert[$n]=$value;
	$n++;	
}
mysqli_close($mysqli_s);		
$mysqli = new mysqli('localhost', 'haziorvos', '2014Ho516', 'haziorvos');
$mysqli->set_charset("utf8");
$result=$mysqli->query('SELECT * FROM `'.$t_name.'` WHERE 1');
$rendhazi=$result;
$n=0; $hiany_haziorvos='';
$m=1;$n=0;
while($value=$rendhazi->fetch_row()){
		$haziorvos[$n]=$value;
		$n++;	
}
mysqli_close($mysqli);
$this->render('dbsync',array('szeiffert'=>$szeiffert,'haziorvos'=>$haziorvos,'table_name'=>$table_name,
					'head'=>$head,'req'=>$req, 'uzenet'=>$uzenet));
}// actionDBsync vége
		
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OrvosAlapadat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OrvosAlapadat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OrvosAlapadat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='orvos-alapadat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/**
	 * visszatér a start, stop, comment változokkal, ha szám a tartalom, vagy a commenttel, ha nem talál számot
	 * ha talalá számot de a napszak nem egyezik, akkor üres változókat ad vissza
	 */
	 public function kibont($s,$j)
	 {
	 	$start="";
		$stop="";
		$comment="";
	 	$x=explode(" ",$s);
		if(($x[0]>0 && $x[0]<24)&&($x[2]>0 && $x[2]<24)){
			if($j%2==0 && $x[0]<12){
				if(strlen($x[0])>2){$start=$x[0];} else {$start=$x[0].":00";}
				if(strlen($x[0])>2){$stop=$x[2];} else {$stop=$x[2].":00";}
				$comment="";
			}	
			if($j%2>0 && $x[0]>=12){
				if(strlen($x[0])>2){$start=$x[0];} else {$start=$x[0].":00";}
				if(strlen($x[0])>2){$stop=$x[2];} else {$stop=$x[2].":00";}
				$comment="";
			}
		} else {
			$comment=$s;
		}
		return array(
			'start'=>$start,
			'stop'=>$stop,
			'comment'=>$comment
		);
	 }
	 public function blowfishSalt($cost = 13)
	{
	    if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
	        throw new Exception("cost parameter must be between 4 and 31");
	    }
	    $rand = array();
	    for ($i = 0; $i < 8; $i += 1) {
	        $rand[] = pack('S', mt_rand(0, 0xffff));
	    }
	    $rand[] = substr(microtime(), 2, 6);
	    $rand = sha1(implode('', $rand), true);
	    $salt = '$2a$' . sprintf('%02d', $cost) . '$';
	    $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
	    return $salt;
	} 
	
	/*******************************
	 * @function javit
	 * törli a config, content, felvilagosit, korzet, rendido, user, uzenet táblákból azokat a bejegyzéseket,
	 *  amelynél az id_orvos nem létezik! 
	 *  kiírja a táblanevet, majd végigmegy a sorokon és kiírja a törlendő sor id-jét és törli azt.
	 * 
	 */
	 public function actionJavit()
	 {
	 	$orv= new Orvos;	
	 	$uzenet='<br>';
		$mod=array('Config','Content','Felvilagosit','Korzet','Rendido','User','Uzenet');
		Foreach($mod as $mode){
			$c0= new $mode;
			$rec=$c0->findAll('id_orvos>=:id_orvos', array(':id_orvos'=>1));
			$uzenet.="$mode tábla ellenőrzés, recod szám : ".count($rec)."<br>";
			$n=0; $m=0;
			foreach($rec as $key=>$value){
				if($orv->findAllByPk($value['id_orvos'])){
					
				}else{
					$uzenet.=$value->id." id_orvos: ".$value['id_orvos']." Nem létezik! ";
					if($c0->deleteByPk($value->id)){$uzenet.="Törölve!"; $m++;} else {$uzenet.="Törlés sikertelen!!!";}
					$uzenet.="<br>";
				}
				$n++;
			}
		$uzenet.=$n." db sor feldolgozva. Törölve: $m db.<br><br>";
		}
	 	$this->render('epit',array(
			'uzenet'=>$uzenet,
		));
	 }
	 

	/********************************************************************
	 * proba function, fejlesztendo részek előpróbája
	 *******************************************************/
	 public function actionProba()
	 {
	 	//elso proba: orvosAlapadat->s_honlap feldolgozása preg_mach_all-lal
	 /*	$oA= new OrvosAlapadat;
		if($orvosAlapadat=$oA->findByPk(168)){$szoveg='megtalalta: ';} else {$szoveg='nem talalt semmit';}
		$szoveg=$orvosAladat['s_honlap'];
		preg_match_all("(HKSZCsP):",$orvosAlapadat['s_honlap'],$out, PREG_SET_ORDER);
		$this->render('proba',array(
			'orvos'=>$orvosAlapadat->Nev,
			'szoveg'=>$orvosAlapadat['s_honlap'],
			'eredmeny'=>$orvosAlapadat['s_honlap'],
			'cim'=>'Tanácsadás előállítása',
		)); */
		/**második próba: különböző helyű, azonos szerkezetű adatbázis tartalmak összehasonlítása */
/* egyenlore kihagyva az egységesítés miatt			$table_name="rendelo";
			$rend= Rendelo::model()->findAll();*/
$t_name="orvos";
$table_name=$t_name;
/**
 * az összes üzenetet tartalmazza
 */
$uzenet="Nincs üzenet<br>";
If (isset($_REQUEST['form'])){
$req['table_name']=$_REQUEST['table_name'];	
$t_name=$_REQUEST['table_name'];
$table_name=$t_name;	
print $t_name;
$uzenet="<p class=green>Az adatbazis muvelet üzenetei:</p>";
$req['muvelet']=$_REQUEST['muvelet'];
$uzenet.=" Művelet: ".$req['muvelet'];
$req['irany']=$_REQUEST['irany'];
$uzenet.="<br> Irany: ".$_REQUEST['irany'];
$req['kezd_id']=$_REQUEST['kezd_id'];
$uzenet.=" Kezdo id: ".$_REQUEST['kezd_id'];
$req['veg_id']=$_REQUEST['veg_id'];
$uzenet.=" Veg id: ".$_REQUEST['veg_id'];
$req['mezo_szam']=$_REQUEST['mezo_szam'];
$mezo_szam=$_REQUEST['mezo_szam'];
$req['mezo_szam']=$_REQUEST['mezo_szam'];
$uzenet.="<br> Mezo szam: ".$mezo_szam;
$req['mezo_nev']=$_REQUEST['mezo_nev'];
$uzenet.=" Mezo nev: ".$_REQUEST['mezo_nev']."<br>";

// művelet rányának feldolgozása
if($_REQUEST['irany']=="szeiffert"){
	$outputdb = new mysqli('localhost', 'szeiffert', 'c2jb978NV969n4A', 'szeiffert');
	if (mysqli_connect_errno()) {$uzenet.="szeiffert megnyitasi hiba: ".mysqli_connect_error()."<br>";} 
	else {$uzenet.="szeiffert outputnak megnyitva<br>";}
	
	$outputdb->set_charset("utf8");
	$inputdb= new mysqli('localhost', 'haziorvos', '2014Ho516', 'haziorvos');
	if (mysqli_connect_errno()) {$uzenet.="haziorvos megnyitasi hiba: ".mysqli_connect_error()."<br>";}
	else {$uzenet.="haziorvos inputnak megnyitva<br>";}
	$inputdb->set_charset("utf8");
	$uzenet.="Cel: szeiffert<br>";
	} else {
		if($_REQUEST['irany']=="haziorvos"){
			$inputdb = new mysqli('localhost', 'szeiffert', 'c2jb978NV969n4A', 'szeiffert');
			if (mysqli_connect_errno()) {$uzenet.= "<span class=red>szeiffert megnyitasi hiba: ".mysqli_connect_error()."</span><br>";}
			else {$uzenet.="szeiffert inputnak megnyitva<br>";}
			$inputdb->set_charset("utf8");
			$outputdb= new mysqli('localhost', 'haziorvos', '2014Ho516', 'haziorvos');
			if (mysqli_connect_errno()) {$uzenet.="haziorvos megnyitasi hiba: ".mysqli_connect_error()."<br>";}
			else {$uzenet.="haziorvos outputnak megnyitva<br>";}
			$outputdb->set_charset("utf8");
			$uzenet0-="Cel: haziorvos<br>";
			} else {$_SESSION["hiba"]="Nincs irány választva!";}
	}//if($_REQUEST['irany']=="szeiffert") else ág vége
/**
*	beolvasási feltétel meghatározása és eltárolása
*/ 
$felt="where 1";
$uzenet.=$felt." <- induló feltétel<br>"; $felt_ok=True;
//feltétel meghatározása a megadott id-kből
if (($_REQUEST['kezd_id']==$_REQUEST['veg_id']) && $_REQUEST['kezd_id']>="0")
	{$felt=" WHERE `id`=".$_REQUEST['kezd_id'];} //egy rekord beolvasása
elseif($_REQUEST['kezd_id']<=$_REQUEST['veg_id'] && $_REQUEST['kezd_id']>="0")
	{$felt=" WHERE `id`>=".$_REQUEST['kezd_id']." AND `id`<=".$_REQUEST['veg_id'];} //több rekord
elseif(isset($_REQUEST['kezd_id'])&&$_REQUEST['veg_id']=="" && $_REQUEST['kezd_id']>="0")
	{$felt=" WHERE `id`=".$_REQUEST['kezd_id']; $uzenet.="Csak kezd_id van!<br>";}	 
else {$_SESSION["hiba"]="Hibas id megadas!"; $uzenet.="<span class=red>Hibas id megadas!</span><br>";$felt_ok=false;}

//adat(ok) beolvasása

$sel="SELECT * FROM ".$t_name." ".$felt;
$uzenet.="<br> Select tartalma: ".$sel."<br>";
//print $uzenet;
if($felt_ok){
if(!$result=$inputdb->query($sel)){$uzenet.=$inputdb->error." db error<br>";}
else {/* while ($row = $result->fetch_row()) {
		print "<pre>".var_dump($row)."</pre>";
        foreach ($row as $key=>$value) { $text.=$value.", ";}
        print $text."<br>"; 
    } */
};	 
//művelet meghatározása
//$uzenet.="mezo tartalom<pre>".var_dump($row)."</pre>";
if($_REQUEST['muvelet']>" "){
	$muvelet=$_REQUEST['muvelet'];
	//$uzenet.="Művelet2: ".$muvelet."<br>";
	switch ($muvelet) {
		case 'insert':
			$nn=0;
		//	print $uzenet;
			while ($row = $result->fetch_row()) {
						$n=0; $text="";
        				foreach ($row as $key=>$value) { if($n!=0){$text.=", '".$value."'";$n++;$uzenet.=$n.", ";} else {$text.="'".$value."'";$n++; $uzenet.=$n."; ";}}
						$nn=$n;
						$sel="INSERT INTO ".$t_name." VALUES (".$text.")";
			$uzenet.=$sel."<br>\$nn: ".$nn;
			if($outputdb->query($sel)){$uzenet.="<br>sikeret adatkiírás!";} else {$uzenet.="<br><span class=red>adatkiírási hiba: ".$outputdb->error."</span>";}
						
    		}
			break;
		case 'update':
			$nn=0;
			//print $uzenet;
			while ($row = $result->fetch_row()) {
						//$uzenet.="mezo tartalom<pre>".var_dump($row)."</pre>";
						$n=0; $text="";
        				//foreach ($row as $key=>$value) { if($n!=0){$text.=", '".$value."'";$n++;$uzenet.=$n.", ";} else {$text.="'".$value."'";$n++; $uzenet.=$n."; ";}}
						//$uzenet.="mező tartalom: ".$row[$mezo_szam]."<br>";
        				$nn=$n;
						$sel="UPDATE `".$t_name."` SET ".$_REQUEST['mezo_nev']." =\"".$row[$mezo_szam]."\"".$felt;
						$uzenet.=$sel."<br>";
						if($outputdb->query($sel)){$uzenet.="<br><span class=green><b>sikeret adatkiírás!</b></span>";} 
						else {$uzenet.="<br><span class=red>adatkiírási hiba: ".$outputdb->error."</span>";}
						
    		}
			break;
		default:
			
			break;
	}//switch
	error_reporting(null);
	if($_SERVER["DOCUMENT_ROOT"][0]=="C"){$logfile=$_SERVER["DOCUMENT_ROOT"]."szeiffert/protected/data/dbsyn_log.html";}else{$logfile=$_SERVER["DOCUMENT_ROOT"]."/protected/data/dbsyn_log.html";} 
	if(!$fw = fopen($logfile, "a")){$uzenet.="<br><span class=red>log fájl megnyitási hiba! "." ".$_SERVER["DOCUMENT_ROOT"]." ".$_SERVER["SCRIPT_NAME"]." ".$_SERVER["DOCUMENT_ROOT"][0]." </span>"; } 
	$uzenet.="<br>logfile: ".$logfile;
	$log="---------------- ".date("Y.m.d H:i:s")." --------\n";
	$log.=$uzenet;
	fwrite($fw,$log);
	fclose($fw);

}//if($muvelet)
}//if($felt_ok)	
}				
$mysqli_s = new mysqli('localhost', 'szeiffert', 'c2jb978NV969n4A', 'szeiffert');
$mysqli_s->set_charset("utf8");
$result=$mysqli_s->query('SELECT * FROM `'.$t_name.'` WHERE 1');
 $finfo = mysqli_fetch_fields($result);
$n=0;
foreach($finfo as $value){
        $head[$n]=$value->name;
		$n++;
		}
$rend=$result;
						
		/**
 * aktualisan következo id
 */
$m=1;$n=0;
	$n=0;
	while($value=$rend->fetch_row()){
		$szeiffert[$n]=$value;
		$n++;	
	}
mysqli_close($mysqli_s);
		
$mysqli = new mysqli('localhost', 'haziorvos', '2014Ho516', 'haziorvos');
$mysqli->set_charset("utf8");
$result=$mysqli->query('SELECT * FROM `'.$t_name.'` WHERE 1');
$rendhazi=$result;
$n=0; $hiany_haziorvos='';
/**
 * aktualisan következo id
 */
$m=1;$n=0;
while($value=$rendhazi->fetch_row()){
		$haziorvos[$n]=$value;
		$n++;	
	}
mysqli_close($mysqli);

		$this->render('proba',array('szeiffert'=>$szeiffert,'haziorvos'=>$haziorvos,'table_name'=>$table_name,
					'head'=>$head,'req'=>$req, 'uzenet'=>$uzenet));
		 }// actionProba vége
}// OrvosAlapadat Class
