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
                <div class="panel panel-default" style="">
                    <div id="Tabs" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#top" aria-controls="personal" role="tab" data-toggle="tab" class="active show">
                                    Top</a></li>
                            <li><a href="#genre" aria-controls="personal" role="tab" data-toggle="tab">
                                    Genre</a></li>
                            <li><a href="#producers" aria-controls="employment" role="tab" data-toggle="tab">Producers</a></li>
                            <li><a href="#tags" aria-controls="employment" role="tab" data-toggle="tab">Tags</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-top: 20px">
                            <div role="tabpanel" class="tab-pane active" id="top">
                                <h1>Top 10 Downloaded</h1>
                                <?php if(!empty($top10_downloaded_beats_lists)){ ?>
                                    <div class="beats_slider_wrapper">
                                        <div class="beats_slider wrapper4-row1">

                                            <?php foreach ($top10_downloaded_beats_lists as $top10_downloaded_beats_list) { ?>
                                                <div>
                                                    <a href="<?php echo base_url('frontend/single_beat/'.$top10_downloaded_beats_list->beat_id); ?>">
                                                        <div class="genre_list_box">
                                                            <div class="genre_list_img">
                                                                <img src="<?php echo image_check($top10_downloaded_beats_list->beat_graph_art); ?>" alt="">
                                                            </div>
                                                            <div class="genre_list_title"><?php echo word_limiter($top10_downloaded_beats_list->beat_name,2); ?></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="view_all"><a href="<?php echo base_url('frontend/top_100_download'); ?>" class="btn btn-default btn-block">Top 100 Downloaded</a></div>
                                <?php } else {
                                    echo "<h3 class='no_data'>No Data Found!</h3>";
                                }
                                ?>

                                <?php if(!empty($top10_downloaded_producer_lists)){ ?>
                                    <h1>Top 10 Downloaded Producers</h1>
                                    <div class="beats_slider_wrapper">
                                        <div class="beats_slider wrapper4-row1">

                                            <?php foreach ($top10_downloaded_producer_lists as $top10_downloaded_producer_list) { ?>
                                                <div>
                                                    <a href="<?php echo base_url('frontend/producer/'.$top10_downloaded_producer_list->user_id); ?>">
                                                        <div class="genre_list_box">
                                                            <div class="genre_list_img" >
                                                                <img src="<?php echo image_check($top10_downloaded_producer_list->profile_img); ?>" alt="" style="height: 190px;">
                                                            </div>
                                                            <div class="genre_list_title"><?php echo word_limiter($top10_downloaded_producer_list->display_name,2); ?> <span>(<?php echo get_beats_count(array('uploaded_by' =>$top10_downloaded_producer_list->user_id)); ?>)</span></div>
                                                        </div>
                                                    </a>

                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="view_all"><a href="<?php echo base_url('frontend/top_100_downloaded_producers'); ?>" class="btn btn-default btn-block">Top 100 Downloaded Producers</a></div>
                                <?php } else {
                                    echo "<h3 class='no_data'>No Data Found!</h3>";
                                }
                                ?>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="genre">

                                <?php if(!empty($category_lists)){ ?>
                                    <div class="row wrapper4-row1">
                                        <?php foreach ($category_lists as $category_list) { ?>
                                            <div class="col-lg-4">
                                                <a href="<?php echo base_url('frontend/category/'.$category_list->cat_slug); ?>">
                                                    <div class="genre_list_box">
                                                        <div class="genre_list_img">
                                                            <img src="<?php echo image_check($category_list->cat_img); ?>" alt="">
                                                        </div>
                                                        <div class="genre_list_title"><?php echo word_limiter($category_list->cat_name, 2); ?> <span>(<?php echo get_beats_count("category_id LIKE '%".$category_list->cat_slug."%'"); ?>)</span></div>
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
                            <div role="tabpanel" class="tab-pane" id="producers">
                                <?php if(!empty($producer_lists)){ ?>
                                    <div class="row wrapper4-row1">
                                        <?php foreach ($producer_lists as $producer_list) { ?>
                                            <div class="col-lg-4">
                                                <a href="<?php echo base_url('frontend/producer/'.$producer_list->user_id); ?>">
                                                    <div class="genre_list_box">
                                                        <div class="genre_list_img" >
                                                            <img src="<?php echo image_check($producer_list->profile_img); ?>" alt="" style="height: 190px;">
                                                        </div>
                                                        <div class="genre_list_title"><?php echo word_limiter($producer_list->display_name, 2); ?> <span>(<?php echo get_beats_count(array('uploaded_by' =>$producer_list->user_id)); ?>)</span></div>
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
                            <div role="tabpanel" class="tab-pane" id="tags">
                                <?php if(!empty($tag_lists)){ ?>
                                    <div class="row wrapper4-row1">
                                        <?php foreach ($tag_lists as $tag_list) { ?>
                                            <div class="col-lg-4">
                                                <a href="<?php echo base_url('frontend/tag/'.$tag_list->tag_slug); ?>">
                                                    <div class="genre_list_box">
                                                        <div class="genre_list_img" >
                                                            <img src="<?php echo image_check($tag_list->tag_img); ?>" alt="" style="height: 190px;">
                                                        </div>
                                                        <div class="genre_list_title"><?php echo word_limiter($tag_list->tag_name,2); ?> <span>(<?php echo get_beats_count("beat_tag LIKE '%".$tag_list->tag_slug."%'"); ?>)</span></div>
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
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <?php $this->template_part->sidebar_beat_listing(); ?>
            </div>
        </div>

    </div>
</div>