
<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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

<div id="comments" class="comments-area">
      
	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title heading-heebo">
            <?php
	            $comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'Comment &#40;1&#41;', 'comments title', 'cargo-pifour' ) );	
				}else{
					printf( _nx( 'Comment &#40;0&#41; ', 'Comments &#40;%1$s&#41;', get_comments_number(), 'comments title', 'cargo-pifour' ), number_format_i18n( get_comments_number() ));
				}
			?>
		</h4>
 
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true, 
				'avatar_size' => 90,
                'callback'          => 'cargo_pifour_comment',
			) );
			?>
		</ol><!-- .comment-list -->

		<?php cargo_pifour_comment_nav(); ?>

	<?php endif; // have_comments() ?>
    <?php 
    $commenter = wp_get_current_commenter();
	 
	$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => esc_html__( 'Write a Message','cargo-pifour'),
			'title_reply_to'    => esc_html__( 'Write a Message To %s','cargo-pifour'),
			'cancel_reply_link' => esc_html__( 'Cancel Reply','cargo-pifour'),
			'label_submit'      => esc_html__( 'Send Comment','cargo-pifour'),
			'comment_notes_before' => '',
			'comment_notes_after'   => '',
'fields' => apply_filters( 'comment_form_default_fields', array(

				'author' =>
				'<div class="col-md-6 col-sm-12"><p class="comment-form-author">'.
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30" aria-required="true" required="required" placeholder="'.esc_html__('Name ','cargo-pifour').'"/></p>',

				'email' =>
				'<p class="comment-form-email">'.
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30" aria-required="true" required="required" placeholder="'.esc_html__('Email','cargo-pifour').'"/></p>',
                
                'url' =>
				'<p class="comment-form-website">'.
				'<input id="website" name="website" type="text" size="30" placeholder="'.esc_html__('Website','cargo-pifour').'"/></p></div>',
			)
			),
			'comment_field' =>  '<div class="col-md-6 col-sm-12"><p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required="required" placeholder="'.esc_html__('Message','cargo-pifour').'"></textarea></p></div>',
	    );
	comment_form($args);

    ?>
	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cargo-pifour' ); ?></p>
	<?php endif; ?>

	

</div><!-- .comments-area -->
