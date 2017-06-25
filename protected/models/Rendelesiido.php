<?php
/**
 * @class Rendelesiido tábla model osztálya
 * @brief ADATBÁZIS NÉLKÜLI MODEL
 */
 
 /**
 * This is the model class RendelesiIdo"
 * <b>adatbazis nem tartozik hozza, rendelessel kapcsolatos aktualis (időből számítható)
 * szöveget állítja elő</b>
 * a hónap és a hét napjait magyarul írja ki
 * @author iDG
 * @date 3012.07.19.
 */
class Rendelesiido
{
	public $nap = array(); ///< napok magyar nevei
	public $nnap;		///< szám 1=hétfő
	public $nhet;		///< boolen páros=0, páratlan=1
	public $hetaktualis ; ///< = páros vagy páratlan
	public $honap = array();
	public $ora;

	private $napok = array(
			'hde' => '1de',
			'hdu' => '1du',
			'kde' => '2de',
			'kdu' => '2du',
			'szede' => '3de',
			'szedu' => '3du',
			'csde' => '4de',
			'csdu' => '4du',
			'pde' => '5de',
			'pdu' => '5du',
			'szode' => '6de',
			'szodu' => '6du',
			'vde' => '7de',
			'vdu' => '7du',
		);
     public $nap1 = array('h','k','sze','cs','p','szo','v');

	 public $hde; // hétfő délelött
	 public $hdu;
	 public $h;		//hetfo megjelenes
	 public $kde;  //kedd
	 public $kdu;
	 public $k;
	 public $szede;  //szerda
	 public $szedu;
	 public $sze;
	 public $csde;  //csütörtök
	 public $csdu;
	 public $cs;
	 public $pde;  //péntek
	 public $pdu;
	 public $p;
	 public $szode;  //Szombat
	 public $szodu;
	 public $szo;
	 public $vde;   //vasárnap
	 public $vdu;
	 public $v;
	 public $rendcim; //rendelési idő tájékoztató cime
	 public $rendszov; // szovege
	 
	public function __construct(){

		$this->initNap();
		$this->initNnap();
		$this->initNhet();
		$this->initHet();
		$this->initHonap();
		$this->initOra();
		$this->initAll();
	}
	
	public function initNap(){
		$this->nap = array("","hétfő","kedd","szerda","csütörtök","péntek","szombat","vasárnap" );
	}
	
	public function initNnap(){
		$this->nnap = date('N');
	}
	
	public function initNhet(){
		$this->nhet = date('W')%2;	
	}
	public function initHet(){
		if($this->nhet){$this->hetaktualis="páratlan";} else {$this->hetaktualis="páros";}
	}
	
	public function initHonap(){
		$this->honap = array('','január','február','március','április','május','június','július','augusztus','szeptember','október','november','december');
	}
	
	public function initOra(){
		$this->ora = date('H');
		if($this->ora>24){$this->ora-=1;}
	}
	
	public function getMuszak($name){
		$rend = new Rendido('search');
		$tmp="";
		$record=$rend->find('name=:name AND id_orvos=:id_orvos',array(
			':name'=>$name,
			':id_orvos'=>Yii::app()->params['orvos'],
			));
		if($record){
		$tmp=$record->comment;
			if($tmp>""){$tmp.="<br/>";}
		//	if($tmp=="változó"){$tmp="Figyelem! Ma változó rendelés van, kérjük telefonon érdeklődjön!";}
			if($record->start>''){$tmp.=" ".$record->start." - ".$record->stop;}
			if($tmp==''){$tmp='-';}
		}
		return $tmp;
		
	}

	public function initAll(){
		
		foreach($this->napok as $key => $value){
		
			$this->$key = $this->getMuszak($value);
		
		}
/*	*/	$rendi = new Rendido();
		$rek=$rendi->findAll('id_orvos=:id_orvos',array(
		//	':name'=>$name,
			':id_orvos'=>Yii::app()->params['orvos'],
			));
		if($rek){	
/**/		for ($i=0; $i < 14 ; $i+=2) { 
				$this->nap1[$i/2]=!($rek[$i]->oszlop_ki && $rek[$i+1]->oszlop_ki);
			} /* */
		}
	
		$cont= new Content();
		if($rec=$cont->find('name=:name AND id_orvos=:id_orvos',array(
		':name'=>'rendido',
		':id_orvos'=>Yii::app()->params['orvos'],
		))){
		$this->rendcim = $rec->title;
		$this->rendszov = $rec->content;}
	}	

	/**
	 * info sor tartalmát állítja össze
	 * @bug a délelőtti rendelésnél (néha?) egy órával többet ír ki a valós hátralévő időnél!!!
	 * 	 a hibát be kell határolni és el kell hárítani. Határidő: @date 2015-07-12.
	 * 
	 */
	public function info(){
			$rendelido="";
			date_default_timezone_set('Europe/Budapest');
			$datenow = new DateTime('now');
			$ri=$datenow->format('Y-m-d');
			$rkezd=new DateTime();
			$rveg= new DateTime();
			if($this->nnap==1){
				if($this->logt("hde")){$rendelido=$this->levag("hde");}
				if($this->logt("hdu")){$rendelido=$this->levag("hdu");}
			}
			if($this->nnap==2){
				if($this->logt("kde")){$rendelido=$this->levag("kde");}
				if($this->logt("kdu")){$rendelido=$this->levag("kdu");}
			}
			if($this->nnap==3){
				if($this->logt("szede")){$rendelido=$this->levag("szede");}
				if($this->logt("szedu")){$rendelido=$this->levag("szedu");}
			}
			if($this->nnap==4){
				if($this->logt("csde")){$rendelido=$this->levag("csde");}
				if($this->logt("csdu")){$rendelido=$this->levag("csdu");}
			}
			if($this->nnap==5){ //páros, páratlan behetárolás kell még
				if($this->logt("pde")){$rendelido=$this->levag("pde");}
				if($this->logt("pdu")){$rendelido=$this->levag("pdu");}
			}
			if($this->nnap==6){
				if($this->logt("szode")){$rendelido=$this->levag("szode");}
				if($this->logt("szodu")){$rendelido=$this->levag("szodu");}
			}
			if($this->nnap==7){ //páros, páratlan behetárolás kell még
				if($this->logt("vde")){$rendelido=$this->levag("vde");}
				if($this->logt("vdu")){$rendelido=$this->levag("vdu");}
			}
			$mm=$this->levag("pdu")." - ".$this->pdu;
			$kezdora=0;
			$mai=$rendelido;
			$mai0=$rendelido;
		if($k=substr_count($rendelido,":")){
			if($k>2){
				$rdi=substr($rendelido,strpos($rendelido,">"),strlen($rendelido));
				$kezdora=substr($rdi,0,strpos($rdi,":"));
				$kezdperc=substr($rdi,strpos($rdi,":")+1,2);
				$di=substr($rdi,strpos($rdi,"- ")+2,5);
				$vegora=substr($di,0,strpos($di,":"));
				$vegperc=substr($di,strpos($di,":")+1,2);
			}
			if($k=2){
				$rdi=$rendelido;
				$kezdora=substr($rdi,0,strpos($rdi,":"));
				$kezdperc=substr($rdi,strpos($rdi,":")+1,2);
				$di=substr($rdi,strpos($rdi,"- ")+2,5);
				$vegora=substr($di,0,strpos($di,":"));
				$vegperc=substr($di,strpos($di,":")+1,2);
			}
			//ide jön az időátszámítások
			$rendtime=True; 
			if(is_numeric($kezdora) && is_numeric($kezdperc) && is_numeric($vegora) && is_numeric($vegperc)){	
				$rendkezd=mktime($kezdora,$kezdperc,0,date("m"),date("d"),date("Y"));
				$rkezd= new DateTime("$ri $kezdora:$kezdperc");
				
				$rendveg=mktime($vegora,$vegperc,0,date("m"),date("d"),date("Y"));
				$rveg= new DateTime("$ri $vegora:$vegperc");}
			else {$rendtime=False;}
		}
		if($kezdora>0 && $rendtime){
			if($rkezd>=$datenow){//rendelés előtt vagyunk
				$timedelta=$rkezd->diff($datenow);
				$mai=" A mai napon $kezdora:$kezdperc - $vegora:$vegperc lesz rendelés, amely ";
				$mai.=$timedelta->format('%h')." óra ".$timedelta->format('%i')." perc múlva kezdődik.";
			}
		if($rkezd<$datenow && $datenow<$rveg && $rendtime){	//már tart a rendelés
				$timedelta=$datenow->diff($rveg);
				$mai=" A rendelés már elkezdődött és ";
				$mai.=$timedelta->format('%h óra ').$timedelta->format('%i ')."perc múlva lesz vége.";
			}
		if($rendveg<time() && $rendtime){ // rendelés után vagunk
				$mai=" Ma már nincs rendelés. Legközelebb ";
		//ide jön a legközelebbi rendelési idő meghatározása
		if($this->nnap==1){
				if($this->logt("kde")){$rendelido="kedden ".$this->levag("kde");}
				if($this->logt("kdu")){$rendelido="kedden ".$this->levag("kdu");}
			}
			if($this->nnap==2){
				if($this->logt("szede")){$rendelido="szerdán ".$this->levag("szede");}
				if($this->logt("szedu")){$rendelido="szerdán ".$this->levag("szedu");}
			}
			if($this->nnap==3){
				if($this->logt("csde")){$rendelido="csütörtökön ".$this->levag("csde");}
				if($this->logt("csdu")){$rendelido="csütörtökön ".$this->levag("csdu");}
			}
			if($this->nnap==4){
				if($this->logt("pde")){$rendelido="pénteken ".$this->levag("pde");}
				if($this->logt("pdu")){$rendelido="pénteken ".$this->levag("pdu");}
			}
			if($this->nnap==5){ //páros, páratlan behetárolás kell még
				if($this->logt("hde")){$rendelido="hétfőn ".$this->levag("hde");}
				if($this->logt("hdu")){$rendelido="hétfőn ".$this->levag("hdu");}
			}
			if($this->nnap==6){
				if($this->logt("hde")){$rendelido="hétfőn ".$this->levag("hde");}
				if($this->logt("hdu")){$rendelido="hétfőn ".$this->levag("hdu");}
			}
			if($this->nnap==7){ 
				if($this->logt("hde")){$rendelido="hétfőn ".$this->levag("hde");}
				if($this->logt("hdu")){$rendelido="hétfőn ".$this->levag("hdu");}
			}
			if(strpos($rendelido,'->')){$mai.=$rendelido;} else {$mai.=$rendelido."-ig várom pácienseimet!";}
		}//if($rendveg<time())
	}	//if($kezdora>0)
	else{
		if(strpos($mai0, 'ltoz')){$mai="Figyelem, ma változó rendelés van, kérjük telefonon érdeklődjön!";} else {
		if(strpos($mai, 'helyettes')){$rendelido="Személyesen legközelebb ";} 
		else {$rendelido="Ma nincs rendelés, a legközelebb ";}
		if($this->logt("hde")){$rendelido.="hétfőn ".$this->levag("hde");}
		if($this->logt("hdu")&&$this->levag("hdu")>""){$rendelido.="hétfőn ".$this->levag("hdu");}
		$mai.=$rendelido."-ig várom pácienseimet!";
		}
	}
			$rk=$rkezd->format('Y-m-d H:i');
			$rv=$rveg->format('Y-m-d H:i');
			$info= "Ma ".date('Y')." ".$this->honap[date('n')]." ".date('j').", ".$this->nap[$this->nnap]." és ".$this->hetaktualis." hét van. $mai";
			return $info;
	}//function info()
	
	public function rendido($n){
			if($n %2 == 1 && $n<5){
				$rendelido=" 8 - 12 óráig ";$riveg="van rendelés.";
			}
		 	elseif($n %2 == 0 && $n<5){
		 		$rendelido=" 16 - 20 óráig ";$riveg="van rendelés.";
			}
		  	elseif($n == 5 && $this->nhet==0){
		  		$rendelido=" 8 - 12 óráig ";$riveg="van rendelés.";
			}
			elseif($n ==5 && $this->nhet==1){
		   		$rendelido=" 16 - 20 óráig "; $riveg="van rendelés.";
			}
			else{
				$rendelido=" nincs rendelés!";$riveg="";
			}
			return $rendelido;
		}
	/**
	 * Visszaadott érték True, ha a megjegyzésben van a páros vagy páratlan hétre utalás
	 */
	public function logt($t){
		$logt=false;
		if ($this->$t>"" && $this->$t!="-"){ // van megjegyzés és nem kötőjel!
			if (!strpos($this->$t,"ros") && !strpos($this->$t,"ratlan")){  //ha a megjegyzésben nincs a hetre utalás
				$logt=true;}
			elseif ((strpos($this->$t,"ros") && !$this->nhet) || ((strpos($this->$t,"ratlan") && $this->nhet))){
				$logt=true;} //ha a hét és a rendelés megegyezik
		}
		return $logt;
	}
	/**
	 * Levágja a '->' utáni részt (helyettesít-> )
	 */
	public function levag($le){
		if (strpos($this->$le,">")===True){
			$ret=substr($this->$le,strpos($this->$le,">")+1,strlen($this->$le));
		} else {
			$ret=$this->$le;
		}
		return $ret;
	}

}/** @} */


