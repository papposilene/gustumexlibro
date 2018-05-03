<?php
/**
 * The template for displaying a ranking page
 *
 * Template Name: General Ranking
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
	    <div class="col-md-12 blog-main">
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
		    </div>
		</article><!-- #post-<?php the_ID(); ?> -->
		<article id="post-statistiques" <?php post_class(); ?>>
		    <div class="mb-3 p-3 bg-white border border-dark rounded">
				<div class="entry-content text-justify">
				    <?php
					$stats = wp_count_posts();
					printf( // WPCS: XSS OK.
						/* translators: 1: number of tests since the beginning. */
						_nx( 'Tu Peux Pas Zeste tasted and tested a total of <span class="font-weight-bold">%1$s</span> lemon meringue product since the beginning of the project.', 'Tu Peux Pas Zeste tasted and tested a total of <span class="font-weight-bold">%1$s</span> lemon meringue products since the beginning of the project.', $stats->publish, 'number of tests since the beginning', 'gustumexlibro' ),
						$stats->publish
					);
			    ?>
				</div><!-- .entry-content -->
		    </div>
		</article><!-- #post-<?php the_ID(); ?> -->	
		<ul class="list-group">
<?php
endwhile; // End of the loop.
$palmares_query = new WP_Query(
    array(
	'posts_per_page'=> -1,
	'post_type'	=> 'post',
	'meta_key'	=> 'note_average',
	'orderby'	=> array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
	'order'		=> 'DESC'
    )
);
if ( $palmares_query->have_posts() ) :
    $i = 1;
    while ( $palmares_query->have_posts() ): $palmares_query->the_post();
	$test_average = $post->note_average;
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
		<li class="list-group-item d-flex justify-content-between align-items-center border border-dark">
			<a href="<?php the_permalink(); ?>" class="text-dark nounderline" rel="bookmark"><?php the_title( sprintf( '<h3 class="mb-1">#%s ', $i ), '</h3>' ); ?></a>
			<span class="badge m-1 p-2 badge-<?php echo $color_average; ?>">
				<i class="fas fa-gavel fa-lg fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $test_average; ?>/10
			</span>
		</li>
<?php
    $i++;
    endwhile;
endif;    
?>
		</ul>
	</div><!-- /.col -->
<?php
get_footer();