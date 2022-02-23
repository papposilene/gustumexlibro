<?php
/**
 * Template part for displaying single content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="p-3 bg-white border border-dark rounded">
		<?php gustumexlibro_post_thumbnail(); ?>
		<div class="card my-3">
		    <div class="card-header">
				<ul class="nav nav-tabs card-header-tabs" id="infoTab" role="tablist">
				    <li class="nav-item">
					<a class="nav-link active" id="notation-tab" data-toggle="tab" href="#notation" role="tab" aria-controls="notation" aria-selected="true"><?php /* translators: verdict on the tested product */ esc_html_e( 'Verdict', 'gustumexlibro' ); ?></a>
				    </li>
				    <li class="nav-item">
					<a class="nav-link" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="false"><?php /* translators: informations about the tested company */ esc_html_e( 'Company Info', 'gustumexlibro' ); ?></a>
				    </li>
				    <li class="nav-item">
					<a class="nav-link" id="meta-tab" data-toggle="tab" href="#meta" role="tab" aria-controls="meta" aria-selected="false"><?php /* translators: informations */ esc_html_e( 'Informations', 'gustumexlibro' ); ?></a>
				    </li>
				</ul>
			</div>
		    <div class="tab-content" id="infoTabContent">
				<div class="card-body tab-pane fade show active" id="notation" role="tabpanel" aria-labelledby="notation-tab">
				    <p class="card-text p-2 m-3 text-center">
					<?php
					$test_aesthetic = $post->note_aesthetic;
					$test_texture = $post->note_texture;
					$test_taste = $post->note_taste;
					$test_balance = $post->note_balance;
					$test_average = $post->note_average;
					$price_currency = $post->currency;
					$price_amount = $post->cost;

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
					<span class="badge m-2 p-2 badge-info">
					    <i class="fas fa-money-bill-wave fa-lg fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $price_currency; ?> <?php echo $price_amount; ?>
					</span>
				    </p>
				    <p class="card-text text-muted text-justify">
					<small>
					    <?php esc_html_e( 'The verdict meets the requirements of the rating scale and reflects the judgments rendered by the jurors who took part in the tasting.', 'gustumexlibro' ); ?>
					</small>
				    </p>
				</div>
				<div class="card-body tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
				    <p class="card-title font-weight-bold text-uppercase"><?php echo $post->company; ?></p>
				    <p class="card-text">
					<i class="fas fa-address-card fa-lg fa-fw"></i> <?php echo $post->address; ?><br />
					<i class="fas fa-map-marker fa-lg fa-fw"></i> <?php echo $post->geo_latitude . ', ' .$post->geo_longitude; ?>
				    </p>
				    <p class="card-text">
					<?php
					$link_official = $post->link_official;
					$link_facebook = $post->link_facebook;
					$link_twitter = $post->link_twitter;
					$link_instagram = $post->link_instagram;
					$link_pinterest = $post->link_pinterest;
					$link_googleplus = $post->link_googleplus;
					$link_linkedin = $post->link_linkedin;
					$link_friend = $post->link_friend;
					?>
					<?php if ($link_official) { ?><a class="btn text-dark flickr" href="<?php echo esc_url($link_official); ?>"><i class="fas fa-link fa-lg"></i></a><?php } ?>
					<?php if ($link_facebook) { ?><a class="btn text-dark facebook" href="<?php echo esc_url($link_facebook); ?>"><i class="fab fa-facebook fa-lg"></i></a><?php } ?>
					<?php if ($link_twitter) { ?><a class="btn text-dark twitter" href="<?php echo esc_url($link_twitter); ?>"><i class="fab fa-twitter fa-lg"></i></a><?php } ?>
					<?php if ($link_instagram) { ?><a class="btn text-dark instagram" href="<?php echo esc_url($link_instagram); ?>"><i class="fab fa-instagram fa-lg"></i></a><?php } ?>
					<?php if ($link_pinterest) { ?><a class="btn text-dark pinterest" href="<?php echo esc_url($link_pinterest); ?>"><i class="fab fa-pinterest-square fa-lg"></i></a><?php } ?>
					<?php if ($link_googleplus) { ?><a class="btn text-dark google-plus" href="<?php echo esc_url($link_googleplus); ?>"><i class="fab fa-google-plus fa-lg"></i></a><?php } ?>
					<?php if ($link_linkedin) { ?><a class="btn text-dark linkedin" href="<?php echo esc_url($link_linkedin); ?>"><i class="fab fa-linkedin fa-lg"></i></a><?php } ?>
					<?php if ($link_friend) { ?><a class="btn text-dark friend" href="<?php echo esc_url($link_friend); ?>"><i class="fas fa-external-link-alt fa-lg"></i></a><?php } ?>
				    </p>
				    <div id="map_company" style="min-height:180px;"></div>
				    <script>
				    var gustumexlibro_map = L.map('map_company').setView([<?php echo $post->geo_latitude; ?>, <?php echo $post->geo_longitude; ?>], 13);
				    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(gustumexlibro_map);
				    L.marker([<?php echo $post->geo_latitude; ?>, <?php echo $post->geo_longitude; ?>]).addTo(gustumexlibro_map);
				    gustumexlibro_map.on();
				    </script>
				</div>
				<div class="card-body tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
				    <p class="card-text"><?php gustumexlibro_postedby_header();  ?></p>
				    <p class="card-text"><?php gustumexlibro_postedon_header(); ?></p>
				    <p class="card-text"><?php gustumexlibro_entrymeta_header(); ?></p>
				</div>
			</div><!-- .tab-content -->
		</div><!-- .card -->
		<?php
	    the_title( '<h2 class="blog-post-title entry-title p-3 mb-0 text-center">', '</h2>' );
	    ?>
		<?php
		the_content();
		wp_pagenavi( array( 'type' => 'multipart' ) );
		//wp_link_pages(
		//    array(
			/* translators: Pages */
		//	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gustumexlibro' ),
		//	'after'  => '</div>'
		//    )
		//);
		?>
		<ul class="rrssb-buttons clearfix">
			<li class="rrssb-facebook">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="popup">
				    <span class="rrssb-icon"><i class="fab fa-facebook fa-lg"></i></span>
				    <span class="rrssb-text">facebook</span>
				</a>
		    </li>
		    <li class="rrssb-twitter">
				<a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" class="popup">
				    <span class="rrssb-icon"><i class="fab fa-twitter fa-lg"></i></span>
				    <span class="rrssb-text">twitter</span>
				</a>
			</li>
		    <li class="rrssb-googleplus">
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="popup">
				    <span class="rrssb-icon"><i class="fab fa-google-plus fa-lg"></i></span>
				    <span class="rrssb-text">twitter</span>
				</a>
			</li>
		    <li class="rrssb-pinterest">
				<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" class="popup">
				    <span class="rrssb-icon"><i class="fab fa-pinterest fa-lg"></i></span>
				    <span class="rrssb-text">pinterest</span>
				</a>
			</li>
		    <li class="rrssb-tumblr">
				<a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" class="popup">
				    <span class="rrssb-icon"><i class="fab fa-tumblr fa-lg"></i></span>
				    <span class="rrssb-text">tumblr</span>
				</a>
			</li>
		    <li class="rrssb-email">
				<a href="mailto:?Subject=Tu%20Peux%20Pas%20Zeste">
				    <span class="rrssb-icon"><i class="fas fa-at fa-lg"></i></span>
				    <span class="rrssb-text">email</span>
				</a>
			</li>
		</ul>
		<?php if ( get_edit_post_link() ) : ?>
		<p class="entry-footer">
			<?php
		    edit_post_link(
			sprintf(
			    wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'gustumexlibro' ),
				array(
				    'span' => array(
					'class' => array()
				    )
				)
			    ),
				get_the_title()
			),
			'<span class="edit-link d-block mt-3 p-1 border border-danger rounded">',
			'</span>'
		    );
			?>
		</p><!-- .entry-footer -->
		<?php endif; ?>
	</div><!-- /.blog-post -->
</article><!-- #post-<?php the_ID(); ?> -->
<div id="adsense-content" class="mt-3 p-3 bg-white border border-dark rounded">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7962892956627083" crossorigin="anonymous"></script>
		<!-- Footer -->
		<ins class="adsbygoogle"
			style="display:block"
			data-ad-client="ca-pub-7962892956627083"
			data-ad-slot="2947706354"
			data-ad-format="auto"
			data-full-width-responsive="true"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>
<?php
if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
	echo do_shortcode( '[gustumexlibro_jetpackrelatedposts_shortcode]' );
}
?>
