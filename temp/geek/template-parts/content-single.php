<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Geek
 */

?>

<div class="entry-post">
    <?php geek_blog_time(); ?>
    <div class="post-content">
        <div class="entry-title">
            <?php the_title( '<h2>', '</h2>' ); ?>
        </div>        
    </div>
    <div class="entry-thumbnail">
        <?php if( has_post_thumbnail() ) : ?>
        <?php $url_thumbpost = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
            <img width="<?php echo esc_attr( $url_thumbpost[1] ); ?>" height="<?php echo esc_attr( $url_thumbpost[2] ); ?>" class="img-responsive" src="<?php echo esc_url( $url_thumbpost[0] ); ?>" alt="<?php the_title(); ?>">
            <?php $share_media = $url_thumbpost[0]; ?>
        <?php else: ?>
            <?php $share_media = ''; ?>
        <?php endif; ?>
    </div>
</div>
<div class="entry-summary">
    <?php
    the_content( sprintf(
        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'geek' ), array( 'span' => array( 'class' => array() ) ) ),
        the_title( '<span class="screen-reader-text">"', '"</span>', false )
    ) );

    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geek' ),
        'after'  => '</div>',
    ) );
    ?>
</div>
 <?php geek_entry_meta(); ?>
<div class="blog-social">
    <ul class="list-inline">
        <li class="facebook-share"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i> <?php echo esc_html__( 'Share', 'geek' ); ?></a></li>
        <li class="twitter-share"><a href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i> <?php echo esc_html__( 'Tweet', 'geek' ); ?></a></li>
        <li class="pinit-share"><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url( $share_media );?>&description=<?php the_excerpt(); ?>"><i class="fa fa-pinterest"></i> <?php echo esc_html__( 'Pin It', 'geek' ); ?></a></li>
        <li class="gplus-share"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i> <?php echo esc_html__( '+1', 'geek' ); ?></a></li>
    </ul>
</div><!-- blog social -->

<div class="post-action">
    <ul>
        <li class="previous-post">
            <span><?php echo esc_html__( 'Previous Post', 'geek' ); ?></span>
            <h3><?php previous_post_link('%link'); ?></h3>
        </li>
        <li class="next-post">
            <span><?php echo esc_html__( 'Next Post', 'geek' ); ?></span>
            <h3><?php next_post_link('%link'); ?></h3>
        </li>
    </ul>
</div><!-- post action -->
