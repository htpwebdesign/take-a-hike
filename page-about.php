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

			if ( function_exists ( 'get_field' ) ) {
				if ( get_field( 'about_us_header' )){
					echo '<h1>';
					the_field( 'about_us_header');
					echo '</h1>';
				}
				if ( get_field( 'about_us_info' )){
					echo '<p>';
					the_field( 'about_us_info');
					echo '</p>';
				}
				if ( get_field( 'about_us_image_1' ) ) {
					echo wp_get_attachment_image( get_field( 'about_us_image_1' ), 'medium', '', array('class' => 'custom-class' ));
				}
				if ( get_field( 'about_us_image_2' ) ) {
					echo wp_get_attachment_image( get_field( 'about_us_image_2' ), 'medium', '', array('class' => 'custom-class' ));
				}
				if ( get_field( 'about_us_image_3' ) ) {
					echo wp_get_attachment_image( get_field( 'about_us_image_3' ), 'medium', '', array('class' => 'custom-class' ));
				}
				if ( get_field( 'about_us_image_4' ) ) {
					echo wp_get_attachment_image( get_field( 'about_us_image_4' ), 'medium', '', array('class' => 'custom-class' ));
				}
			}

			?>

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


			<?php

			// get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
