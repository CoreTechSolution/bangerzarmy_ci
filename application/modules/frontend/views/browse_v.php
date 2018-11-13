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
				<?php if(!empty($beats_lists)){ ?>
					<h2 class="single_list_title">Beats</h2>
					<div class="row list_wrapper">
						<?php foreach ($beats_lists as $beats_list) { ?>
							<div class="col-lg-4">
								<a href="<?php echo base_url('frontend/single_beat/'.$beats_list->beat_id); ?>">
									<div class="genre_list_box">
										<div class="genre_list_img">
											<img src="<?php echo image_check($beats_list->beat_graph_art); ?>" alt="">
										</div>
										<div class="genre_list_title"><?php echo $beats_list->beat_name; ?></div>
									</div>
								</a>
							</div>
						<?php } ?>

					</div>


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