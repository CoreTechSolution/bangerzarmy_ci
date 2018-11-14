
<?php $this->template_part->sidebar_admin_menu(); ?>
<!-- end: sidebar -->

<section role="main" class="content-body">
    <header class="page-header">
        <h2><?= ucfirst($title); ?></h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?= base_url('admin/dashboard'); ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span><?= ucfirst($title); ?></span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-6 col-lg-12 col-xl-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <p>You are logged in as <strong>Bangerzarmy</strong>. If you are not Beat Supply Member, please <a href="<?php echo base_url(); ?>users/logout">click here</a> to logout.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>
