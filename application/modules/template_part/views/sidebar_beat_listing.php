<div class="tp_beat_listing_main">
	<?php if(!empty($beat_lists)){ ?>
	<h6>Top Packs</h6>
	<div class="tp_beat_listing">
	<?php $count=1; ?>
		<ul>
			<?php foreach($beat_lists as $beat_list){ ?>
			<li>
				<a href="<?php echo base_url('frontend/single_beat/'.$beat_list->beat_id); ?>">
					<span class="relate_img"><img src="<?php echo $beat_list->beat_graph_art; ?>" alt=""></span>
					<span class="relate_sl"><?php echo $count; ?></span>
					<span class="relate_name"><?php echo word_limiter($beat_list->beat_name, 3); ?><sub>By <?php echo $this->users->get_user_field( $beat_list->uploaded_by,'name'); ?></sub></span>
				</a>
			</li>
			<?php $count++; ?>
			<?php } ?>
		</ul>
	</div>
	<?php } else { ?>
	<?php	echo '<h6>No related beats found!</h6>'; ?>
	<?php } ?>

</div>