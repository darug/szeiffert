<?php
/**
 * KTC veletlengeneralas proba
 * 
 */

  echo "Az action elindult!<br>";

 /**
 * KTC kódgenerálás próba
 * 
 * 2016.05.05. iDG
 */

  /* Egyenlőre 6 karakterre építem
   * 
 */
/// definicíók:
/*
 * egy ingersor generalasa az kiertekeleshez szukseges valtozokkal
 */
 class Chargen{
 	public $char_num=0; ///< szamok szama az ingersorban
	public $char_alfa=0;///< betuk szama az ingeresorban
	public $gen_corr=FALSE;///< boolen true, ha $char_num==échar_alfa
	public $gen_err=TRUE;///< boolen true ha $char_num<$minsame or $char_alfa<$minsame or $char_num>$maxsame or ...
	
	public function gen(){
			$c_num=6;
			$BaseChars='AFHKLMRU23456789';
			$bclen = 16;
			$maxsame = ($c_num / 2) + 1;
		    $minsame = $c_num - $maxsame;
		//	echo $maxsame."=max ".$minsame."=min ";
			$gen_err=True;
		//	echo $c_num."=n ";
			$n=$b=$s=0;
			while ($gen_err){
				$s=$b=0;
				$TBaseChars="";
				For ($j= 1; $j<=$c_num; $j++){
                      $r= intval(mt_rand(0,$bclen-1));
			//		echo $r." , ";
					  if($r<$bclen/2) {$b++;} else {$s++;}
                      $TBaseChars.=$BaseChars[$r];
				//	 echo ' - ';
				  }
				//echo $s."=s ".$b."=b ";
			if($s<$minsame || $b<$minsame || $s>$maxsame || $b>$maxsame){$gen_err=True;} else {$gen_err=False;};
			//echo $gen_err." !!! ";
			//	echo $TBaseChars." !=! ";
			}
			if($s==$b){$this->gen_corr=TRUE;} else {$this->gen_corr=FALSE;};
			$this->char_num=$s;
			$this->char_alfa=$b;
	return $TBaseChars;	 
	}  
	
 }
    
    $StLen= 6;  //egyenlore kezzel beallitva a karakter hossz!!!!
    $StNum=20;  //egyenlőre kézzel beállítva  az ingerszám!!!!!!!!!!!!!

    $BaseChars='AFHKLMRU23456789';
    echo "<pre> generalt BaseChars>: ".var_dump($BaseChars)."</pre>";
  
    $bclen = 8; // ha valtozik a fenti hossz valtoztasd az erteket!
 /*   For ($i = 1; $i<= 9; $i++){
      
        $TurmixBaseChars[0][$i] = $i;
        $TurmixBaseChars[1][$i] = $i+8;
	}
	echo "Ciklus vege<br>"; 

    echo "<pre> generalt TurmixBaseChars>: ".var_dump($TurmixBaseChars)."</pre>"; */
/*
For ($i = 0; $i<= 7; $i++){
      
        $TurmixBaseChars1[0][$i] =$BaseChars[0][0][$i];
        $TurmixBaseChars1[1][$i] = $BaseChars[1][0][$i];
	} 
	echo "Ciklus vege<br>";

    echo "<pre> generalt TurmixBaseChars1: ".var_dump($TurmixBaseChars1
	)."</pre>"; */
   $maxneib = 2;

   /* { Ha a megengedett:  �bet�-sz�m� <= 4
    maxsame := StLen - (StLen div 4);
      Ha              :  �bet�-sz�m� <= 2  } */
    $maxsame = ($StLen / 2) + 1;

    $minsame = $StLen - $maxsame;
    $samedb  = $maxsame - $minsame + 1;
echo "Stlen: ".$StLen." maxneib: ".$maxneib." maxsame: ".$maxsame." minsame: ".$minsame." samedb: ".$samedb."<br>";
  //  { end-of-limit-counting ---}

 //   {---  Styp-gen. ---}

 /*   Randomize;
 	For ($gr4=1; $gr4<=($StNum/4); $gr4++){
        $St[0] = 0;
        $St[1] = 0;
        For ($ingr4=1; $ingr4<=4; $ingr4++){
            $whichstim = ($gr4-1)*4+$ingr4;
            $k = mt_rand(0,2);//Random(2);
            If ($St[$k] > 1) $k = intval($k-1);
            If ($k = 0) $STyp[$whichstim] = False;
            Else  $STyp[$whichstim] = True;
          //  inc($St[$k]); //  ??? $k++ ?? vagy $St[$k]++ ???
		}
	}
    /*        Case StTyp of   */
//	echo "<pre> generalt St: ".var_dump($St)."</pre>"; */
	//sajat verzio:
	$c=$f=$h=0;
/*  For ($i=1; $i<=$StNum; $i++){
  	// $i%4 alapján ellenőrizni azt, hogy 4 ingerből 50%-os C/F arány legyen, első vizsgálat a hibás, rutint írni a generálásra
  				$TBaseChars="";
 				$bcmax=2*$bclen-1;
				$b=$s=0;
				echo $i.". sor ";
				//echo "bcmax: ".$bcmax." ingersor: ".$BaseChars."<br>";
                  For ($j= 1; $j<=$StLen; $j++){
                      $r= intval(mt_rand(0,$bcmax));
				//	  echo $r.", ";
					  if($r<8) {$b++;} else {$s++;}
                      $b1=$BaseChars[$r];
					//  echo $b1."; ";
                      $TBaseChars.=$b1;
				  }
				if($b==$s){echo $TBaseChars." = jo inger";$c++; } else {echo $TBaseChars." = fals inger";$f++;}
				echo " betunum: $b, szamnum: $s";
				if($b<$minsame || $s<$minsame){echo " HIBAS!! ";$h++;}
				echo "<br>";
  }
  echo "jo ingerek szama: ".$c." Fals ingerek szama: ".$f." Hibas: ".$h."<br><br>";*/
//	echo "<pre> generalt TBaseChars: ".var_dump($TBaseChars)."===</pre>";

	echo " Vege: ".$gen->gen()." ingertipus: ".$gen->gen_corr."<br><br>";

	$mysqli = new mysqli('localhost', 'ktc', 'ktc516KTC', 'ingerek');
		
	$gen= new Chargen;

	$z=0;
	for($i=1;$i<=$StNum;$i++){
		$z=($i-1)%4;
		switch ($z){
			case 0:
			case 1:
			//	echo $i."  ";
				 $temp=$gen->gen();
				if($gen->gen_corr){ $c++;} else {$f++;}
				break;
			case 2:
				if($c==2){
					$fals=True;
					while($fals){
						$temp=$gen->gen();
						$fals=$gen->gen_corr;
					}
					$f++;
					break;
				}
				if($f==2){
					$cor=True;
					while($cor){
						$temp=$gen->gen();
						$cor=!$gen->gen_corr;
					}
					$c++;
					break;
				}
				$temp=$gen->gen();
				if($gen->gen_corr){ $c++;} else {$f++;}
				break;
			case 3:
				if($c==2){
					$fals=True;
					while($fals){
						$temp=$gen->gen();
						$fals=$gen->gen_corr;
					}
					$f++;
					break;
				}
				if($f==2){
					$cor=True;
					while($cor){
						$temp=$gen->gen();
						$cor=!$gen->gen_corr;
					}
					$c++;
					break;
				}	
		}//end swicth
		echo $i."   ".$temp;
		if($gen->gen_corr){echo " jo";}else{echo " rossz";}
		echo " $c $f $z<br>";
		if($z==3){$f=$c=0;echo "-----------<br>";}	
	}// end for	
