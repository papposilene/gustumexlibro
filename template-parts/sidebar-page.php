<?php
/**
 * Template part for displaying sidebar content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

?>
	    <div class="col-md-4 blog-sidebar d-none d-sm-block">
		<div class="card bg-white border-dark mb-3 rounded">
		    <div class="card-body">
			<h3 class="card-title"><?php esc_html_e( 'Stats', 'gustumexlibro' ); ?></h3>
			<p class="card-text text-justify">
			    <?php
			    $stats = wp_count_posts();
			    printf( // WPCS: XSS OK.
				/* translators: 1: number of tests since the beginning. */
				_nx( 'Tu Peux Pas Zeste tasted and tested a total of <span class="font-weight-bold">%1$s</span> lemon meringue product since the beginning of the project.', 'Tu Peux Pas Zeste tasted and tested a total of <span class="font-weight-bold">%1$s</span> lemon meringue products since the beginning of the project.', $stats->publish, 'number of tests since the beginning', 'gustumexlibro' ),
				$stats->publish
			    );
			    ?>
			</p>
		    </div><!-- .card-body -->
		</div><!-- .card -->
		<div class="card bg-white border-dark mb-3 rounded">
		    <div class="card-body">
			<h3 class="card-title"><?php esc_html_e( 'Newsletter', 'gustumexlibro' ); ?></h3>
			<p class="card-text text-justify">
				<!-- Begin MailChimp Signup Form -->
				<form action="https://tupeuxpaszeste.us14.list-manage.com/subscribe/post?u=b9f78e03c0a3be173e08e1cf7&amp;id=464329c7d5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div class="form-group">
						<input type="email" id="mce-EMAIL" class="form-control form-control-sm border border-secondary" placeholder="<?php esc_html_e( 'you@tupeuxpaszeste.fr', 'gustumexlibro' ); ?>" aria-label="Email" aria-describedby="basic-addon1">
					</div>
					<div class="form-group">
						<input type="text" id="mce-FNAME" class="form-control form-control-sm border border-secondary" placeholder="<?php esc_html_e( 'First Name', 'gustumexlibro' ); ?>" aria-label="First Name" aria-describedby="basic-addon2">
					</div>
					<div class="form-group">
						<input type="text" id="mce-LNAME" class="form-control form-control-sm border border-secondary" placeholder="<?php esc_html_e( 'Last Name', 'gustumexlibro' ); ?>" aria-label="Last Name" aria-describedby="basic-addon3">
					</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b9f78e03c0a3be173e08e1cf7_464329c7d5" tabindex="-1" value=""></div>
					<button type="submit" class="btn btn-dark btn-sm btn-block" name="subscribe" id="mc-embedded-subscribe"><?php esc_html_e( 'Subscribe', 'gustumexlibro' ); ?></button>
					<small><?php esc_html_e( '* indicates required.', 'gustumexlibro' ); ?></small>
				</form>
			</p>
			<p class="card-text text-center">
				<small><a href="https://us14.campaign-archive.com/home/?u=b9f78e03c0a3be173e08e1cf7&id=464329c7d5" class="text-dark nounderline" target="_blank" rel="noopener" title="<?php esc_html_e( 'View previous campaigns.', 'gustumexlibro' ); ?>"><i class="fas fa-archive"></i> <?php esc_html_e( 'View previous campaigns.', 'gustumexlibro' ); ?></a></small>
			</p>
		    </div><!-- .card-body -->
		</div><!-- .card -->
		<div class="card bg-white border-dark mb-3 rounded">
		    <div class="card-body">
			<h3 class="card-title"><?php esc_html_e( 'General Ranking', 'gustumexlibro' ); ?></h3>
			<ul class="list-group list-group-flush">
			<?php
			$related = new WP_Query(
			    array(
				'posts_per_page' => 10,
				'meta_key' => 'note_average',
				'orderby' => 'meta_value_num',
				'post__not_in'   => array( $post->ID )
			    )
			);

			if( $related->have_posts() ) {
			    while( $related->have_posts() ) {
				$related->the_post();
				$test_average = $post->note_average;
				if($test_average >= 6) {
				    $color_average = 'success';
				} else if($test_average == 5) {
				    $color_average = 'warning';
				} else {
				    $color_average = 'danger';
				}
			?>
			    <li class="list-group-item p-1 d-flex justify-content-between align-items-start">
				<a href="<?php the_permalink(); ?>" class="text-dark nounderline" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				<span class="badge badge-<?php echo $color_average; ?>"><?php echo $test_average; ?>/10</span>
			    </li>
			<?php
			    }
			    wp_reset_postdata();
			}
			?>
			</ul>
		    </div><!-- .card-body -->
		</div><!-- .card -->
	    </div><!-- .blog-sidebar -->