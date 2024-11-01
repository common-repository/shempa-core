<?php 
/*-----------------------------------------------------------------------------------*/
/* Metabox for the Services Page
/* It is displayed on the page that uses "page-services.php" as a Page Template
/*-----------------------------------------------------------------------------------*/

global $wpalchemy_media_access; ?>

<div class="meta-box">
 	
	<!-- Beginning of The Boxes Area -->
	<label class="show">
		<?php $mb->the_field('show-listings'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-listings" <?php $mb->the_checkbox_state('show-listings'); ?>/>
		<?php _e('Show Boxes Area', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Boxes Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<h4><?php _e('Section Title', 'cf-language') ?></h4>
		<?php $mb->the_field('listings-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>

		<!-- Create the fields for the section -->
		<h4><?php _e('The Items', 'cf-language') ?></h4>
		<?php $listnum = 1; ?>
		<?php while($mb->have_fields_and_multi('listings')): ?>

			<?php $mb->the_group_open(); ?>
				<h4><?php _e('Item', 'cf-language') ?> <?php echo $listnum; ?></h4>

 				<?php $mb->the_field('listing-title'); ?>
 				<label><?php _e('Title', 'cf-language') ?></label>
 				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('listing-icon'); ?>
				<label><?php _e('Icon', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			 
				<?php $mb->the_field('listing-description'); ?>
				<label><?php _e('Description', 'cf-language') ?></label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>

			 	<a href="#" class="dodelete button"><?php _e('Remove Box', 'cf-language') ?></a>

			 	<?php $listnum++; ?>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>
		 
		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-listings button"><?php _e('Add Box', 'cf-language') ?></a></p>

	</div><!-- .container -->
	<!-- End of The Boxes Area -->


	<!-- Beginning of The Progress Bars Area -->
	<label class="show">
		<?php $mb->the_field('show-progress'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-progress" <?php $mb->the_checkbox_state('show-progress'); ?>/>
		<?php _e('Show Progress Bars', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Progress Bars Area', 'cf-language') ?>a</p>
	<div class="container">

		<!-- Create the field for the section title -->
		<h4><?php _e('Section Title', 'cf-language') ?></h4>
		<?php $mb->the_field('progress-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>

		<!-- Create the fields for the section -->
		<h4><?php _e('The Items', 'cf-language') ?></h4>
		<?php $prognum = 1; ?>
		<?php while($mb->have_fields_and_multi('progbars')): ?>

			<?php $mb->the_group_open(); ?>
				<h4><?php _e('Item', 'cf-language') ?> <?php echo $prognum; ?></h4>

 				<?php $mb->the_field('progbar-title'); ?>
 				<label><?php _e('Title', 'cf-language') ?></label>
 				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('progbar-perc'); ?>
				<label><?php _e('Percent Loaded', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			 
				<?php $mb->the_field('progbar-description'); ?>
				<label><?php _e('Description', 'cf-language') ?></label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>

			 	<a href="#" class="dodelete button"><?php _e('Remove Item', 'cf-language') ?></a>

			 	<?php $prognum++; ?>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>
		 
		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-progbars button"><?php _e('Add Item', 'cf-language') ?></a></p>

	</div><!-- .container -->
	<!-- End of The Progress Bars Area -->

</div>