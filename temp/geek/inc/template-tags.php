<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Geek
 */
if ( !function_exists( 'geek_blog_time' ) ) :
	function geek_blog_time() {

		$dates = get_the_date();
		$dates = date_i18n( 'j M Y', strtotime( $dates ) );
		$dateArr = explode(" ", $dates);

		$geekTime = '<div class="time">';
			$geekTime .= '<a href="#">'. $dateArr[0] .' <span>'. $dateArr[1] .'</span></a>';
		$geekTime .= '</div>';

		printf( '%s', $geekTime );
	}
endif;

if ( !function_exists( 'geek_entry_meta' ) ) :

 function geek_entry_meta() {

 	$comments_count = wp_count_comments(get_the_ID());
 	$comments = sprintf( esc_html__('%s Comments', 'geek'), $comments_count->approved );

 	$geek_meta = '';
 	$geek_meta .= '<div class="entry-meta">';
 		$geek_meta .= '<ul class="list-inline">';
 			$geek_meta .= '<li class="author"><i class="fa fa-user-o"></i><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></li>';
 	// Hide category and tag text for pages.
 	if ( 'post' === get_post_type() && is_single() ) {
 		$categories_list = get_the_category_list( esc_html__( ', ', 'geek' ) );
 		if ( $categories_list && geek_categorized_blog() ) :
 			$geek_meta .= '<li class="categories"><i class="fa fa-file-archive-o"></i>' . $categories_list . '</li>';
 		endif;
 		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'geek' ) );
 		if ( $tags_list ) :
 			$geek_meta .= '<li class="tag"><i class="fa fa-tags"></i>' . $tags_list . '</li>';
 		endif;
 	}
 		if ( is_sticky() && !is_single() ){
 			$geek_meta .= '<li class="stickypost"><i class="fa fa-sticky-note-o"></i>' . __( 'Sticky', 'geek' ) . '</li>';
 		}
 			$geek_meta .= '<li class="comments"><a href="#comments"><i class="fa fa-comment-o"></i>' . $comments . '</a></li>';
 		$geek_meta .= '</ul>';
 	$geek_meta .= '</div>';

 	if ( !is_single() ) {
 		$geek_meta .= '<div class="read-more">';
 			$geek_meta .= '<a href="'. get_the_permalink() .'" class="readmore">Read More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>';
 		$geek_meta .= '</div>';
 	}

 	printf( '%s', $geek_meta );
 }

 endif;

 if ( ! function_exists( 'geek_entry_footer' ) ) :
 /**
  * Prints HTML with meta information for the categories, tags and comments.
  */
 function geek_entry_footer() {

 	if ( is_single() ) :
 		edit_post_link(
 			sprintf(
 				/* translators: %s: Name of current post */
 				esc_html__( 'Edit This Post %s', 'geek' ),
 				the_title( '<span class="screen-reader-text">"', '"</span>', false )
 			),
 			'<span class="edit-link">',
 			'</span>'
 		);
 	endif;
 }
 endif;

 /**
  * Returns true if a blog has more than 1 category.
  *
  * @return bool
  */
 function geek_categorized_blog() {
 	if ( false === ( $all_the_cool_cats = get_transient( 'geek_categories' ) ) ) {
 		// Create an array of all the categories that are attached to posts.
 		$all_the_cool_cats = get_categories( array(
 			'fields'     => 'ids',
 			'hide_empty' => 1,
 			// We only need to know if there is more than one category.
 			'number'     => 2,
 		) );

 		// Count the number of categories that are attached to the posts.
 		$all_the_cool_cats = count( $all_the_cool_cats );

 		set_transient( 'geek_categories', $all_the_cool_cats );
 	}

 	if ( $all_the_cool_cats > 1 ) {
 		// This blog has more than 1 category so geek_categorized_blog should return true.
 		return true;
 	} else {
 		// This blog has only 1 category so geek_categorized_blog should return false.
 		return false;
 	}
 }

 /**
  * Flush out the transients used in geek_categorized_blog.
  */
 function geek_category_transient_flusher() {
 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
 		return;
 	}
 	// Like, beat it. Dig?
 	delete_transient( 'geek_categories' );
 }
 add_action( 'edit_category', 'geek_category_transient_flusher' );
 add_action( 'save_post',     'geek_category_transient_flusher' );
