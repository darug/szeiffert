<?php

class RendeloController extends Controller
{
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';
	
/**/ public function __construct($id,$module=null){

		parent::__construct($id,$module);

		$this->setLayout();
	
	} /**/

	/**
	 * layout kiolvasása az orvos táblábol
	 */
/**/	public function setLayout(){
      $orvos= new Orvos;
	  $rec=$orvos->findByPk(Yii::app()->params['orvos']);
	  $lay="//layouts/".$rec->layout;
	  if($rec){	  $this->layout = $lay; }
	 
	 } /**/

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','rendelo','keres','orvosok'),
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
	 * Keres action: kiirja a rendelő címeket egyenlőre
	 */
	 public function actionKeres()
	 {
	 	
		
		$model=new Rendelo();
	 	/*$dataProvider= new CActiveDataProvider('Rendelo',array(
											'criteria'=>array(
        										'condition'=>'rend_nev >=:rend_nev',
        										'params'=>array(':rend_nev'=>$rend_nev),
        										'order'=>'rend_nev',),
		) );*/
		if(isset($_POST['Rendelo'])){$model->attributes =$_POST['Rendelo'];}
		$dataProvider=$model->search();
		if($dataProvider===null){$dataProvider= new CDataProvider('Rendelo');}
		
		$this->render('keres',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	 }
	 /**
	  * Orvosok meghívása a keres-ből, a rendelőhöz tartozó orvosokat listázza ki
	  */
	 public function actionOrvosok($id)
	 {
	 	$rendelo=Rendelo::model()->findByPk($id);
		$rend_nev=$rendelo->rend_nev;
	 	$records=Orvos::model()->findAll('id_rendelo=:id_rendelo', array(':id_rendelo'=>$id));
		$n=0;
		$id=array();
		$nev=array();
		$szak_megnevezes=array();
		foreach($records as $key => $value){
			$id[$n]=$value->id;
			$nev[$n]=$value->name;
			$szak_megnevezes[$n]=$value->orvos_megnev;
			$n++;
		} 
		$this->render('orvosok',array(
								'id'=>$id,
								'nev' => $nev,
								'szak_megnevezes' => $szak_megnevezes,
								'rendelo'=>$rendelo));
	 }
	/**
	
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Korzet')
		$orvos=Orvos::model()->findByPk(Yii::app()->params['orvos']);
		$rendelo=Rendelo::model()->findByPk($orvos->id_rendelo);
		$model=new Korzet();
		$model->unsetAttributes();  // clear any default values
		unset($uzenet);
		/** Ha csak egy rekord van és páros és páratlan kezdőszám üres, akkor $uzenet="ez a az utca teljes egészében a körzetemhez tartozik!",
		 * Ha csak egyik oldalon van számozás, akkor $uzenet="Ez az utca n.-tól m.-ig tartozik a körztemhez"
		 * Ha mindkét oldalon van szám, akkor $uzenet="Ez az utca n.-től m.-ig és x.-től y.ig tartozik a körzetemhez!"
		 * Ha több rekord került kijelzésre, akkor $uzenet="Kérem szükítse le egy utcára a keresést!"
		 * Ha a rekord szám nulla, akkor "Ez az utca nem tartozik a körzetemhez!"
		 * Jelenleg a lenti feltételek nem működnek, hogy miért az még nyomozásra vár
		 **/
		 
		$uzenet="";
		$color="green";
		$record = null;
		
		if(isset($_POST['Korzet'])){
		
				$model->attributes=$_POST['Korzet'];
			//	$record=$model->search();
			//	$record=$model->find('utca=:utca', array(':utca'=>$_POST['Korzet']['utca']));
			if($record=$model->findAll('utca=:utca AND id_rendelo=:id_rendelo', array(
					':utca'=>$_POST['Korzet']['utca'],
					':id_rendelo'=>$rendelo->id)
					)){
					$k_szam_paros= array();
					$v_szam_paros= array();
					$k_szam_paratlan= array();
					$v_szam_paratlan= array();
					$k_id_orvos= array();
					$n=0;	
					foreach($record as $key => $utca){
						$k_szam_paros[] = $utca->kezdo_szam_paros;
						$v_szam_paros[] = $utca->veg_szam_paros;
						$k_szam_paratlan[] = $utca->kezdo_szam_paratlan;
						$v_szam_paratlan[] = $utca->veg_szam_paratlan;
						$k_id_orvos[] = $utca->id_orvos;
						$n++;
					}
				//	$uzenet.="megtalált utcák száma: ".$n."<br>";
				    if($n==1){$uzenet.= 'A keresett cím az alábbi háziorvoshoz tartozik : <br>';}
					if($n>1){$uzenet.= 'A keresett cím az alábbi háziorvosokhoz tartozik : <br>';} 
					$bUrl = Yii::app()->request->baseUrl;
					for($i=0;$i<=$n;$i++){
						if(strpos($v_szam_paros[$i],'gig') OR strpos($v_szam_paros[$i],'os') ){
							$paros_veg="";
						}else{$paros_veg="-ig";}
						if(strpos($v_szam_paratlan[$i],'gig') OR strpos($v_szam_paratlan[$i],'os') ){
							$paratlan_veg="";
						}else{$paratlan_veg="-ig";}
						if($k_szam_paros[$i]>0 && $k_szam_paratlan[$i]>0){
							$orvos=Orvos::model()->findByPk($k_id_orvos[$i]);
							$uzenet.='<p class="blue"><a href="'.$bUrl.'/'.$k_id_orvos[$i].'/home">'.$orvos->name.' '.$orvos->orvos_megnev.'</a></p>';
							$uzenet.="<p class=\"green\">Ez az utca a ".$k_szam_paratlan[$i].".-tól ".$v_szam_paratlan[$i].$paratlan_veg." és a "
							.$k_szam_paros[$i].".-tól ".$v_szam_paros[$i].$paros_veg." a körzetemhez tartozik!</p>";
						}
						elseif($k_szam_paros[$i]==="" && $k_szam_paratlan[$i]>="1"){
							$orvos=Orvos::model()->findByPk($k_id_orvos[$i]);
							$uzenet.='<p class="blue"><a href="'.$bUrl.'/'.$k_id_orvos[$i].'/home">'.$orvos->name.' '.$orvos->orvos_megnev.'</a></p>';
							$uzenet.="<p class=\"green\">Ez az utca a ".$k_szam_paratlan[$i]."-tól ".$v_szam_paratlan[$i].$paratlan_veg." a körzetemhez tartozik!</p>";
						}
						elseif($k_szam_paros[$i]>="2" && $k_szam_paratlan[$i]===""){
							$orvos=Orvos::model()->findByPk($k_id_orvos[$i]);
							$uzenet.='<p class="blue"><a href="'.$bUrl.'/'.$k_id_orvos[$i].'/home">'.$orvos->name.' '.$orvos->orvos_megnev.'</a></p>';	
							$uzenet.="<p class=\"green\">Ez az utca a ".$k_szam_paros[$i]."-tól ".$v_szam_paros[$i].$paros_veg." a körzetemhez tartozik!</p>";
						}
						elseif($k_szam_paros[$i]==="" && $k_szam_paratlan[$i]===""){
							$orvos=Orvos::model()->findByPk($k_id_orvos[$i]);
							$uzenet.='<p class="green"><a href="'.$bUrl.'/'.$k_id_orvos[$i].'/home">'.$orvos->name.' '.$orvos->orvos_megnev.'</a></p>';
						$uzenet.="<p class=\"green\">Ez az utca teljes egészében a körzetemhez tartozik!</p>";
						}
					}
				}
			else{
				
				$uzenet="Ez az utca egyik körzethez SEM TARTOZIK!";$color="red";
				
			} 
		}
//'select'=>'t.Genus, t.Id',
//    'distinct'=>true,
		$criteria=new CDbCriteria();
		$criteria->distinct=True;
		$criteria->select='utca, id_rendelo';
		$criteria->compare('id_rendelo',$id_rendelo,true);
		$utca_lista = array();
		$utcak = $model->findAll($criteria);
		foreach($utcak as $key => $utca){
		$utca_lista[] = $utca->utca;
		}
		
		$json = json_encode($utca_lista);

		$this->render('index',array(
			'model'=>$model,
			'rendelo'=>$rendelo,
			'uzenet'=>$uzenet,
			'record'=>$record,
			'color' =>$color,
			'json'	=> $json
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rendelo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rendelo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
