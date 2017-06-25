<?php

class SiteController extends Controller
{
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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
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
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=[ktc]';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Üzenetét köszönettel vettem, igyekszem mielőbb válaszolni.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

 /**
 * login with MySQL user table
 *
public function actionLogin()
	{
		$model=new User('login');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='User')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
		//		echo "93. sor"; exit;
			// validate user input and redirect to the previous page if valid
			if($model->validate() ){
		//	if($model->validate() && $errorCode=$model->login()){
			
				Yii::app()->user->setFlash('success', 'Sikeres bejelentkezés.');
				$rec=User::model()->find('username=:username',array(':username'=>$model->username));
		//		$_SESSION['ho']['orvos']=$rec->id_orvos;
				$this->redirect(Yii::app()->getBaseUrl(true) .'/ingerek/meres');
			
			}
			else{
				Yii::app()->user->setFlash('error', 'Hibás felhasználói név vagy jelszó. ');
				
			}
		}
		
		// display the login form
		$this->render('login',array('model'=>$model));
	}
/**/
	/**
	 * Displays the login page
	* mysql nélküli!!!!!!!!!!!!!!!!!!!!!
	 * logolás berakva 2016.10.16.
	 */
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
			if($model->validate() && $model->login()){
				$log=fopen("protected/data/log.html","a"); /// log file handler
				date_default_timezone_set("Europe/Budapest");
				$logsor="<br>Bejelentekezes: ".date('Y-m-d H:i:s').", ";
				$logsor.=$_SERVER["HTTP_USER_AGENT"].", ";
				$logsor.=Yii::app()->user->id.", ";
				$logsor.=Yii::app()->user->name.", ";
				
				fwrite($log, $logsor);
				fclose($log);
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
/* */
	/**
	 * Logs out the current user and redirect to homepage.
	 * logolás berakva 2016.10.16.
	 */
	public function actionLogout()
	{
		
		$log=fopen("protected/data/log.html","a"); /// log file handler
				date_default_timezone_set("Europe/Budapest");
				$logsor="<br>Kijelentekezes: ".date('Y-m-d H:i:s').", ";
				$logsor.=$_SERVER["HTTP_USER_AGENT"].", ";
				$logsor.=Yii::app()->user->id.", ";
				$logsor.=Yii::app()->user->name.", ";
				
				fwrite($log, $logsor);
				fclose($log);
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	/**
	 * Genprobe 6.kar generalas proba.
	 */
	public function actionGenprob()
	{
/************************************************************************************************
 * KTC kódgenerálás próba
 * 
 * 2016.05.05. iDG
 */

  /* Egyenlőre 6 karakterre építem
   * 
   * If StTyp in [2..8] then
      StLen := StTyp
    Else*/
/// definicíók:
  echo "Az action elindult!<br>";
  exit;
    $gr4=$i=$j=$k=0; // def inteeger az egesz elhagyhato!!
    $ingr4=$r=$alfanum=$maxsame=$minsame=
    $prevalfanum=$maxneib=$strpos=$bclen=$samedb=0;       //def                    : byte;
 /*   $St,$basepos,$neib,$db               : Array [0..1] of shortint;

    BaseChars                        : Array [0..1] of String[8];
    TurmixBaseChars                  : Array [0..1,1..8] of byte;
    whichstim                        : integer;
    c                                : char;
    b1,b2,StLen                      : byte;
    StF                              : File;
    StFName                          : string;
    Have2Write                       : boolean;
    StmStat                          : Array [1..3] of byte;
    */
    
    
    $StLen= 6;  //egyenlore kezzel beallitva a karakter hossz!!!!
    

  /*  { limit-counting } */
    $BaseChars[0]=array('AFHKLMRU');
    $BaseChars[1]=array('23456789');
    $bclen = 8; // ha valtozik a fenti hossz valtoztasd az erteket!
    For ($i = 1; $i= 9; $i++){
      
        $TurmixBaseChars[0][$i] = $i;
        $TurmixBaseChars[1][$i] = $i+8;
	}
    $maxneib = 2;

   /* { Ha a megengedett:  �bet�-sz�m� <= 4
    maxsame := StLen - (StLen div 4);
      Ha              :  �bet�-sz�m� <= 2  } */
    $maxsame = ($StLen / 2) + 1;

    $minsame = $StLen - $maxsame;
    $samedb  = $maxsame - $minsame + 1;

  //  { end-of-limit-counting ---}

 //   {---  Styp-gen. ---}

 //   Randomize;
    For ($gr4 = 1; $gr4=int( StNum/4);$gr4++){
        $St[0] = 0;
        $St[1] = 0;
        For ($ingr4=1; $ingr4=4; $ingr4++){
            $whichstim = ($gr4-1)*4+$ingr4;
            $k = mt_rand(0,2);//Random(2);
            If ($St[$k] > 1) $k = intval($k-1);
            If ($k = 0) $STyp[$whichstim] = False;
            Else  $STyp[$whichstim] = True;
            inc($St[$k]); //  ??? $k++ ?? vagy $St[$k]++ ???
		}
	}
    /*        Case StTyp of
              2..8 :
              begin
                {--- Mask-and-realstim-gen. ---}

                {--- Turmix base-characters !!! ---} */

                For ($i=0; $i=1; $i++){
                  For ($j= 1; $j=$bclen; $j++){
                      $r= mt_rand(1, $StLen+1);
                      $b1=$TurmixBaseChars[$i][$j];
                      $TurmixBaseChars[$i][$j]=$TurmixBaseChars[$i][$r];
                      $TurmixBaseChars[$i][$r]=$b1;
				  }
				} 
          //      {--- end of turmix ---}

                $basepos[0]= 1;
                $basepos[1]= 1;
                $neib[0]= 0;
                $neib[1]= 0;
                $prevalfanum= 255;
                If ($styp[whichstim]){
                  $db[0]= StLen / 2;}
                Else{
                    $db[0]=intval(mt_rand(0,$samedb+$minsame));
                    If ($db[0] == $StLen / 2)
                      $db[0]= $minsame;
					}
                $db[1]= $StLen - $db[0];

                For ($strpos=1; $strpos=$StLen;$strpos++){
                    $alfanum = intval(mt_rand(1,2));
                    If (($neib[$alfanum] >= $maxneib)
                      || ($db[abs($alfanum-1)]-$db[$alfanum] >= $maxneib) or ($db[$alfanum] < 1)){
                        $alfanum= abs($alfanum-1);
					  }
                    If (prevalfanum <> alfanum){
                        $neib[0]= 0;
                        $neib[1]= 0;
					}
                    $Stimultation[$whichstim][$strpos]= $TurmixBaseChars[$alfanum][$basepos[$alfanum]];
                    Inc($basepos[$alfanum]);
                    Inc($neib[$alfanum]);
                    Dec($db[$alfanum]);
                    $prevalfanum=$alfanum;
				}

		$this->render('proba',array('eredmeny'=>$Stimultation));;
	}
	
}