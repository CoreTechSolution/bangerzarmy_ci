<div class="wrapper3 users">
    <div class="container">
        <div class="row">
            <?php $this->template_part->admin_users_profile_sec(); ?>
            <div class="col-lg-9">
                <div class="contentSection">
                    <div class="dashboard-section">
                        <div class="box-wrapper">
                            <div class="box-title"><?php echo $title; ?></div>
                            <div class="box-container">
                                <div class="create_subs">
                                    <a href="<?php echo base_url('admin/create_blog'); ?>" class="btn btn-primary btn-sm">Create</a>

                                </div>
                                <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Content</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($blogs)){ ?>
                                        <?php //print_r($beat_lists); exit(); ?>
                                        <?php $count=1; ?>
                                        <?php foreach ($blogs as $blog) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><img class="table_list_image" src="<?php echo $blog->post_img; ?>" alt=""></td>
                                                <td><?php echo $blog->post_title; ?></td>
                                                <td><?php echo word_limiter($blog->post,10); ?></td>
                                                <td><?php echo dateFormat('m-d-Y',$blog->date_added); ?></td>
                                                <td><a href="<?php echo base_url('admin/edit_blog/'.$blog->post_id); ?>" class="btn btn-sm btn-secondary">Edit</a> | <a href="javascript:void(0)" onclick="delete_data(<?php echo $blog->post_id; ?>,'post_id','posts');" class="btn btn-sm btn-red">Delete</a></td>
                                            </tr>
                                            <?php $count++; ?>
                                        <?php } ?>

                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>