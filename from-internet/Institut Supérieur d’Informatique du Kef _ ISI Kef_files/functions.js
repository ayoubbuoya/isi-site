jQuery(document).ready(function(){
	jQuery('#slides').slides({preload: true,generateNextPrev: true});

	jQuery(".jqform").jqTransform({imgPath:"jqtransformplugin/img/"});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	faq();
	tableau();
	hover_menu();
	tabs_clic_css();
	menu_header();
  //  menu_h2();
	jQuery(".cartouche_slideindex .next").appendTo(".pagination");
	jQuery(".cartouche_slideindex .prev").insertBefore(".pagination li:first");
});


function faq(){
	jQuery(".bloc_table .titre").click(function(){
		var elem = jQuery(this).next(".table");
		if(elem.is(":hidden")){
			elem.slideDown();
			jQuery(this).addClass("active");
			}
		else {
			elem.slideUp();
			jQuery(this).removeClass("active");
			}
		
		});
	
	}
function tabs_clic_css(){
	jQuery(".tab_elem").click(function(){
		jQuery(this).parent().find(".tab_elem").each(function() {
            jQuery(this).removeClass("active");
        });	
		jQuery(this).addClass("active");	
		});
	
	}
function tableau(){
	jQuery(".bloc_faq").find(".question").click(function(){
		var elem = jQuery(this).parents(".bloc_faq").find(".reponse");
		if(elem.is(":hidden")){
			elem.slideDown();
			jQuery(this).parents(".bloc_faq").addClass("active_faq");
			}
		else {
			elem.slideUp();
			jQuery(this).parents(".bloc_faq").removeClass("active_faq");
			}
		
	});
	
	}
function hover_menu(){	
	jQuery(".menu_principal ul li").mouseover(function() {
//alert("azerty");
		jQuery(".menu_principal ul li").css("z-index",1);
		jQuery(this).css("z-index",10);
		jQuery(this).children("a").css("z-index",10);
		jQuery(this).addClass("active");
		jQuery(this).children(".sub_menu").show();
		}).mouseout(function(){
		jQuery(".menu_principal ul li").css("z-index",1);
		jQuery(this).children("a").css("z-index",1);
		jQuery(this).children(".sub_menu").hide();
		jQuery(this).removeClass("active");
	});}
function validSondage(code_sondage){
			jQuery("#zone_sondage_"+code_sondage).find("input[name='reponse']").each(function(i){
					if(jQuery(this).is(":checked")){
						jQuery.ajax({
							   type: "POST",
							   url: "sondage_action.php",
							   data: "sondage="+code_sondage+"&reponse="+jQuery(this).val(),
							   success: function(msg){ 
								if(msg!=""){
								 jQuery("#zone_sondage_"+code_sondage).html(msg);
								}
								
							//	if(jQuery("#zoneaaaa_sondage_"+code_sondage).lenght>0){}
							   }
						});
					}
			});
			
	}
function redirectionTheme(page,type){
	var char ='';
	char +=page;
	if(char != '' && type !=""){
		char += "_T"+type;
	}
	if(char!=''){
		document.location.href =char;
	}}
	
function menu_header(){
	jQuery(".plus").next().hide();
	jQuery(".plus").click(function(){
		var elem = jQuery(this).next();
		if(elem.is(":hidden")){
			elem.slideDown();
			jQuery(this).addClass("plusactive");
			}
		else {
			elem.slideUp();
			jQuery(this).removeClass("plusactive");
			}
		
		});
	
	}

	
function menu_h2(){
	jQuery(".link_plus").click(function(){
		var elem = jQuery(this).next().next();
		if(elem.is(":hidden")){
			elem.slideDown();
			jQuery(".plus").addClass("plusactive");
			}
		else {
			elem.slideUp();
			jQuery(".plus").removeClass("plusactive");
			}
		
		});
	
	}