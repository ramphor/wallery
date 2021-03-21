<div class="toolbar image-layouts">
	<h2 class="heading-images">
		<?php echo esc_html($heading_text); ?>
	</h2>
	<div class="layouts">
		<div class="layout layout-list">
			<span class="wallery-list"></span>
		</div>
		<div class="layout layout-thumbnail">
			<span class="wallery-layout"></span>
		</div>
		<?php do_action( 'wallery_layouts' ); ?>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>
