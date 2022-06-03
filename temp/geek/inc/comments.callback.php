<?php
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */

if ( ! function_exists( 'geek_comment' ) ) :
function geek_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li id="post-comment comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<p><?php _e( 'Pingback:', 'geek' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'geek' ), '<span class="ping-meta"><span class="edit-link">', '</span></span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
	?>
	<li id="post-comment li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>

			<div class="avatar">
				<?php echo get_avatar( $comment, 80 ); ?>
			</div><!-- .comment-author -->

            <div class="comments">
                <h4>
                    <?php comment_author_link(); ?>:
                    <span>
                        <?php
                        printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                            esc_url( get_comment_link( $comment->comment_ID ) ),
                            get_comment_time( 'c' ),
                            sprintf( _x( '%1$s at %2$s', '1: date, 2: time', 'geek' ), get_comment_date(), get_comment_time() )
                        );
                        edit_comment_link( __( 'Edit', 'geek' ), ' <span class="edit-link">', '<span>' );
                        ?>
                    </span>
                </h4>


                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'geek' ); ?></p>
                <?php endif; ?>

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->

                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="fa fa-mail-forward (alias)"></i> ' . __( 'Reply', 'geek' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->

            </div><!-- .comment-details -->

		</div><!-- #comment-## -->
	<?php
		break;
	endswitch; // End comment_type check.
}
endif;
