jQuery(document).ready(function(){
	jQuery( 'table' ).addClass( 'table' );
	jQuery( 'table' ).wrap( '<div class="table-responsive" />' );

	//Blog Layout
	jQuery(function() {
		if( jQuery( '#blog-grid' ).length ) {
			var blogContainer = jQuery( '#blog-grid' );
			blogContainer.imagesLoaded( function() {
				blogContainer.masonry({
					itemSelector: '.post-box'
				});
			});

			jQuery( document.body ).on( 'post-load', function () {
				var newItems = jQuery( '.infinite-wrap .infinite-scroll-item' );
				blogContainer.append( newItems );
				blogContainer.masonry( 'appended', newItems );
				blogContainer.imagesLoaded( function() {
					setTimeout(function (){
						blogContainer.masonry();
					}, 1500);
				});
    		});
		}
	});

	//GoTop Button
	jQuery(function(){
		jQuery(window).scroll(function() {
			if(jQuery(this).scrollTop() > 300) {
				jQuery('#gotop').addClass('visible');
			} else {
				jQuery('#gotop').removeClass('visible');
			}
		});

		jQuery('#gotop').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});
