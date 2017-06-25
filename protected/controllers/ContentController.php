<?php
/**
 * @class ContentController
 * 
 */
 
 /**
 * @brief Content => Kiírandó tartalmak vezérlője
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * <ul>
 * <li> index('name') amely a name + id_orvos egyedi record tartalmat küldi a browserre </li>
 * <li> home amely az index('home') + id_orvos tartalmat küldi a browserre </li>
 * <li> erreor amely hiba esetén hibaüzenetet küld </li>
 * </ul> 
 **/
 
class ContentController extends Controller
{
/** @var string $layout megjelenési környezet itt változtatható */
	public $layout='//layouts/main';
	
/**/ public function __construct($id,$module=null){

		parent::__construct($id,$module);

		$this->setLayout();
	
	} /**/

		
	/**
	 * @brief layout kiolvasása az orvos táblábol
	 */
	public function setLayout(){
      $orvos= new Orvos;
	  $rec=$orvos->findByPk(Yii::app()->params['orvos']);
	  
	  if($rec){$lay="//layouts/".$rec->layout;	  $this->layout = $lay; }
	 
	 } /**/
	/**
	 * @brief function Index 
	 * az átadott tartalmat jeleníti meg 
	 * 
	 * Ha az átadott tartalom =='home' és az nem létezik, akkor home0 megjenítése történik,
	 * home0 esetében a tartalom után a rendelési idó táblázat is kiírásra kerül, és elmarad a menüsor kiírása
	 *  (ez a view/layout/main-ben történik).
	 * Ha a keresett tartalom nem található, hibaüzetet kerül elküldésre.
	 * 
	 */	
	public function actionIndex()
	{
		$name = Yii::app()->getRequest()->getQuery('name');
		$this->getContent($name);		
	}
	
	public function actionHome(){
		
		$this->getContent('home');
		
	}
	/**
	 * Átírányítja az indexoldalra az alábbiak szerint:
	 * - ha létezik a tartalom, akkor azt és a name (oldal cím) jelenik meg;
	 * - ha home a keresett tartalom, de az orvosnál csak a home0 létezik akkor annak és a rendelési idő táblázatnak a tartalmát jeleníti meg;
	 * - ha a name első karaktare=="0", akkor a id_orvos=0 -nál keresi a tartalmat és azt jeleníti meg (ezzel csökkenthető az azonos tartalmak helyfoglalása!)
	 */
	public function getContent($name){
		$content = Content::model()->find(array(
		    'condition'=>'name=:name AND id_orvos=:id_orvos',
		    'params'=>array(':name'=>$name, ':id_orvos'=>Yii::app()->params['orvos'])
		));
		if($content === NULL && $name=="home"){
			$name='home0';
			Yii::app()->params['cont_name']='home0';
			$this->getContent('home0');
		//	$this->render('home0');
			exit;
			}
		if(substr($name,0,1)=="0"){
		$content = Content::model()->find(array(
		    'condition'=>'name=:name AND id_orvos=:id_orvos',
		    'params'=>array(':name'=>$name, ':id_orvos'=>0)));
		}
		if($content === NULL) throw new CHttpException(404, "A keresett \"content\" tartalom nem található!");
		if($name=="home0"){
			$model=new Rendelesiido;
		} else {unset($model);}
		if(isset($model)){$this->render('index', array('content' => $content,'model'=>$model,'nev'=>$name));} 
				else {$this->render('index', array('content' => $content,'nev'=>$name));}
		
	}
	
	/**
	 * @brief This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
 * @brief rendelési idő beszúrás a meghívott helyre
 */
 	public function actionRido()
	{
		$model = new Rendelesiido();
		$this->renderPartial('Rido', array('model'=>$model));
	}

}
/** @} */