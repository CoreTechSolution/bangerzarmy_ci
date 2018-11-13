<div class="wrapper12" style="margin-top: 0px;">
    <?php if(!empty($beats_lists)){ ?>
        <?php //print_r($beats_lists); exit(); ?>

        <div class="pack-page-banner" style="background-image: url('<?php echo image_check($beats_lists->beat_graph_art) ?>');">
        </div>
        <div class="container beat_main_head">
            <div class="beat_main_head_content_wrap">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="beat_images_ico">
                            <img src="<?php echo image_check($beats_lists->beat_graph_art); ?>" alt="">
                        </div>
                        <div class="beat_download_button">

                            <a class="btn btn-red btn-lg" onclick="download_beat1(<?php echo $beats_lists->beat_id; ?>,'mainbeat');" href="javascript:void(0)">Download <div class="btn_loading"><i class="fa fa-spinner fa-pulse" style="font-size:24px"></i></div></a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="beat_title"><?php echo $beats_lists->beat_name; ?></div>
                        <div class="beat_author">Simple pack by <?php echo $this->users->get_user_field($beats_lists->uploaded_by,'display_name'); ?></div>
                        <div class="beat_descriptions"><?php print_r($beats_lists->beat_description); ?></div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="play_demo">
                                    <div class="music_section">

                                        <div id="play_main_beat_1">
                                            <a href="javascript:void(0);"  onclick="play()">
                                                <i class="far fa-play-circle"></i> PLAY DEMO
                                            </a>
                                        </div>
                                        <div id="stop_main_beat_1">
                                            <a href="javascript:void(0);"  onclick="pause()">
                                                <i class="far fa-stop-circle"></i>
                                            </a>
                                        </div>


                                        <audio src="<?php echo $beats_lists->beat_file; ?>" preload="auto" id="audio" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="beat_head_right_link">
                                    <div class="like_media">

                                        <div class="like_button"><a href="#"><i class="fas fa-heart"></i> Like</a></div>
                                        <!--<div class="read_more_button"><a href="#"><i class="fas fa-times"></i> Read More</a></div>-->
                                        <ul>
                                            <li><a href="<?php echo social_media_link('twitter'); ?>"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="<?php echo social_media_link('facebook'); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if(!empty($tag_lists)){ ?>
                                    <div class="tag_list_main">
                                        <ul>
                                            <?php foreach($tag_lists as $tag_list){ ?>
                                                <li><a href="javascript:void(0)"><?php echo $tag_list->tag_name; ?></a></li>

                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php //print_r($subbeat_lists); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(!empty($subbeat_lists)){ ?>
                        <?php $counter=1; ?>
                        <div class="subbeat_list">
                            <table class="table" id="subbeat_table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                                <thead>
                                <tr>
                                    <th style="width:10%; min-width: 10%; max-width: 10%;" data-breakpoints="xs sm md">PACK</th>
                                    <th style="width:30%; min-width: 30%; max-width: 30%;" >DURATION</th>
                                    <th style="width:30%; min-width: 30%; max-width: 30%;" data-breakpoints="xs sm md">FILENAME</th>
                                    <th style="width:10%; min-width: 10%; max-width: 10%;" data-breakpoints="xs">KEY</th>
                                    <th style="width:10%; min-width: 10%; max-width: 10%;" data-breakpoints="xs">BPM</th>
                                    <th style="width:10%; min-width: 10%; max-width: 10%;"></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($subbeat_lists as $subbeat_list){
                                    $beat_file_src[$i] = $subbeat_list->beat_file;
                                    ?>
                                    <tr>
                                        <td>
                                            <img class="subbeat_thumb_img" src="<?php echo$beats_lists->beat_graph_art; ?>" alt="">

                                        </td>
                                        <td class="play_btn">
                                            <a href="javascript:void(0);" class="music-btn playSample_<?=$i; ?>" data-id="<?=$i; ?>" data-action="playSample_<?=$i; ?>" ><i class="far fa-play-circle"></i></a><div id="waveform_<?=$i; ?>" class="music_wave"></div>
                                        </td>
                                        <td><?php echo $subbeat_list->beat_file_name; ?></td>
                                        <td><?php echo $subbeat_list->beat_key; ?></td>
                                        <td><?php echo $subbeat_list->beat_bpm; ?></td>
                                        <td class="td_action">
                                            <?php $fav_status=false; ?>
                                            <?php if(!empty($favorite_lists)){ ?>

                                                <?php foreach($favorite_lists as $favorite_list){ ?>

                                                    <?php if($favorite_list->beat_type=='subbeat' && $favorite_list->status==1 && $favorite_list->beat_id==$subbeat_list->beat_details_id){ ?>
                                                        <a class="active" onclick="sub_add_to_favorite(<?php echo  $subbeat_list->beat_details_id; ?>,'subbeat','0')"  href="javascript:void(0)"><i class="far fa-heart active"></i></a>
                                                        <?php $fav_status=true; ?>
                                                        <?php break; ?>
                                                    <?php }  ?>

                                                <?php } ?>

                                            <?php } else{  ?>
                                                <a onclick="sub_add_to_favorite(<?php echo  $subbeat_list->beat_details_id; ?>,'subbeat','1')"  href="javascript:void(0)"><i class="far fa-heart"></i></a>
                                                <?php $fav_status=true; ?>
                                            <?php } ?>
                                            <?php if($fav_status==false){ ?>
                                                <a onclick="sub_add_to_favorite(<?php echo  $subbeat_list->beat_details_id; ?>,'subbeat','1')"  href="javascript:void(0)"><i class="far fa-heart"></i></a>
                                                <?php $fav_status=true; ?>
                                            <?php } ?>

                                            <!--<a onclick="download_subbeats(<?php /*echo $subbeat_list->beat_details_id; */?>);" href="javascript:void(0)"><i class="far fa-arrow-alt-circle-down"></i></a>-->
                                            <a onclick="download_beat1(<?php echo $subbeat_list->beat_details_id; ?>,'subbeat');" href="javascript:void(0)"><i class="far fa-arrow-alt-circle-down"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } else {
        echo "<h3 class='no_data'>No Data Found!</h3>";

    }
    ?>
</div>

<?php if(!empty($subbeat_lists)){ ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/wavesurfer.min.js"></script>

    <script type="text/javascript">
        $( document ).ready(function(){
            $('.table').footable({}, function(e){
                <?php
                $j=1;
                foreach ($beat_file_src as $value) {
                ?>
                var wavesurfer_<?=$j; ?> = WaveSurfer.create({
                    container     : document.querySelector('#waveform_<?=$j; ?>'),
                    waveColor: 'red',
                    progressColor: 'purple',
                    barWidth: 2,
                    barGap: 1,
                    height: 35,
                    responsive: true,
                    cursorColor: '#fff'
                });

                wavesurfer_<?=$j; ?>.load('<?=$value; ?>');

                <?php $j++; } ?>

                var GLOBAL_ACTIONS = {
                    <?php for($j=1; $j<=count($subbeat_lists); $j++){ ?>
                    'playSample_<?=$j; ?>': function () {
                        wavesurfer_<?=$j; ?>.playPause();
                        $('.playSample_<?=$j; ?>').addClass(''+wavesurfer_<?=$j; ?>.isPlaying()+'');
                    },
                    <?php } ?>
                };

                var GLOBAL_ACTIONS_1 = {
                    <?php for($j=1; $j<=count($subbeat_lists); $j++){ ?>
                    'playSample_<?=$j; ?>': function () {
                        wavesurfer_<?=$j; ?>.stop();
                        $('.playSample_<?=$j; ?>').removeClass('playing');
                    },
                    <?php } ?>
                };

                $('body').on('click', '.play_btn .music-btn', function(e){
                    var old_data_id = $('.playing').data('id');
                    var data_id = $(this).data('id');

                    var action = $('.playSample_'+old_data_id).attr('data-action');
                    var action2 = e.currentTarget.dataset.action;

                    if(old_data_id){
                        $('.playSample_'+old_data_id).removeClass('true');
                        $('.playSample_'+old_data_id).removeClass('false');
                        $('.playSample_'+old_data_id+' i').removeClass('fa-stop-circle');
                        $('.playSample_'+old_data_id+' i').addClass('fa-play-circle');

                        GLOBAL_ACTIONS_1[action](e);
                    }

                    if(data_id == old_data_id){
                        $('.false').removeClass('playing');
                        $('.false i').removeClass('fa-stop-circle');
                        $('.false i').addClass('fa-play-circle');
                    }else{
                        GLOBAL_ACTIONS[action2](e);
                        $('.playSample_'+data_id).addClass('playing');
                        $('.playSample_'+data_id+' i').removeClass('fa-play-circle');
                        $('.playSample_'+data_id+' i').addClass('fa-stop-circle');

                        $('.false').removeClass('playing');
                        $('.false i').removeClass('fa-stop-circle');
                        $('.false i').addClass('fa-play-circle');
                    }

                });

            });

        });

    </script>

<?php } ?>