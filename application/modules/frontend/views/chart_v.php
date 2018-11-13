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
					<div class="beats_slider_wrapper">
						<div class="beats_slider wrapper4-row1">
							<?php foreach ($producer_lists as $producer_list) { ?>
								<div>
									<a href="<?php echo base_url('frontend/producer/'.$producer_list->user_id); ?>">
										<div class="genre_list_box">
											<div class="genre_list_img" >
												<img src="<?php echo image_check($producer_list->profile_img); ?>" alt="" style="height: 190px;">
											</div>
											<div class="genre_list_title"><?php echo $producer_list->display_name; ?> <span>(<?php echo get_beats_count(array('uploaded_by' =>$producer_list->user_id)); ?>)</span></div>
										</div>
									</a>
								</div>
							<?php } ?>

						</div>
					</div>
				<?php } else {
					echo "<h3 class='no_data'>No Data Found!</h3>";
				}
				?>

				<?php if(!empty($genre_lists)){ ?>
					<h2 class="single_list_title">Genre</h2>
					<div class="beats_slider_wrapper">
						<div class="beats_slider wrapper4-row1">
							<?php foreach ($genre_lists as $genre_list) { ?>
								<div>
									<a href="<?php echo base_url('frontend/category/'.$genre_list->cat_slug); ?>">
										<div class="genre_list_box">
											<div class="genre_list_img" >
												<img src="<?php echo image_check($genre_list->cat_img); ?>" alt="">
											</div>
											<div class="genre_list_title"><?php echo $genre_list->cat_name; ?> <span>(<?php echo get_beats_count("category_id LIKE '%".$genre_list->cat_slug."%'"); ?>)</span></div>
										</div>
									</a>
								</div>
							<?php } ?>

						</div>
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