<?php
/**
 * The template for displaying a ranking page
 *
 * Template Name: Palmares 2018
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
$palmares_date = 2018;
get_header();
?>
	<div class="row mb-2">
	    <div class="col-md-8 blog-main">
<?php
while ( have_posts() ) : the_post();
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    <div class="mb-3 p-3 bg-white border border-dark rounded">
			<header class="entry-header">
			    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content text-justify">
			    <?php
			    the_content();
			    wp_link_pages(
			        array(
				    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gustumexlibro' ),
				    'after'  => '</div>'
				)
			    );
			    ?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
			    <?php
			    edit_post_link(
				sprintf(
				    wp_kses(
				    /* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'gustumexlibro' ),
					array(
					    'span' => array(
						'class' => array()
					    ),
					)
				    ),
				    get_the_title()
				),
				'<span class="edit-link d-block p-1 border border-danger rounded">',
				'</span>'
			    );
			    ?>
			</footer><!-- .entry-footer -->
			<?php endif; ?>
		    </div>
		</article><!-- #post-<?php the_ID(); ?> -->
<?php
endwhile; // End of the loop.
$palmares_query = new WP_Query(
    array(
	'posts_per_page'=> -1,
	'post_type'	=> 'post',
	'year'		=> $palmares_date,
	'meta_key'	=> 'note_average',
	'orderby'	=> array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
	'order'		=> 'DESC'
    )
);
if ( $palmares_query->have_posts() ) :
    $i = 1;
    while ( $palmares_query->have_posts() ): $palmares_query->the_post();
	$test_aesthetic = $post->note_aesthetic;
	$test_texture = $post->note_texture;
	$test_taste = $post->note_taste;
	$test_balance = $post->note_balance;
	$test_average = $post->note_average;
	if($test_aesthetic == 0) {
	    $color_aesthetic = 'dark text-white';
	} else if($test_aesthetic >= 6) {
	    $color_aesthetic = 'success';
	} else if($test_aesthetic == 5) {
	    $color_aesthetic = 'warning';
	} else {
	    $color_aesthetic = 'danger';
	}
	if($test_texture == 0) {
	    $color_texture = 'dark text-white';
	} else if($test_texture >= 6) {
	    $color_texture = 'success';
	} else if($test_texture == 5) {
	    $color_texture = 'warning';
	} else {
	    $color_texture = 'danger';
	}
	if($test_taste == 0) {
	    $color_taste = 'dark text-white';
	} else if($test_taste >= 6) {
	    $color_taste = 'success';
	} else if($test_taste == 5) {
	    $color_taste = 'warning';
	} else {
	    $color_taste = 'danger';
	}
	if($test_balance == 0) {
	    $color_balance = 'dark text-white';
	} else if($test_balance >= 6) {
	    $color_balance = 'success';
	} else if($test_balance == 5) {
	    $color_balance = 'warning';
	} else {
	    $color_balance = 'danger';
	}
	if($test_average == 0) {
	    $color_average = 'dark text-white';
	} else if($test_average >= 6) {
	    $color_average = 'success';
	} else if($test_average == 5) {
	    $color_average = 'warning';
	} else {
	    $color_average = 'danger';
	}
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    <div class="mb-3 p-3 bg-white border border-dark rounded">
			<div class="position-relative text-center">
			    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php gustumexlibro_post_thumbnail(); ?></a>
			    <div class="p-3 font-weight-bold bg-white border border-dark rounded" style="position:absolute;top:45%;left:45%;">
				<i class="fas fa-hashtag fa-2x fa-fw" aria-hidden="true"></i><span class="h2">&nbsp;<?php echo $i; ?></span>
			    </div>
			</div>
			<?php the_title( sprintf( '<h3 class="entry-title mt-2"><a href="%s" class="text-dark nounderline" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<p class="entry-summary py-2">
			    <span class="font-weight-bold text-uppercase"><?php echo $post->company; ?></span>
			    <span class="text-muted"><small><i class="fas fa-map-marker-alt"></i> <?php echo $post->address; ?></small></span>
			</p>
			<p class="card-text my-3 text-center">
			    <span class="badge m-1 p-2 badge-<?php echo $color_aesthetic; ?>">
				<i class="fas fa-eye fa-lg fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $test_aesthetic; ?>/10
			    </span>
			    <span class="badge m-1 p-2 badge-<?php echo $color_texture; ?>">
				<i class="fas fa-braille fa-lg fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $test_texture; ?>/10
			    </span>
			    <span class="badge m-1 p-2 badge-<?php echo $color_taste; ?>">
				<i class="fas fa-utensils fa-lg fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $test_taste; ?>/10
			    </span>
			    <span class="badge m-1 p-2 badge-<?php echo $color_balance; ?>">
				<i class="fas fa-balance-scale fa-lg fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $test_balance; ?>/10
			    </span>
			    <span class="badge m-1 p-2 badge-<?php echo $color_average; ?>">
				<i class="fas fa-gavel fa-lg fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $test_average; ?>/10
			    </span>
			</p>
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
<?php
    $i++;
    the_posts_navigation();
    endwhile;
endif;    
echo '	    </div><!-- /.col -->';
set_query_var( 'palmares_date', absint( $palmares_date ) );
get_template_part( 'template-parts/sidebar', 'palmares' );
?>
	</div><!-- .row -->
<?php
get_footer();