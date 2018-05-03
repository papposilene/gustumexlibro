<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gustumexlibro
 */

if ( ! function_exists( 'gustumexlibro_postedon_header' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function gustumexlibro_postedon_header() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> (' . esc_html__( 'updated on', 'gustumexlibro' ) . ' <time class="updated" datetime="%3$s">%4$s</time>)';
	}

	$time_string = sprintf( $time_string,
	    esc_attr( get_the_date( 'c' ) ),
	    esc_html( get_the_date() ),
	    esc_attr( get_the_modified_date( 'c' ) ),
	    esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
	    /* translators: %s: post date. */
	    esc_html_x( '%s', 'post date', 'gustumexlibro' ),
	    '<a href="' . esc_url( get_permalink() ) . '" class="text-dark nounderline" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on"><i class="fas fa-calendar-alt fa-lg fa-fw"></i> ' . $posted_on . '</span>'; // WPCS: XSS OK.
    }
endif;

if ( ! function_exists( 'gustumexlibro_postedby_header' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function gustumexlibro_postedby_header() {
	$byline = sprintf(
	    /* translators: %s: post author. */
	    esc_html_x( '%s', 'post author', 'gustumexlibro' ),
	    '<span class="author vcard "><a class="url fn n text-dark nounderline" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"><i class="fas fa-user-circle fa-lg fa-fw"></i> ' . $byline . '</span><br />'; // WPCS: XSS OK.
    }
endif;

if ( ! function_exists( 'gustumexlibro_entrymeta_header' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function gustumexlibro_entrymeta_header() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
	    /* translators: used between list items, there is a space after the comma */
	    $categories_list = get_the_category_list( esc_html__( ', ', 'gustumexlibro' ) );
	    if ( $categories_list ) {
		/* translators: 1: list of categories. */
		echo '<i class="fas fa-folder-open fa-lg fa-fw"></i> ';
		printf( '<span>' . esc_html__( '%1$s', 'gustumexlibro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		echo '<br /> ';
	    }

	    /* translators: used between list items, there is a space after the comma */
	    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gustumexlibro' ) );
	    if ( $tags_list ) {
		/* translators: 1: list of tags. */
		echo '<i class="fas fa-tags fa-lg fa-fw"></i> ';
		printf( '<span>' . esc_html__( '%1$s', 'gustumexlibro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
	    }
	}
    }
endif;

if ( ! function_exists( 'gustumexlibro_postedon_footer' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function gustumexlibro_postedon_footer() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> (' . esc_html__( 'updated on', 'gustumexlibro' ) . ' <time class="updated" datetime="%3$s">%4$s</time>)';
	}

	$time_string = sprintf( $time_string,
	    esc_attr( get_the_date( 'c' ) ),
	    esc_html( get_the_date() ),
	    esc_attr( get_the_modified_date( 'c' ) ),
	    esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
	    /* translators: %s: post date. */
	    esc_html_x( 'Posted on %s', 'post date', 'gustumexlibro' ),
	    '<a href="' . esc_url( get_permalink() ) . '" class="text-dark nounderline" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }
endif; 

if ( ! function_exists( 'gustumexlibro_postedby_footer' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function gustumexlibro_postedby_footer() {
	$byline = sprintf(
	    /* translators: %s: post author. */
	    esc_html_x( 'by %s', 'post author', 'gustumexlibro' ),
	    '<span class="author vcard"><a class="url fn n text-dark nounderline" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }
endif;

if ( ! function_exists( 'gustumexlibro_entrymeta_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function gustumexlibro_entrymeta_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
	    /* translators: used between list items, there is a space after the comma */
	    $categories_list = get_the_category_list( esc_html__( ', ', 'gustumexlibro' ) );
	    if ( $categories_list ) {
		/* translators: 1: list of categories. */
		printf( '<span class="text-muted">' . esc_html__( ' in %1$s', 'gustumexlibro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
	    }

	    /* translators: used between list items, there is a space after the comma */
	    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gustumexlibro' ) );
	    if ( $tags_list ) {
		/* translators: 1: list of tags. */
		printf( '<span class="text-muted">' . esc_html__( ' and tagged %1$s', 'gustumexlibro' ) . '. </span>', $tags_list ); // WPCS: XSS OK.
	    }
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	    echo '<span class="comments-link text-muted">';
	    comments_popup_link(
		sprintf(
		    wp_kses(
			/* translators: %s: post title */
			__( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'gustumexlibro' ),
			array(
			    'span' => array(
				'class' => 'text-muted nounderline',
			    ),
			)
		    ),
		    get_the_title()
		)
	    );
	    echo '.</span>';
	}

	edit_post_link(
	    sprintf(
		wp_kses(
		    /* translators: %s: Name of current post. Only visible to screen readers */
		    __( 'Edit <span class="screen-reader-text">%s</span>', 'gustumexlibro' ),
		    array(
			'span' => array(
			    'class' => '',
			),
		    )
		),
		get_the_title()
	    ),
	    '<span class="edit-link d-block m-2 p-1 border border-danger rounded">',
	    '</span>'
	);
    }
endif;

if ( ! function_exists( 'gustumexlibro_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function gustumexlibro_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
	}

        if ( is_singular() ) :
            the_post_thumbnail(
                'large',
                array (
                    'class' => 'img-fluid border border-dark rounded'
                )
            );
	elseif ( is_page() || is_category() || is_tag() || is_archive() || is_tax() || is_search() ) :
            the_post_thumbnail(
                'gustumexlibro-archive',
                array (
                    'class' => 'img-fluid border border-dark rounded'
                )
            );
        else :
            the_post_thumbnail(
                'gustumexlibro-featured',
                array (
                    'class' => 'card-img-top img-fluid border-bottom border-dark rounded-top'
                )
            );
        endif; // End is_singular().
    }
endif;