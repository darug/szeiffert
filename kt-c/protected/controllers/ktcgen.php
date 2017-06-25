<?php
  echo "Az action elindult!<br>";
  exit;

 /**
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
                      $r= intval(mt_rand(0, $bclen));
                      $b1=$TurmixBaseChars1[$i][$j];
                      $TurmixBaseChars1[$i][$j]=$TurmixBaseChars[$i][$r];
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

                For ($strpos=1; $strpos<=$StLen;$strpos++){
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
                    $basepos[$alfanum]++;
                    $neib[$alfanum]++;
                    $db[$alfanum]--;
                    $prevalfanum=$alfanum;
				}
 echo "<pre>";
 var_dump($Stimultation)."============</pre>";
//                {--- end of realstim-gen. ---}

//              end;  { 2..8 }
// saját próbálkozás:

?>