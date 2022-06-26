<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Take_A_Hike
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<h1><?php the_title(); ?></h1>
			
		
			<section class="hero-section">
				
				<div class="activities">
					<div class="hiking">
					<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2>Hiking</h2>
					<?php
						$image = get_field('hiking_image');
						$size = 'medium'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
					?>
					</div>
				
					<div class="camping">
					<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2>Camping</h2>
						<?php
						$image = get_field('camping_image');
						$size = 'medium'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
					?>
					</div>

					<div class="climbing">
					<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2>Climbing</h2>
					<?php
						$image = get_field('climbing_image');
						$size = 'medium'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
					?>
					</div>

					<div class="watersports">
					<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2>Watersports</h2>
					<?php
						$image = get_field('watersports_image');
						$size = 'medium'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
				?>
					</div>
				</div>

				<div class="featured-products">
				<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2>Featured Products</h2>
					<?php
						$image = get_field('featured_products_image');
						$size = 'large'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
				?>
					</div>
				</div>
				<?php
				?>
			</section>

			<section class="mid-section">
				<div class="sale">
				<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2>Sale</h2>
					<?php
						$image = get_field('sale_image');
						$size = 'large'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
				?>
				</div>
				<div class="bundles">
				<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2>Bundles</h2>
					<?php
						$image = get_field('bundles_image');
						$size = 'large'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
				?>
				</div>
			</section>

			<section class="end-section">
				<div class="current-workshop">
				<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2><?php the_field('workshop_subheading'); ?></h2>
						<h2><?php the_field('current_workshop_title'); ?></h2>
					<?php
						$image = get_field('current_workshop_image');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) :
							echo wp_get_attachment_image( $image, $size );
						endif;
					endif;
				?>
				</div>
			</section>

			<section class="social-section">
				<div class="instagram">
				<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2><?php the_field( 'instagram_subheading' ); ?></h2>
					<?php
					endif;
				?>
				</div>
			</section>
			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
