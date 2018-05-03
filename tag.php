<?php
/**
 * The template for displaying tag pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

get_header();
$tag = get_queried_object();
$tag_id = $tag->id;
$tag_name = $tag->name;
?>
    <?php
    if ( have_posts() ) :
	/* Start the Loop */
	echo '<div class="row mb-2">';
        echo '<div class="col-md-12 blog-main">';
        echo '<h2 class="mb-3 p-3 bg-white border border-dark rounded"><i class="fas fa-tag fa-lg fa-fw"></i> ' . sprintf( /* translators: tag */ __( 'Tag: %s', 'gustrumexlibro' ), single_tag_title( '', false ) ) .'</h2>';
        echo '</div>';
	echo '<div class="col-md-8 blog-main">';
	while ( have_posts() ) : the_post();
	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	?>
	    <?php get_template_part( 'template-parts/content', 'tag' ); ?>
	<?php
	endwhile;
        
	the_posts_navigation();
        echo '</div><!-- col -->';
        set_query_var( 'tag_id', absint( $tag_id ) );
        set_query_var( 'tag_name', $tag_name );
        get_template_part( 'template-parts/sidebar', 'tag' );
        echo '</div><!-- row -->';
    else :
	echo '<div class="row mb-2">';
	get_template_part( 'template-parts/content', 'none' );
	echo '</div><!-- row -->';
    endif; ?>
<?php
//get_sidebar();
get_footer();
