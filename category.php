<?php
/**
 * The template for displaying tag pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

get_header();
$cat = get_category( get_query_var('cat') );
$cat_id = $cat->cat_ID;
$cat_name = $cat->cat_name;
?>
    <?php
    if ( have_posts() ) :
	/* Start the Loop */
	echo '<div class="row mb-2">';
        echo '<div class="col-md-12 blog-main">';
        echo '<h2 class="mb-3 p-3 bg-white border border-dark rounded"><i class="fas fa-folder-open fa-lg fa-fw"></i> ' . sprintf( /* translators: category */ __( 'Category: %s', 'gustrumexlibro' ), single_cat_title( '', false ) ) .'</h2>';
        echo '</div>';
	echo '<div class="col-md-8 blog-main">';
	while ( have_posts() ) : the_post();
	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	?>
	    <?php get_template_part( 'template-parts/content', 'category' ); ?>
	<?php
	endwhile;
        
	the_posts_navigation();
        echo '</div><!-- col -->';
        set_query_var( 'cat_id', absint( $cat_id ) );
        set_query_var( 'cat_name', $cat_name );
        get_template_part( 'template-parts/sidebar', 'category' );
        echo '</div><!-- row -->';
    else :
	echo '<div class="row mb-2">';
	get_template_part( 'template-parts/content', 'none' );
	echo '</div><!-- row -->';
    endif; ?>
<?php
//get_sidebar();
get_footer();
