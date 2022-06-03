<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Geek
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6'); ?>>
	<div class="entry-post">
        <div class="entry-thumbnail">
            <div class="thumbnail-oberlay"></div>
			<?php if( has_post_thumbnail() ) : ?>
        	<?php $url_thumbpost = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '360', '264' ); ?>
            	<img width="<?php echo esc_attr( $url_thumbpost[1] ); ?>" height="<?php echo esc_attr( $url_thumbpost[2] ); ?>" class="img-responsive" src="<?php echo esc_url( $url_thumbpost[0] ); ?>" alt="<?php the_title(); ?>">
        	<?php endif; ?>
        </div>
        <div class="post-content">
            <?php geek_blog_time(); ?>        
			<?php
			if ( is_single() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>			
        </div>
    </div>
</div><!-- #post-## -->
