<?php

class RendelesiidoController extends Controller
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
	 	
	public function actionRendelesiido()
	{
		$model = new Rendelesiido();
		$this->render('Rendelesiido', array('model'=>$model));
	}

}