<style type="text/css">
	.page_content p{text-align: left; font-weight: 400; }
</style>
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
                        <?php $counter=0; ?>
                        <div class="blog_listing">

                            <div class="row">
                                <?php foreach ($blogs as $blog){ ?>
                                    <?php if($counter<=1) {  ?>
                                        <div class="col-lg-6">
                                            <div class="blog_div">
                                                <a href="<?php echo base_url('frontend/blogs/'.$blog->slug); ?>">
                                                    <div class="blog_img-b">
                                                        <img src="<?php echo $blog->post_img; ?>" alt="">
                                                    </div>
                                                    <div class="blog_title"><?php echo $blog->post_title; ?></div>
                                                    <div class="blog_content"><?php echo word_limiter($blog->post,10); ?></div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="blog_div">
                                                <a href="<?php echo base_url('frontend/blogs/'.$blog->slug); ?>">
                                                    <div class="blog_img">
                                                        <img src="<?php echo $blog->post_img; ?>" alt="">
                                                    </div>
                                                    <div class="blog_title"><?php echo $blog->post_title; ?></div>
                                                    <div class="blog_content"><?php echo word_limiter($blog->post,10); ?></div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php $counter++; ?>
                                <?php } ?>
                            </div>

                        </div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
