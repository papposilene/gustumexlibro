<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gustumexlibro
 */

?>
    </main><!-- /.container -->

    <footer class="blog-footer bg-white mt-2 border border-dark rounded-top">
	<div class="row d-flex justify-content-between align-items-start">
	    <div class="col-4 pt-1"></div>
	    <div class="col-4 text-center">
		<a href="#"><i class="fas fa-chevron-up fa-2x" /></i></a>
	    </div>
	    <div class="col-4 d-flex justify-content-center">
		<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline d-none d-sm-block">
		    <div class="input-group mb-3">
			<input class="form-control border border-dark" name="s" type="search" placeholder="<?php _e('Search', 'gustumexlibro') ?>" aria-label="<?php _e('Search', 'gustumexlibro') ?>">
			<div class="input-group-append">
			    <button class="btn btn-outline-dark" type="button"><i class="fas fa-search"></i></button>
			</div>
		    </div>
		</form>
	    </div>
        </div>
	<div class="row d-flex justify-content-between align-items-start">
	    <div class="col-12 py-1">
		<?php
		$socialfooter = get_theme_mod('gustumexlibro_sociallinks_footer', '0');
		$facebook = get_theme_mod('gustumexlibro_sociallinks_facebook_url');
		$twitter = get_theme_mod('gustumexlibro_sociallinks_twitter_url');
		$instagram = get_theme_mod('gustumexlibro_sociallinks_instagram_url');
		$flickr = get_theme_mod('gustumexlibro_sociallinks_flickr_url');
		$pinterest = get_theme_mod('gustumexlibro_sociallinks_pinterest_url');
		$lastfm = get_theme_mod('gustumexlibro_sociallinks_lastfm_url');
		$spotify = get_theme_mod('gustumexlibro_sociallinks_spotify_url');
		$spnachat = get_theme_mod('gustumexlibro_sociallinks_snapchat_url');
		$youtube = get_theme_mod('gustumexlibro_sociallinks_youtube_url');
		$googleplus = get_theme_mod('gustumexlibro_sociallinks_googleplus_url');
		$linkedin = get_theme_mod('gustumexlibro_sociallinks_linkedin_url');
		if ($socialfooter) {
		?>
		<?php if ($facebook) { ?><a class="btn text-dark facebook" href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook fa-lg"></i></a><?php } ?>
	        <?php if ($twitter) { ?><a class="btn text-dark twitter" href="<?php echo esc_url($twitter); ?>"><i class="fab fa-twitter fa-lg"></i></a><?php } ?>
	        <?php if ($instagram) { ?><a class="btn text-dark instagram" href="<?php echo esc_url($instagram); ?>"><i class="fab fa-instagram fa-lg"></i></a><?php } ?>
		<?php if ($flickr) { ?><a class="btn text-dark flickr" href="<?php echo esc_url($flickr); ?>"><i class="fab fa-flickr fa-lg"></i></a><?php } ?>
	        <?php if ($pinterest) { ?><a class="btn text-dark pinterest" href="<?php echo esc_url($pinterest); ?>"><i class="fab fa-pinterest-square fa-lg"></i></a><?php } ?>
		<?php if ($lastfm) { ?><a class="btn text-dark lastfm" href="<?php echo esc_url($lastfm); ?>"><i class="fab fa-lastfm-square fa-lg"></i></a><?php } ?>
		<?php if ($spotify) { ?><a class="btn text-dark " href="<?php echo esc_url($spotify); ?>"><i class="fab fa-spotify fa-lg"></i></a><?php } ?>
	        <?php if ($snapchat) { ?><a class="btn text-dark snapchat" href="<?php echo esc_url($snapchat); ?>"><i class="fab fa-snapchat fa-lg"></i></a><?php } ?>
	        <?php if ($youtube) { ?><a class="btn text-dark youtube" href="<?php echo esc_url($youtube); ?>"><i class="fab fa-youtube fa-lg"></i></a><?php } ?>
	        <?php if ($googleplus) { ?><a class="btn text-dark google-plus" href="<?php echo esc_url($googleplus); ?>"><i class="fab fa-google-plus fa-lg"></i></a><?php } ?>
		<?php if ($linkedin) { ?><a class="btn text-dark linkedin" href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin fa-lg"></i></a><?php } ?>
		<?php } ?>
	    </div>
	</div>
	<div class="row d-flex justify-content-between align-items-start">
	    <div class="col-12 pt-1">
		<?php do_action('gustumexlibro_footer'); ?>
	    </div>
	</div>
    </footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
