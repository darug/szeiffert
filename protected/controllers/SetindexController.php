<?php
/**
 * Kérdőív építő Controller
 */
class SetindexController extends Controller
{
	public $layout='//layouts/main';
	public $id_orvos;
	
/* public function __construct($id,$module=null){

		parent::__construct($id,$module);

		$this->setLayout();
	
	} /**/

		
	/**
	 * layout kiolvasása az orvos táblábol
	 */
/*	public function setLayout(){
      $orvos= new Orvos;
	  $rec=$orvos->findByPk(Yii::app()->params['orvos']);
	  $this->id_orvos=$rec->id;
	  $lay="//layouts/".$rec->layout;
	  if($rec){	  $this->layout = $lay; }
	 
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
     * Kérdőiív generálás
     */ 
  
  public function actionSetindex()
    {
    $this->render('config/setindex');
 }
 /**
  * Kérdőiv futtatás
  */
  
  public function actionPaci()
    {
    $this->render('paciens');
 	}
 }