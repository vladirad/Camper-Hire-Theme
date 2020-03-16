<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
						<?php the_content(); ?>

						<div class="loctime">
							<span class="location"><?php the_field('location'); ?></span>
							<span class="time"><?php the_field('time'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
			<div class="row">		
					<div class="gallery col-lg-7 col-xl-5">
						<div class="gslider galerija">
							
						<?php 
							$gallery = get_field('gallery');

							if ($gallery) {
								
							
							foreach ($gallery as $img) { ?>
								<div class="image">
									<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
								</div>
						<?php }} ?>
						</div>
					</div>

					<div class="tabs col-lg-5 col-xl-7">
						<ul class="nav nav-tabs" id="loctabs" role="tablist">
						<?php
							$i = 0;
						 	if( have_rows('tabs') ): while ( have_rows('tabs') ) : the_row(); 
						?>
					  	<li class="nav-item">
					    	<a class="nav-link <?php if($i == 0) { echo 'active'; } ?>" id="#link-<?php echo $i; ?>" data-toggle="tab" href="#tab-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i; ?>" aria-selected="true"><?php the_sub_field('title'); ?></a>
					  	</li>
						<?php $i++; endwhile; endif; ?>	
					  
						</ul>

						<div class="tab-content" id="locats-cont">
							<?php
								$j = 0;
							 	if( have_rows('tabs') ): while ( have_rows('tabs') ) : the_row(); 
							?>
							<div class="tab-pane fade <?php if($j == 0) { echo 'show active'; } ?>" id="tab-<?php echo $j; ?>" role="tabpanel" aria-labelledby="link-<?php echo $j; ?>">
									<?php the_sub_field('content'); ?>
							</div>
							<?php $j++; endwhile; endif; ?>	
						</div>

						<a class="btn full" href="<?php the_field('book_now_url'); ?>">Book Now</a>
						<a class="btn empty" href="<?php the_field('route_url'); ?>">View Route</a>
					</div>
					</div>


				<?php endwhile; // End of the loop.
				?>	
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
