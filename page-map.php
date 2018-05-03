<?php
/**
 * Template Name: Map
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gustumexlibro
 */

get_header();
$query = new WP_Query(
		array(
			'posts_per_page'=> -1,
			'post_type'	=> 'post',
			'cat'		=> '-1'
			//'meta_key'	=> 'lat'
		) );
?>
	<div class="row mb-2">
	    <div class="col-md-12 blog-main">
                <article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
		    <div class="p-3 bg-white border border-dark rounded">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			<div id="gustumexlibro_map" class="rounded" style="min-height:500px; max-height: 100%; width: 100%;"></div>
			<style>.lemonMarker {margin-top: 8px;}</style>
			<script>
			var note0 = new L.LayerGroup(), note1 = new L.LayerGroup(),
			    note2 = new L.LayerGroup(), note3 = new L.LayerGroup(),
			    note4 = new L.LayerGroup(), note5 = new L.LayerGroup(),
			    note6 = new L.LayerGroup(), note7 = new L.LayerGroup(),
			    note8 = new L.LayerGroup(), note9 = new L.LayerGroup(), note10 = new L.LayerGroup();
			
			var lemonMarker0 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#343a40', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker1 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#dc3545', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker2 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#dc3545', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker3 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#dc3545', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker4 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#dc3545', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker5 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#ffc107', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker6 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#28a745', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker7 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#28a745', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker8 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#28a745', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker9 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#28a745', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'}),
				lemonMarker10 = L.AwesomeMarkers.icon({icon: 'lemon', prefix: 'fa', iconColor: '#28a745', markerColor: 'white', extraClasses: 'fa-lg lemonMarker'});
				
			var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'});
			var gustumexlibro_map = L.map('gustumexlibro_map', {center: [48.856, 2.3522], zoom:2, layers: [osm, note0, note1, note2, note3, note4, note5, note6, note7, note8, note9, note10]});

			<?php while ( $query->have_posts() ): $query->the_post(); ?>
			L.marker([<?php echo $post->geo_latitude; ?>, <?php echo $post->geo_longitude; ?>], {icon: lemonMarker<?php echo $post->note_average; ?>})
			.bindPopup("<span class='font-weight-bold text-uppercase'><?php echo $post->company; ?></span><br /><span class='text-muted'><?php echo $post->address; ?></span><br /><?php esc_html_e( 'Final note:', 'gustumexlibro' ); ?> <?php echo $post->note_average; ?>/10.<br /><br /><a href='<?php the_permalink(); ?>'><?php esc_html_e( 'Check out our verdict.', 'gustumexlibro' ); ?></a>")
			.addTo(note<?php echo $post->note_average; ?>);
			<?php endwhile; ?>
			
			var lc = L.control.locate({
					flyTo: true,
					icon: 'fas fa-map-marker',
					iconLoading: 'fas fa-spinner fa-spin'
				}).addTo(gustumexlibro_map);

			var tooltip = L.popup();
			function onMapClick(e) {
			    popup.setLatLng(e.latlng).setContent("You clicked the map at " + e.latlng.toString()).openOn(gustumexlibro_map);
			}
			var overlays = {
			    "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 0/10": note0, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 1/10": note1, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 2/10": note2, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 3/10": note3,
                            "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 4/10": note4, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 5/10": note5, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 6/10": note6, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 7/10": note7,
                            "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 8/10": note8, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 9/10": note9, "<?php esc_html_e( 'Average of', 'gustumexlibro' ); ?> 10/10": note10
                        };
			
			L.control.layers(false, overlays, {collapsed: true}).addTo(gustumexlibro_map);
			gustumexlibro_map.on('click', onMapClick);
			</script>
		    </div>
		</article>
            </div><!-- /.blog-main -->
        </div><!-- .row -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
