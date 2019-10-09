jQuery(
	function ($) {
		var file_frame;
		$(document).on(
			'click',
			'.select-image-box',
			function (e) {
				var wallery_element = $(this).parent('.wallery');
				e.preventDefault();
				if (file_frame) {
					file_frame.close();
				}
				file_frame = wp.media.frames.file_frame = wp.media({
					title: $(this).data('uploader-title'),
					button: {
						text: $(this).data('uploader-button-text'),
					},
					multiple: true
				});
				file_frame.on(
					'select',
					function () {
						var listIndex = $(wallery_element).find('.images-list .image').index($(wallery_element).find('.images-list .image:last')),
							selection = file_frame.state().get('selection');
						selection.map(
							function (attachment, i) {
								attachment = attachment.toJSON(),
									index = listIndex + (i + 1);

								$(wallery_element).find('.images-list').append(
									'<div class="wallery-image image"><div class="image-inner"><input type="hidden" name="vdw_gallery_id[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + attachment.sizes.thumbnail.url + '"><a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a><br><a class="remove-image" href="#"><span class="wallery-trash"></span></a></div></div>'
								);
							}
						);
					}
				);
				makeSortable();
				file_frame.open();
			}
		);

		$(document).on(
			'click',
			'.images-list a.change-image',
			function (e) {

				e.preventDefault();
				var that = $(this);
				if (file_frame) {
					file_frame.close();
				}
				file_frame = wp.media.frames.file_frame = wp.media({
					title: $(this).data('uploader-title'),
					button: {
						text: $(this).data('uploader-button-text'),
					},
					multiple: false
				});
				file_frame.on(
					'select',
					function () {
						attachment = file_frame.state().get('selection').first().toJSON();

						that.parent().find('input:hidden').attr('value', attachment.id);
						that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
					}
				);
				file_frame.open();
			}
		);

		function resetIndex() {
			$('.images-list .image').each(
				function (i) {
					$(this).find('input:hidden').attr('name', 'vdw_gallery_id[' + i + ']');
				}
			);
		}

		function makeSortable() {
			$('.images-list').sortable({
				opacity: 0.6,
				float: 'left',
				stop: function () {
					resetIndex();
				}
			});
		}
		$(document).on(
			'click',
			'.images-list a.remove-image',
			function (e) {
				e.preventDefault();
				$(this).parents('.image').animate({
						opacity: 0
					},
					200,
					function () {
						$(this).remove();
						resetIndex();
					}
				);
			}
		);

		makeSortable();
	}
);