<?php
/**
 * Template name: Contact
 * The template for displaying Contact Page
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

	
	<div id="primary" class="content-area contact-page">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">		

					<?php
					while ( have_posts() ) :
						the_post(); ?>

						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					<?php
					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
