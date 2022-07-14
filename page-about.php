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
			<section class="main-about">
				<?php
				if ( function_exists ( 'get_field' ) ) :
					?>
					<section class="about-content">
						<?php
						if ( get_field( 'about_us_header' ) ) :
							echo '<h1>';
							the_field( 'about_us_header');
							echo '</h1>';
						endif;
						if ( get_field( 'about_us_info' )) :
							echo '<p class="about-us">';
							the_field( 'about_us_info');
							echo '</p>';
						endif;
					?>
					</section>
					<?php
					// Output gallery
					$images = get_field('gallery');
					$size = 'medium'; // (thumbnail, medium, large, full or custom size)
					if( $images ): ?>
						<section class="gallery-about">
							<div class="gallery-grid">
								<?php foreach( $images as $image_id ): ?>
								<?php echo wp_get_attachment_image( $image_id, $size ); ?>
								<?php endforeach; ?>
							</div>
						</section>
					<?php 
					endif;
				endif;

				?>
			</section>

			<section class="activities">
			<?php
				if (function_exists ('get_field') ) :
					?>
					<h2 class="categories-header"><?php the_field( 'subheader' ); ?></h2>
					<?php
				endif;
				?>
				<section class="activities-grid">
				<?php
					if ( have_rows ( 'hero_section', 45 ) ) :
						while( have_rows( 'hero_section', 45 ) ): 
							the_row(); 
							$link = get_sub_field( 'link' );
	
							if( $link ) : 
    						$link_url = $link['url'];
   							$link_title = $link['title'];
    						$link_target = $link['target'] ? $link['target'] : '_self';
    						?>
						
    						<a class="activity-link" href="<?php echo esc_url( $link_url ); ?>"
    						target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); 
    							if( get_row_index() <= 4 ) :
									?>
									<div class="container"> 
										<?php 
										$image = get_sub_field( 'image' );
    									$size = 'medium'; // (thumbnail, medium, large, full or custom size)
										if ( $image ) :
											echo wp_get_attachment_image( $image, $size );	
										endif;
										?>
										<h2 class="title"><?php the_sub_field( 'title' ); ?></h2>
									</div>
									<?php
    							endif; 
								?>
   							</a>	
							<?php  
							endif;						
							
					endwhile;
				endif;
				?>
				</section>
			</section>


			<?php


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
