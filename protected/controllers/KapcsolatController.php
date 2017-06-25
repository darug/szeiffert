<?php
/**
 * KapcsolatController
 * 
 * /
 
 /**
 * @brief Kapcsolat => Kapcsolat oldal vezérlője
 * 
 * A következő action-ok végrehajthatók:
 * <ul>
 * <li> kapcsolat() amely kiírja a lényeges adatokat és lehetőséget biztosít üzenetküldésre </li>
 * <li> action() CAPTCHA image displayed on the contact page </li>
 * </ul> 
 **/

class KapcsolatController extends Controller
{
	public $layout='//layouts/main';
	public $id_orvos;
	
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
	  
	  
	  if($rec){$lay="//layouts/".$rec->layout;
	  		$this->id_orvos=$rec->id;
	  	 	$this->layout = $lay; }
	 
	 } /**/
	 	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	/**
	 * Kapcsolat oldalon kiirja az adatokat, veszi az uzenetet, amelyet a kapcsolat adatbázisba rak és emaileni elkuld
	 * a fogadó emailcím csak akkor az orvosé, ha az email_oldal létetik és a email_oldal_nev=="OK"
	 * különben params('adminEmail') címre megy!
	 */
	public function actionKapcsolat()
{	
    $model=new Kapcsolat;
	/** Beszúrva 2015.11.07. DeGE */
	$content = Content::model()->find(array(
		    'condition'=>'name=:name AND id_orvos=:id_orvos',
		    'params'=>array(':name'=>'elerhetoseg',':id_orvos'=>$this->id_orvos),));
	/** Eddig -> */			
		if(isset($_POST['Kapcsolat']))
		{
			$model->attributes=$_POST['Kapcsolat'];
			$model->lastmod=date('Y-m-d H:i:s',time());
			
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject." [id: ".$this->id_orvos."honlap: ".$_SERVER["HTTP_REFERER"]." ]").'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";
	//Alapértelmezett Yii::app()->params['adminEmail'], orvos, ha email_oldal létezik és email_oldal_nev=="OK"
	//print $model->config('email_oldal')." ".$model->config('oldalnev'); exit;
				if($model->config('email_oldal')>"" && $model->config('oldalnev')=="OK"){
						$emailaddress=$model->config('email_oldal');	} 
				else {
						$emailaddress=Yii::app()->params['adminEmail'];	
						}
				mail($emailaddress,$subject,$model->body,$headers);
				
				//ide jönne a mentes az adatbazisba
				$model->id_orvos=Yii::app()->params['orvos'];
				$model->email_to=$emailaddress;
				if($model->save()){
						Yii::app()->user->setFlash('contact','Köszönjük a megkeresést. Amint lehetséges válaszolunk!');
				} else {
						Yii::app()->user->setFlash('contact', 'Adatbázis mentési hiba <pre> '.$name."<br> ".print_r($_POST['Kapcsolat'])."</pre>");
				}
				$this->refresh();
			}
		}
    
    $this->render('kapcsolat',array('model'=>$model,  // alábbi sor beszúrva 2015.11.07 DeGe
    								'content'=>$content));
}	
	

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/ /** @} */
}