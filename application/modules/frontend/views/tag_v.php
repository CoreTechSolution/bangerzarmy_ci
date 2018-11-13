<div class="wrapper4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo $title; ?></h1>
                <p>Start with these free sample packs</p>
            </div>
        </div>
        <?php if(!empty($beats_lists)){ ?>
            <!--<h2 class="list_title">Beats</h2>-->
            <div class="row wrapper4-row1">
                <?php foreach ($beats_lists as $beats_list) { ?>
                    <div class="col-lg-2">
                        <a href="<?php echo base_url('frontend/single_beat/'.$beats_list->beat_id); ?>">
                            <div class="genre_list_box">
                                <div class="genre_list_img">
                                    <img src="<?php echo image_check($beats_list->beat_graph_art); ?>" alt="">
                                </div>
                                <div class="genre_list_title"><?php echo word_limiter($beats_list->beat_name,2); ?></div>
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