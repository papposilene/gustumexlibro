<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gustumexlibro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area mt-3 p-3 bg-white border border-dark rounded">
<?php
// You can start editing here -- including this comment!
if ( have_comments() ) : ?>
    <h2 class="comments-title">
	<?php
	$comment_count = get_comments_number();
	if ( '1' === $comment_count ) {
	    printf(
		/* translators: 1: title. */
		esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'gustumexlibro' ),
		'<span>' . get_the_title() . '</span>'
	    );
	} else {
	    printf( // WPCS: XSS OK.
		/* translators: 1: comment count number, 2: title. */
		esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'gustumexlibro' ) ),
		number_format_i18n( $comment_count ),
		'<span>' . get_the_title() . '</span>'
	    );
	}
	?>
	</h2><!-- .comments-title -->

	<?php the_comments_navigation(); ?>

	<ol class="comment-list">
	    <?php
	    wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
		)
            );
            ?>
	</ol><!-- .comment-list -->

	<?php
        the_comments_navigation();
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) : ?>
	    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gustumexlibro' ); ?></p>
	<?php
	endif;
endif; // Check for have_comments().


$fields =  array(
    'author' => '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text  border border-dark'. ( $req ? ' text-danger' : ' text-dark' ). '" id="author"><i class="fas fa-user fa-lg"></i></span></div>' .
	'<input type="text" name="author" class="form-control form-control-lg border border-dark" value="' . esc_attr( $commenter['comment_author'] ) .
	'" size="30"' . $aria_req . ' /></div>',
	
    'email' => '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text  border border-dark'. ( $req ? ' text-danger' : ' text-dark' ). '" id="email"><i class="fas fa-at fa-lg"></i></span></div>' .
	'<input type="text" name="email" class="form-control form-control-lg border border-dark" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	'" size="30"' . $aria_req . ' /></div>',
	
    'url' => '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text border border-dark text-dark" id="link"><i class="fas fa-link fa-lg"></i></span></div>' .
	'<input type="text" name="url" class="form-control form-control-lg border border-dark" value="' . esc_attr( $commenter['comment_author_url'] ) .
	'" size="30" /></div>'
);

comment_form(
    array(
	'comment_field' 	=> '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text border border-dark'. ( $req ? ' text-danger' : ' text-dark' ). ' align-top" id="author"><i class="fas fa-comment-alt fa-lg"></i></span></div>' .
	    '<textarea name="comment" class="form-control form-control-lg border border-dark text-dark" cols="45" rows="8" aria-required="true"></textarea></div>',
	'class_submit' 		=> 'btn btn-dark btn-lg btn-block',
	'fields' 		=> apply_filters( 'comment_form_default_fields', $fields )
    )
);
?>
</div><!-- #comments -->
