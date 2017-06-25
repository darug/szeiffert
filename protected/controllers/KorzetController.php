<?php

class KorzetController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout ='//layouts/main';

	/* */
	public function __construct($id, $module = null) {

		parent::__construct($id, $module);

		$this -> setLayout();

	}/**/

	/**
	 * layout kiolvasása az orvos táblábol
	 */
	/**/
	public function setLayout() {
		$orvos = new Orvos;
		$rec = $orvos -> findByPk(Yii::app() -> params['orvos']);
		$lay = "//layouts/" . $rec -> layout;
		if ($rec) {	  $this -> layout = $lay;
		}

	}/**/

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array( 
			array('allow', // allow all users to perform 'index' and ... actions
		'		actions' => array('index','rendelo','keres'),
				'users' => array('*'), ), 
				);
	}

	/**
	 * Keres
	 * @param integer $irszam
	 * @param string $utca
	 */
	public function actionKeres() {

		//$orvos=Orvos::model()->findByPk(Yii::app()->params['orvos']);
		//$rendelo=Rendelo::model()->findByPk($orvos->id_rendelo);
		$model = new Korzet();
		$model -> unsetAttributes();
		// clear any default values
		unset($uzenet);
		/** $id_orvos helyett $irszam -ra szűr
		 * Ha csak egy rekord van és páros és páratlan kezdőszám üres, akkor $uzenet="ez a az utca teljes egészében a körzetemhez tartozik!",
		 * Ha csak egyik oldalon van számozás, akkor $uzenet="Ez az utca n.-tól m.-ig tartozik a körztemhez"
		 * Ha mindkét oldalon van szám, akkor $uzenet="Ez az utca n.-től m.-ig és x.-től y.ig tartozik a körzetemhez!"
		 * Ha több rekord került kijelzésre, akkor $uzenet="Kérem szükítse le egy utcára a keresést!"
		 * Ha a rekord szám nulla, akkor "Ez az utca nem tartozik a körzetemhez!"
		 * Jelenleg a lenti feltételek nem működnek, hogy miért az még nyomozásra vár
		 **/

		$uzenet = "";
		$color = "green";
		unset($record);

		 if(isset($_POST['Korzet'])){

		 $model->attributes=$_POST['Korzet'];
		 $criteria=new CDbCriteria();
 		 $criteria->compare('irszam',$model->irszam,true);
		 $criteria->compare('utca',$model->utca,true);
		 if($record=$model->findAll($criteria)){
		 //	$uzenet=count($record)." ".count($model->utca)."<br>";
//		 if($record=$model->findAll('utca=:utca AND irszam=:irszam', array(':utca'=>$model->utca,':irszam'=>$model->irszam))){
		 $k_id=array();
		 $k_irszam=array();
		 $k_szam_paros= array();
		 $v_szam_paros= array();
		 $k_szam_paratlan= array();
		 $v_szam_paratlan= array();
		 $k_utca = array();
		 $k_id_orvos= array();
		 $n=0;
		 foreach($record as $key => $utca){
		 $k_id[]=$utca->id;
		 $k_irszam[]=$utca->irszam;
		 $k_szam_paros[] = $utca->kezdo_szam_paros;
		 $v_szam_paros[] = $utca->veg_szam_paros;
		 $k_szam_paratlan[] = $utca->kezdo_szam_paratlan;
		 $v_szam_paratlan[] = $utca->veg_szam_paratlan;
		 $k_utca[]=$utca->utca;
		 $k_id_orvos[] = $utca->id_orvos;
		 $k_id_rendelo[]=$utca->id_rendelo;
		 $n++;
		 }
		 //	$uzenet.="megtalált utcák száma: ".$n."<br>";
		 if($n==1){$uzenet.= 'A keresett cím az alábbi háziorvoshoz tartozik : <br>';}
		 if($n>1&&$n<15){$uzenet.= 'A keresett cím az alábbi háziorvosokhoz tartozik : <br>';}
		 if($n>14){$uzenet.="Túl sok az orvos találat! Szükítse a keresést.";$color="red";}
		 $bUrl = Yii::app()->request->baseUrl;
		 for($i=0;$i<=$n;$i++){
		 	$orvos=Orvos::model()->findByPk($k_id_orvos[$i]);
		 	if($orvos>0 && count($record)<15){
		 		$uzenet.='<p class="blue"><a href="'.$bUrl.'/'.$k_id_orvos[$i].'/home">'.$orvos->name.' '.$orvos->orvos_megnev.'</a></p>';
		 		$cim=$k_irszam[$i].' '.$k_utca[$i].": ";
		 		if(strpos($v_szam_paros[$i],'gig') OR strpos($v_szam_paros[$i],'os') ){ 
					 $paros_veg="";
		 		}else{$paros_veg="-ig";}
		 		if(strpos($v_szam_paratlan[$i],'gig') OR strpos($v_szam_paratlan[$i],'os') ){
		 		$paratlan_veg="";
		 		}else{$paratlan_veg="-ig";}
		 		if($k_szam_paros[$i]>0 && $k_szam_paratlan[$i]>0){
		 			$uzenet.="<p class=\"green\">$cim Ez az utca a ".$k_szam_paratlan[$i].".-tól ".$v_szam_paratlan[$i].$paratlan_veg." és a "
		 				.$k_szam_paros[$i].".-tól ".$v_szam_paros[$i].$paros_veg." a körzetemhez tartozik!</p>";
		 		}
		 		elseif($k_szam_paros[$i]==="" && $k_szam_paratlan[$i]>="1"){
		 			$uzenet.="<p class=\"green\">$cim Ez az utca a ".$k_szam_paratlan[$i]."-tól ".$v_szam_paratlan[$i].$paratlan_veg." a körzetemhez tartozik!</p>";
		 		}
		 		elseif($k_szam_paros[$i]>="2" && $k_szam_paratlan[$i]===""){
		 			$uzenet.="<p class=\"green\">$cim Ez az utca a ".$k_szam_paros[$i]."-tól ".$v_szam_paros[$i].$paros_veg." a körzetemhez tartozik!</p>";
		 		}
		 		elseif($k_szam_paros[$i]==="" && $k_szam_paratlan[$i]===""){
		 			$uzenet.="<p class=\"green\">$cim Ez az utca teljes egészében a körzetemhez tartozik!</p>";
		 		}
		 else{

		 $uzenet="$cim Ez az utca egyik körzethez SEM TARTOZIK!";$color="red";

		 }
		 } //if $orvos
		 } //for
		 } //if findAll	
		 }//if(isset('korzet'))
/* */	 $criteria=new CDbCriteria();
		 $criteria->distinct=True;
		 $criteria->select='utca';
 		 $criteria->compare('irszam',$model->irszam,true);
		 $criteria->compare('utca',$model->utca,true);
		 $criteria->order='utca';
		 $utca_lista = array();
		 $irszam_lista = array();
		 $utcak = $model->findAll($criteria); $m=0;
		 foreach($utcak as $key => $utca){
		     $utca_lista[] = $utca->utca;
			 $m++;
		 } /* */
		 $json = json_encode($utca_lista);
		 
		 $criteria=new CDbCriteria();
		 $criteria->distinct=True;
		 $criteria->select='irszam';
 		 $criteria->compare('irszam',$model->irszam,true);
		 $criteria->compare('utca',$model->utca,true);
		 $criteria->order='irszam';
		
		  $irszamok = $model->findAll($criteria);
		 foreach($irszamok as $key => $utca){
			 if($utca->irszam>=1){$irszam_lista[] = $utca->irszam;}
		 }
		 $json1 = json_encode($irszam_lista);
	//	$uzenet.=$json1;
		$this -> render('keres', array(
				'model' => $model, 
				'rendelo' => $rendelo, 
				'utca_lista'=>$utca_lista,
				'uzenet' => $uzenet, 
				'record' => $record, 
				'color' => $color, 
				'n' => $n,
				'm' => $m,
				'json' => $json,
				'json1' => $json1, ));
      /*
	$this->render('keres',array('model'=>$model)); */
	} 

	/**
	 * Lists all models.
	 * 2015.11.07. DeGe. Bövítva, hogy az első karakter beütésekor is legyen legördülő lista
	 */
	public function actionIndex() {
		//$dataProvider=new CActiveDataProvider('Korzet');
		$model = new Korzet();
		$model -> unsetAttributes();
		$model->utca="";
		// clear any default values
		unset($uzenet);
		/** Ha csak egy rekord van és páros és páratlan kezdőszám üres, akkor $uzenet="ez a az utca teljes egészében a körzetemhez tartozik!",
		 * Ha csak egyik oldalon van számozás, akkor $uzenet="Ez az utca n.-tól m.-ig tartozik a körztemhez"
		 * Ha mindkét oldalon van szám, akkor $uzenet="Ez az utca n.-től m.-ig és x.-től y.ig tartozik a körzetemhez!"
		 * Ha több rekord került kijelzésre, akkor $uzenet="Kérem szükítse le egy utcára a keresést!"
		 * Ha a rekord szám nulla, akkor "Ez az utca nem tartozik a körzetemhez!"
		 * Jelenleg a lenti feltételek nem működnek, hogy miért az még nyomozásra vár
		 */

		$uzenet = "";
		$color = "green";
		$record = null;

		if (isset($_POST['Korzet'])) {

			$model -> attributes = $_POST['Korzet'];
			//	$record=$model->search();
			//	$record=$model->find('utca=:utca', array(':utca'=>$_POST['Korzet']['utca']));
			if ($record = $model -> find('utca=:utca AND id_orvos=:id_orvos', array(':utca' => $_POST['Korzet']['utca'], ':id_orvos' => Yii::app() -> params['orvos']))) {

				if ($record -> kezdo_szam_paros > 0 && $record -> kezdo_szam_paratlan > 0) {

					$uzenet = "Ez az utca a " . $record -> kezdo_szam_paratlan . ".-tól " . $record -> veg_szam_paratlan . ".-ig és a " . $record -> kezdo_szam_paros . ".-tól " . $record -> veg_szam_paros . ".-ig a körzetemhez tartozik!";

				}
				if ($record -> kezdo_szam_paros == "" && $record -> kezdo_szam_paratlan >= "1") {

					$uzenet = "Ez az utca a " . $record -> kezdo_szam_paratlan . "-tól " . $record -> veg_szam_paratlan . "-ig a körzetemhez tartozik!";

				}
				if ($record -> kezdo_szam_paros >= "2" && $record -> kezdo_szam_paratlan == "") {

					$uzenet = "Ez az utca a " . $record -> kezdo_szam_paros . "-tól " . $record -> veg_szam_paros . "-ig a körzetemhez tartozik!";

				}
				if ($record -> kezdo_szam_paros == "" && $record -> kezdo_szam_paratlan == "") {

					$uzenet = "Ez az utca teljes egészében a körzetemhez tartozik!";

				}

			} else {

				$uzenet = "Ez az utca NEM TARTOZIK a körzetemhez!";
				$color = "red";

			}
		}
//$uzenet.="<br>ezt módosítom!";
		$utca_lista = array();
	//	$utcak = $model -> findAll('id_orvos=:id_orvos', array(':id_orvos' => Yii::app() -> params['orvos']));
// 2015.11.07. ->
		 $criteria=new CDbCriteria();
		 $criteria->distinct=True;
		 $criteria->select='utca';
// 		 $criteria->compare('irszam',$model->irszam,true);
		 $criteria->compare('utca',$model->utca,true); //<- eddig beszúrva+ findalltartalom megváltoztatva	
		$utcak = $model -> findAll($criteria);
		foreach ($utcak as $key => $utca) {
			$utca_lista[] = $utca -> utca;
		}

		$json = json_encode($utca_lista);

		$this -> render('index', array('model' => $model, 'uzenet' => $uzenet, 'record' => $record, 'color' => $color, 'json' => $json));
	}  //actionIndex

	public function actionRendelo() {
		//$dataProvider=new CActiveDataProvider('Korzet');
		$model = new Korzet();
		$model -> unsetAttributes();
		// clear any default values
		unset($uzenet);
		/** Ha csak egy rekord van és páros és páratlan kezdőszám üres, akkor $uzenet="ez a az utca teljes egészében a körzetemhez tartozik!",
		 * Ha csak egyik oldalon van számozás, akkor $uzenet="Ez az utca n.-tól m.-ig tartozik a körztemhez"
		 * Ha mindkét oldalon van szám, akkor $uzenet="Ez az utca n.-től m.-ig és x.-től y.ig tartozik a körzetemhez!"
		 * Ha több rekord került kijelzésre, akkor $uzenet="Kérem szükítse le egy utcára a keresést!"
		 * Ha a rekord szám nulla, akkor "Ez az utca nem tartozik a körzetemhez!"
		 * Jelenleg a lenti feltételek nem működnek, hogy miért az még nyomozásra vár
		 **/

		$uzenet = "";
		$color = "green";
		$record = null;

		if (isset($_POST['Korzet'])) {

			$model -> attributes = $_POST['Korzet'];
			//	$record=$model->search();
			//	$record=$model->find('utca=:utca', array(':utca'=>$_POST['Korzet']['utca']));
			if ($record = $model -> find('utca=:utca AND id_orvos=:id_orvos', array(':utca' => $_POST['Korzet']['utca'], ':id_orvos' => Yii::app() -> params['orvos']))) {

				if ($record -> kezdo_szam_paros > 0 && $record -> kezdo_szam_paratlan > 0) {

					$uzenet = "Ez az utca a " . $record -> kezdo_szam_paratlan . ".-tól " . $record -> veg_szam_paratlan . ".-ig és a " . $record -> kezdo_szam_paros . ".-tól " . $record -> veg_szam_paros . ".-ig a körzetemhez tartozik!";

				}
				if ($record -> kezdo_szam_paros == "" && $record -> kezdo_szam_paratlan >= "1") {

					$uzenet = "Ez az utca a " . $record -> kezdo_szam_paratlan . "-tól " . $record -> veg_szam_paratlan . "-ig a körzetemhez tartozik!";

				}
				if ($record -> kezdo_szam_paros >= "2" && $record -> kezdo_szam_paratlan == "") {

					$uzenet = "Ez az utca a " . $record -> kezdo_szam_paros . "-tól " . $record -> veg_szam_paros . "-ig a körzetemhez tartozik!";

				}
				if ($record -> kezdo_szam_paros == "" && $record -> kezdo_szam_paratlan == "") {

					$uzenet = "Ez az utca teljes egészében a körzetemhez tartozik!";

				}

			} else {

				$uzenet = "Ez az utca NEM TARTOZIK a körzetemhez!";
				$color = "red";

			}
		}
		$utca_lista = array();
		$utcak = $model -> findAll('id_rendelo=:id_rendelo', array(':id_rendelo' => $id_rendelo,)); 
		foreach ($utcak as $key => $utca) {
			$utca_lista[] = $utca -> utca;
		}

		$json = json_encode($utca_lista);

		$this -> render('index', array('model' => $model, 'uzenet' => $uzenet, 'record' => $record, 'color' => $color, 'json' => $json));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Korzet('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['Korzet']))
			$model -> attributes = $_GET['Korzet'];

		$this -> render('admin', array('model' => $model, ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Korzet the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Korzet::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'A keresett tartalom nem található.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Korzet $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'korzet-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}

}
