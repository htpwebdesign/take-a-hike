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

						if ( get_field( 'hiking_link' ) ) :
							$link = get_field('hiking_link');
							if( $link ) : 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="activity-link hiking" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								<h2><?php the_field('activity_title_1'); ?></h2><?php $image = get_field('hiking_image');
								$size = 'medium'; // (thumbnail, medium, large, full or custom size)
								if( $image ) :
									echo wp_get_attachment_image( $image, $size );					
								endif; ?>
								</a>	
							<?php  
							endif; 
							?>
						 <?php     
						endif;

					endif;
	
					?>
					</div>
				
					<div class="camping">
					<?php
					if (function_exists ( 'get_field' )) :					
						
						if ( get_field( 'camping_link' ) ) :
							$link = get_field('camping_link');
							if( $link ) : 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="activity-link camping" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								<h2><?php the_field('activity_title_2'); ?></h2><?php $image = get_field('camping_image');
								$size = 'medium'; // (thumbnail, medium, large, full or custom size)
								if( $image ) :
									echo wp_get_attachment_image( $image, $size );					
								endif; ?>
								</a>	
							<?php  
							endif; 
							?>
						 <?php     
						endif;

					endif;
					?>
					</div>

					<div class="climbing">
					<?php
					if (function_exists ( 'get_field' )) :					

						if ( get_field( 'climbing_link' ) ) :
						$link = get_field('climbing_link');
							if( $link ) : 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="activity-link climbing" href="<?php echo esc_url( $link_url ); ?>"
							target="<?php echo esc_attr( $link_target ); ?>
							"><?php echo esc_html( $link_title ); ?>
							<h2><?php the_field('activity_title_3'); ?></h2><?php $image = get_field('climbing_image');
							$size = 'medium'; // (thumbnail, medium, large, full or custom size)
								if( $image ) :
									echo wp_get_attachment_image( $image, $size );					
								endif; ?>
							</a>	
							<?php  
							endif; 
							?>
 							<?php     
						endif;

					endif;
					?>
					</div>

					<div class="watersports">
					<?php
					if (function_exists ( 'get_field' )) :
					
						if ( get_field( 'watersports_link' ) ) :
							$link = get_field('watersports_link');
								if( $link ) : 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="activity-link watersports" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								<h2><?php the_field('activity_title_4'); ?></h2><?php $image = get_field('watersports_image');
								$size = 'medium'; // (thumbnail, medium, large, full or custom size)
									if( $image ) :
										echo wp_get_attachment_image( $image, $size );					
									endif; ?>
								</a>	
								<?php  
								endif; 
						endif;

					endif;
					?>
					</div>
				</div>

				<div class="featured-products">
				<?php
					if (function_exists ( 'get_field' )) :

						if ( get_field( 'featured_products_link' ) ) :
							$link = get_field('featured_products_link');
								if( $link ) : 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="featured-products-link" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								<h2><?php the_field('featured_products_title'); ?></h2><?php $image = get_field('featured_products_image');
								$size = 'large'; // (thumbnail, medium, large, full or custom size)
									if( $image ) :
										echo wp_get_attachment_image( $image, $size );					
									endif; ?>
								</a>	
								<?php  
								endif; 
						endif;

					endif;
				?>
					</div>
				<?php
				?>
			</section>

			<section class="mid-section">
				<div class="sale">
				<?php
					if (function_exists ( 'get_field' )) :
					
						if ( get_field( 'sale_link' ) ) :
							$link = get_field('sale_link');
								if( $link ) : 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="sale-link" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								<h2><?php the_field('sale_title'); ?></h2><?php $image = get_field('sale_image');
								$size = 'large'; // (thumbnail, medium, large, full or custom size)
									if( $image ) :
										echo wp_get_attachment_image( $image, $size );					
									endif; ?>
								</a>	
								<?php  
								endif; 
						endif;

					endif;
				?>
				</div>
				<div class="bundles">
				<?php
					if (function_exists ( 'get_field' )) :

						if ( get_field( 'bundles_link' ) ) :
							$link = get_field('bundles_link');
								if( $link ) : 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="bundles-link" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								<h2><?php the_field('bundles_title'); ?></h2><?php $image = get_field('bundles_image');
								$size = 'large'; // (thumbnail, medium, large, full or custom size)
									if( $image ) :
										echo wp_get_attachment_image( $image, $size );					
									endif; ?>
								</a>	
								<?php  
								endif; 
						endif;

					endif;
				?>
				</div>
			</section>

			<section class="end-section">
				<div class="current-workshop">
				<?php
					if (function_exists ( 'get_field' )) :

						if ( get_field( 'workshops_link' ) ) :
							$link = get_field('workshops_link');
								if( $link ) : 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<h2><?php the_field('workshop_subheading'); ?></h2>
								<a class="workshops-link" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								<h2><?php the_field('current_workshop_title'); ?></h2><?php $image = get_field('current_workshop_image');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
									if( $image ) :
										echo wp_get_attachment_image( $image, $size );					
									endif; ?>
								</a>	
								<?php  
								endif; 
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
