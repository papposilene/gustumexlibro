<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

?>
	    <div class="col-md-7">
		<section class="no-results not-found">
		    <div class="card bg-white p-3 border-dark rounded">
			<div class="card-body">
			    <h2 class="card-title"><?php esc_html_e( 'Nothing Found', 'gustumexlibro' ); ?></h2>
			    <p class="card-text text-center">
			        <?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
				<p class="card-text my-2"><?php
				printf(
				    wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'gustumexlibro' ),
					array(
					    'a' => array(
						'href' => array(),
					    ),
					)
				    ),
				    esc_url( admin_url( 'post-new.php' ) )
				);
			    ?></p>
			    <?php elseif ( is_search() ) : ?>
			    <p class="card-text my-2"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gustumexlibro' ); ?></p>
			    <?php else : ?>
			    <p class="card-text my-2"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gustumexlibro' ); ?></p>
			    <?php endif; ?>
			    <div class="pt-3 d-flex justify-content-center">
				<form class="form-inline" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
				    <div class="input-group">
					<input type="search" class="form-control border border-dark"
					    placeholder="<?php echo _e( 'Search', 'gustumexlibro' ) ?>"
					    value="<?php echo get_search_query() ?>" name="s"
					    title="<?php echo _e( 'Search for:', 'gustumexlibro' ) ?>" />
					<div class="input-group-append">
					    <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
					</div>
				    </div>
				</form>
			    </div>
			</div><!-- .card-body -->
		    </div><!-- .card -->
		</section><!-- .no-results -->
	    </div><!-- .col -->
	    <div class="col-md-5">
		<div class="card bg-white p-3 border-dark rounded">
		    <div class="card-body">
			<h3 class="card-title"><?php esc_html_e( 'Recents Posts', 'gustumexlibro' ); ?></h3>
			<?php
			$recentposts_args = array(
			    'numberposts' => 5,
			    'post_type' => 'post',
			    'post_status' => 'publish'
			);
			$recent_posts = wp_get_recent_posts( $recentposts_args, ARRAY_A );
			?>
			<ul class="list-group list-group-flush">
			<?php
			foreach( $recent_posts as $recent ){
			    $test_average = get_post_meta($recent['ID'], 'note_average', true);
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
			<li class="list-group-item p-1 d-flex justify-content-between align-items-start">
			    <a href="<?php echo get_permalink($recent['ID']); ?>" class="text-dark nounderline" rel="bookmark" title="Permanent Link to <?php echo get_permalink($recent['ID']); ?>"><?php echo $recent['post_title']; ?></a>
			    <span class="badge badge-<?php echo $color_average; ?>"><?php echo $test_average; ?>/10</span>
			</li>
			<?php
			}
			wp_reset_query();
			?>
			    <li class="list-group-item d-flex justify-content-center align-items-center text-center">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-dark" rel="home"><i class="fas fa-home fa-lg"></i> <?php esc_html_e( 'Back to home', 'gustumexlibro' ); ?></a>
			    </li>
			</ul>
		    </div><!-- .card-body -->
		</div><!-- .card -->
	    </div><!-- .col -->