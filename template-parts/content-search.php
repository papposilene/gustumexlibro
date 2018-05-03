<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    <div class="mb-3 p-3 bg-white border border-dark rounded">
			<?php the_title( sprintf( '<h2 class="entry-title text-dark nounderline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
			<?php gustumexlibro_post_thumbnail(); ?>
			
			<div class="entry-summary">
			    <?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			
			<footer class="entry-footer text-muted">
			    <small><?php
			        gustumexlibro_postedon_footer();
			        gustumexlibro_postedby_footer();
			        gustumexlibro_entrymeta_footer();
			    ?></small>
			</footer><!-- .entry-footer -->
		    </div>
		</article><!-- #post-<?php the_ID(); ?> -->
