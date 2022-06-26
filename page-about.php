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
			}

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
