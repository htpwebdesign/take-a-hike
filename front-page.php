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
				<article class="activities_featured">
					<?php
					if (have_rows ( 'hero_section' ) ) :
						while( have_rows( 'hero_section' ) ): 
							the_row(); 
							$link = get_sub_field( 'link' );
	
							if( $link ) : 
    						$link_url = $link['url'];
   							$link_title = $link['title'];
    						$link_target = $link['target'] ? $link['target'] : '_self';
    						?>
    						<a class="activity-link" href="<?php echo esc_url( $link_url ); ?>"
    						target="<?php echo esc_attr( $link_target ); ?>
    						"><?php echo esc_html( $link_title ); ?>
    							<h2><?php the_sub_field( 'title' ); ?></h2><?php $image = get_sub_field( 'image' );
    							$size = 'medium'; // (thumbnail, medium, large, full or custom size)
								$size2 = 'large';
								$title = get_sub_field( 'title' );
								if( $title == "Featured Products") :
        							echo wp_get_attachment_image( $image, $size2 );					
								else :
									echo wp_get_attachment_image( $image, $size );	
    							endif; ?>
   							 </a>	
							<?php  
							endif;						
							
						endwhile;
					endif;
					?>
				</article>
			</section>

			<section class="mid-section">
				<article class="sale_bundles">
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
    						<a class="activity-link" href="<?php echo esc_url( $link_url ); ?>"
    						target="<?php echo esc_attr( $link_target ); ?>
    						"><?php echo esc_html( $link_title ); ?>
    							<h2><?php the_sub_field( 'title' ); ?></h2><?php $image = get_sub_field( 'image' );
    							$size = 'large'; // (thumbnail, medium, large, full or custom size)
								
								if( $image ) :
        							echo wp_get_attachment_image( $image, $size );					
    							endif; ?>
   							 </a>	
							<?php  
							endif;						
							
						endwhile;
					endif;
					?>
				</article>		
			</section>

			<section class="end-section">
				<article class="current_workshop">
				<?php
					if (have_rows ( 'end_section' ) ) :
						while( have_rows( 'end_section' ) ): 
							the_row(); 
							$link = get_sub_field( 'link' );
	
							if( $link ) : 
    						$link_url = $link['url'];
   							$link_title = $link['title'];
    						$link_target = $link['target'] ? $link['target'] : '_self';
    						?>
							<h2><?php the_field( 'workshop_subheading' ); ?></h2>
    						<a class="activity-link" href="<?php echo esc_url( $link_url ); ?>"
    						target="<?php echo esc_attr( $link_target ); ?>
    						"><?php echo esc_html( $link_title ); ?>
    							<h2><?php the_sub_field( 'title' ); ?></h2><?php $image = get_sub_field( 'image' );
    							$size = 'full'; // (thumbnail, medium, large, full or custom size)
								
								if( $image ) :
        							echo wp_get_attachment_image( $image, $size );					
    							endif; ?>
   							 </a>	
							<?php  
							endif;						
							
						endwhile;
					endif;
					?>
				</article>
			</section>

			<section class="social-section">
				<article class="instagram">
				<?php
					if (function_exists ( 'get_field' )) :
					?>
						<h2><?php the_field( 'instagram_subheading' ); ?></h2>
						<?php echo do_shortcode('[instagram-feed feed=1]'); ?>
					<?php
					endif;
				?>
				</article>
			</section>
			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
