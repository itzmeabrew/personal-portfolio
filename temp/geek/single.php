<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Geek
 */

 get_header(); ?>

 	<div id="blog-details" class="section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="site-content col-sm-8">
 					<?php while ( have_posts() ) : the_post(); ?>

 						<?php get_template_part( 'template-parts/content', 'single' ); ?>

 						<?php if ( comments_open() || get_comments_number() ) : ?>
						<div class="contact">
 							<?php comments_template(); ?>
						</div>
 						<?php endif; ?>

 					<?php endwhile; ?>
 				</div>
 				<div id="sidebar" class="col-sm-4">
 					<?php get_sidebar(); ?>
 				</div>
 			</div>
 		</div>
 	</div><!-- #blog-details -->

 <?php
 get_footer();
