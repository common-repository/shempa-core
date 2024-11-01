<?php 
/*-----------------------------------------------------------------------------------*/
/* Metabox common to all pages
/*-----------------------------------------------------------------------------------*/

global $wpalchemy_media_access; ?>

<div class="meta-box">
 	
 	<!-- Beginning of The Intro Area -->
	<label class="show">
		<?php $mb->the_field('show-intro'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-intro" <?php $mb->the_checkbox_state('show-intro'); ?>/>
		<?php _e('Show Intro Area', 'cf-language') ?>
	</label>

 	<p class="sectionTitle"><?php _e('Intro Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the fields for The Extension Area -->
		<?php $mb->the_field('intro-title'); ?>
		<label><?php _e('Title', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

	</div><!-- ,container-->
	<!-- End of The Intro Area -->
	

	<!-- Beginning of The Extension Area -->
	<label class="show">	
		<?php $mb->the_field('show-extension'); ?>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show-extension" <?php $mb->the_checkbox_state('show-extension'); ?>/>
		<?php _e('Show Extension Area', 'cf-language') ?>
	</label>

	<p class="sectionTitle"><?php _e('Extension Area', 'cf-language') ?></p>
	<div class="container">

		<!-- Create the fields for The Extension Area -->

		<?php $mb->the_field('extension-description'); ?>
		<label><?php _e('Description', 'cf-language') ?></label>
		<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>

		<?php $mb->the_field('extension-button'); ?>
		<label><?php _e('Button text', 'cf-language') ?></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<?php $mb->the_field('extension-link'); ?>
		<label><?php _e('Button Link', 'cf-language') ?></label>		
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

	</div><!-- .container-- >
	<!-- End of The Extension Area -->

</div>