var haziorvosok = {
	init: function(){
		this.initMessage();
		this.initNote();
		this.initMenu();
		$(window).resize(function(){
			haziorvosok.onResize();
		});
	},
	initMessage: function(){
		$('#message_container').hide().delay(250).slideDown(250);
		$('#message_container .error, #message_container .success, #message_container .notice').on('click', function(){
			$(this).slideUp(250);
		});
	},
	initNote: function(){
		$('#toggle_note').on('click', function(event){
			event.preventDefault();
			var parent = $('#note_container .note');
			if(parent.hasClass('open')){
				parent.removeClass('open').addClass('closed');
				//call ajax function to set session variable to closed
			}
			else{
				parent.removeClass('closed').addClass('open');
				//call ajax function to set session variable to open
			}
		});
	},
	initMenu: function(){
		this.helpers.hideMenu();
	},
	onResize: function(){
		this.helpers.hideMenu();
	},
	helpers: {
		hideMenu: function(){
			var menu = $('#header_nav > ul');
			var button = $('#header_nav .toggle_menu');
			button.unbind();
			if(this.isMobile()){
				menu.hide();
				button.show();
				button.on('click', function(e){
					menu.slideToggle(200);
					e.preventDefault();
				});
			}
			else{
				button.hide();
				menu.show();
			}
		},
		isMobile: function(){
			var float = $('#header_nav ul li').css('float');
			return ( float !== 'left');
		}
	},
};
$(function(){ haziorvosok.init(); });