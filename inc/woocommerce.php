<?php
/**
 * gustumexlibro functions and definitionsfor WooCommerce plugin
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gustumexlibro
 */

/**
 * Customize the WooCommerce's breadcrumbs
 *
 * @since 1.0.0
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'gustumexlibro_wc_breadcrumbs' );
function gustumexlibro_wc_breadcrumbs() {
    return array(
            'delimiter'   => ' &gt; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

