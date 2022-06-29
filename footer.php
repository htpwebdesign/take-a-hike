<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Take_A_Hike
 */

?>

	<footer id="colophon" class="site-footer">
	<div class="footer-menus">
			<nav id="footer-navigation" class="footer-navigation">
				<?php wp_nav_menu(array('theme_location' => 'footer')); ?>
			</nav>			
			
			<nav id="social-navigation" class="social-navigation">
			<?php wp_nav_menu(array('theme_location' => 'social')); ?>
			</nav>
		</div><!-- .footer-menus -->

		<div class="site-info">
		
				<?php the_privacy_policy_link();?>
				<?php
				// /* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Website built %1$s by %2$s.', 'take-a-hike' ), '', '<a href="https://natalieratayczak.com/">Natalie Ratayczak, </a><a href="https://bcit.jessicalaporte.com/">Jessica Laporte, </a><a href="https://marvuk.com/">Marko Vukmirovic, </a><a href="https://adamh.ca/">Adam Hauck</a>' );
				?> 
				<p>&copy 2022 Take a Hike Outfitters</p>
				
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
