<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<div class="content-container">
						<header class="post-header">
							<div class="pre-header">
								<span class="post-author">
									<?php echo the_author_meta( 'display_name', $post->post_author ); ?>
								</span>
								<span class="post-date">
									<?php echo get_the_date('F j, Y g:i a'); ?>
								</span>
							</div>
							<h1><?php echo get_the_title(); ?></h1>
							<p><?php echo get_the_excerpt(); ?></p>
						</header>
						<div class="featured-image">
							<div style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID); ?>')" alt="" title="">
							</div>
						</div>

						<div class="article-content-wrapper">
							<div class="article-content">
							<?php 
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								)
							);

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
									'after'  => '</div>',
								)
							);
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
							?>
							</div>
							<div class="article-sidebar">
								<div class="post-categories">
								<?php 
									$categories = get_the_category();
									foreach( $categories as $category ) {
										echo  '<span>' . $category->name . '</span>';
									}
								?>
								</div>
								<?php
								if ( is_active_sidebar( 'social-media-header' ) ) : ?>
								<div class="most-recent-posts">
									<div class="widget-area widget-area" role="complementary">
									<?php dynamic_sidebar( 'single-post-sidebar' ); ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php
						?>

					</div><!-- .entry-content -->

				</article><!-- #post-<?php the_ID(); ?> -->
				<?php


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
