<?php
/**
* Template Name: Full Width Page Template
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Bani
*/

get_header();

$bani_hide_page_title = false;
if ( class_exists( 'TitanFramework' ) ) :
	$titan = TitanFramework::getInstance( 'bani' );
	$bani_hide_page_title = $titan->getOption( 'bani_hide_page_title' );
endif;

?>

<?php if ( !$bani_hide_page_title ) : ?>
	<div class="bani-cover-wrapper <?php if ( ! has_post_thumbnail() ) : ?> short-cover <?php else : ?> page-cover <?php endif; ?>">
		<div class="bani-cover-bg" <?php if ( has_post_thumbnail() ) : ?> style="background-image: url(<?php echo esc_url(the_post_thumbnail_url()); ?>); -webkit-filter: brightness(35%); filter: brightness(35%);" <?php endif; ?>></div><!-- /.bani-cover -->
		<div class="bani-cover-content row align-items-center justify-content-center">
			<div class="col-md-6 bani-content-height">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div><!-- /.col -->
		</div><!-- /.bani-cover-content -->
	</div>
	<div class="w-100"></div>
<?php else: ?>
	<div class="bani-title-spacing"></div>
<?php endif; ?>

<div class="st-primary-wrapper col-lg-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .st-primary-wrapper -->

<?php

get_footer();
