<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="internship-meta">
			<div class="company internship-meta-double">
				<div class="internship-chunk">
					<i class="fa fa-building-o" aria-hidden="true"></i><span class="internship-label">Company:</span><span class="internship-value"><?php echo internship_get_company();?></span>
				</div>
				<div class="internship-chunk">
					<i class="fa fa-usd" aria-hidden="true"></i><span class="internship-label">Salary:</span><span class="internship-value"><?php echo internship_get_compensation();?> <?php echo internship_get_credit();?></span>
				</div>
			</div>	
			<div class="location internship-meta-single">
				<i class="fa fa-calendar" aria-hidden="true"></i><span class="internship-label">Dates:</span><span class="internship-value"><?php echo internship_get_start_date();?><?php echo internship_get_end_date();?></span>
			</div>	
			<div class="location internship-meta-single">
				<i class="fa fa-map-marker" aria-hidden="true"></i><span class="internship-label">Location:</span><span class="internship-value"><?php  echo internship_get_location();?></span>
			</div>
			<div class="location internship-meta-single">
				<i class="fa fa-list-alt" aria-hidden="true"></i><span class="internship-label">Job Description:</span><span class="internship-value"><div class="intern-box"><?php  echo internship_get_job_description();?></span></div>
			</div>
			<div class="location internship-meta-single">
				<i class="fa fa-check" aria-hidden="true"></i><span class="internship-label">Application Submission Requirements:</span><span class="internship-value"><div class="intern-box"><?php  echo internship_get_requirements();?></span></div>
			</div>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>
		
		<div class="intern-apply">
			<button class="btn btn-primary btn-apply" type="button" data-toggle="collapse" data-target="#intern_apply" aria-expanded="true" aria-controls="intern_apply">
			    <!-- <h2 class="entry-title"> -->Application Form<!-- </h2> -->
			  </button>
			
			<div class="collapse show" id="intern_apply">				
			  <?php 
			  	$gform_text = '[gravityform id="1" title="false" description="false" field_values="company_email=' . internship_get_company_email() . '"]';
			  	echo do_shortcode($gform_text);?>
			</div>
		</div>
		<?php 
			$user = wp_get_current_user();
			if(in_array( 'student', $user->roles ) || current_user_can( 'manage_options' )) : ?>
			<div class="reviews">
				<div class="row">					
					<div class="review-list col-md-12">
						<h2>Reviews</h2>
						<?php echo internship_get_reviews();?>
					</div>
					<div class="review-form col-md-12">
						<h2>Submit a Review</h2>
						<?php echo do_shortcode('[gravityform id="4" title="false" description="false"]'); ?>
					</div>
				</div>
			</div>
		<?php endif;?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
