<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

get_header();
?>
    <?php
    if ( have_posts() ) :
	/* Start the Loop */
	echo '<div class="row mb-2">';
	echo '<div class="col-md-8 blog-main">';
	while ( have_posts() ) : the_post();
	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	?>
	    <?php get_template_part( 'template-parts/content', 'search' ); ?>
	<?php
	endwhile;
        
	the_posts_navigation();
        echo '</div><!-- col -->';
        get_template_part( 'template-parts/sidebar', 'search' );
        echo '</div><!-- row -->';
    else :
	echo '<div class="row mb-2">';
	get_template_part( 'template-parts/content', 'none' );
	echo '</div><!-- row -->';
    endif; ?>
<?php
//get_sidebar();
get_footer();
