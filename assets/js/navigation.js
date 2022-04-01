/**
 * File navigation.js.
 *
 */

jQuery(document).ready(function() {

	var toggleButton = jQuery('.menu-toggle'),
    	menuWrap = jQuery('.menu-wrap'),
    	sidebarArrow = jQuery('.sidebar-menu-arrow'),
		menuItem = jQuery('.menu-item').children('a');

		menuItem.css('display','none');

	// Hamburger button

	if (jQuery('#wpadminbar').css('position','fixed')) {
		jQuery('#wpadminbar').css('display','none');
	}
	
	toggleButton.on('click', function() {
		if ( jQuery(this).hasClass('button-open') ) {
			jQuery(this).removeClass('button-open');
			
			jQuery('.animated-character').slideUp(function(){
				menuWrap.slideUp();
			});

		} else { jQuery(this).addClass('button-open');
				menuWrap.slideDown(300, function(){
					menuItem.css('display','block');
					menuItem.each(function(index){
						var itemCharacters = jQuery(this).text().split("");
						$this = jQuery(this);
						$this.empty();
						jQuery.each(itemCharacters, function(i, el) {
							$this.append('<span>' + el +  "</span>");
							var animatedCharacters = $this.children("span");
							animatedCharacters.css('opacity','0');
							jQuery.each(animatedCharacters, function(i, a) {
								setTimeout(function() {
                        			jQuery(a).addClass('animated-character');
                    			}, 25 * (i ++));
							});
						});
					});					
				});
		}
	});


	// Sidebar navigation arrows

	sidebarArrow.click(function() {
		jQuery(this).next().slideToggle(300);
	});

});
