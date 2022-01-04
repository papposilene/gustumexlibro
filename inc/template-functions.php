<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package gustumexlibro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gustumexlibro_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
	$classes[] = 'hfeed';
    }

    return $classes;
}
add_filter( 'body_class', 'gustumexlibro_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function gustumexlibro_pingback_header() {
    if ( is_singular() && pings_open() ) {
	echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'gustumexlibro_pingback_header' );

function gustumexlibro_nav_link_attributes() {
    return 'class="text-dark"';
}
add_filter( 'next_posts_link_attributes', 'gustumexlibro_nav_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'gustumexlibro_nav_link_attributes' );

function _gustumexlibro_nav_markup( $links, $class = 'posts-navigation', $screen_reader_text = '' ) {
    if ( empty( $screen_reader_text ) ) {
	$screen_reader_text = __( 'Posts navigation' );
    }
    $template = '
    <nav class="navigation %1$s p-3 bg-white border border-dark rounded" role="navigation">
	<div class="nav-links d-flex justify-content-center">%3$s</div>
    </nav>';
    return sprintf( $template, sanitize_html_class( $class ), esc_html( $screen_reader_text ), $links );
}

if ( ! function_exists( 'gustumexlibro_posts_nav' ) ) :
    function gustumexlibro_posts_nav() {
	$navigation = '';
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
		$args = wp_parse_args( $args, array(
			'prev_text'          => __( 'Older posts' ),
			'next_text'          => __( 'Newer posts' ),
			'screen_reader_text' => __( 'Posts navigation' ),
		) );
		$next_link = get_previous_posts_link( $args['next_text'] );
		$prev_link = get_next_posts_link( $args['prev_text'] );
		if ( $prev_link ) {
			$navigation .= '<div class="nav-previous pr-3"><i class="fas fa-chevron-left fa-lg"></i> ' . $prev_link . '</div>';
		}
		if ( $next_link ) {
			$navigation .= '<div class="nav-next pl-3">' . $next_link . ' <i class="fas fa-chevron-right fa-lg"></i></div>';
		}
		$navigation = _gustumexlibro_nav_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );
	}
	echo $navigation;
    }
endif;

if ( ! function_exists( 'gustumexlibro_post_nav' ) ) :
    function gustumexlibro_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );
        if ( ! $next && ! $previous ) {
            return;
        }

        ?>
        <nav class="navigation post-navigation mt-3" role="navigation">
	    <!--h3 class="screen-reader-text"><?php /* translators: post navigation */ esc_html_e( 'Post Navigation', 'gustumexlibro' ); ?></h3-->
	    <div class="nav-links d-flex">
		<div class="nav-next justify-content-start">
		    <?php previous_posts_link( __( '<i class="fas fa-chevron-left fa-lg"></i> %link', 'gustumexlibro' ) ); ?>
		</div>
		<div class="nav-next justify-content-end">
		    <?php next_posts_link( __( '%link <i class="fas fa-chevron-right fa-lg"></i>', 'gustumexlibro' ) ); ?>
		</div>
	    </div><!-- .nav-links -->
	</nav><!-- .navigation -->
    <?php
}
endif;
