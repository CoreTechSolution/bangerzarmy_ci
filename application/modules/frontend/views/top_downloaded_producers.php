<div class="beat_list_wrapper4">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>beats</h1>
				<p>Start with these free sample packs</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<?php $this->template_part->sidebar_left_listing(); ?>
			</div>

			<div class="col-lg-7">
				<?php if(!empty($producer_lists)){ ?>
					<h2 class="single_list_title">Producers</h2>
					<div class="row list_wrapper">
						<?php foreach ($producer_lists as $producer_list) { ?>
							<div class="col-lg-4">
								<a href="<?php echo base_url('frontend/producer/'.$producer_list->user_id); ?>">
									<div class="genre_list_box">
										<div class="genre_list_img" >
											<img src="<?php echo image_check($producer_list->profile_img); ?>" alt="" style="height: 196px;">
										</div>
										<div class="genre_list_title"><?php echo word_limiter($producer_list->display_name,2); ?> <span>(<?php echo get_beats_count(array('uploaded_by' =>$producer_list->user_id)); ?>)</span></div>
									</div>
								</a>
							</div>
						<?php } ?>

					</div>
				<?php if($view_all==true){ ?>
					<div class="view_all"><a href="<?php echo base_url('frontend/top_downloaded_producers'); ?>" class="btn btn-default btn-block">View All</a></div>
					<?php } ?>
				<?php } else {
					echo "<h3 class='no_data'>No Data Found!</h3>";
				}
				?>

			</div>
			<div class="col-lg-3">
				<?php $this->template_part->sidebar_beat_listing(); ?>
			</div>
		</div>

	</div>
</div>