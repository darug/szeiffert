<?php
/**
 * ContRendController
 * 
 * /
 
 /**
 * @brief ContRend => a Rendelői tartalmak vezérlője
 * 
 * A következő action-ok végrehajthatók:
 * <ul>
 * <li> index('name') amely a name + id_orvos egyedi record tartalmat küldi a browserre </li>
 * </ul> 
 **/

class ContRendController extends Controller
{
	public $layout='//layouts/main';
	
/**/ public function __construct($id,$module=null){

		parent::__construct($id,$module);

		$this->setLayout();
	
	} /**/

		
	/**
	 * @brief layout kiolvasása az orvos táblábol
	 */
/**/	public function setLayout(){
      $orvos= new Orvos;
	  $rec=$orvos->findByPk(Yii::app()->params['orvos']);
	  $lay="//layouts/".$rec->layout;
	  if($rec){	  $this->layout = $lay; }	 
	 } /**/
	 	
	public function actionIndex()
	{
		$this->render('index');
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
	*/

}
