<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

get_header();
?>
	<div class="row mb-2">
	    <div class="col-md-8 blog-main">
<?php
while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content', 'page' );
	gustumexlibro_posts_nav();
	echo '</div><!-- /.col-md-8 -->';
endwhile; // End of the loop.
get_template_part( 'template-parts/sidebar', 'page' );
?>
	</div><!-- .row -->
<?php
get_footer();