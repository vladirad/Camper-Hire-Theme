<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ASCampers
 */

$insta = get_field('instagram', 'option');

?>	
			<section class="instagram" id="instagram">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h2 class="section-title text-center"><?php echo $insta['title']; ?></h2>
							<h4 class="section-subtitle text-center gray"><?php echo $insta['subtitle']; ?></h4> 
							<?php echo do_shortcode('[instagram-feed]'); ?>
						</div>
					</div>
				</div>			
			</section>
			<?php if( have_rows('testimonials', 'option') ): while ( have_rows('testimonials', 'option') ) : the_row(); ?>
			<section class="testimonials" id="testimonials">
				<div class="container">
					<div class="row">
						<h2 class="section-title text-center"><?php the_sub_field('title'); ?></h2>
						<div class="col-12">	
							<div class="slider">			
							
								<?php if( have_rows('quotes') ): while ( have_rows('quotes') ) : the_row(); ?>
								<div class="slidex">											
									<p class="text-center"><?php the_sub_field('quote'); ?></p>
									<h4 class="section-subtitle text-center"><?php the_sub_field('name'); ?></h4>
								</div>
								<?php endwhile; endif; ?>	
							</div>
						</div>
					</div>
				</div>			
			</section>
			<?php endwhile; endif; ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container footercont">
			<div class="row">
				<nav class="col-12 footer-menu">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'menu_id'        => 'footer-menu',
					) );
					?>
				</nav>

				<div class="col-12 ">
					<div class="powered d-flex justify-content-center">
					<span>Powered by:</span><img src="<?php the_field('powered_by', 'option'); ?>" alt="payments">
				</div>
				</div>
			</div>		
		</div>				
	</footer><!-- #colophon -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-12 justify-content-center">
					<p class="text-center copyr"><?php the_field('copyright', 'option'); ?></p>
				</div>
			</div>
		</div>		
	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
