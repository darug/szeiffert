<?php
/**
 * admin/ImagesAdminController
 * @class ImagesAdminController
 * 
 */
 
 /**
 * @brief admin/ImagesAdmin => Képek könyvtár karbantartása
 * 
 * <b>A következő action-ok végrehajthatók:</b>
 * - index(), amely az id_orvos egyedi könyvtár tartalmat listázza (admin esetében a teljes tartalmat!)
 * - delete($id), amely az adott rekord tartalmat törli 
 * 
 **/
class ImagesAdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/admin';
	public $orvos;

	public $module_info = array(
		'name'				=>	'images',
		'title'				=>	'Képek könyvtár ellenőrzése',
		'new'				=>	''
	);


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
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
	public function actionDelete($id)
	{ //ide jon a file törlese
		$burl=Yii::app()->request->baseUrl;
		$ido=Yii::app()->params['orvos']."/";
		$di=$_SERVER["DOCUMENT_ROOT"];
		$di.=$burl."/images/".$ido.$id;
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(unlink($di)){
			
			Yii::app()->user->setFlash('success', 'Sikeres törlés.');
			$this->redirect($this->createAbsoluteUrl($this->uniqueid));
			
		} else {
			Yii::app()->user->setFlash('error', 'A törlés nem sikerült!');
			$this->redirect($this->createAbsoluteUrl($this->uniqueid));
		}
	}

}
