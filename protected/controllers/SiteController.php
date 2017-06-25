<?php

class SiteController extends Controller
{
	
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
	  
	  if($rec){$lay="//layouts/".$rec->layout;	  $this->layout = $lay; }
	 
	 } /**/	 
	  
	  /**
	 * Declares class-based actions.
	 */

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

		 public function actionAthelyezendo()
	{
		$this->render('athelyezendo');
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
			//$record=Content::model()->findByAttributes(array('contact_finish'=>'index'));//a home helyére a megfelelő name írandó
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		/*$url = Yii::app()->getRequest()->getQuery('url');
		
		$content = Content::model()->find(array(
		    'condition'=>'url=:url',
		    'params'=>array(':url'=>$url)
		));
		if($content === NULL){
			$content = Content::model()->find(array(
		    'condition'=>'url=:url',
		    'params'=>array(':url'=>'home')
		));} 
		if($content === NULL) throw new CHttpException(404, "A keresett tartalom nem található");
		$this->render('index', array('record' => $content));*/
		$this->render('index');
	}
/**
 *  Adatvédelmi nyilatkozat kiírása
 */
	public function actionAvnyil()
	{
				$error="";	
				$this->render('pages/av',$error);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$error=$error."--SiteController";
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
    /**
     * paciens setindex
     */
    public function actionSetindex()
    {
        $this->render('paciens/config/setindex');
    }
	/**
     * paciens paciens
     */
    public function actionPaciens()
    {
        $this->render('paciens/paciens');
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
		$this -> render('images',$kp);
		}
	/**
	 * Keresési lehetőségek kijelzése
	 * mindenki számára elérhető
	 */
	public function actionKeres()
	{
		//ide jön az összesítő számok meghatározása
		$orvos= new Orvos;
		// teljes az utca adatbázis szám:
		$orvos_korzet_ok=$orvos->findAll('status=:status',array(':status'=>'OK'));
		$korzet_szam=count($orvos_korzet_ok);
		//rendelői irányítószámok száma:
		//$query="SELECT  DISTINCT(`irszam`) as `irszam` FROM `rendelo` WHERE 1"
		$irszam_szam=Rendelo::model()->findAll(array(
   			'select'=>'t.irszam',
    		'distinct'=>true,
			)); 
		$rendelo_szam=Rendelo::model()->findall();	
		$orvos_szam=$orvos->findall();
		$this->render('keres',array('irszam_szam'=>$irszam_szam,
									'rendelo_szam'=>$rendelo_szam,
									'orvos_szam'=>$orvos_szam,
									'orvos_korzet_ok'=>$orvos_korzet_ok));
	}
	
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Köszönjük a megkeresést. Amint lehetséges válaszolunk!');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}  */

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}