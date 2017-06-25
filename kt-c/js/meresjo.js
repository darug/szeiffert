// 2016.07.11.-i jó állapot, de az idő korrekció még hátra van!!
KTC_MERES = {
	error_count: 0,
	retry_num: 5,
	debug: true,
	keret_id: 'meres_keret',
	tartalom_id: 'meres_tartalom',
	gomb_id: 'meres_start',
	mestime: 1600,
	pausetime: 500,
	ujing: [],
	jelenlegi: 0,
	ered: [],
	init: function(){
		if(KTC_MERES.debug) console.log("Init application.");
	
		this.mestime = meresAdatok.mestime;
		this.pausetime = meresAdatok.pausetime;
		this.ujing = meresAdatok.ujing;
		this.baseurl= meresAdatok.baseurl;
		$('button#' + this.gomb_id).mousedown(function(){
			KTC_MERES.start();
		});
		if(KTC_MERES.debug) console.dir("Using variables:<pre> "+this.baseurl+"</pre>");
	},
	start: function(){
		if(KTC_MERES.debug) console.log("Start mesurement.");
		$('button#' + this.gomb_id).remove();
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
		$.ajax({ //kesz=0 elso csomag,=1 csak egy csomag lesz, =0 tobbcsomag elso csomagja, =2 2.,3. csomag,=3 utolso csomag
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
				if(KTC_MERES.debug) console.log("--mousedown event from " + jelenlegi);
				clearTimeout(meres_timeout);
				var end_time = new Date().getTime();
				var time_taken = end_time - start_time;
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
};

$(document).ready(function(){
	KTC_MERES.init();
});
