/**
* Custom Js for backend 
*
* @package Mag_Pro
*/
jQuery(document).ready(function($) {
    $('#rt-magazine-img-container li label img').click(function(){    	
        $('#rt-magazine-img-container li').each(function(){
            $(this).find('img').removeClass ('rt-magazine-radio-img-selected') ;
        });
        $(this).addClass ('rt-magazine-radio-img-selected') ;
    });                    
});