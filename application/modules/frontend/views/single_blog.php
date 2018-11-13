<div class="page_banner">
    <div class="page_banner_text"><?php echo $title ?></div>
</div>
<div class="beat_list_wrapper4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="page_content">
                    <?php if(!empty($blogs)){ ?>
                        <div class="single_blog_img">
                            <img src="<?php echo $blogs->post_img;  ?>" alt="">
                        </div>
                        <div class="single_blog_details">
                            <ul>
                                <li>Author: <span><?php echo get_returnfield('users','user_id',$blogs->user_id,'name') ; ?></span></li>
                                <li>Date: <span><?php echo dateFormat('m-d-Y',$blogs->date_added) ; ?></span></li>

                            </ul>
                        </div>
                        <div class="single_blog_content">
                            <?php echo $blogs->post;  ?>
                        </div>
                    <?php } ?>

                    <?php if($view_comment==true){ ?>
                        <?php if(!empty($comments)){ ?>
                            <div class="comment_listing">
                                <div class="row">
                                    <div class="col-lg-6"><h4>Comments</h4></div>
                                    <div class="col-lg-6"></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-8">
                                        <hr>
                                    <?php foreach ($comments as $comment) { ?>
                                        <div class="comment_l">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="comment_avtar">
                                                        <img src="<?php echo image_check(get_returnfield('users','user_id',$comment->user_id,'profile_img')); ?>" alt="">
                                                    </div>
                                                    <div class="comment_detail">
                                                        <ul>
                                                            <li>Author: <span><?php echo get_returnfield('users','user_id',$comment->user_id,'name') ; ?></span></li>
                                                            <li>Date: <span><?php echo dateFormat('m-d-Y',$comment->date_added) ; ?></span></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="comment_content">
                                                        <?php echo $comment->comment; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="comment_form">
                            <div class="row">
                                <div class="col-md-8">

                                    <div id="respond" class="comment-respond">
                                        <h3 id="reply-title" class="comment-reply-title">Leave a Comment <small><a rel="nofollow" id="cancel-comment-reply-link" href="/advertisement/coldwell-banker-la-mansion-real-estate-2-2/#respond" style="display:none;">Cancel reply</a></small></h3>
                                        <?php if(!empty($user_id)){ ?>
                                            <form action="<?php echo base_url(); ?>" method="post" id="commentform" class="form-horizontal">
                                                <p class="comment-notes">Your email address will not be published.</p>
                                                <input type="hidden" name="post_id" value="<?php echo $blogs->post_id; ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                <p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" class="form-control textarea-no-styles" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>

                                                <p></p>
                                                <p class="form-submit"><input name="submit" type="submit" id="submit_comment" class="btn btn-red" value="Post Comment">

                                                </p>
                                            </form>
                                        <?php } else { ?>
                                            <p><a href="javascript:void(0)" data-toggle="modal" data-target="#blogLogin">Login</a> to add comment</p>
                                        <?php } ?>
                                    </div>
                                    <!-- #respond -->
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="blogLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('ajax/popup_login') ?>" method="post" class="users_forms" id="forms">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="popupLogin"  class="btn-red btn popupLogin" value="Login"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Login</button>
            </div>-->
        </div>
    </div>
</div>
