/* globals jQuery, sowb */

var sowb = window.sowb || {};

jQuery( function( $ ) {
	var getAnchors = function() {
		var anchors = {},
			possibleAnchors = [];
		if ( ! window.location.hash ) {
			return {};
		}

		// Are there mutiple anchors set?
		if ( window.location.hash.indexOf( ',' ) > -1 ) {
			possibleAnchors = window.location.hash.split( ',' );
		} else {
			possibleAnchors.push( window.location.hash );
		}

		for ( var i = 0; i < possibleAnchors.length; i++ ) {
			anchors[ possibleAnchors[ i ].replace( /[0-9#]/g, '' ) ] = parseInt( possibleAnchors[ i ].replace( /[^0-9]/g, '' ) );
		}

		return anchors;
	};

	$( sowb ).on( 'carousel_setup', function( e ) {
		// Change carousel slides after setup.
		var anchors = getAnchors();
		if ( anchors ) {
			var scrolled = false;
			for ( var anchor in anchors ) {
				$( '.so-widget-sow-anything-carousel .sow-carousel-wrapper[data-anchor="' + anchor +'"]' ).find( '.sow-carousel-items' ).slick( 'slickGoTo', anchors[ anchor ] );
				// If this is the first carousel that's been adjusted, scroll to it.
				if ( ! scrolled ) {
					var navOffset = 90; // Add some magic number offset to make space for possible nav menus etc.
					$( 'body, html' ).animate( {
						scrollTop: $( '.so-widget-sow-anything-carousel .sow-carousel-wrapper[data-anchor="' + anchor +'"]' ).parent().parent().offset().top - navOffset,
					}, 200 );
					scrolled = true;
				}
			}
		}

		$( '.so-widget-sow-anything-carousel .sow-carousel-items.slick-initialized' ).on( 'afterChange', function( e, slick, currentSlide ) {
			var carousel = $( slick.$slider ).parent();
			// If this carousel doesn't have an achor set, don't proceed.
			if ( ! carousel.data( 'anchor' ) ) {
				return;
			}

			anchors = getAnchors();
			if ( $.isEmptyObject( anchors ) ) {
				window.location.hash = carousel.data( 'anchor' ) + currentSlide;
			} else {
				newAnchors = getAnchors();

				// Remove the current anchor if the user navigated back to the first item.
				if ( currentSlide == 0 ) {
					delete newAnchors[ carousel.data( 'anchor' ) ];
				} else {
					newAnchors[ carousel.data( 'anchor' ) ] = currentSlide;
				}

				if ( $.isEmptyObject( newAnchors ) ) {
					window.history.pushState( '', document.title, window.location.pathname + window.location.search );
				} else if ( newAnchors != anchors ) {
					var hash = '';
					for ( var anchor in newAnchors ) {
						hash += ( hash != '' ? ',' : '' ) + anchor + newAnchors[ anchor ];
					}
					window.location.hash = hash;
				}
			}
		} );
	} );
} );

window.sowb = sowb;
