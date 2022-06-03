<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Geek
 */
global $wp_query;
$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
get_header(); ?>

	<div id="blog" class="blog-section section-padding">
		<div class="container">
			<div class="row">
				<div id="content" class="site-content col-sm-8">
					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'geek' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
					<div class="row">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
							<?php endif; ?>

							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
							<?php endwhile; ?>

							<?php
							$pagination = paginate_links(array(
								@add_query_arg('paged','%#%'),
								'format' => '?paged=%#%',
								'current' => $current,
								'total' => $wp_query->max_num_pages,
								'type'  => 'array',
								'prev_text' => '<span aria-hidden="true">' . esc_html__( 'Previous', 'geek' ) . '</span>',
								'next_text' => '<span aria-hidden="true">' . esc_html__( 'Next', 'geek' ) . '</span>',
							));
							?>
							<?php if ( ! empty( $pagination ) ) : ?>
								<div class="row">
									<div class="col-sm-12">
										<div class="text-center pagination-section">
											<nav>
												<ul class="pagination">
													<?php foreach ( $pagination as $key => $page_link ) : ?>
														<li class="paginated_link<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php printf( '%s', $page_link ); ?></li>
													<?php endforeach ?>
												</ul>
											</nav>
										</div><!-- row -->
									</div>
								</div>

							<?php endif; ?>

						<?php else : ?>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
					</div>
				</div>
				<div id="sidebar" class="col-sm-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div><!-- #blog -->

<?php
get_sidebar();
