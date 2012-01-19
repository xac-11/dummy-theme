<div id="sidebar">
	<?php dynamic_sidebar('RightSideBar');?>

	<aside id="cats" class="widget">
		<h3 class="widget-title">Kategorien</h3>
		<div id="public">
			<?php echo xac_get_child_cats('public');?>
		</div>
		<?php if(xac_authorisation_check(true)):?>
			<div id="private">
				<?php echo xac_get_child_cats('private');?>
			</div>
		<?php endif;?>
	</aside>
</div><!-- #sidebar -->