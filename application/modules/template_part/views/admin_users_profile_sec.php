<?php
$user_type=$this->session->userdata('user_type');
$user_id=$this->users->get_current_user_id();
?>
<?php if($this->users->get_user_field($user_id,'profile_img')!=''){
    $profile_image=$this->users->get_user_field($user_id,'profile_img');
} else{
    $profile_image=base_url('assets/images').'/user-icon.png';
}
?>
<div class="col-lg-3"> 
    <div class="profile-sidebar">
        <div class="profile-img" style="background-image: url('<?php echo $profile_image; ?>');"> 
        </div>
        <div class="profile-display-name"><?php echo $name; ?></div>
        <div class="profile-display-role">(<?php echo $user_type; ?>)</div>
        <div class=""><a class="btn btn-default edit_profile_btn" href="<?php echo base_url($user_type.'/profile_edit/'.$user_id) ; ?>">Edit</a></div>
    </div>
    <?php $this->template_part->sidebar_admin_menu(); ?>                
</div>