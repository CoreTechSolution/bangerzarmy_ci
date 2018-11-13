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
                            <?php //print_r($subscriptions); ?>
                            <?php if(!empty($this->session->flashdata('msg'))){ ?>
                                <?php $alert_class= ($this->session->flashdata('msg_type')=='Success')?'alert-success':'alert-danger'; ?>
                                <div class="alert <?php echo $alert_class; ?>">
                                    <strong><?php echo $this->session->flashdata('msg_type'); ?>!</strong> <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <?php } ?>
                            <h5 class="admin_h5">Active Plan</h5>
                            <?php if (!empty($subscriptions)){ ?>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Plan Name</th>
                                        <th>Activation Date</th>
                                        <th>Download Limit</th>
                                        <th>Downloaded</th>
                                        <th>Exp. Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo get_returnfield('memberships','membership_id',$subscriptions->membership_id,'title'); ?></td>
                                        <td><?php echo dateFormat('m-d-Y',$subscriptions->create_date); ?></td>
                                        <td><?php echo $subscriptions->download_limits ?></td>
                                        <td><?php echo $subscriptions->downloaded ?></td>
                                        <td><?php echo dateFormat('m-d-Y',$subscriptions->expiry_date); ?></td>
                                        <td><?php echo ucfirst($subscriptions->status); ?></td>
                                        <td><a href="javascript:void(0);" data_id="<?php 
                                        echo $subscriptions->subscription_id; ?>" class="btn btn-sm btn-warning unsubscribe">Unsubscribe</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo '<h5> No plan activated!</h5>';
                            } ?>
                            <br>
                            <br>
                            <?php if(!empty($membership_lists)){ ?>
                                <h5 class="admin_h5">Membership Plan</h5>
                                <div class="row">
                                <?php //print_r($membership_lists); exit(); ?>
                                <?php $count=1; ?>
                                <?php foreach ($membership_lists as $membership_list) { ?>
                                    <div class="col-lg-6">
                                        <ul class="price">
                                            <li class="header"><?php echo $membership_list->title; ?></li>
                                            <li class="grey">$<?php echo $membership_list->price; ?> / <?php echo $membership_list->duration; ?> Days</li>
                                            <li><?php echo $membership_list->download_no; ?> Downloads</li>
                                            <li class="grey">
                                                <a href="javascript:void(0);" class="button" data-toggle="modal" data-target="#memFormModal" data-id="<?php echo $membership_list->membership_id; ?>">Buy Now</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                  
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="memFormModal" tabindex="-1" role="dialog" aria-labelledby="memFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memFormModalLabel">Payment Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="paymentFrm" enctype="multipart/form-data" action="<?php echo base_url('artist/payment'); ?>">
            <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="membership_id" name="membership_id" class="form-control" placeholder="Name" value="<?php echo set_value('membership_id'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="email@you.com" value="<?php echo set_value('email'); ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Card No:</label>
                        <input type="text" class="form-control" name="card_num" id="card_num">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="exp_month" maxlength="2" class="form-control" id="card-expiry-month" placeholder="MM" value="<?php echo set_value('exp_month'); ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="exp_year" class="form-control" maxlength="4" id="card-expiry-year" placeholder="YYYY" required="" value="<?php echo set_value('exp_year'); ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="cvc" id="card-cvc" maxlength="3" class="form-control" autocomplete="off" placeholder="CVC" value="<?php echo set_value('cvc'); ?>" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="payBtn" class="btn btn-primary">Pay Now</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#memFormModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #membership_id').val(recipient)
    })
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    //set your publishable key
    Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY ?>');
    //callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $('#payBtn').removeAttr("disabled");
            //display the errors on the form
            // $('#payment-errors').attr('hidden', 'false');
            $('#payment-errors').addClass('alert alert-danger');
            $("#payment-errors").html(response.error.message);
        } else {
            var form$ = $("#paymentFrm");
            //get token id
            var token = response['id'];
            //insert the token into the form
            //alert(token);
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            //submit form to the server
            form$.get(0).submit();
        }
    }
    $(document).ready(function() {
        //on form submit
        $("#paymentFrm").submit(function(event) {
            //disable the submit button to prevent repeated clicks
            $('#payBtn').attr("disabled", "disabled");
            //create single-use token to charge the user
            Stripe.createToken({
                number: $('#card_num').val(),
                cvc: $('#card-cvc').val(),
                exp_month: $('#card-expiry-month').val(),
                exp_year: $('#card-expiry-year').val()
            }, stripeResponseHandler);
            //submit from callback
            return false;
        });
    });
</script>
