KTC_MERES = {
	error_count: 1,
	retry_num: 6,
	debug: true,
	keret_id: 'meres_keret',
	tartalom_id: 'meres_tartalom',
	gomb_id: 'meres_start',
	ugras_id: 'ugras',
	mestime: 1600,
	pausetime: 1500,
	ujing: [],
	jelenlegi: 0,
	time_corr:0,
	d_time:0,
	ered: [],
	init: function(){
		if(KTC_MERES.debug) console.log("Init application.");
	//-------------------------time correction mesurment----------------------------------
	var i = 0, diff = 0, d = new Date();

	var timer = setTimeout(function() {
  	diff += new Date() - d;
  	timer = setTimeout(arguments.callee, 1);
  	if (i++==100) {
    clearTimeout(timer);
    this.time_corr=4*diff/i;
    if(KTC_MERES.debug) console.log("Time_corr= "+this.time_corr+" i= "+i);
  };
  d = new Date();
}, 0);
	//---------------------------end time correction---------------------------
//---- start manual time measurment ------------------
var start_time = new Date().getTime();
			if(KTC_MERES.debug) console.log("-- First Start time: " + start_time);
/* Első próbálkozás működöttt és pontos! ha ezt használom elhagyható a timr korrekció 
 for(i=0;i<100;i++){
	var new_time = new Date().getTime();
		delta_time=new_time - start_time;
			if(KTC_MERES.debug) console.log("--delta time: " + delta_time);
}*/
/*gomb=$('button#' + this.gomb_id).remove();
ugras=$('a#' + this.ugras_id).remove();*/
$('#' + KTC_MERES.keret_id).addClass('ktc_meres');
$('#' + KTC_MERES.tartalom_id).addClass('ktc_meres_seged');
$('#' + KTC_MERES.tartalom_id).html('');
if(KTC_MERES.debug) console.log("-- clear screen start -- ");

while(KTC_MERES.d_time<this.pausetime){
	var new_time = new Date().getTime();
	KTC_MERES.d_time=new_time - start_time;
}
		delta_sum=KTC_MERES.d_time - start_time;
		if(KTC_MERES.debug) console.log("--sum delta time0: " + KTC_MERES.d_time);
var sum_time = new Date().getTime();
		delta_sum=sum_time - start_time;
		if(KTC_MERES.debug) console.log("--sum delta time1: " + delta_sum);
		$('#' + KTC_MERES.keret_id).removeClass('ktc_meres');
		$('#' + KTC_MERES.tartalom_id).removeClass('ktc_meres_seged');
/*		$('body').append( gomb );
		$('body').append( ugras );*/
if(KTC_MERES.debug) console.log("-- clear screen stop -- ");
//--- stop manual time measurment -----------------	
		this.mestime = meresAdatok.mestime;
		this.pausetime = meresAdatok.pausetime;
		this.ujing = meresAdatok.ujing;
		this.baseurl= meresAdatok.baseurl;
		$('button#' + this.gomb_id).mousedown(function(){
			KTC_MERES.start();
		});
		if(KTC_MERES.debug) console.dir("Using variables:<pre> "+this.baseUrl+"</pre>");
	},
	start: function(){
		if(KTC_MERES.debug) console.log("Start mesurement.");
		$('button#' + this.gomb_id).remove();
		$('a#' + this.ugras_id).remove();
		$('#' + KTC_MERES.keret_id).addClass('ktc_meres');
		$('#' + KTC_MERES.tartalom_id).addClass('ktc_meres_seged');
		this.kovetkezoInger(0);
	},
	end: function(){
		$('#' + KTC_MERES.keret_id).removeClass('ktc_meres');
		$('#' + KTC_MERES.tartalom_id).removeClass('ktc_meres_seged');
		if(KTC_MERES.debug) console.dir("End of mesureing, send the data to the server");
		$('#' + KTC_MERES.tartalom_id).html('Vége.');
		if(KTC_MERES.debug) console.dir(KTC_MERES.baseurl+'/index.php/ingerek/meres');
	
		KTC_MERES.sendResults();
	},
	sendResults: function(){
		$('#' + KTC_MERES.tartalom_id).html(KTC_MERES.error_count + '. eredmény küldő kísérlet');
		$.ajax({ 
			url: KTC_MERES.baseurl+'/index.php/ingerek/meres',
			method: "POST",
			data: { ered: KTC_MERES.ered},
			timeout:10000,
			error: function(){
				//$('#' + KTC_MERES.tartalom_id).html('Adatátviteli hiba! <a href=KTC_MERES.start()> Adat újraküldés</a>');
				if(KTC_MERES.error_count < KTC_MERES.retry_num){
					var currentRetryCount = parseInt(KTC_MERES.error_count) + 1;
					if(KTC_MERES.debug) console.dir('Error during sending the results to the server. Retry for the ' + currentRetryCount + 'th time');
					KTC_MERES.sendResults();
				}
				else{
					if(KTC_MERES.debug) console.dir('Error during sending the results to the server. Stop trying.');
				}
				KTC_MERES.error_count++;
			},
			success: function(data){
				if(KTC_MERES.debug) console.dir("Server response: " + data);
				$('#' + KTC_MERES.tartalom_id).html('<a href="' + data.url + '">Eredmények megtekintése</a>');
			}
		});
	},
	kovetkezoInger: function(called_from){

		$(document).unbind('mousedown.next_meres');

		if(KTC_MERES.ujing.length-1 < KTC_MERES.jelenlegi){
			return KTC_MERES.end();
		}

		var jelenlegi = KTC_MERES.jelenlegi;

		if(KTC_MERES.debug) console.log("Call kovetkezo inger");
		
		if(KTC_MERES.debug) console.log("--Current index: " + jelenlegi);
		if(KTC_MERES.debug) console.log("--Called from: " + called_from);
		$('#' + KTC_MERES.tartalom_id).html('');
			setTimeout(function(){
			var inger = KTC_MERES.ujing[KTC_MERES.jelenlegi].inger;
			$('#' + KTC_MERES.tartalom_id).html(inger);
			var start_time = new Date().getTime();
			if(KTC_MERES.debug) console.log("--Start time: " + start_time);
			KTC_MERES.jelenlegi++;			
			var meres_timeout = setTimeout(function(){
				if(KTC_MERES.debug) console.log("--Timeout, call next from " + jelenlegi);
				KTC_MERES.Hozzaadasa(jelenlegi, "NaN");
				KTC_MERES.kovetkezoInger();
			}, KTC_MERES.mestime);
			
			$(document).bind('mousedown.next_meres', function(){
				var end_time = new Date().getTime();
				if(KTC_MERES.debug) console.log("--mousedown event from " + jelenlegi);
				clearTimeout(meres_timeout);
				var time_taken = end_time - start_time - KTC_MERES.time_corr;
				if(KTC_MERES.debug) console.log("--Time taken: " + time_taken);
				KTC_MERES.Hozzaadasa(jelenlegi, time_taken);
				KTC_MERES.kovetkezoInger(jelenlegi);
			});
			
		}, KTC_MERES.pausetime);
	},
	Hozzaadasa: function(sorszam, ido){
		var ered = {
			t: ido,
	//		i: KTC_MERES.ujing[sorszam].inger,
			p: KTC_MERES.ujing[sorszam].inger_typ
		};
		KTC_MERES.ered.push(ered);
	}
}; //KTC_MERES

$(document).ready(function(){
	KTC_MERES.init();
});
