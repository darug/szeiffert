/*
 ### jQuery Multiple File Upload Plugin v1.47 - 2010-03-26 ###
 * Home: http://www.fyneworks.com/jquery/multiple-file-upload/
 * Code: http://code.google.com/p/jquery-multifile-plugin/
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 ###
*/

/*# AVOID COLLISIONS #*/
;if(window.jQuery) (function($){
/*# AVOID COLLISIONS #*/
 
	// plugin initialization
	$.fn.MultiFile = function(options){
		if(this.length==0) return this; // quick fail
		
		// Handle API methods
		if(typeof arguments[0]=='string'){
			// Perform API methods on individual elements
			if(this.length>1){
				var args = arguments;
				return this.each(function(){
					$.fn.MultiFile.apply($(this), args);
    });
			};
			// Invoke API method handler
			$.fn.MultiFile[arguments[0]].apply(this, $.makeArray(arguments).slice(1) || []);
			// Quick exit...
			return this;
		};
		
		// Initialize options for this call
		var options = $.extend(
			{}/* new object */,
			$.fn.MultiFile.options/* default options */,
			options || {} /* just-in-time options */
		);
		
		// Empty Element Fix!!!
		// this code will automatically intercept native form submissions
		// and disable empty file elements
		$('form')
		.not('MultiFile-intercepted')
		.addClass('MultiFile-intercepted')
		.submit($.fn.MultiFile.disableEmpty);
		
		//### http://plugins.jquery.com/node/1363
		// utility method to integrate this plugin with others...
		if($.fn.MultiFile.options.autoIntercept){
			$.fn.MultiFile.intercept( $.fn.MultiFile.options.autoIntercept /* array of methods to intercept */ );
			$.fn.MultiFile.options.autoIntercept = null; /* only run this once */
		};
		
		// loop through each matched element
		this
		 .not('.MultiFile-applied')
			.addClass('MultiFile-applied')
		.each(function(){
			//#####################################################################
			// MAIN PLUGIN FUNCTIONALITY - START
			//#####################################################################
			
       // BUG 1251 FIX: http://plugins.jquery.com/project/comments/add/1251
       // variable group_count would repeat itself on multiple calls to the plugin.
       // this would cause a conflict with multiple elements
       // changes scope of variable to global so id will be unique over n calls
       window.MultiFile = (window.MultiFile || 0) + 1;
       var group_count = window.MultiFile;
       
       // Copy parent attributes - Thanks to Jonas Wagner
       // we will use this one to create new input elements
       var MultiFile = {e:this, E:$(this), clone:$(this).clone()};
       
       //===
       
       //# USE CONFIGURATION
       if(typeof options=='number') options = {max:options};
       var o = $.extend({},
        $.fn.MultiFile.options,
        options || {},
   					($.metadata? MultiFile.E.metadata(): ($.meta?MultiFile.E.data():null)) || {}, /* metadata options */
								{} /* internals */
       );
       // limit number of files that can be selected?
       if(!(o.max>0) /*IsNull(MultiFile.max)*/){
        o.max = MultiFile.E.attr('maxlength');
        if(!(o.max>0) /*IsNull(MultiFile.max)*/){
         o.max = (String(MultiFile.e.className.match(/\b(max|limit)\-([0-9]+)\b/gi) || ['']).match(/[0-9]+/gi) || [''])[0];
         if(!(o.max>0)) o.max = -1;
         else           o.max = String(o.max).match(/[0-9]+/gi)[0];
        }
       };
       o.max = new Number(o.max);
       // limit extensions?
       o.accept = o.accept || MultiFile.E.attr('accept') || '';
       if(!o.accept){
        o.accept = (MultiFile.e.className.match(/\b(accept\-[\w\|]+)\b/gi)) || '';
        o.accept = new String(o.accept).replace(/^(accept|ext)\-/i,'');
       };
       
       //===
       
       // APPLY CONFIGURATION
							$.extend(MultiFile, o || {});
       MultiFile.STRING = $.extend({},$.fn.MultiFile.options.STRING,MultiFile.STRING);
       
       //===
       
       //#########################################
       // PRIVATE PROPERTIES/METHODS
       $.extend(MultiFile, {
        n: 0, // How many elements are currently selected?
        slaves: [], files: [],
        instanceKey: MultiFile.e.id || 'MultiFile'+String(group_count), // Instance Key?
        generateID: function(z){ return MultiFile.instanceKey + (z>0 ?'_F'+String(z):''); },
        trigger: function(event, element){
         var handler = MultiFile[event], value = $(element).attr('value');
         if(handler){
          var returnValue = handler(element, value, MultiFile);
          if( returnValue!=null ) return returnValue;
         }
         return true;
        }
       });
       
       //===
       
       // Setup dynamic regular expression for extension validation
       // - thanks to John-Paul Bader: http://smyck.de/2006/08/11/javascript-dynamic-regular-expresions/
       if(String(MultiFile.accept).length>1){
								MultiFile.accept = MultiFile.accept.replace(/\W+/g,'|').replace(/^\W|\W$/g,'');
        MultiFile.rxAccept = new RegExp('\\.('+(MultiFile.accept?MultiFile.accept:'')+')$','gi');
       };
       
       //===
       
       // Create wrapper to hold our file list
       MultiFile.wrapID = MultiFile.instanceKey+'_wrap'; // Wrapper ID?
       MultiFile.E.wrap('<div class="MultiFile-wrap" id="'+MultiFile.wrapID+'"></div>');
       MultiFile.wrapper = $('#'+MultiFile.wrapID+'');
       
       //===
       
       // MultiFile MUST have a name - default: file1[], file2[], file3[]
       MultiFile.e.name = MultiFile.e.name || 'file'+ group_count +'[]';
       
       //===
       
							if(!MultiFile.list){
								// Create a wrapper for the list
								//