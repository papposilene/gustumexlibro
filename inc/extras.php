<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package gustumexlibro
 */

/**
 * Footer Credits
*/
if ( ! function_exists( 'gustumexlibro_credits' ) ) :
    function gustumexlibro_credits(){
	$text = '<p class="pl-3 text-dark">';
        $text .=  esc_html__( '&copy; ', 'gustumexlibro' ) . date_i18n( 'Y' );
        $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '" class="text-dark">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.<br />';
        $text .= 'Theme <em><a href="' . esc_url( 'https://github.com/papposilene/gustumexlibro' ) .'" class="text-dark" target="_blank" rel="noopener">' . esc_html__( 'Gustum Ex Libro', 'gustumexlibro' ) .'</a></em>, ';
	$text .= 'built by <a href="' . esc_url( 'https://papposilene.com/' ) .'" class="text-dark" target="_blank" rel="noopener">' . esc_html__( 'papposilene', 'gustumexlibro' ) .'</a> ';
        $text .= sprintf( esc_html__( 'for %s', 'gustumexlibro' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'gustumexlibro' ) ) .'" class="text-dark" target="_blank" rel="noopener">WordPress</a>.' );
	$text .= '</p>';
        echo apply_filters( 'gustumexlibro_footer_text', $text );
    }
    add_action( 'gustumexlibro_footer', 'gustumexlibro_credits' );
endif;