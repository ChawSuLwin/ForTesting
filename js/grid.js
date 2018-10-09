/**
 * grid.js
 *
 * masonry for
 */

( function( $ ) {
	$(window).load(function() {
		$('.widget-area').masonry({
		  itemSelector: '.widget'
		});
	});
} )( jQuery );
