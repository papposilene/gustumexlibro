<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package gustumexlibro
 */


/**
 * Ads
*/
if ( ! function_exists( 'gustumexlibro_ads' ) ) :
    function gustumexlibro_ads(){
        $text = '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7962892956627083" crossorigin="anonymous"></script>';
        $text = '<ins class="adsbygoogle"';
        $text = 'style="display:block"';
        $text = 'data-ad-client="ca-pub-7962892956627083"';
        $text = 'data-ad-slot="2947706354"';
        $text = 'data-ad-format="auto"';
        $text = 'data-full-width-responsive="true"></ins>';
        $text = '<script>';
        $text = '(adsbygoogle = window.adsbygoogle || []).push({});';
        $text = '</script>';
        echo $text;
    }
    //add_action( 'gustumexlibro_content', 'gustumexlibro_ads' );
endif;

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
