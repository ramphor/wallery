<div class="wallery">
	<div class="select-image-box">
		<div class="wrapper">
			<div class="outline">
				<i class="wallery-upload"></i>
			</div>
		</div>
	</div>
	<div class="wallery-toolbars">
		<?php if ( has_action( 'wallery_left_toolbars' ) || has_action( 'wallery_right_toolbars' ) ) : ?>
		<div class="wallery-toolbar-inner">
			<div class="wallery-left-toolbar">
				<?php do_action( 'wallery_left_toolbars' ); ?>
			</div>
			<div class="wallery-right-toolbar">
				<?php do_action( 'wallery_right_toolbars' ); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="wallery-toolbar-inner">
			<?php do_action( 'wallery_toolbars' ); ?>
		</div>
	</div>
	<div id="<?php echo $wallery_id; ?>" class="images-list"></div>
</div>
