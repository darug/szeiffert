<?php

class IngerekController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/main';
	private $inger_szelesseg;
	private $inger_start;
	private $inger_lepes;
	private $inger_szam;
	private $id_user;

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array('accessControl', // perform access control for CRUD operations
		'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array( array('allow', // allow all users to perform 'index' and 'view' actions
		'actions' => array(''), 'users' => array('*'), ), array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions' => array('meres', 'meres2', 'meres3', 'meres4','lista'), 'users' => array('@'), ), array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions' => array('meres5', 'meres6'), 'users' => array('Kari1', 'Kari'), ), array('allow', // allow admin user to perform 'admin' and 'delete' actions
		'actions' => array('create', 'update','admin', 'delete', 'teszt', 'ingkorr', 'atrak', 'meres5', 'meres6','lista'), 'users' => array('admin'), ), 
			array('deny', // deny all users
			'users' => array('*'), ), );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this -> render('view', array('model' => $this -> loadModel($id), ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Ingerek;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Ingerek'])) {
			$model -> attributes = $_POST['Ingerek'];
			if ($model -> save())
				$this -> redirect(array('view', 'id' => $model -> id));
		}

		$this -> render('create', array('model' => $model, ));
	}

	/**
	 * actionAtrak BVSC adatainak beépítése a meglévő adatbázisba
	 */
	public function actionAtrak() {
		$user = new User;
		$datasum = new DataSum;
		$this -> render('atrak', array('user' => $user, 'datasum' => $datasum, ));
	}

	/**
	 * Meres5 Egyenlőre a BVSC_AT versenyzőinek edzők által megnézhető összesítő grafikonn
	 * Később bővítendő más csoportokra is
	 */
	public function actionMeres5() {
		$users = new User();
		$user = $users -> findByPk(Yii::app() -> user -> getId());
		$autoríty = $user -> authority;
		switch ($autoríty) {
			case 50 :
				$csapat = 'BVSC_AT';
				break;
			case 99 :
				$csapat = '';
				$cs='';
				break;
			default :
				$csapat = 'XxXxX';
				break;
		}
		if ($csapat == '*') {
			$us_cs = "'csapat like :csapat', array(':csapat'=>$cs)";
		} else { 
			$us_cs = "'csapat like :csapat', array(':csapat'=>$csapat)";
		}
		//-----------------------------------------------------
		$model = new User('search');
		$model -> unsetAttributes();
		$model -> csapat = $csapat;
		// any filtering value that you want to apply
		$dataProvider = $model -> search($us_cs);
		///$this->render('index', array('dataProvider' => $dataProvider));

		//------------------------------------------------------
		$this -> render('meres5', array('uscs' => $us_cs, 'users' => $users, 'dataProvider' => $dataProvider, 'csapat' => $csapat, ));
	}

	/**
	 * meres3 meres utani részletes  eredmeny kijelzese
	 */ /* */
	public function actionMeres3() {
		//------------- szét választás $user->mestyp alapján
		$id = $_GET['id'];
		$data_sum = new DataSum();
		$ds = $data_sum -> findByPk($id);
		if ($ds === null)
			throw new CHttpException(404, 'A keresett eredmény nem található!');
		//Ok működik!
		$id_user = Yii::app() -> user -> getId();
		if ($id_user > 0 && $id_user != $ds -> id_user)
			throw new CHttpException(403, 'Ön nem a saját eredményét próbálta megnézni, ehhez nincs jogosultsága!!!');
		if ($id_user == 0 && $id_user != $ds -> id_user)
			$id_user = $ds -> id_user;
		$users = new User;
		$user = $users -> findByPk($id_user);
		$nev = $user -> veznev . " " . $user -> kernev;
		$m_szam = count($data_sum -> findAll('id_user=:id_user AND mertyp=:mertyp', array(':id_user' => $id_user, ':mertyp' => 1)));
		if ($user -> mesnum == $m_szam) {
			$meres_szam = $user -> mesnum;
			$link_enable = TRUE;
		} else {
			$meres_szam = $m_szam;
			$link_enable = FALSE;
		}
		$kar_szam = $user -> inger_szelesseg;
		$ing_szam = $_SESSION['ktc']['inger_szam'];
		//$user->inger_szam;
		$mer_ido = $user -> mestime;
		$szun_ido = $user -> pausetime;
		$mestyp = $ds -> mertyp;
		$data_sor = new DataSor();
		$dsor = $data_sor -> findAll('id_data_sum=:id_data_sum', array(':id_data_sum' => $ds -> id));
		$dscount = count($dsor) . "<br>";
		$sor = array();
		//		echo $dsor[0]['id']." ".$dsor[0]['inger_typ']." ".$dsor[0]['m_time']." ";
		//		echo $dsor[1]["id"];
		//		echo "<br>";
		$inger = new Ingerek();
		$ing = $inger -> findAll('inger_hossz=:inger_hossz', array(':inger_hossz' => $user -> inger_szelesseg));
		//------------------ezt kell átalakítani!!!--------------
		$inger_szam = $ds -> inger_szam;
		$inger_start = $ds -> inger_start;
		$inger_lepes = $ds -> inger_lepes;
		if ($inger_start >= 125) {$inger_start = $inger_start;
			$inger_lepes = -4 * $inger_lepes;
		} else {$inger_lepes = 4 * $inger_lepes;
		}
		$this -> inger_lepes = $inger_lepes;
		//	$_SESSION['ktc']['inger_start']=$inger_start;
		//	$_SESSION['ktc']['inger_lepes']=$inger_lepes;
		//		$ing=$model->findAll('inger_hossz=:inger_hossz',array(':inger_hossz'=>$user->inger_szelesseg));
		/*		$n=0;
		 $ujing=array();
		 $_SESSION['ktc']['inger_szam']=$user->inger_szam;
		 // TODO: temp, törölni ,mert csak teszthet van berakva!!!!!

		 //		$_SESSION['ktc']['inger_szam']=4;
		 */
		$n = 0;
		if ($inger_start < 125) {
			for ($i = $inger_start; $i < $inger_start + $user -> inger_szam / 4; $i++) {
				for ($j = $i * 4; $j <= $i * 4 + 3; $j++) {

					$ujing[$n]['inger'] = $ing[$j]['inger'];
					$ujing[$n]['inger_typ'] = $ing[$j]['inger_typ'];
					$n++;
				}

			}
		} else {
			for ($i = $inger_start; $i > $inger_start - $user -> inger_szam / 4; $i--) {
				for ($j = $i * 4 + 3; $j >= $i * 4; $j--) {

					$ujing[$n]['inger'] = $ing[$j]['inger'];
					$ujing[$n]['inger_typ'] = $ing[$j]['inger_typ'];
					$n++;
				}
			}
		}
		//--------------------------------------------------------------------
		for ($i = 0; $i < $dscount; $i++) {
			$sor[] = array($ujing[$i]['inger'], $dsor[$i]['inger_typ'], $dsor[$i]['m_time'], $dsor[$i]['cf'], $dsor[$i]['ff']);
		}
		//	print_r($sor); exit;
		$ri = $ds -> ri;
		$szoras = $ds -> szoras;
		$tcorr = $ds -> tcorr;
		$cf = $ds -> cf;
		$ff = $ds -> ff;
		switch($kar_szam) {
			case 1 :
				$H1 = 350;
				$H2 = 400;
				$H3 = 470;
				$H4 = 600;
				$H5 = 700;
				break;
			case 2 :
				$H1 = 550;
				$H2 = 600;
				$H3 = 700;
				$H4 = 800;
				$H5 = 900;
				break;
			case 4 :
				$H1 = 620;
				$H2 = 900;
				$H3 = 1050;
				$H4 = 1300;
				$H5 = 1400;
				break;
			case 6 :
				$H1 = 800;
				$H2 = 1100;
				$H3 = 1300;
				$H4 = 1650;
				$H5 = 1800;
				break;
			case 8 :
				$H1 = 1100;
				$H2 = 1350;
				$H3 = 1600;
				$H4 = 1900;
				$H5 = 2100;
				break;
		}
		if ($tcorr < $H1)
			$ertekel = "igen jó";
		if ($H1 <= $tcorr && $tcorr < $H2) {$ertekel = "jó";
		}
		if ($H2 <= $tcorr && $tcorr < $H3) {$ertekel = "közepes";
		}
		if ($H3 <= $tcorr && $tcorr < $H4) {$ertekel = "gyenge";
		}
		if ($H4 <= $tcorr) {$ertekel = "elégtelen";
		}
		$error_percent = 100 * ($cf + $ff) / $ing_szam;

		if (($cf + $ff) > 0.3 * $inger_szam)
			$ertekel = "<b>A nagy hibaarány miatt ( $error_percent %) nem értékelhető!</b>";
		$mini = $user -> mini;
		$maxi = $user -> maxi;
		$atl = $user -> atlag;
		$d_t = $ds -> lastmod;
		if ($tcorr > 0) {$percent = intval(100 * $atl / $tcorr);
		} else { $percent = 0;
		}
		$this -> render('meres3', array('nev' => $nev, 'meres_szam' => $user -> mesnum, 'dscount' => $dscount, 'sor' => $sor, 'kar_szam' => $kar_szam, 'ing_szam' => $ing_szam, 'mer_ido' => $mer_ido, 'szun_ido' => $szun_ido, 'meres_typ' => $ds -> mertyp, 'mestyp' => $mestyp, 'd_t' => $d_t, 'ri' => $ds -> ri, 'szoras' => $ds -> szoras, 'tcorr' => $ds -> tcorr, 'cf' => $ds -> cf, 'ff' => $ds -> ff, 'ertekel' => $ertekel, 'mini' => $user -> mini, 'maxi' => $user -> maxi, 'atl' => $user -> atlag, 'percent' => $percent, 'link_enable' => $link_enable, 'id' => $id, ));
	}

	/**
	 * meres2 meres utani osszegzo eredmeny kijelzes
	 */
	public function actionMeres2() {
		//------------- szét választás $user->mestyp alapján
		$id = $_GET['id'];
		$data_sum = new DataSum();
		$ds = $data_sum -> findByPk($id);
		if ($ds === null)
			throw new CHttpException(404, 'A keresett eredmény nem található!');
		//Ok működik!
		$id_user = Yii::app() -> user -> getId();
		if ($id_user > 0 && $id_user != $ds -> id_user)
			throw new CHttpException(403, 'Ön nem a saját eredményét próbálta megnézni, ehhez nincs jogosultsága!!!');
		if ($id_user == 0 && $id_user != $ds -> id_user)
			$id_user = $ds -> id_user;
		$users = new User;
		$user = $users -> findByPk($id_user);
		$nev = $user -> veznev . " " . $user -> kernev;
		$m_szam = count($data_sum -> findAll('id_user=:id_user AND mertyp=:mertyp', array(':id_user' => $id_user, ':mertyp' => 1)));
		if ($user -> mesnum == $m_szam) {
			$meres_szam = $user -> mesnum;
			$link_enable = TRUE;
		} else {
			$meres_szam = $m_szam;
			$link_enable = FALSE;
		}
		$kar_szam = $user -> inger_szelesseg;
		$ing_szam = $_SESSION['ktc']['inger_szam'];
		//$user->inger_szam;
		$mer_ido = $ds -> mestime;
		$szun_ido = $user -> pausetime;
		$mestyp = $ds -> mertyp;
		if (!$mestyp) {$meres_typ = "tanuló / gyakorló";
			$mestyp = 0;
		} else {$meres_typ = "valódi";
			$mestyp = 1;
			User::model() -> updateByPk($id_user, array('mestyp' => 0));
		}//beállítjuk a tanuló mérést, mert csak az lehet a következő mérés tipusa!											}
		$d_t = $ds -> lastmod;
		$ri = $ds -> ri;
		$szoras = $ds -> szoras;
		$tcorr = $ds -> tcorr;
		$cf = $ds -> cf;
		$ff = $ds -> ff;
		switch($kar_szam) {
			case 1 :
				$H1 = 350;
				$H2 = 400;
				$H3 = 470;
				$H4 = 600;
				$H5 = 700;
				break;
			case 2 :
				$H1 = 550;
				$H2 = 600;
				$H3 = 700;
				$H4 = 800;
				$H5 = 900;
				break;
			case 4 :
				$H1 = 620;
				$H2 = 900;
				$H3 = 1050;
				$H4 = 1300;
				$H5 = 1400;
				break;
			case 6 :
				$H1 = 800;
				$H2 = 1100;
				$H3 = 1300;
				$H4 = 1650;
				$H5 = 1800;
				break;
			case 8 :
				$H1 = 1100;
				$H2 = 1350;
				$H3 = 1600;
				$H4 = 1900;
				$H5 = 2100;
				break;
		}
		if ($tcorr < $H1)
			$ertekel = "igen jó";
		if ($H1 <= $tcorr && $tcorr < $H2) {$ertekel = "jó";
		}
		if ($H2 <= $tcorr && $tcorr < $H3) {$ertekel = "közepes";
		}
		if ($H3 <= $tcorr && $tcorr < $H4) {$ertekel = "gyenge";
		}
		if ($H4 <= $tcorr) {$ertekel = "elégtelen";
		}
		$error_percent = 100 * ($cf + $ff) / $ing_szam;
		if (($cf + $ff) > 0.3 * $ing_szam)
			$ertekel = "<b>A nagy hibaarány miatt ( $error_percent %) nem értékelhető!</b>";
		$mini = $user -> mini;
		$maxi = $user -> maxi;
		$atl = $user -> atlag;
		if ($tcorr > 0) {$percent = intval(100 * $atl / $tcorr);
		} else { $percent = 0;
		}
		//	if(!$mestyp && $ds->id_eredm<0){ $ds->delete($id); }
		$this -> render('meres2', array('nev' => $nev, 'meres_szam' => $meres_szam, 'kar_szam' => $kar_szam, 'ing_szam' => $ing_szam, 'mer_ido' => $mer_ido, 'szun_ido' => $szun_ido, 'meres_typ' => $meres_typ, 'mestyp' => $mestyp, 'd_t' => $d_t, 'ri' => $ri, 'szoras' => $szoras, 'tcorr' => $tcorr, 'cf' => $cf, 'ff' => $ff, 'ertekel' => $ertekel, 'mini' => $mini, 'maxi' => $maxi, 'atl' => $atl, 'percent' => $percent, 'link_enable' => $link_enable, 'id' => $id, ));
	}

	/**
	 * Creates a new meres.
	 * If creation is successful, the browser will be redirected to the 'thank' page.
	 */
	public function actionMeres() {

		$teszt = 0;
		//teszt alatt csak 4 db inger lesz!! tesztelés után 0-ra állítandó!
		$msz = 4;
		//tezt mérés során az ingewrek száma
		$atl0 = 4;
		// ha a mérsszá = vagy nagyobb megjelenik az átlag eredmény és a százalékos teljesítmény
		$id_user = Yii::app() -> user -> getId();
		if (isset($_REQUEST['mestyp'])) {
			User::model() -> updateByPk($id_user, array('mestyp' => $_REQUEST['mestyp']));
		}
		$model = new Ingerek;

		//???	if(isset($_REQUEST['mestyp'])){User::model()->updateByPk($id_user,array('mestyp'=>$_REQUEST['mestyp']));}
		$users = new User;
		$user = $users -> findByPk($id_user);
		$this -> id_user = $user -> id;

		$mestyp = $user -> mestyp;

		if (isset($_REQUEST['ered'])) {
			$eredmenyek = $_REQUEST['ered'];
			/*------------------teszteles --------------------------------
			 $handle = fopen("c:/temp/ajaxtest.txt", "a");

			 $i=1;
			 $cf=0;
			 $ff=0;
			 $sumtime=0;
			 $timenum=0;
			 $temp="";
			 foreach($eredmenyek as $key1=>$value1){
			 $temp.=" sorszam: ".$key1;
			 $temp.=" inger: ".$value1['i'];
			 $temp.=" ido: ".$value1['t'];
			 $temp.=" inger_typ: ".$value1['p'];
			 $temp.=" timenum: ".$timenum++;

			 if($value1['p'] && $value1['t']==0){//$data_sor->cf=1;
			 $temp.=" cf:".$cf++;}
			 if(!$value1['p'] && $value1['t']>0){//$data_sor->ff=1;
			 $temp.=" ff: ".$ff++;}
			 $temp.=" i: ".$i++."\n";
			 }
			 $temp.=" kesz:".$_REQUEST['kesz']."\n";
			 $temp.=date("Y.m.d H:i:s",time())."-----------------------\n";
			 fwrite($handle, $temp);
			 fclose($handle);

			 //------------------teszteles vege -------------------------------- */

			if ($mestyp) {// valódi mérés (52 vagy 100 az ingerszám!)
				//			$eredmenyek = $_REQUEST['eredmenyek'];
				//mentés
				$data_sum = new DataSum;
				//		echo "kovetkezo sor<br>"; exit;
				$data_sum -> id_user = $id_user;
				$data_sum -> inger_szelesseg = $user -> inger_szelesseg;
				$data_sum -> inger_start = $_SESSION['ktc']['inger_start'];
				$data_sum -> inger_lepes = $_SESSION['ktc']['inger_lepes'];
				$data_sum -> inger_szam = $_SESSION['ktc']['inger_szam'];
				$data_sum -> mertyp = $mestyp;
				$data_sum -> mestime = $user -> mestime;
				if ($data_sum -> insert()) {//echo "sikeres kiiras!!";
					$ds = $data_sum -> findall('id_user=:id_user', array(':id_user' => $id_user));

					foreach ($ds as $key => $value) {$lastid = $value['id'];
					}

					$i = 1;
					$cf = 0;
					$ff = 0;
					$sumtime = 0;
					$timenum = 0;
					foreach ($eredmenyek as $key1 => $value1) {
						$data_sor = new DataSor;
						$data_sor -> id_data_sum = $lastid;
						$data_sor -> inger_typ = $value1['p'];
						$data_sor -> m_time = $value1['t'];
						if ($value1['p'] && $value1['t'] > 0) {
							$data_sor -> cf = 0;
							$sumtime = $sumtime + $value1['t'];
							$timenum++;
						}
						if ($value1['p'] && $value1['t'] == 0) {$data_sor -> cf = 1;
							$cf++;
						}
						if (!$value1['p'] && $value1['t'] == 0) {$data_sor -> ff = 0;
						}
						if (!$value1['p'] && $value1['t'] > 0) {$data_sor -> ff = 1;
							$ff++;
						}
						if ($data_sor -> insert()) {/*echo "$i Sikeres data_sor kiírás<br>"*/;
						} else {/*echo $data_sor->error." $i hiba<br>"*/;
						}
						$i++;
					}
					$szoras2 = 0;
					$ri = intval($sumtime / $timenum);
					foreach ($eredmenyek as $key1 => $value1) {
						if ($value1['p'] && $value1['t'] > 0) {
							$szoras2 = $szoras2 + pow($value1['t'] - $ri, 2);
						}
					}
					$szoras = intval(sqrt($szoras2 / $timenum));
					$dsor = $data_sor -> find('id_data_sum=:id_data_sum', array(':id_data_sum' => $lastid));
					$id_eredm = $dsor -> id;
					$tcorr = $ri + intval($ri * ($cf + $ff) / $_SESSION['ktc']['inger_szam']);

					DataSum::model() -> updateByPk($lastid, array('ri' => $ri, 'szoras' => $szoras, 'cf' => $cf, 'ff' => $ff, 'id_eredm' => $id_eredm, 'tcorr' => $tcorr, ));

				}//if($data_sum->insert())
				else {/*echo "hiba"*/;
				}
				if ($user -> mesnum == $atl0) {
					$mini = $tcorr;
					$maxi = $tcorr;
					if (User::model() -> updateByPk($id_user, array('mini' => $mini, 'maxi' => $maxi, 'atlag' => $tcorr))) {/*echo "<br>mesnum=4 mentes sikerult!"*/;
					};
				}
				if ($user -> mesnum > $atl0) {
					if ($tcorr > 300) {
						$mini = min($user -> mini, $tcorr);
						$maxi = max($user -> maxi, $tcorr);
						$atlag = intval(0.95 * $user -> atlag + 0.05 * $tcorr);
						$mestime = intval(0.05 * $tcorr + 0.95 * $user -> mestime);
						if (User::model() -> updateByPk($id_user, array('mini' => $mini, 'maxi' => $maxi, 'atlag' => $atlag, 'mestime' => $mestime)))
							;
					}
				}
				if ($mestyp) { User::model() -> updateByPk($id_user, array('mesnum' => $user -> mesnum + 1, ));
				}
				$ds = $data_sum -> findall('id_user=:id_user', array(':id_user' => $id_user));

				foreach ($ds as $key => $value) {$lastid = $value['id'];
				}
				$id = $lastid;
			}// if($mestyp){ // valódi mérés (52 vagy 100 az ingerszám!)
			else {// tanulo meres feldolgozas -------------------------------------------------------------------------------------
				//--------------------------------- DataSum kitoltendő, de a mérés2.ben feldolgozáds után törlendő!
				// DataSar-t nem kell kitölteni
				//			$eredmenyek = $_REQUEST['ered'];
				//mentés
				$data_sum = new DataSum;
				//		echo "kovetkezo sor<br>"; exit;
				$data_sum -> id_user = $id_user;
				$data_sum -> inger_szelesseg = $user -> inger_szelesseg;
				$data_sum -> inger_start = $_SESSION['ktc']['inger_start'];
				$data_sum -> inger_lepes = $_SESSION['ktc']['inger_lepes'];
				$data_sum -> inger_szam = $_SESSION['ktc']['inger_szam'];
				$data_sum -> mertyp = $mestyp;
				$data_sum -> mestime = $user -> mestime;
				if ($data_sum -> insert()) {//echo "sikeres kiiras!!";
					$ds = $data_sum -> findall('id_user=:id_user', array(':id_user' => $id_user));

					foreach ($ds as $key => $value) {$lastid = $value['id'];
					}

					$i = 1;
					$cf = 0;
					$ff = 0;
					$sumtime = 0;
					$timenum = 0;
					foreach ($eredmenyek as $key1 => $value1) {
						if ($value1['p'] && $value1['t'] > 0) {
							$sumtime = $sumtime + $value1['t'];
							$timenum++;
						}
						if ($value1['p'] && $value1['t'] == 0) {//$data_sor->cf=1;
							$cf++;
						}
						if (!$value1['p'] && $value1['t'] > 0) {//$data_sor->ff=1;
							$ff++;
						}
						$i++;
					}
					$szoras2 = 0;
					$ri = intval($sumtime / $timenum);
					foreach ($eredmenyek as $key1 => $value1) {
						if ($value1['p'] && $value1['t'] > 0) {
							$szoras2 = $szoras2 + pow($value1['t'] - $ri, 2);
						}
					}
					$szoras = intval(sqrt($szoras2 / $timenum));
					//	$dsor=$data_sor->find('id_data_sum=:id_data_sum',array(':id_data_sum'=>$lastid));
					$id_eredm = -1;
					$tcorr = $ri + intval($ri * ($cf + $ff) / $_SESSION['ktc']['inger_szam']);

					DataSum::model() -> updateByPk($lastid, array('ri' => $ri, 'szoras' => $szoras, 'cf' => $cf, 'ff' => $ff, 'id_eredm' => $id_eredm, 'tcorr' => $tcorr, ));

				} else {/*echo "hiba";*/
				}

				$ds = $data_sum -> findall('id_user=:id_user', array(':id_user' => $id_user));

				foreach ($ds as $key => $value) {$lastid = $value['id'];
				}
				$id = $lastid;
				//---------------------------------------------------		adatbazis alapjan OK

			}// tanulo meres feldolgozas  vége-----------------------------------
			// összeállítjuk az URL-t, ahol az eredmények elérhetők
			$url = Yii::app() -> request -> baseUrl . "/index.php/ingerek/meres2?id=" . $id;
			$json = array("url" => $url);

			header('Content-type: application/json');
			echo json_encode($json);
			exit();
		}// if(isset($_REQUEST['ered']))

		if ($mestyp) {$meres_typ = "Valódi";
			$inger_szam = $user -> inger_szam;
		} else { $meres_typ = "Tanuló / gyakorló";
			$inger_szam = 20;
			$user -> inger_szam = 20;
		}
		if ($teszt) {$inger_szam = $msz;
			$user -> inger_szam = $msz;
		}// teszt eseten csak 4 db inger lesz!!!
		$_SESSION['ktc']['ingerszam'] = $inger_szam;
		$inger_start = intval(mt_rand(0, 249));
		// így biztosan kezdésre esik
		$this -> inger_start = $inger_start;
		$inger_lepes = intval(mt_rand(1, 4));
		//

		if ($inger_start >= 125) {$inger_start = $inger_start;
			$inger_lepes = -4 * $inger_lepes;
		} else {$inger_lepes = 4 * $inger_lepes;
		}
		// echo $inger_start."   ".$inger_lepes; exit;
		$this -> inger_lepes = $inger_lepes;
		$_SESSION['ktc']['inger_start'] = $inger_start;
		$_SESSION['ktc']['inger_lepes'] = $inger_lepes;
		$ing = $model -> findAll('inger_hossz=:inger_hossz', array(':inger_hossz' => $user -> inger_szelesseg));
		$n = 0;
		$ujing = array();
		$_SESSION['ktc']['inger_szam'] = $user -> inger_szam;
		// TODO: temp, törölni ,mert csak teszthez van berakva!!!!!
		//		$_SESSION['ktc']['inger_szam']=4;

		if ($inger_start < 125) {
			for ($i = $inger_start; $i < $inger_start + $user -> inger_szam / 4; $i++) {
				for ($j = $i * 4; $j <= $i * 4 + 3; $j++) {

					$ujing[$n]['inger'] = $ing[$j]['inger'];
					$ujing[$n]['inger_typ'] = $ing[$j]['inger_typ'];
					$n++;
				}

			}
		} else {
			for ($i = $inger_start; $i > $inger_start - $user -> inger_szam / 4; $i--) {
				for ($j = $i * 4 + 3; $j >= $i * 4; $j--) {

					$ujing[$n]['inger'] = $ing[$j]['inger'];
					$ujing[$n]['inger_typ'] = $ing[$j]['inger_typ'];
					$n++;
				}

			}
		}
		//	echo "<pre>".var_dump($ujing)."</pre>";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//!!! ez még átírásra vár!!----------------------------------------

		//!!--------------------eddig------------------------------------
		/**--------------- mérés engedélyezés ellenőrzés: OK, ha idősebb 18 évesnél vagy
		 * ha kevesebb mint 3-at mért ma és az idő 14 és 20:30 közé esik
		 */
		$szdate = $user -> szul_datum;
		date_default_timezone_set('Europe/Budapest');
		$datetime1 = new DateTime('now');
		$datetime2 = new DateTime($szdate);
		$interval = $datetime1 -> diff($datetime2);
		$datetime0 = new DateTime('2016-06-11');
		$kor = $interval -> y;
		$m_eng = True;
		$uzen = "";
		if ($kor < 18) {
			$ds = new DataSum();
			$dsc = $ds -> findAll('lastmod like :lastmod AND id_user=:id_user', array(':lastmod' => $datetime1 -> format('Y-m-d') . '%', ':id_user' => 0, ));
			$dscount = count($dsc);
			if ($dscount > 3) {
				$uzen = "Figyelem naponta csak 3 db mérés engedélyezett, Neked már $dscount mérésed van!!!<br>  ";
				$m_eng = False;
			}
			$ora = strval($datetime1 -> format('H'));
			if ($ora < 14 || $ora > 21) {
				$uzen .= "Figyelem a mérés csak 14 és 22 óra között engedélyezett!!!";
				$m_eng = False;
			}
			if (!$m_eng) { Yii::app() -> user -> setFlash('success', $ora);
			}
		}

		$mestime = $user -> mestime;
		$pausetime = $user -> pausetime;
		$clientvariables = array('mestime' => $mestime, 'ujing' => $ujing, 'pausetime' => $pausetime, 'baseurl' => Yii::app() -> request -> baseUrl, );

		$this -> render('meres', array('clientvariables' => json_encode($clientvariables), 'inger_hossz' => $user -> inger_szelesseg, 'inger_szam' => $inger_szam, 'user' => $user, 'inger_start' => $inger_start, 'inger_lepes' => $inger_lepes, //ebből most nincs kihasználva semmi , az inger star nagysága határozza meg az irányt!
		'mestyp' => $mestyp, 'meres_typ' => $meres_typ, 'mer_typ_bool' => $mestyp, 'meres_szam' => $user -> mesnum, 'kijel_ido' => $user -> mestime, 'uzen' => $uzen, 'm_eng' => $m_eng, ));
	}

	/**
	 * Meres4 Grafikus eredmény kijelző program
	 */
	public function actionMeres4($id) {

		$data_sum = new DataSum();
		$enable = False;
		$us = User::model() -> findByPk(Yii::app() -> user -> getId());
		$auth = $us -> authority;
		if ($auth == 50 || $auth == 99) {$enable = True;
		}
		if ($id > 0) {$id_user = $id;
		} else {	$id_user = Yii::app() -> user -> getId();
		}
		$users = new User;
		$user = $users -> findByPk($id_user);
		if ($enable || $user -> id == $id) {$enable = True;
		}
		if (!$enable) {
			throw new CHttpException(404, 'Ez az oldal Ön számára nem elérhető! ' . $auth . $id);
		}
		$nev = $user -> veznev . " " . $user -> kernev;
		$karszam = $user -> inger_szelesseg;
		$cim = "$nev $karszam karatkteres méréseinek diagramja";
		/*		$series="[{
		 name: 'Tokyo',
		 data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6,8.2]
		 }, {
		 name: 'New York',
		 data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5, 3.0]
		 }, {
		 name: 'Berlin',
		 data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,0.5]
		 }, {
		 name: 'London',
		 data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8,5.2]
		 }, {
		 name: 'Budapest',
		 data: [4.9, 5.2, 6.7, 9.5, 12.9, 15.2, 19.0, 20.6, 16.2, 14.3, 9.6, 5.8, 4.2]
		 },]";	*/
		$ds = $data_sum -> findAll('id_user=:id_user AND inger_szelesseg=:inger_szelesseg AND mertyp=:mertyp', array(':id_user' => $user -> id, ':inger_szelesseg' => $user -> inger_szelesseg, ':mertyp' => 1));
		$ds_count = count($ds);
		//	echo print_r($ds[0]['ri']);exit;

		$series = "[";
		/**/$series .= "{\nname: \"Inger kijelzési idő [msec]\",\ndata: [";
		for ($i = 0; $i < $ds_count; $i++) {
			$series .= $ds[$i]['mestime'] . '.0, ';
		}/* */
		$series .= "],},{\nname: \"Reakcióidő [msec]\",\ndata: [";
		for ($i = 0; $i < $ds_count; $i++) {
			$series .= $ds[$i]['ri'] . '.0, ';
		}
		$series .= "]},{\nname: \"Korrigált reakcióidő [msec]\",\ndata: [";
		for ($i = 0; $i < $ds_count; $i++) {
			$series .= $ds[$i]['tcorr'] . '.0, ';
		}
		$series .= "]},{\nname: \"Szórás\",\ndata: [";
		for ($i = 0; $i < $ds_count; $i++) {
			$series .= $ds[$i]['szoras'] . '.0, ';
		}
		$series .= "]},{\nname: \"Jó inger hibaszám [db]\",\ndata: [";
		for ($i = 0; $i < $ds_count; $i++) {
			$series .= $ds[$i]['cf'] . '.0, ';
		}
		$series .= "]},{\nname: \"Hibás inger hibaszám [db]\",\ndata: [";
		for ($i = 0; $i < $ds_count; $i++) {
			$series .= $ds[$i]['ff'] . '.0, ';
		}

		$series .= "]\n}]";
		//	echo $series;exit;
		//ez az utolsó
		$ido="";
		for ($i = 0; $i < $ds_count; $i++) {
			$ido .= '\''.$ds[$i]['lastmod'] . '\', ';
		}
		$this -> render('meres4', array('cim' => $cim, 'series' => $series, 'ido'=>$ido));
	}
/**
 * űrlapon bekéri a csoport nevet, kezdő és vég dátumot, listázási fzempontokat
 * 
 */
 public function actionLista()
	 {
	 	$user=new User();	
		$list_tc=null;
		$list_num=null;
		$req=null;
	 	if(isset($_REQUEST['ered']))
		{
			unset($list);
			$csapat=$_REQUEST['csapat'];
			//echo $csapat."<br>";
			$inger_szelesseg=$_REQUEST['inger_szelesseg'];
		//	echo $inger_szelesseg."<br>";
			$k_date=$_REQUEST['k_date'];
			$v_date=$_REQUEST['v_date'];
			$req=array('csapat'=>$csapat,'inger_szelesseg'=>$inger_szelesseg,'k_date'=>$k_date,'v_date'=>$v_date );
			$us=$user->findall('csapat=:csapat AND inger_szelesseg=:inger_szelesseg',array(
				':csapat'=>$csapat,
				':inger_szelesseg'=>$inger_szelesseg));
		//	echo count($us)."<br><br>";
			$dsum=new DataSum();
			$k=0;
			for($i=0;$i<count($us);$i++){
				$dsu=$dsum->findall('id_user=:id_user AND lastmod>=:k_date AND lastmod<=:v_date AND mertyp=:mertyp',array(
					':id_user'=>$us[$i]['id'],
					':k_date'=>$k_date,
					':v_date'=>$v_date,
					':mertyp'=>1));
					$cs=count($dsu);
					$tcorr_min=2000;
					if($cs){
						for($j=0;$j<$cs;$j++){
							if($dsu[$j]['tcorr']<$tcorr_min && 250<$dsu[$j]['tcorr']){
								$id_min=$j;
								$tcorr_min=$dsu[$j]['tcorr'];
							}
						}
		//			$min = $dsu->getMin($filter);
		//				echo $us[$i]['veznev']."  ".$us[$i]['kernev']."  ".$tcorr_min." ".
		////!!!					$dsu[$id_min]['cf']." ".$dsu[$id_min]['cf']." ".$cs."<br>";
						$list_tc[$k]=array($tcorr_min,$us[$i]['veznev']."  ".$us[$i]['kernev'],$dsu[$id_min]['cf'],$dsu[$id_min]['cf'],$cs);
						$list_num[$k]=array($cs,$us[$i]['veznev']."  ".$us[$i]['kernev'],$tcorr_min,$dsu[$id_min]['cf'],$dsu[$id_min]['cf']);
						$k++;	
					}	
			}
			if($list_tc==null){
				$list_tc[0]=array(" ","Egy mérés sem történt!",""," "," ");
				}
			else {	array_multisort($list_tc, SORT_ASC, SORT_REGULAR); }
			if($list_num==null){
				$list_num[0]=array(" ","Egy mérés sem történt!"," "," "," ");
				}
			else { array_multisort($list_num, SORT_DESC, SORT_REGULAR); }
			$log=fopen("protected/data/lista.csv","w"); /// log file handler
			date_default_timezone_set("Europe/Budapest");
			$loglist="Versenyzői eredmények,összehasonlító táblázata,,,\n\r";
			$loglist.="A listázás paraméterei:,,,,\n";
			$loglist.="Csapat név: ".$req['csapat'].",Inger hossz: ".$req['inger_szelesseg'].",Kezdő dátum: $k_date,Vég dátum: $v_date,\n\r";
			$loglist.=",,,,\n";
			$loglist.=",Név,Legjobb Tcorr (msec),Jó inger hibaszám,Rossz inger hibaszám,Mérések száma\n";
			for($i=0;$i<count($list_tc);$i++){
				$j=$i+1;
				$loglist.=$j.",".$list_tc[$i][1].",".$list_tc[$i][0].",".$list_tc[$i][2].",".$list_tc[$i][3].",".$list_tc[$i][4]."\n";
			}
			$loglist.=",Listázás ,a mérésszám ,csökkenő ,sorrendjében,-------------\n";
			for($i=0;$i<count($list_tc);$i++){
				$j=$i+1;
				$loglist.=$j.",".$list_num[$i][1].",".$list_num[$i][2].",".$list_num[$i][3].",".$list_num[$i][4].",".$list_num[$i][0]."\n";	
			}
			fwrite($log, $loglist);
			fclose($log);		
			//	array_multisort($list, SORT_ASC, , $array);
		/*			echo "<pre>";
					print_r($list); 
					print_r($req);
					echo "</pre>";
					echo $req['csapat'];	
			
			exit; */
			}
		$this->render('lista',array('user'=>$user,'list_tc'=>$list_tc,'list_num'=>$list_num,'req'=>$req));
	 }
	/**
	 * Teszt action a nem működő programrészek számára!!!!
	 * most mérés exit elötti részt vizsgálom -- OK--más célra felhasználható
	 */
	public function actionTeszt() {
		$atl0 = 4;
		$model = new Ingerek;
		$id_user = Yii::app() -> user -> getId();
		$users = new User;
		$user = $users -> findByPk($id_user);
		$this -> id_user = $user -> id;
		echo "user modelek megnyitva!";
		//ide jön a teszteléshez szükséges beállítások
		$tcorr = 987;
		echo "<br>Beallitasok megtortentek!";
		// ide jön a
		echo "<br>user->mesdnum: " . $user -> mesnum;
		if ($user -> mesnum > $atl0 && $tcorr > 300) {
			$mini = min($user -> mini, $tcorr);
			$maxi = max($user -> maxi, $tcorr);
			$atlag = intval(0.95 * $user -> atlag + 0.05 * $tcorr);
			$mestime = intval(0.05 * $tcorr + 0.95 * $user -> mestime);
			echo "<br>mini: $mini maxi: $maxi mestime: $mestime <br>";
			//	if(User::model()->updateByPk($id_user,array('mini'=>$mini,'maxi'=>$maxi,'atlag'=>$atlag,'mestime'=>$mestime))){echo "<br>mesnum>4 mentés sikerült!!!";};
		}

		echo "<br>A vizsgalt resz lefutott!!";
	}

	/**
	 * Ingerek korrigálása
	 */
	public function actionIngkorr() {
		$model = new Ingerek;
		$this -> render('ingkorr', array('model' => $model, ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this -> loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Ingerek'])) {
			$model -> attributes = $_POST['Ingerek'];
			if ($model -> save())
				$this -> redirect(array('view', 'id' => $model -> id));
		}

		$this -> render('update', array('model' => $model, ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this -> loadModel($id) -> delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Ingerek');
		$this -> render('index', array('dataProvider' => $dataProvider, ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Ingerek('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['Ingerek']))
			$model -> attributes = $_GET['Ingerek'];

		$this -> render('admin', array('model' => $model, ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ingerek the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Ingerek::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ingerek $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'ingerek-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}

}
