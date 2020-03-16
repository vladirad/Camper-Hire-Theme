<?php
/**
 * Template name: Homepage
 * The template for displaying Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ASCampers
 */

get_header();
?>

	

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<?php
				$hero = get_field('hero');
				$story = get_field('story');
				$where = get_field('where_to_go');
				$locations = $where['locations'];
				$how = get_field('how_it_works');
			?>

			<style>
				.hero:after {
					background-image: url(<?php echo $hero['border']; ?>);
				}
			</style>

			<section id="hero" class="hero" style="background-image: url(<?php echo $hero['image']; ?>);">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="hero-inner">
							<h1 class="hero-title"><?php echo $hero['title']; ?></h1>
							<a class="button" id="hero-button" href="<?php echo $hero['button_link']; ?>"><?php echo $hero['button_text']; ?></a>
						</div>
						</div>			
					</div>
					<div class="scrollhome">
						<img src="<?php bloginfo('template_url'); ?>/img/scrool_down_white.svg">
					</div>
				</div>
			</section>

			<div class="action">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center center-title">
							<?php echo $hero['action']; ?>	
						</div>
					</div>
				</div>			
			</div>
			
			<section class="story" id="story">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 desc">
							<h2 class="section-title"><?php echo $story['title']; ?></h2>
							<p><?php echo $story['text']; ?></p>
							<a class="button story-button" href="<?php echo $story['button_link']; ?>"><?php echo $story['button_text']; ?></a>
						</div>
						<div class="col-lg-7 image">
							<img src="<?php echo $story['image']; ?>" alt="<?php echo $story['title']; ?>">
						</div>
					</div>
				</div>
			</section>
			
			<section class="where" id="where">
				<div class="container">
					<div class="row">
						<div class="col-12 top">
							<h2 class="section-title text-center"><?php echo $where['title']; ?></h2>
							<div class="text-center extra"><p><?php echo $where['text']; ?></p></div>
						</div>
						<div class="col-lg-12 locations">
							<div class="row">							
							<?php 
								$i = 1;
								foreach ($locations as $location) {
							?>
								<div class="location <?php if($i == 1) { echo 'col-12 first'; } else { echo 'col-md-6 col-12'; } ?>" >
									<img class="loc-image"src="<?php echo get_the_post_thumbnail_url($location); ?>">
									<a class="loclink" href="<?php echo get_the_permalink($location); ?>">
										<h3><?php echo $location->post_title; ?></h3>		
									</a>
								</div>
							<?php $i++; } ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="how" id="how">
				<div class="container-fluid">
					<div class="row howit">
						<div class="col-lg-6 desc">
							<div class="row justify-content-end  h-100">
								<div class="col-12 col-md-6 text-center justify-content-center align-self-center">
							<h2 class="section-title"><?php echo $how['title']; ?></h2>
							<p><?php echo $how['text']; ?></p>
							<a class="how-link" href="<?php echo $how['link_url']; ?>">Learn more</a>
						</div>
					</div>
						</div>
						<div class="col-lg-6 image">
							<img src="<?php echo $how['image']; ?>" alt="<?php echo $how['title']; ?>">
						</div>
					</div>
				</div>
			</section>
		
		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
