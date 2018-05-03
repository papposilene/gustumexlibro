<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gustumexlibro
 */

get_header();
?>
	<div class="row mb-2">
	    <div class="col-md-8 blog-main">
<?php
while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content', 'single' );

    //gustumexlibro_post_nav();
    wp_pagenavi();
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
	comments_template();
    endif;
endwhile; // End of the loop.
echo '	    </div><!-- /.blog-main -->';
get_template_part( 'template-parts/sidebar', 'single' );
?>
	</div><!-- .row -->
<?php
get_footer();