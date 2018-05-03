<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
	$breaker = 0;
	while ( have_posts() ) : the_post();
	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	    if ($breaker % 2 == 0) :
		echo $breaker > 0 ? '</div><!-- /.row -->' : '';
		echo '<div class="row mb-2 card-deck">';
	    endif;
	?>
	    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
	<?php
	$breaker++;
	endwhile;
	echo '</div><!-- /.row -->';
	echo '<div class="row mb-2">';
	echo '<div class="col-12">';
	gustumexlibro_posts_nav();
	echo '</div><!-- col -->';
	echo '</div><!-- row -->';
    else :
	echo '<div class="row mb-2">';
	get_template_part( 'template-parts/content', 'none' );
	echo '</div>';
    endif; ?>
<?php
//get_sidebar();
get_footer();
