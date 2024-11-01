<?php 
/*-----------------------------------------------------------------------------------*/
/* Metabox for the About Page
/* It is displayed on the page that uses "page-about.php" as a Page Template
/*-----------------------------------------------------------------------------------*/

global $wpalchemy_media_access; ?>

<div class="meta-box">
 	
	<!-- Beginning of The Boxes Area -->
	<label class="show">	
		<?php $mb->the_field('show-boxes'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-boxes" <?php $mb->the_checkbox_state('show-boxes'); ?>/>
		<?php _e('Show Boxes Area', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Boxes Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<h4><?php _e('Section Title', 'cf-language') ?></h4>
		<?php $mb->the_field('boxes-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>

		<!-- Create the fields for the section -->
		<h4><?php _e('The Boxes', 'cf-language') ?></h4>
		<?php $boxnum = 1; ?>
		<?php while($mb->have_fields_and_multi('boxes')): ?>

			<?php $mb->the_group_open(); ?>
				<h4><?php _e('Box', 'cf-language') ?> <?php echo $boxnum; ?></h4>

 				<?php $mb->the_field('box-title'); ?>
 				<label><?php _e('Title', 'cf-language') ?></label>
 				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('box-icon'); ?>
				<label><?php _e('Icon', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			 
				<?php $mb->the_field('box-description'); ?>
				<label><?php _e('Description', 'cf-language') ?></label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>

			 	<a href="#" class="dodelete button"><?php _e('Remove Box', 'cf-language') ?></a>

			 	<?php $boxnum++; ?>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>
		 
		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-boxes button"><?php _e('Add Box', 'cf-language') ?></a></p>

	</div><!-- .container -->
	<!-- End of The Boxes Area -->


	<!-- Beginning of The Gallery Area -->
	<label class="show">
 		<?php $mb->the_field('show-gallery'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-gallery" <?php $mb->the_checkbox_state('show-gallery'); ?>/>
		<?php _e('Show Gallery Area', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Gallery Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<h4><?php _e('Section Title', 'cf-language') ?></h4>
		<?php $mb->the_field('gallery-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>

		<!-- Create the fields for the section -->
		<h4><?php _e('The Items', 'cf-language') ?></h4>
		<?php $gallerynum = 1; ?>
		<?php while($mb->have_fields_and_multi('gallery')): ?>

			<?php $mb->the_group_open(); ?>
			 	<h4><?php _e('Item', 'cf-language') ?> <?php echo $gallerynum; ?></h4>

				<?php $mb->the_field('item-name'); ?>
				<label><?php _e('Name', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('item-title'); ?>
				<label><?php _e('Job Title', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				 
				<?php $mb->the_field('item-img'); ?>
				<label><?php _e('Image URL', 'cf-language') ?></label>
				<?php $wpalchemy_media_access->setGroupName('gallery-n'. $mb->get_the_index())->setInsertButtonLabel('Insert'); ?>
				<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
				<?php echo $wpalchemy_media_access->getButton(); ?>
			 
				<?php $mb->the_field('item-description'); ?>
				<label><?php _e('Description', 'cf-language') ?></label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>

				<?php $mb->the_field('item-facebook'); ?>
				<label><?php _e('Facebook Link', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('item-twitter'); ?>
				<label><?php _e('Twitter Link', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('item-linkedin'); ?>
				<label><?php _e('Linkedin Link', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('item-googlep'); ?>
				<label><?php _e('Google Plus Link', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<br>

			 	<a href="#" class="dodelete button"><?php _e('Remove Item', 'cf-language') ?></a>

			 	<?php $gallerynum++; ?>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>

		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-gallery button"><?php _e('Add Item', 'cf-language') ?></a></p>

	</div><!-- .container -->
	<!-- End of The Gallery Area -->

</div>