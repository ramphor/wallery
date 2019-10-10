<div class="wallery-image image">
	<div class="image-inner">
		<input type="hidden" name="<?php echo $wallery_id; ?>[<?php echo $index; ?>]" value="<?php echo $image['id']; ?>">
		<img class="image-preview" src="<?php echo $image['src']; ?>">
		<a
			class="wallary-action change-image"
			href="#"
			data-uploader-title="<?php _e( 'Change Images', 'wallery' ); ?>"
			data-uploader-button-text="<?php _e( 'Change Images', 'wallery' ); ?>"
		>
			<span class="wallery-retweet"></span>
		</a>
		<a class="wallary-action remove-image" href="#"><span class="wallery-trash"></span></a>
	</div>
</div>
