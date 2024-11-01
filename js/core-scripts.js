jQuery(document).ready(function($){

	// Make the Meta Boxes sections slide
	$('.meta-box p.sectionTitle').click(function(){
		$('.container').slideUp();
		$(this).next().slideToggle();
	});


	// Script for using the MEdia Uploader in a widget
	var image_field;
	var header_clicked = false;
	$(document).on('click', 'input.select-img', function(evt){
		image_field = $(this).siblings('.img');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		header_clicked = true;
		return false;
	});

	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html) {
		if (header_clicked) {
			imgurl = $('img', html).attr('src');
			image_field.val(imgurl);
			header_clicked = false;
			tb_remove();
		} else {
			window.original_send_to_editor(html);
		}
	}
});
