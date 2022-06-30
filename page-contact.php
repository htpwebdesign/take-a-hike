<?php
/**
 * The template for displaying the Contact Page
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
			<h1><?php the_title() ?></h1>
			<section class="contact-form"><?php echo do_shortcode('[wpforms id="516"]') ?></section>
			<?php
			if ( function_exists ( 'get_field' ) ):
			?>
				<section class="contact-address">
					<?php
					//Store Address
					if ( get_field ( 'contact_address' ) ):
						?>
						<p><?php the_field( 'contact_address' ) ?></p>
						<?php
					endif;

					//Store Number
					if ( get_field ( 'contact_number' ) ):
						?>
						<p><?php the_field( 'contact_number' ) ?></p>
						<?php
					endif;
					?>
				</section>

				<section class="contact-social">
					<?php
					//Social Media Heading
					if ( get_field ( 'social_media_subheading' ) ):
						?>
						<h2><?php the_field( 'social_media_subheading' ) ?></h2>
						<?php
					endif;
					?>
					<nav id="social-navigation" class="social-navigation">
					<?php wp_nav_menu(array('theme_location' => 'social')); ?>
					</nav>
				</section>

				<section class="contact-hours">
					<?php
					//Store Hours Heading
					if ( get_field ( 'store_hours_subheading' ) ):
						?>
						<h2><?php the_field( 'store_hours_subheading' ) ?></h2>
						<?php
					endif;

						// Store Hours Table
					if( have_rows( 'contact_store_hours' ) ): ?>
						<table cellspacing = "0">
							<thead>
								<tr>
									<th>Day</th>
									<th>Hours</th>
								</tr>
							</thead>
							<tbody>
							<?php
							while( have_rows('contact_store_hours') ):
								the_row();
								?>
								<tr>
									<td><?php the_sub_field('day'); ?></td>
									<td><?php the_sub_field('working_hours'); ?></td>
			
								</tr>
								<?php
							endwhile;
							?>
							</tbody>
						</table>
						<?php						
					endif; 
					?>
				</section>
			
				<section class="contact-map">
					<?php 
					$location = get_field('google_map');
					if( $location ): ?>
						<div class="acf-map" data-zoom="16">
							<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
						</div>
					<?php 
					endif; 
					?>
				</section>
			
				<?php
			endif;

		endwhile; // End of the loop.	
		?>

	</main><!-- #main -->

<?php
get_footer();
