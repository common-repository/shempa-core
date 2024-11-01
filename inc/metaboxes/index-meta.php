<?php 
/*-----------------------------------------------------------------------------------*/
/* Metabox for the Front Page
/* It is displayed on the page that uses "front-page.php" as a Page Template
/*-----------------------------------------------------------------------------------*/

global $wpalchemy_media_access; ?> 

<div class="meta-box">

	<!-- Beginning of The Slider Area -->
	<label class="show show-chk">
		<?php $mb->the_field('show-slider'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-slider" <?php $mb->the_checkbox_state('show-slider'); ?>/>
		<?php _e('Show Slider Area', 'cf-language') ?>
	</label>
	<!-- End of The Slider Area -->
 	
 	<!-- Beginning of The Featured Area -->
 	<label class="show">
		<?php $mb->the_field('show-features'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-features" <?php $mb->the_checkbox_state('show-features'); ?>/>
		<?php _e('Show Features Area', 'cf-language') ?>
	</label>

 	<p class="sectionTitle"><?php _e('Features Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<h4><?php _e('Section Title', 'cf-language') ?></h4>
		<?php $mb->the_field('features-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>
		
		<!-- Create the fields for the section -->
		<h4><?php _e('The Items', 'cf-language') ?></h4>
		<?php $featnum = 1; ?>
		<?php while($mb->have_fields_and_multi('features', array('length' => 0, 'limit' => 3))): ?>

			<?php $mb->the_group_open(); ?>
				<h4><?php _e('Item', 'cf-language') ?> <?php echo $featnum; ?></h4>

 				<?php $mb->the_field('feature-title'); ?>
 				<label><?php _e('Title', 'cf-language') ?></label>
 				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		 	
				<?php $mb->the_field('feature-icon'); ?>
				<label><?php _e('Icon', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('feature-link'); ?>
				<label><?php _e('Link', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			 
				<?php $mb->the_field('feature-description'); ?>
				<label><?php _e('Description', 'cf-language') ?></label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>

			 	<a href="#" class="dodelete button"><?php _e('Remove Box', 'cf-language') ?></a>

			 	<?php $featnum++; ?>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>
		 
		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-features button"><?php _e('Add Box', 'cf-language') ?></a></p>

	</div><!-- .container -->
	<!-- End of The Featured Area -->


	<!-- Beginning of The Projects Area -->
	<label class="show">
		<?php $mb->the_field('show-projects'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-projects" <?php $mb->the_checkbox_state('show-projects'); ?>/>
		<?php _e('Show Projects Area', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Projects Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<h4><?php _e('Section Title', 'cf-language') ?></h4>
		<?php $mb->the_field('projects-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

	</div><!-- .container-- >
	<!-- End of The Projects Area -->


	<!-- Beginning of The Utility Area -->
	<label class="show">
		<?php $mb->the_field('show-utility'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-uility" <?php $mb->the_checkbox_state('show-uility'); ?>/>
		<?php _e('Show Utility Area', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Utility Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<h4><?php _e('Section Title', 'cf-language') ?></h4>
		<?php $mb->the_field('utility-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>
		
		<!-- Create the fields for the section -->
		<h4><?php _e('The Items', 'cf-language') ?></h4>
		<?php $servnum = 1; ?>
		<?php while($mb->have_fields_and_multi('utility')): ?>

			<?php $mb->the_group_open(); ?>
				<h4><?php _e('Item', 'cf-language') ?> <?php echo $servnum; ?></h4>

 				<?php $mb->the_field('utility-title'); ?>
 				<label><?php _e('Title', 'cf-language') ?></label>
 				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('utility-icon'); ?>
				<label><?php _e('Icon', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			 
				<?php $mb->the_field('utility-description'); ?>
				<label><?php _e('Description', 'cf-language') ?></label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>

			 	<a href="#" class="dodelete button"><?php _e('Remove Item', 'cf-language') ?></a>

			 	<?php $servnum++; ?>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>
		 
		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-utility button"><?php _e('Add Item', 'cf-language') ?></a></p>

	</div><!-- .container -->
	<!-- End of The Utility Area -->

</div>