<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package gustumexlibro
 */
 
?>
<form class="form-inline" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group mb-3">
        <input type="search" class="form-control border border-dark"
            placeholder="<?php echo _e( 'Search', 'gustumexlibro' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo _e( 'Search for:', 'gustumexlibro' ) ?>" />
        <div class="input-group-append">
            <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>