<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Geek
 */

get_header(); ?>

	<div id="blog" class="blog-section section-padding">
		<div class="container">
			<div class="row">
				<div id="content" class="site-content col-sm-8">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php echo esc_html__( '404', 'geek' ); ?></h1>
							<h3 class="page-title"><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'geek' ); ?></h3>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php echo esc_html__( 'It looks like you are lost somewhere. Maybe try going back to homepage?', 'geek' ); ?></p>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
				<div id="sidebar" class="col-sm-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div><!-- #blog -->

<?php
get_footer();
