<?php
/**
 * Template name: Our Vehicles
 * The template for displaying Our Vehicles
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
			<div class="container">
				<div class="row">		

		<?php
		while ( have_posts() ) :
			the_post(); ?>
			
			<div class="col-12 page-header">
				<h1><?php the_title(); ?></h1>
				<h2><?php the_field('subtitle'); ?></h2>
			</div>
			<div class="col-12 page-desc">
				<?php the_content(); ?>
			</div>
			<div class="vehicles col-12">
			<?php 
				$vehargs = array('post_type' => 'product', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'asc');
				$vehicles = get_posts($vehargs);

				$v = 1;
				foreach ($vehicles as $veh) { 					
					$gallery = get_field('gallery', $veh->ID); 
			?>	
			<?php if($v % 2 != 0) { ?>
				<div class="vehicle row">
					<div class="gallery col-lg-5">
						<div class="galerija2">
						<?php foreach ($gallery as $img) { ?>
							<div class="image">
								<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
							</div>
						<?php } ?>

						</div>
					</div>

					<div class="tabs col-lg-7">
						<h2><?php echo $veh->post_title; ?></h2>
						<ul class="nav nav-tabs" id="vehtabs" role="tablist">
						<?php
							$i = 0;
						 	if( have_rows('tabs', $veh->ID) ): while ( have_rows('tabs', $veh->ID) ) : the_row(); 
						?>
					  	<li class="nav-item">
					    	<a class="nav-link <?php if($i == 0) { echo 'active'; } ?>" id="#link-<?php echo $i; ?>" data-toggle="tab" href="#tab-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i; ?>" aria-selected="true"><?php the_sub_field('title'); ?></a>
					  	</li>
						<?php $i++; endwhile; endif; ?>	
					  
						</ul>

						<div class="tab-content" id="vehicle-cont">
							<?php
								$j = 0;
							 	if( have_rows('tabs', $veh->ID) ): while ( have_rows('tabs', $veh->ID) ) : the_row(); 
							?>
							<div class="tab-pane fade <?php if($j == 0) { echo 'show active'; } ?>" id="tab-<?php echo $j; ?>" role="tabpanel" aria-labelledby="link-<?php echo $j; ?>">
									<p><?php the_sub_field('description'); ?></p>
									<div class="points row">
									<?php if( have_rows('points') ): while ( have_rows('points') ) : the_row(); ?>
										<div class="col-lg-4 point">
											<?php the_sub_field('name'); ?>
										</div>
									<?php endwhile; endif; ?>	
									</div>
							</div>
							<?php $j++; endwhile; endif; ?>	
						</div>
						<a class="btn full" href="<?php echo get_the_permalink($veh->ID); ?>">Book Now</a>
					</div>
					
				</div>
			<?php } else { ?>
				<div class="vehicle row">

					<div class="tabs col-lg-7">
						<h2><?php echo $veh->post_title; ?></h2>
						<ul class="nav nav-tabs" id="vehtabs" role="tablist">
						<?php
							$i = 0;
						 	if( have_rows('tabs', $veh->ID) ): while ( have_rows('tabs', $veh->ID) ) : the_row(); 
						?>
					  	<li class="nav-item">
					    	<a class="nav-link <?php if($i == 0) { echo 'active'; } ?>" id="#link-<?php echo $i; ?>" data-toggle="tab" href="#tab-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i; ?>" aria-selected="true"><?php the_sub_field('title'); ?></a>
					  	</li>
						<?php $i++; endwhile; endif; ?>	
					  
						</ul>

						<div class="tab-content" id="vehicle-cont">
							<?php
								$j = 0;
							 	if( have_rows('tabs', $veh->ID) ): while ( have_rows('tabs', $veh->ID) ) : the_row(); 
							?>
							<div class="tab-pane fade <?php if($j == 0) { echo 'show active'; } ?>" id="tab-<?php echo $j; ?>" role="tabpanel" aria-labelledby="link-<?php echo $j; ?>">
									<p><?php the_sub_field('description'); ?></p>
									<div class="points row">
									<?php if( have_rows('points') ): while ( have_rows('points') ) : the_row(); ?>
										<div class="col-lg-4 point">
											<?php the_sub_field('name'); ?>
										</div>
									<?php endwhile; endif; ?>	
									</div>
							</div>
							<?php $j++; endwhile; endif; ?>	
						</div>
						<a class="btn full" href="<?php echo get_the_permalink($veh->ID); ?>">Book Now</a>
					</div>
					
					<div class="gallery col-lg-5">
						<div class="galerija2">
						<?php foreach ($gallery as $img) { ?>
							<div class="image">
								<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
				
					
				<?php $v++; }
			?>
			</div>
		<?php
		endwhile; // End of the loop.
		?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
