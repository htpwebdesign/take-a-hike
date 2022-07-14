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
			<section class="banner-section">
				<?php
				if ( function_exists ( 'get_field' ) ) :
				$image = get_field('banner_image');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) :
						echo wp_get_attachment_image( $image, $size );					
					endif; 
					?>	
					<h1><?php the_title(); ?></h1>			
			</section>
		
			<section class="main-section">
				<section class="hero-section">				
					<div class="hero-grid">
						<?php
						if ( have_rows ( 'hero_section' ) ) :
							while( have_rows( 'hero_section' ) ): 
								the_row(); 
								$link = get_sub_field( 'link' );
	
								if( $link ) : 
    							$link_url = $link['url'];
   								$link_title = $link['title'];
    							$link_target = $link['target'] ? $link['target'] : '_self';
    							?>
								<div class="activity">
    								<a class="activity-link" href="<?php echo esc_url( $link_url ); ?>"
    								target="<?php echo esc_attr( $link_target ); ?>
    								"><?php echo esc_html( $link_title ); ?>
										<div class="main-container">    							
											<?php $image = get_sub_field( 'image' );
    										$size = 'large'; // (thumbnail, medium, large, full or custom size)
											$size2 = 'large';
											$title = get_sub_field( 'title' );
											if( $title == "Featured Products") :
        										echo wp_get_attachment_image( $image, $size2 );					
											else :
												echo wp_get_attachment_image( $image, $size );	
    										endif; ?>
											<h2 class="title"><?php the_sub_field( 'title' ); ?></h2>
										</div>
   								 	</a>
								</div>
								<?php  
							endif;						
							
							endwhile;
						endif;
						?>
					</div>
				</section>

				<section class="mid-section">
					<div class="mid-grid">
					<?php
						if (have_rows ( 'middle_section' ) ) :
							while( have_rows( 'middle_section' ) ): 
								the_row(); 
								$link = get_sub_field( 'link' );
	
								if( $link ) : 
    							$link_url = $link['url'];
   								$link_title = $link['title'];
    							$link_target = $link['target'] ? $link['target'] : '_self';
    							?>
								<div class="activity">
							
    								<a class="activity-link" href="<?php echo esc_url( $link_url ); ?>"
    								target="<?php echo esc_attr( $link_target ); ?>
    								"><?php echo esc_html( $link_title ); ?>
    							
										<div class="main-container"> 
											<?php $image = get_sub_field( 'image' );
    										$size = 'large'; // (thumbnail, medium, large, full or custom size)
											if( $image ) :
        										echo wp_get_attachment_image( $image, $size );					
    										endif; ?>
											<h2 class="title"><?php the_sub_field( 'title' ); ?></h2>
										</div>
   							 		</a>	
								</div>
								<?php  
								endif;						
							
							endwhile;
						endif;
						?>
					</div>
				</section>		
			
					
				<section class="end-section">
					<?php
					if ( get_field( 'workshop_subheading' ) ) :
					?>							
						<h2 class="workshop-header"><?php the_field( 'workshop_subheading' ); ?></h2>
						<?php
					endif;

					$args = array(
						'post_type'			=> 'tribe_events',
						'posts_per_page'	=> 1,		
    					'orderby'     		=> 'start-date',
    					'order'       		=> 'ASC',
					);					

					$query = new WP_Query($args);
			
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
						$query->the_post();
						?>
    						<a class="activity-link" href="<?php the_permalink(); ?>">
								<div class="main-container"> 
									<?php the_post_thumbnail( 'large' ); ?>
									<h2 class="title"><?php the_title(); ?></h2>
								</div>
   							</a>	
							
						<?php  
						endwhile;
						wp_reset_postdata();
					endif;
				

					// if (have_rows ( 'end_section' ) ) :
					// 	while ( have_rows( 'end_section' ) ): 
					// 	the_row(); 
					// 	$link = get_sub_field( 'link' );

					// 		if( $link ) : 
					// 		$link_url = $link['url'];
		   			// 		$link_title = $link['title'];
					// 		$link_target = $link['target'] ? $link['target'] : '_self';
							?>
		
								<!-- <h2 class="workshop-header"><?php the_field( 'workshop_subheading' ); ?></h2>
		
								<a class="activity-link" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
									<div class="main-container"> 
									<?php $image = get_sub_field( 'image' );
									$size = 'large'; 
			
										if( $image ) :
											echo wp_get_attachment_image( $image, $size );					
										endif; ?>
								<h2 class="title"><?php the_sub_field( 'title' ); ?></h2>
									</div>
								</a>	 -->
		
								<?php  
					// 		endif;						
		
					// 	endwhile;
					// endif;
					?>
				</section>		
					
				<section class="social-section">				
				<?php
					if( get_field( 'instagram_subheading' ) ) :
					?>
						<h2 class="social-header"><?php the_field( 'instagram_subheading' ); ?></h2>
						<?php echo do_shortcode('[instagram-feed feed=1]'); ?>
					<?php
					endif;
				?>				
				</section>

			</section>
			<?php
				endif;
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
get_footer();
