<?php

function elementor_add_font_group( $groups ) {

    $groups[ 'tfe' ] = __( 'Thai Fonts', 'elementor-tfe-fonts' );

    return $groups;
}

function elementor_add_fonts( $elementor_fonts ) {

    $fonts = get_option('tfe-fonts');

    if ( ! $fonts ) {
        return $elementor_fonts;
    }

    foreach ( $fonts as $font ) {
        $font = ucwords(str_replace("-"," ",$font));
        $elementor_fonts[ $font ] = 'tfe';
    }

    return $elementor_fonts;
}