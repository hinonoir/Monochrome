jQuery( function( $ ) {

	// ドロワーメニュー （toggle） //
	$( '.menu-btn' ).on( 'click', function() {
		$( '.drawer-nav' ).toggleClass( 'active' );
		$( '.menu-btn' ).toggleClass( 'toggle' );
	});

	// ドロワーメニュー（画面外クリックで閉じる） //
	$( document ).on( 'click touchend', function( event ) {
		if ( ! $( event.target ).closest( '.drawer-nav' ).length ) {
			$( '.drawer-nav' ).removeClass( 'active' );
			$( '.menu-btn' ).removeClass( 'toggle' );
		}
	});

	// お問い合わせの二重送信防止(disabled可) //
	$( '.wpcf7-form' ).on( 'submit', function() {
		$( this )
			.find( 'input:submit' )
			.attr( 'disabled', 'disabled' );
	});
});
