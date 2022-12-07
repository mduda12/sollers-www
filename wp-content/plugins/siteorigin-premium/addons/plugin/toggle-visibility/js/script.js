/* globals jQuery, pikaday */

( function( $ ) {
	$( document ).on( 'setup_style_fields', function( e, view ) {
		var date_from = view.$el.find( '.so-field-toggle_date_from' );
			date_to = view.$el.find( '.so-field-toggle_date_to' ),
			date_display = view.$el.find( '.so-field-toggle_display' );

		view.$el.find( '.so-field-toggle_scheduling input[type="checkbox"]' ).on( 'change', function() {
			let $$ = $( this );

			if ( $$.is( ':checked' ) ) {
				date_from.show();
				date_to.show();
				date_display.show();
			} else {
				date_from.hide();
				date_to.hide();
				date_display.hide();
			}
		} ).trigger( 'change' );

		date_from.find( 'input[name="style[toggle_date_from]"]' ).pikaday( {
			isRTL: soPremiumToggleVisibilityAddon.isRTL,
			i18n: soPremiumToggleVisibilityAddon.i18n,
		} );
		date_to.find( 'input[name="style[toggle_date_to]"]' ).pikaday( {
			isRTL: soPremiumToggleVisibilityAddon.isRTL,
			i18n: soPremiumToggleVisibilityAddon.i18n,
		} );
	} );

} )( jQuery );
