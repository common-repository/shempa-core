<?php 
/*-----------------------------------------------------------------------------------*/
/* Metabox for the Contact Page
/* It is displayed on the page that uses "page-contact.php" as a Page Template
/*-----------------------------------------------------------------------------------*/

global $wpalchemy_media_access; ?>

<div class="meta-box">
 	
	<!-- Beginning of The Map Area -->
	<label class="show">
		<?php $mb->the_field('show-map'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-map" <?php $mb->the_checkbox_state('show-map'); ?>/>
		<?php _e('Show Map', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Map Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<?php $mb->the_field('map-code'); ?>
		<label><?php _e('Insert map code here', 'cf-language') ?></label>
		<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>

		<hr>

	</div><!-- .container -->
	<!-- End of The Map Area -->


	<!-- Beginning of Contact Form Area -->
	<label class="show">	
		<?php $mb->the_field('show-cntform'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-cntform" <?php $mb->the_checkbox_state('show-cntform'); ?>/>
		<?php _e('Show Contact Form', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Contact Form', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the field for the section title -->
		<?php $mb->the_field('contact-form-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>

	</div><!-- .container -->
	<!-- End of The Contact Form Area -->

	<!-- Beginning of The Contact Info Area -->
	<label class="show">	
		<?php $mb->the_field('show-cntinfo'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-cntinfo" <?php $mb->the_checkbox_state('show-cntinfo'); ?>/>
		<?php _e('Show Contact Info', 'cf-language') ?>
	</label>
	<p class="sectionTitle">Contact Info</p>
	<div class="container">

		<!-- Create the field for the section title -->
		<?php $mb->the_field('contact-info-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<hr>

		<!-- Create the fields for the section -->
		<h4><?php _e('The Fields', 'cf-language') ?></h4>
		<?php $contactinfonum = 1; ?>
		<?php while($mb->have_fields_and_multi('contact-info-fields', array('length' => 0, 'limit' => 5))): ?>

			<?php $mb->the_group_open(); ?>
				<h4><?php _e('Field', 'cf-language') ?> <?php echo $contactinfonum; ?></h4>

 				<?php $mb->the_field('contact-info-field-title'); ?>
 				<label><?php _e('Title', 'cf-language') ?></label>
 				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

				<?php $mb->the_field('contact-info-field-value'); ?>
				<label><?php _e('Value', 'cf-language') ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				
				<br>

			 	<a href="#" class="dodelete button"><?php _e('Remove Box', 'cf-language') ?></a>

			 	<?php $contactinfonum++; ?>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>
		 
		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-contact-info-fields button"><?php _e('Add Box', 'cf-language') ?></a></p>

	</div><!-- .container -->
	<!-- End of The Contact Info Area -->

</div>