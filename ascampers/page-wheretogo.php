<?php
/**
 * Template name: Where To Go
 * The template for displaying Where To Go
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
				<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="col-12 page-header">
						<h1><?php the_title(); ?></h1>
						<div class="subtext"><?php the_content(); ?></div>
					</div>
									
					<ul class="nav nav-tabs col-12" id="locatabs" role="tablist">
						<li class="nav-item">
					    	<a class="nav-link active" id="#link-all" data-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">All</a>
					  	</li>
					<?php 
						$locats = get_terms('location_cat');
						foreach ($locats as $locat) {
					?>
					  	<li class="nav-item">
					    	<a class="nav-link" id="#link-<?php echo $locat->slug; ?>" data-toggle="tab" href="#tab-<?php echo $locat->slug; ?>" role="tab" aria-controls="tab-<?php echo $locat->slug; ?>" aria-selected="true"><?php echo $locat->name; ?></a>
					  	</li>
					<?php } ?>
					  
					</ul>
				
					<div class="tab-content col-12" id="locats-cont">
						<div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="link-all">
							<div class="row">	
						  	<?php $allargs = array('post_type' => 'location', 'posts_per_page' => -1); 
						  		$allposts = get_posts($allargs);

						  		foreach ($allposts as $loc) {

						  		$thumb = get_the_post_thumbnail_url($loc->ID, 'where-thumb');
						  		$location = get_field('location', $loc->ID);
						  		$time = get_field('time', $loc->ID);
						  		$titlelen = strlen($loc->post_title);
						  	?>	
								<div class="location col-lg-4 col-12">
									<a href="<?php echo get_the_permalink($loc->ID); ?>"><img class="image" src="<?php echo $thumb; ?>"></a>
								<a href="<?php echo get_the_permalink($loc->ID); ?>"><h3><?php echo substr($loc->post_title,0 , 20); ?><?php if($titlelen > 20) { echo '...'; } ?></h3></a>
								<div class="loctime">
									<span class="location"><?php echo $location; ?></span>
									<span class="time"><?php echo $time; ?></span>
								</div>
								
								<p><?php echo wp_trim_words($loc->post_content, 40, ''); ?></p>

								<a href="<?php echo get_the_permalink($loc->ID); ?>" class="readmore">Read More</a>
								</div>
						  	<?php } ?>
					  		</div>
					  	</div> 
						<?php 
							$locats = get_terms('location_cat');
							foreach ($locats as $locat) {
						?>
					  <div class="tab-pane fade" id="tab-<?php echo $locat->slug; ?>" role="tabpanel" aria-labelledby="link-<?php echo $locat->slug; ?>">
					  	<?php 
					  		$loargs = array(
					  			'post_type' => 'location',
					  			'posts_per_page' => -1,
					  			'tax_query' => array(
							        array(
							            'taxonomy' => 'location_cat',
							            'field'    => 'slug',
							            'terms'    => $locat->slug
							        ),
							    ),
					  		); 

					  		$locs = get_posts($loargs);
					  		foreach ($locs as $loc) {
					  			$thumb = get_the_post_thumbnail_url($loc->ID, 'where-thumb');
						  		$location = get_field('location', $loc->ID);
						  		$time = get_field('time', $loc->ID);
						  		$titlelen = strlen($loc->post_title);
						  	?>	
								<div class="location col-lg-4 col-12">
									<a href="<?php echo get_the_permalink($loc->ID); ?>"><img class="image" src="<?php echo $thumb; ?>"></a>
								<a href="<?php echo get_the_permalink($loc->ID); ?>"><h3><?php echo substr($loc->post_title,0 , 20); ?><?php if($titlelen > 20) { echo '...'; } ?></h3></a>
								<div class="loctime">
									<span class="location"><?php echo $location; ?></span>
									<span class="time"><?php echo $time; ?></span>
								</div>
								
								<p><?php echo wp_trim_words($loc->post_content, 40, ''); ?></p>

								<a href="<?php echo get_the_permalink($loc->ID); ?>" class="readmore">Read More</a>
								</div>
					  	<?php } ?>
					  </div> 


					  <?php } ?>
					</div>

				<?php endwhile; // End of the loop. ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
