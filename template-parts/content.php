<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */
?>
	    <div class="col-md-6 p-3">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    <div class="card border-dark">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php gustumexlibro_post_thumbnail(); ?></a>
			<div class="card-body">
			    <h2 class="entry-title text-center"><a href="<?php echo esc_url( get_permalink() ); ?>" class="text-dark nounderline"><?php echo $post->company; ?></a></h2>
			    <?php the_title( '<p class="card-text mt-2 text-center"><a href="' . esc_url( get_permalink() ) . '" class="text-dark nounderline" rel="bookmark">', '</a></p>' ); ?>
			    <p class="card-text py-2 text-center">
				<span class="text-muted"><i class="fas fa-map-marker-alt"></i> <?php echo $post->address; ?></span>
			    </p>
			    <p class="card-text my-3 text-center">
				<?php
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
				} if($test_texture >= 6) {
				    $color_texture = 'success';
				} else if($test_texture == 5) {
				    $color_texture = 'warning';
				} else {
				    $color_texture = 'danger';
				}
				if($test_taste == 0) {
				    $color_taste = 'dark text-white';
				} if($test_taste >= 6) {
				    $color_taste = 'success';
				} else if($test_taste == 5) {
				    $color_taste = 'warning';
				} else {
				    $color_taste = 'danger';
				}
				if($test_balance == 0) {
				    $color_balance = 'dark text-white';
				} if($test_balance >= 6) {
				    $color_balance = 'success';
				} else if($test_balance == 5) {
				    $color_balance = 'warning';
				} else {
				    $color_balance = 'danger';
				}
				if($test_average == 0) {
				    $color_average = 'dark text-white';
				} if($test_average >= 6) {
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
			    </p>
			    <p class="card-text mt-2">
				<?php the_excerpt(); ?>
			    </p>
			</div>
			<div class="card-footer">
			    <small class="text-muted"><?php
			    gustumexlibro_postedon_footer();
			    //gustumexlibro_postedby_footer();
			    //gustumexlibro_entrymeta_footer();
			    ?>.</small>
			</div>
		    </div>
		</article><!-- #post-<?php the_ID(); ?> -->
	    </div><!-- /.col-md-6 -->