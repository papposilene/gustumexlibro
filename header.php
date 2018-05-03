<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gustumexlibro
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
	<header class="blog-header py-3">
	    <div class="row flex-nowrap justify-content-between align-items-center">
		<div class="col-12 text-center">
		    <h1><?php
		    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                the_custom_logo();
            ?>
            </h1>
            <?php
		    } else {
		    ?>
		    <h1 class="site-title d-block p-2 rounded"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="blog-header-logo text-dark" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		    <?php
		    $description = get_bloginfo( 'description', 'display' );
		    if ( $description || is_customize_preview() ) : ?>
		    <p class="site-description d-block p-2 rounded"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
		    <?php
		    endif;
		    }
		    ?>
		</div>
	    </div>
	</header>
	
	<nav id="site-navigation" class="navbar navbar-expand-md navbar-light bg-white mt-3 mb-4 border border-dark rounded" role="navigation">
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-topmenu" aria-controls="navbar-topmenu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	    </button>

	    <?php
	    wp_nav_menu(
		array(
		    'theme_location'    => 'menu-top',
		    'depth'             => 2,
		    'container'         => 'div',
		    'container_class'   => 'collapse navbar-collapse',
		    'container_id'      => 'navbar-topmenu',
		    'menu_class'        => 'navbar-nav mr-auto',
		    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		    'walker'            => new WP_Bootstrap_Navwalker()
		)
	    );
	    ?>
	    <form class="form-inline my-2 my-lg-0 d-none d-sm-block" action="<?php echo home_url( '/' ); ?>" method="get">
		<input class="form-control mr-sm-2" name="s" type="search" placeholder="<?php _e('Search', 'gustumexlibro') ?>" aria-label="<?php _e('Search', 'gustumexlibro') ?>">
	    </form>
	</nav><!-- #site-navigation -->

	<main role="main" class="container">