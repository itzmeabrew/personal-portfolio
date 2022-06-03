<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Geek
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

 <div id="comments" class="comment-wrapper">

 	<?php
 	// You can start editing here -- including this comment!
 	if ( have_comments() ) : ?>
		<div class="contact-info">
            <div class="title">
                <div class="icons">
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                </div>
                <h3><?php echo esc_html__( 'Messages', 'geek' ); ?></h3>
            </div>
        </div>

 		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
 		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
 			<h2 class="screen-reader-text"><?php echo esc_html__( 'Message navigation', 'geek' ); ?></h2>
 			<div class="nav-links">
 				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Messages', 'geek' ) ); ?></div>
 				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Messages', 'geek' ) ); ?></div>

 			</div><!-- .nav-links -->
 		</nav><!-- #comment-nav-above -->
 		<?php endif; // Check for comment navigation. ?>

 		<ul class="comment-list">
 			<?php
 				wp_list_comments( array(
 					'style'      => 'ul',
 					'short_ping' => true,
 					'callback'	 => 'geek_comment'
 				) );
 			?>
 		</ul><!-- .comment-list -->

 		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
 		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
 			<h2 class="screen-reader-text"><?php echo esc_html__( 'Message navigation', 'geek' ); ?></h2>

 			<div class="nav-links">
 				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Messages', 'geek' ) ); ?></div>
 				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Messages', 'geek' ) ); ?></div>
 			</div><!-- .nav-links -->
 		</nav><!-- #comment-nav-below -->
 		<?php
 		endif; // Check for comment navigation.

 	endif; // Check for have_comments().


 	// If comments are closed and there are comments, let's leave a little note, shall we?
 	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'messages' ) ) : ?>

 		<p class="no-comments"><?php echo esc_html__( 'Messages are closed.', 'geek' ); ?></p>

 	<?php
 	endif;
 	?>
 	<?php
 	    $req = get_option( 'require_name_email' );
 	    $aria_req = ( $req ? " aria-required='true'" : '' );

 		$comments_args = array(
 	        // change the title of send button
 	        'label_submit'=> esc_html__( 'Send Message', 'geek' ),

			'class_form' => 'comment-form row',
 			// Change the class of send button
 			'class_submit'=> 'btn btn-primary pull-right',
 	        // change the title of the reply section
 	        'title_reply'=> esc_html__( 'Leave me a message', 'geek' ),
 	        // remove "Text or HTML to be displayed after the set of comment fields"
 	        'comment_notes_after' => '',
 	        // redefine your own textarea (the comment body)
 	        'comment_field' => '<div class="col-sm-12"><div class="form-group"><textarea class="form-control" rows="10" id="comment" name="comment" aria-required="true" placeholder="' . esc_html__( 'Your Message', 'geek' ) . '"></textarea></div></div>',

 	        'fields' => apply_filters( 'comment_form_default_fields', array(

 			    'author' =>
 			      	'<div class="col-sm-6">' .
 			      	'<div class="form-group">' .
 			      	'<input class="form-control" id="author" name="author" type="text" placeholder="' . esc_html__( 'Name', 'geek' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
 			      	'" size="30"' . $aria_req . ' /></div></div>',

 			    'email' =>
					'<div class="col-sm-6">' .
 					'<div class="form-group">' .
 			      	'<input class="form-control" id="email" name="email" type="text" placeholder="' . esc_html__( 'Email', 'geek' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
 			      	'" size="30"' . $aria_req . ' /></div></div>',

 			    'url' =>
					'<div class="col-sm-12">' .
 					'<div class="form-group">' .
 			      	'<input class="form-control" id="url" name="url" type="text" placeholder="' . esc_html__( 'Website', 'geek' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
 			      	'" size="30" /></div></div>'
 	    	)
 	  	),
 	);
 	comment_form( $comments_args );
 	?>

 </div><!-- #comments -->
