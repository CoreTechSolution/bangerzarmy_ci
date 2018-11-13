<?php
if(!empty(validation_errors())){ ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php
}
?>
<?php //print_r($this->session->flashdata()); exit(); ?>
<?php if(!empty($this->session->flashdata('msg'))){ ?>
    <?php $alert_class= (strtolower( $this->session->flashdata('msg_type'))=='success')?'alert-success':'alert-danger'; ?>
    <div class="alert <?php echo $alert_class; ?>">
        <strong><?php echo $this->session->flashdata('msg_type'); ?>!</strong> <?php echo $this->session->userdata('msg'); ?>
    </div>
    <?php $this->session->set_flashdata(''); ?>
<?php } ?>