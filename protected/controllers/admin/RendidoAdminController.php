<?php
/**
 * admin/RendidoAdminController
 * @class RendidoAdminController
 * 
 */
 
 /**
 * @brief admin/RenidoAdmin => Rendido (rendelési idő) tábla karbantartás
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * - index(), amely az id_orvos egyedi record tartalmat listázza (admin esetében a teljes tartalmat!)
 * - update($id), amely az adott rekord tartalmat módosíthatja
 * - create(), amely új rekord tartalmat hoz létre 
 * - delete($id), amely az adott rekord tartalmat törli 
 * 
 **/
class RendidoAdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/admin';
	public $orvos;
	
	public $module_info = array(
		'name'				=>	'Rendido',
		'title'				=>	'Rendelési idő',
	//	'new'				=>	'rendelési idő'
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
				'actions'=>array('index','update','create','delete','javit'),
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
		$model=new Rendido;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rendido']))
		{
			$model->attributes=$_POST['Rendido'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
			//	$this->redirect($this->createAbsoluteUrl($this->uniqueid));
				$this->redirect('index');
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionJavit()
	{
		$orvos=new Orvos;
		$orv=$orvos->findAll();	
		$rendido=new Rendido;
		$lista="indul:<br>";
		$n=0;
		$id_list=array();
		foreach ($orv as  $key=>$value) {
				$id=$value['id'];
			//	$lista.=$id."= ";
				$rido=$rendido->findAll('id_orvos=:id_orvos', array(':id_orvos'=>$id));
				 $bad=False;
				 $n=1;
				 $mezok="";
				foreach ($rido as $key1 => $value1) {
					 $napszak=$value1['name'];
					
					switch ($napszak) {
						case '1de':
						case '1du':
						case '2de':
						case '2du':
						case '3de':
						case '3du':
						case '4de':
						case '4du': 
							if($value1['start']=="" 
								&& $value1['stop']=="" 
								&& $value1['comment']>""
					){$bad=True;}
			//		$lista.=$id."/ $n , $napszak= ".$value1['start'].":: ";
							$mezok.=$n." id:".$value1['id']." ".$value1['comment'].", ";
							$id_list[]=$value1['id'];	
							$n++;	
										
							break;
						default:
					}
					
				} // foreach($rido)			
			if($bad)
			{$lista.=$id."<br>";
	//	 $lista.=$rido[$n-13]['1de']." hétfő ".$rido[$n-13]['1du']." ".$rido[$n-13]['comment']."<br>";}
			$lista.=$mezok."<br>";}
			//$n , $napszak= "; }
			} // foreach($orv)
			$rido=$rendido->findByPk(2248);
			$lista.="<br>".$rido->id." ".$rido->name.$rido->start." ".$rido->stop." ".$rido->comment." ";
			$lista.="<br>javítás start:".substr($rido->comment, 0,5)." stop:".substr($rido->comment, 6,5)."<br>";
			foreach($id_list as $id){
			//	$lista.=$id.", ";
			}
/* A továbbiakban kézzel kell beállítani a javítási határokat és esetleg a programon is változtatni kell a commant tartalom függvényében!!!*/
		$id_start=2248;
		$id_stop=2913;
		$m=0;
		$rossz=0;
		$lista.="<br>----------------------";

		foreach ($id_list as  $id) {
/************* ok kijavította legközelebb ezt a megjegyzést kell kivenni!!					
			if($id>=$id_start && $id<=$id_stop){
				$rido=$rendido->findByPk($id);		
				if(strpos($rido->name,'de') && 5<intval($rido->comment) &&	intval($rido->comment) <12 ){
					$rido->start=substr($rido->comment, 0,5);
					$rido->stop=substr($rido->comment, 6,5);
					$rido->comment="";
					if($rido->update()){$m++;}else{$rossz++;}
					//$lista.="<br>$id ".$rido->name." ".$rido->start." ".$rido->stop." ".intval($rido->comment);
				} else {//$lista.="<br>$id ".$rido->name." törlendő: ".$rido->comment;
						}
				if(strpos($rido->name,'du') && 11<intval($rido->comment) && intval($rido->comment) <20){
					$rido=$rendido->findByPk($id);
					$rido->start=substr($rido->comment, 0,5);
					$rido->stop=substr($rido->comment, 6,5);
					$rido->comment="";
					//if($rido->update()){$m++;}else{$rossz++;}
					$lista.="<br>$id ".$rido->name." ".$rido->start." ".$rido->stop." ".intval($rido->comment);
				}  else {//$lista.="<br>$id ".$rido->name." törlendő: ".$rido->comment;
						}
			    $rido->comment="";
				if($rido->update()){$m++;}else{$rossz++;}
			} ----> ezt is!!*/
		}
		$lista.="<br> sikeresen mentett rekordok száma:$m, sikertelen mentések száma:$rossz";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rendido']))
		{
			$model->attributes=$_POST['Rendido'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
			//	$this->redirect($this->createAbsoluteUrl($this->uniqueid));
				$this->redirect('index');
			}
			else{
				
				Yii::app()->user->setFlash('error', 'Hibásan kitöltött űrlap.');
				
			}
			
		}
		
		$this->module_info['item'] = "Rossz rendelési idők, listázása, javítása";
		
		$this->render('javit',array(
			'lista'=>$lista,
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

		if(isset($_POST['Rendido']))
		{
			$model->attributes=$_POST['Rendido'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			if($model->save()){
				
				Yii::app()->user->setFlash('success', 'A változtatások mentésre kerültek.');
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
					//	$dataProvider=new CActiveDataProvider('Rendido');}
					$dataProvider=Rendido::model()->search();}
					else{
						$dataProvider=Rendido::model()->search();
					}
		//$dataProvider=new CActiveDataProvider('Rendido');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rendido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rendido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Rendido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rendido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
