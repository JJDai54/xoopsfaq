///////////////////////////////////////////////////
// ShowHide plugin                               
// Author: Ashley Ford - http://papermashup.com
// Demo: Tutorial - http://papermashup.com/jquery-show-hide-plugin
// Built: 19th August 2011                                     
///////////////////////////////////////////////////    

//alert("showHide");

(function ($) {
    $.fn.showHide = function (options) {
		//default vars for the plugin
        var defaults = {
            speed: 1000,
			easing: '',
			changeText: 0,
			showText: 'Show',
			hideText: 'Hide',
			showHideText: 0

        };
        var options = $.extend(defaults, options);

        $(this).click(function () {
             $('.toggleDiv').slideUp(options.speed, options.easing);
			 // this var stores which button you've clicked
             var toggleClick = $(this);
		     // this reads the rel attribute of the button to determine which div id to toggle
		     var toggleDiv = $(this).attr('rel');
		     
         //JJD begin modif ----------------------------------------
         //for hide groupe of div      
		     if(!$(toggleDiv).is(":visible"))
         {
           var h = toggleDiv.indexOf("-");  //search the root or id
           var group = "." + toggleDiv.substring(1,h); //build the clas name
           $(group).slideUp(options.speed, options.easing); //close all the div whith the class name
           $(group + '-title').html(options.showText); //close all the div whith the class name
          }
         //JJD end modif ----------------------------------------
		     
         // here we toggle show/hide the correct div at the right speed and using which easing effect
		     $(toggleDiv).slideToggle(options.speed, options.easing, function() {
		     // this only fires once the animation is completed
			 if(options.changeText==1){
		     //$(toggleDiv).is(":visible") ? toggleClick.text(options.hideText) : toggleClick.text(options.showText);
		     //$(toggleDiv).is(":visible") ? toggleClick.html(options.hideText) : toggleClick.html(options.showText);
		     if ($(toggleDiv).is(":visible")){
             if(options.showHideText == 1) toggleClick.html(options.hideText);
                 else  toggleClick.html("") ;
             ob = document.getElementById(options.displayBlock);
             if (ob) ob.value='block';
         }else{
            toggleClick.html(options.showText);      
            ob = document.getElementById(options.displayBlock);
            if (ob) ob.value='none';
         } 
          //alert(ob.value);  
			 }
              });
		   
		  return false;
		   	   
        });

    };
})(jQuery);

